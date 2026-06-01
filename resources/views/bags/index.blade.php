@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title">Luxury Bags Inventory</h1>
        <p class="subtitle">Manage your luxury bag collection and customer orders.</p>
    </div>

    <div>
        <a href="/orders/create" class="btn btn-success-modern me-2">
            Order Form
        </a>

        <a href="/bags/create" class="btn btn-primary-modern">
            Add New Bag
        </a>
    </div>
</div>

<div class="card-modern p-4">

    <div class="table-responsive">

        <table class="table align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bag Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($bags as $bag)
                <tr>
                    <td>{{ $bag->id }}</td>
                    <td>
                        <strong>{{ $bag->bag_name }}</strong>
                    </td>
                    <td>{{ $bag->brand }}</td>
                    <td>
                        <strong>₱{{ number_format($bag->price, 2) }}</strong>
                    </td>
                    <td>
                        <span class="badge-stock">
                            {{ $bag->stock }} Available
                        </span>
                    </td>
                    <td>
                        <a href="/bags/{{ $bag->id }}/edit" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/bags/{{ $bag->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection