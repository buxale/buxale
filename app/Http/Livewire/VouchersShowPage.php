<?php

namespace App\Http\Livewire;

use App\Voucher;
use Illuminate\Http\Request;
use Livewire\Component;

class VouchersShowPage extends Component
{
    public $voucher = null;

    public function mount($voucher)
    {
        $user = auth()->user();
        $voucher = Voucher::find($voucher);

        // check if user has permission to access this voucher
        if(is_null($voucher) || ! $user->is($voucher->user)) return redirect(route('vouchers.index'));

        $this->voucher = $voucher;
    }

    public function render()
    {
        return view('livewire.vouchers-show-page');
    }
}
