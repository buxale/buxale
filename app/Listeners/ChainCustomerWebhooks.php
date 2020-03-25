<?php

namespace App\Listeners;

use App\Events\CheckoutFulfilled;
use Illuminate\Support\Facades\Http;

class ChainCustomerWebhooks
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(CheckoutFulfilled $event)
    {
        $checkout_session = $event->getCheckoutSession();
        // for all users configured webhooks: call it, with the data from the checkout session.
        foreach ($checkout_session->user->customer_webhooks as $customer_webhook) {
            Http::withToken($customer_webhook->auth_token)->post($customer_webhook->webhook, $checkout_session->toWebhookData());
        }

        $checkout_session->voucher->update(['paid_at' => now()->toDateTimeString()]);
    }
}
