@extends('layouts.admin')
@section('content')
    <h1>Поступившие заказы</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Тип</th>
            <th>Цена от</th>
            <th>Цена до</th>
            <th>Дата создания</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->name }}</td>
                <td>{{ $order->type }}</td>
                <td>{{ $order->price_from }}</td>
                <td>{{ $order->price_to }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h1>Мои товары</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Тип</th>
            <th>Цена</th>
            <th>Дата создания</th>
            <th>Статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->type }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at }}</td>
                <td>
                    @if($product->active)
                        <span class="badge bg-success">Есть заказ</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
