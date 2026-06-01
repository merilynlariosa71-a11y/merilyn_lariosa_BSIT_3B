@extends('layout')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-7">

        <div class="card-modern p-5">

            <h2 class="page-title mb-2">Edit Luxury Bag</h2>
            <p class="subtitle mb-4">Update bag information.</p>

            <form action="/bags/{{ $bag->id }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Bag Name</label>
                    <input type="text" name="bag_name" class="form-control" value="{{ $bag->bag_name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ $bag->brand }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ $bag->price }}">
                </div>
                <div class="mb-4">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" value="{{ $bag->stock }}">
                </div>

                <button class="btn btn-success-modern w-100">
                    Update Bag
                </button>

            </form>

        </div>

    </div>

</div>

@endsection