@extends('layouts.admin')
@section('content')
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
@endsection
