@extends('layouts.admin')
@section('content')
    <div class="container mt-4 w-25">
        <h2>Создание заказа</h2>

        @if ($errors->any())
            <div class="alert alert-danger" style="width: 300px">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="price_from" class="form-label">Price From</label>
                <input type="number" step="0.01" class="form-control" id="price_from" name="price_from" required placeholder="123.00">
            </div>

            <div class="mb-3">
                <label for="price_to" class="form-label">Price To</label>
                <input type="number" step="0.01" class="form-control" id="price_to" name="price_to" required placeholder="123.00">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="new">New</option>
                    <option value="used">Used</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Order</button>
        </form>

    </div>
@endsection
