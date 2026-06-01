<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $bags = Bag::all();
        return view('orders.create', compact('bags'));
    }

    public function store(Request $request)
    {
        $bag = Bag::findOrFail($request->bag_id);

        $total = $bag->price * $request->quantity;

        Order::create([
            'bag_id' => $bag->id,
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'total_price' => $total,
        ]);

        $bag->stock -= $request->quantity;
        $bag->save();

        return redirect('/orders/create')->with('success', 'Order Placed Successfully');
    }
}