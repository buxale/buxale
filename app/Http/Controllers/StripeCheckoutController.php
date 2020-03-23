<?php

namespace App\Http\Controllers;

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
}
