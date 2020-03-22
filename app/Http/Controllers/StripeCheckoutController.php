<?php

namespace App\Http\Controllers;

class StripeCheckoutController extends Controller
{
    public function session()
    {
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => "Drive Club transportation",
                'amount' => 1000,
                'currency' => 'eur',
                'quantity' => 1,
            ]],
            'payment_intent_data' => [
                'application_fee_amount' => 123,
                'transfer_data' => [
                    'destination' => '{{CONNECTED_STRIPE_ACCOUNT_ID}}',
                ],
            ],
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/failure',
        ]);
    }
}
