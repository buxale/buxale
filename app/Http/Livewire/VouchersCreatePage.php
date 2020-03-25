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
    public $notify_customer = false;


    public function updating()
    {
//        $this->validate([
//            'value' => 'numeric'
//        ]);
    }

    public function updatedValue($val)
    {
        $this->validate([
            'value' => 'numeric'
        ]);
        $this->pott_amount = $val * $this->getBuxaleFee();
    }

    public function submit()
    {
        $data = $this->validate([
            'code' => 'required',
            'value' => 'required|min:1',
            'customer_name' => 'required',
            'customer_street' => 'nullable',
            'customer_street_no' => 'nullable',
            'customer_zip' => 'nullable',
            'customer_city' => 'nullable',
            'customer_country' => 'nullable',
            'customer_email' => 'required',
            'customer_phone' => 'nullable',
        ]);

        (new VoucherRepository())->createFromUser(auth()->user(), $data, $this->notify_customer);

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
