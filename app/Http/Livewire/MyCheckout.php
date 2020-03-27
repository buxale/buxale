<?php

namespace App\Http\Livewire;

use App\CustomerWebhook;
use App\SampleWebhook;
use Illuminate\Support\Str;
use Livewire\Component;

class MyCheckout extends Component
{
    public $webhooks = [];
    public $new_webhook = "";
    public $new_auth_token = "";

    public $checkout_token;

    public function mount()
    {
        $this->initiaizeWebhooks();
    }

    public function saveInternalCheckoutToken()
    {
        return auth()->user()->update(['checkout_token' => $this->checkout_token]);
    }

    public function deleteHook($hook_id)
    {
        CustomerWebhook::whereUserId(auth()->id())->whereId($hook_id)->first()->delete();
        $this->initiaizeWebhooks();
    }

    public function saveWebhook()
    {
        CustomerWebhook::create([
            'user_id' => auth()->id(),
            'webhook' => $this->new_webhook,
            'auth_token' => $this->new_auth_token
        ]);
        $this->initiaizeWebhooks();
    }

    public function sendTestWebhook($hook_id)
    {
        SampleWebhook::fire(CustomerWebhook::whereUserId(auth()->id())->find($hook_id));
    }

    public function activateCheckout()
    {
        $user = auth()->user();
        $token = $user->createToken('buxale-api-key', ['access' => 'stripe']);
        $user->update(['checkout_token' => $token->plainTextToken]);
        $this->checkout_token = $token->plainTextToken;
    }

    public function render()
    {
        return view('livewire.my-checkout');
    }

    public function initiaizeWebhooks()
    {
        $this->webhooks = CustomerWebhook::whereUserId(auth()->id())->get();
        $this->new_webhook = "";
        $this->new_auth_token = Str::uuid()->toString();
        $this->checkout_token = auth()->user()->checkout_token;
    }
}
