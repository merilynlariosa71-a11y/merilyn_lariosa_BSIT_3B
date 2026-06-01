<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private function cart()
    {
        return session()->get('cart', []);
    }

    public function index()
    {
        return view('cart.index', ['cart' => $this->cart()]);
    }

    public function add(Request $request, Product $product)
    {
        $data = $request->validate([
            'color' => ['required'],
            'size' => ['nullable'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $cart = $this->cart();
        $key = $product->id . '-' . $data['color'] . '-' . ($data['size'] ?? '');

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $data['quantity'];
        } else {
            $cart[$key] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'category' => $product->category,
                'image' => $product->image,
                'price' => $product->price,
                'color' => $data['color'],
                'size' => $data['size'] ?? null,
                'quantity' => $data['quantity'],
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Added to cart!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'key' => ['required'],
            'quantity' => ['required', 'integer'],
        ]);

        $cart = $this->cart();

        if (isset($cart[$request->key])) {
            if ($request->quantity <= 0) {
                unset($cart[$request->key]);
            } else {
                $cart[$request->key]['quantity'] = $request->quantity;
            }
        }

        session()->put('cart', $cart);

        return back();
    }

    public function remove(Request $request)
    {
        $cart = $this->cart();
        unset($cart[$request->key]);
        session()->put('cart', $cart);

        return back();
    }
}