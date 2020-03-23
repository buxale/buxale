<?php

namespace App\Http\Controllers;

use App\CheckoutSession;
use App\Events\CheckoutFulfilled;
use App\Repositories\VoucherRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StripeCheckoutController extends Controller
{
    /**
     * @var VoucherRepository
     */
    private $voucherRepository;

    public function __construct(VoucherRepository $voucherRepository)
    {
        $this->voucherRepository = $voucherRepository;
    }

    public function session()
    {
        request()->validate([
            'amount' => 'required|numeric',
            'success_url' => 'required',
            'cancel_url' => 'required',
            'ref_id' => 'nullable',
            'code' => 'nullable'
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
        $code = request()->input('code', Str::uuid());

        // create an empty, unpaid voucher
        $voucher = $this->voucherRepository->createFromUser(auth()->user(), [
            'code' => $code,
            'value' => intval(request('amount'))
        ]);

        // References. Allow custom references, but if there is a dup, return 400
        $combined_ref = null;
        if (request()->has('ref_id')) {
            $combined_ref = auth()->id() . '_' . request('ref_id');
            if (CheckoutSession::where('ref_id', $combined_ref)->count()) {
                return response('ref_id already used!', 400);
            }
        }

        //initiate an internal session for later matchup
        CheckoutSession::create([
            'user_id' => auth()->id(),
            'voucher_id' => $voucher->id,
            'ref_id' => $combined_ref,
            'session_id' => $session->id
        ]);
        return $session->id;
    }

    public function webhook(Request $request)
    {
        $payload = $request->getContent();
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
            $checkout_session = CheckoutSession::whereSessionId($session->id)->first();
            $checkout_session->update(['status' => 'fulfilled']); // TODO: Refactor to listener, for async computing
            event(new CheckoutFulfilled($checkout_session));
        }

        return response('Ok', 200);
    }
}
