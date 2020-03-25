<?php

namespace App\Http\Controllers;

use App\Voucher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stripe_account_id = auth()->user()->stripe_account_id;
        $balance = 0;

        if ($stripe_account_id) {
            $balance = \Stripe\Balance::retrieve(
                ['stripe_account' => $stripe_account_id]
            )->pending[0]->amount;
        }

        $pott_amount = Voucher::where('user_id', auth()->id())->whereNotNull('paid_at')->select('value')->sum('value') * config('buxale.fee');
        $vouchers_this_week = Voucher::where('user_id', auth()->id())->where('created_at', '>', now()->subWeek())->count();
        return view('home', compact('balance', 'pott_amount', 'vouchers_this_week'));
    }
}
