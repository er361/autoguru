<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class OrderController extends Controller
{
    public function create()
    {
        return \view('admin.orders.create');
    }

    public function store(CreateOrderRequest $request)
    {
        Order::create([
            'user_id' => \Auth::id(),
            'name' => $request->name,
            'price_from' => $request->price_from,
            'price_to' => $request->price_to,
            'type' =>  $request->type,
        ]);
        return redirect(route('orders.list'));
    }
    //
    public function list()
    {
        return view('admin.orders.list',['orders' => Order::where('user_id',\Auth::id())->get()]);
    }
}
