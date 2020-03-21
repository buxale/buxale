<?php


namespace App\Repositories;

use App\User;
use Illuminate\Support\Arr;

class VoucherRepository
{
    /**
     * @param User $user
     * @param array $voucherData
     * @return \Illuminate\Database\Eloquent\Model Voucher
     */
    public function create(User $user, array $voucherData)
    {
        $voucher = $user->vouchers()->create([
            'code' => Arr::get($voucherData, 'code', NULL),
            'value' => Arr::get($voucherData, 'value', NULL),
            'meta' => Arr::get($voucherData, 'meta', NULL),
            'beneficiary_company' => Arr::get($voucherData, 'beneficiary_company', NULL),
            'beneficiary_name' => Arr::get($voucherData, 'beneficiary_name', NULL),
            'beneficiary_street' => Arr::get($voucherData, 'beneficiary_street', NULL),
            'beneficiary_street_no' => Arr::get($voucherData, 'beneficiary_street_no', NULL),
            'beneficiary_zip' => Arr::get($voucherData, 'beneficiary_zip', NULL),
            'beneficiary_city' => Arr::get($voucherData, 'beneficiary_city', NULL),
            'beneficiary_country' => Arr::get($voucherData, 'beneficiary_country', NULL),
            'beneficiary_email' => Arr::get($voucherData, 'beneficiary_email', NULL),
            'beneficiary_phone' => Arr::get($voucherData, 'beneficiary_phone', NULL),
            'customer_name' => Arr::get($voucherData, 'customer_name', NULL),
            'customer_street' => Arr::get($voucherData, 'customer_street', NULL),
            'customer_street_no' => Arr::get($voucherData, 'customer_street_no', NULL),
            'customer_zip' => Arr::get($voucherData, 'customer_zip', NULL),
            'customer_city' => Arr::get($voucherData, 'customer_city', NULL),
            'customer_country' => Arr::get($voucherData, 'customer_country', NULL),
            'customer_email' => Arr::get($voucherData, 'customer_email', NULL),
            'customer_phone' => Arr::get($voucherData, 'customer_phone', NULL),
        ]);

        return $voucher;
    }
}