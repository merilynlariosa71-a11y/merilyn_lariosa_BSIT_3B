@extends('layout')

@section('content')

<form action="/orders/store" method="POST">

    @csrf

    <div class="mb-3">
        <label>Select Bag</label>

        <select name="bag_id" class="form-control">

            @foreach($bags as $bag)
                <option value="{{ $bag->id }}">
                    {{ $bag->bag_name }} - ₱{{ $bag->price }}
                </option>
            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label>Customer Name</label>
        <input type="text" name="customer_name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Phone Number</label>
        <input type="text" name="phone" class="form-control">
    </div>

    <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control">
    </div>

    <button class="btn btn-success">
        Place Order
    </button>

</form>

@endsection