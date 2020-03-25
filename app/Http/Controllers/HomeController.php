<?php

namespace App\Http\Controllers;

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
        return view('home', compact('balance'));
    }
}
