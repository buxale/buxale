<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StripeCheckoutController extends Controller
{
    public function session()
    {
        request()->validate([
            'amount' => 'required|numeric',
            'success_url' => 'required',
            'cancel_url' => 'required'
        ]);

        $amount = intval(request('amount')) * 100;
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => "Gutschein für " . auth()->user()->company,
                'amount' => $amount,
                'currency' => 'eur',
                'quantity' => 1,
            ]],
            'payment_intent_data' => [
                'application_fee_amount' => $amount * (config('buxale.fee') / 100),
                'transfer_data' => [
                    'destination' => auth()->user()->stripe_account_id,
                ],
            ],
            'success_url' => request('success_url'),
            'cancel_url' => request('cancel_url'),
        ]);
        return $session->id;
    }

    public function webhook(Request $request)
    {
        $payload = $request->all();
        $sig_header = $request->header('stripe-signature');

        $event = null;

        // Verify webhook signature and extract the event.
        // See https://stripe.com/docs/webhooks/signatures for more information.
        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, config('services.stripe.signature')
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload.
            return response('Invalid payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid Signature.
            return response('Invalid Signature', 400);
        }

        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;
            Log::info($session);
        }

        return response('Ok', 200);
    }
}
