<?php

namespace App\Http\Livewire;

use App\Voucher;
use Livewire\Component;
use Livewire\WithPagination;

class VouchersIndexPage extends Component
{
    use WithPagination;
    public $search = '';

    public function mount() {

    }

    public function render()
    {
        return view('livewire.vouchers-index-page', ['vouchers' => $this->getVouchers()]);
    }

    private function getVouchers()
    {
        return Voucher::where('user_id', auth()->id())->paginate(15);
    }
}
