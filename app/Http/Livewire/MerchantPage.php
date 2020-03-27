<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class MerchantPage extends Component
{
    public $slug;
    public $amount = 20;
    public $company_name;
    public $checkout_token;

    protected $user;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->user = User::whereSlug($slug)->first();
        if (!$this->user) {
            $this->user = User::find($slug);
        }
        $this->readUserData();
    }


    /**
     * Reads the data from the local user object to the local properties
     * We do it like this to protect sensitive data from publishing
     */
    public function readUserData()
    {
        if (!is_object($this->user)) {
            return false;
        }
        $this->company_name = $this->user->company;
        $this->checkout_token = $this->user->checkout_token;
    }

    public function render()
    {
        return view('livewire.merchant-page');
    }
}
