<?php

namespace App\Http\Controllers;

use App\Http\Resources\VoucherResource;
use App\Repositories\VoucherRepository;
use App\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    private $voucherRepository;

    /**
     * VoucherController constructor.
     */
    public function __construct(VoucherRepository $voucherRepository)
    {
        $this->voucherRepository = $voucherRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return VoucherResource
     */
    public function store(Request $request)
    {
        $verifiedData = $request->validate([
            'code' => ['required'],
            'value' => ['required'],
            'meta' => ['nullable', 'json'],

            'beneficiary_company' => ['required'],
            'beneficiary_name' => ['required'],
            'beneficiary_street' => ['required'],
            'beneficiary_street_no' => ['required'],
            'beneficiary_zip' => ['required'],
            'beneficiary_city' => ['required'],
            'beneficiary_country' => ['required'],
            'beneficiary_email' => ['required', 'email'],
            'beneficiary_phone' => ['nullable'],

            'customer_name' => ['required'],
            'customer_street' => ['required'],
            'customer_street_no' => ['required'],
            'customer_zip' => ['required'],
            'customer_city' => ['required'],
            'customer_country' => ['required'],
            'customer_email' => ['required', 'email'],
            'customer_phone' => ['nullable'],
        ]);

        $user = auth()->user();
        $voucher = $this->voucherRepository->create($user, $verifiedData, true);

        return new VoucherResource($voucher);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        //
    }
}
