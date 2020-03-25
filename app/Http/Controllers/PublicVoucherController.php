<?php

namespace App\Http\Controllers;

use App\Voucher;
use Illuminate\Http\Request;

class PublicVoucherController extends Controller
{
    public function show(Voucher $voucher)
    {
        return view('voucher', compact('voucher'));
    }
}
