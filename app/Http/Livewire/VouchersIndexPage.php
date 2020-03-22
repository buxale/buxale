<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VouchersIndexPage extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.vouchers-index-page');
    }
}
