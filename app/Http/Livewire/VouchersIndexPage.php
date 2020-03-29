<?php

namespace App\Http\Livewire;

use App\Voucher;
use Livewire\Component;

class VouchersIndexPage extends Component
{
    public $search = '';


    public function render()
    {
        return view('livewire.vouchers-index-page', ['vouchers' => $this->getVouchers()]);
    }

    public function getVouchers()
    {
        return Voucher::where('user_id', auth()->id())->paginate(15);
    }
}
