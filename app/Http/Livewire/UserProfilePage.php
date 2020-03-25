<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserProfilePage extends Component
{
    public $user;
    public $showSuccess = false;

    public function mount()
    {
        $this->user = auth()->user()->toArray();
    }

    public function render()
    {
        return view('livewire.user-profile-page');
    }

    public function update()
    {
        $user = auth()->user();
        $user->update([
            'name' => $this->user['name'],
            'company' => $this->user['company'],
            'street' => $this->user['street'],
            'street_no' => $this->user['street_no'],
            'zip' => $this->user['zip'],
            'city' => $this->user['city'],
            'country' => $this->user['country'],
            'phone' => $this->user['phone'],
            'notify_users_by_default' => $this->user['notify_users_by_default'],
        ]);

        $this->showSuccess = true;
    }
}
