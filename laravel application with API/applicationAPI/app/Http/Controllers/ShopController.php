<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        match ($request->sort) {
            'price-low' => $query->orderBy('price'),
            'price-high' => $query->orderByDesc('price'),
            'rating' => $query->orderByDesc('rating'),
            'popular' => $query->orderByDesc('reviews'),
            default => $query->latest(),
        };

        return view('shop.index', [
            'products' => $query->get(),
            'categories' => collect(['All'])->merge(Product::select('category')->distinct()->pluck('category')),
        ]);
    }

    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }
}