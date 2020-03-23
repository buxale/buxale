<?php

namespace App\Http\Livewire;

use App\Repositories\VoucherRepository;
use Illuminate\Support\Str;
use Livewire\Component;

class VouchersCreatePage extends Component
{

    public $pott_amount = 0;
    public $value = 0;
    public $code = "";
    public $customer_name;
    public $customer_street;
    public $customer_street_no;
    public $customer_zip;
    public $customer_city;
    public $customer_country = 'Deutschland';
    public $customer_email;
    public $customer_phone;


    public function updating()
    {
        $this->validate([
            'value' => 'numeric'
        ]);
    }

    public function updatedValue($val)
    {
        $this->pott_amount = $val * $this->getBuxaleFee();
    }

    public function submit()
    {
        $data = $this->validate([
            'code' => 'required',
            'value' => 'required|min:1',
            'customer_name' => 'required',
            'customer_street' => 'required',
            'customer_street_no' => 'required',
            'customer_zip' => 'required',
            'customer_city' => 'required',
            'customer_country' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
        ]);

        (new VoucherRepository())->createFromUser(auth()->user(), $data);

        return $this->redirect('/vouchers');
    }

    public function generateVoucherCode()
    {
        $this->code = Str::uuid()->toString();
    }

    public function render()
    {
        return view('livewire.vouchers-create-page');
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getBuxaleFee()
    {
        return config('buxale.fee') / 100;
    }
}
