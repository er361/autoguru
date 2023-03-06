<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class AdminController extends Controller
{
    //
    public function index()
    {
        //Генерирую товары для продовца для удобства и чтобы не создавать их в ручную
        if (\Auth::user()->isSeller() && Product::whereUserId(\Auth::id())->count() < 10) {
            for ($i = 0; $i < 10; $i++) {
                Product::create([
                    'user_id' => \Auth::id(),
                    'name' => fake()->name,
                    'price' => fake()->randomFloat(2, 100, 9999),
                    'type' => fake()->randomElement(['new', 'used']),
                ]);
            }
        }

        return view('admin.index');
    }

    public function seller()
    {
        if(!\Auth::user()->isSeller())
            abort(403);

        $orders = Order::filterBySellerProductMatch(\Auth::id())->select(['orders.*', 'product.id as p_id'])->get();
        $products = Product::whereUserId(\Auth::id())->get();
        $ids = collect($orders->toArray())->pluck('p_id')->toArray();
        $productsMapped = $products->map(function ($item) use ($ids) {
            if (in_array($item['id'], $ids)) {
                $item['active'] = true;
            }
            return $item;
        });

        return view('admin.seller', [
            'products' => $productsMapped,
            'orders' => $orders
        ]);
    }
}
