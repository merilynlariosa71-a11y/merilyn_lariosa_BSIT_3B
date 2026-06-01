@extends('layout')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-7">

        <div class="card-modern p-5">

            <h2 class="page-title mb-2">Add Luxury Bag</h2>

            <p class="subtitle mb-4">
                Enter bag details below.
            </p>

            <form action="/bags" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Bag Name
                    </label>

                    <input
                        type="text"
                        name="bag_name"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Brand
                    </label>

                    <input
                        type="text"
                        name="brand"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Price
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="price"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Stock
                    </label>

                    <input
                        type="number"
                        name="stock"
                        class="form-control"
                        required
                    >

                </div>

                <button class="btn btn-primary-modern w-100">

                    Save Bag

                </button>

            </form>

        </div>

    </div>

</div>

@endsection