<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use Illuminate\Http\Request;

class BagController extends Controller
{
    public function index()
    {
        $bags = Bag::all();
        return view('bags.index', compact('bags'));
    }

    public function create()
    {
        return view('bags.create');
    }

    public function store(Request $request)
    {
        Bag::create($request->all());

        return redirect('/bags')->with('success', 'Bag Added Successfully');
    }

    public function edit(Bag $bag)
    {
        return view('bags.edit', compact('bag'));
    }

    public function update(Request $request, Bag $bag)
    {
        $bag->update($request->all());

        return redirect('/bags')->with('success', 'Bag Updated');
    }

    public function destroy(Bag $bag)
    {
        $bag->delete();

        return redirect('/bags')->with('success', 'Bag Deleted');
    }
}