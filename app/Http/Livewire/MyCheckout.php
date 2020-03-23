<?php

namespace App\Http\Livewire;

use App\CustomerWebhook;
use Illuminate\Support\Str;
use Livewire\Component;

class MyCheckout extends Component
{
    public $webhooks = [];
    public $new_webhook = "";
    public $new_auth_token = "";

    public function mount()
    {
        $this->initiaizeWebhooks();
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

    public function render()
    {
        return view('livewire.my-checkout');
    }

    public function initiaizeWebhooks()
    {
        $this->webhooks = CustomerWebhook::whereUserId(auth()->id())->get();
        $this->new_webhook = "";
        $this->new_auth_token = Str::uuid()->toString();
    }
}
