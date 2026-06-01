<?php

namespace App\Http\Controllers;

use App\Models\Order;

class AccountController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();

        return view('account.index', compact('orders'));
    }
}