<?php

namespace App\Events;

use App\CheckoutSession;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CheckoutFulfilled
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var CheckoutSession
     */
    public $checkoutSession;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(CheckoutSession $checkoutSession)
    {
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * @return CheckoutSession
     */
    public function getCheckoutSession(): CheckoutSession
    {
        return $this->checkoutSession;
    }

}
