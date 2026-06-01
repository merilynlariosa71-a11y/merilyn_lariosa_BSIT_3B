<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if (count($cart) === 0) {
            return redirect()->route('cart.index');
        }

        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (count($cart) === 0) {
            return redirect()->route('cart.index');
        }

        $data = $request->validate([
            'email' => ['required', 'email'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zip_code' => ['required'],
            'card_number' => ['required'],
            'expiry' => ['required'],
            'cvv' => ['required'],
            'card_name' => ['required'],
        ]);

        $subtotal = collect($cart)->sum(fn ($item) => $item['price'] * $item['quantity']);
        $shipping = $subtotal > 5000 ? 0 : 99;
        $tax = $subtotal * 0.12;
        $total = $subtotal + $shipping + $tax;

        $order = Order::create([
            'order_number' => 'LB-' . strtoupper(Str::random(8)),
            'user_id' => auth()->id(),
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip_code' => $data['zip_code'],
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'tax' => $tax,
            'total' => $total,
            'estimated_delivery' => now()->addDays(rand(7, 10)),
        ]);

        foreach ($cart as $item) {
            $order->items()->create([
                'product_id' => $item['product_id'],
                'product_name' => $item['name'],
                'color' => $item['color'],
                'size' => $item['size'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'line_total' => $item['price'] * $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('checkout.confirmation', $order);
    }

    public function confirmation(Order $order)
    {
        return view('checkout.confirmation', compact('order'));
    }
}