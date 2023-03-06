<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'price_from',
        'price_to',
        'type',
        'name'
    ];

    /**
     * Scope a query to only include popular users.
     */
    public function scopeFilterBySellerProductMatch(Builder $query, int $user_id): Builder
    {
        return $query->join('product', function ($join) {
            $join->on('product.type', '=', 'orders.type')
                ->whereRaw('product.price BETWEEN orders.price_from AND orders.price_to')
                ->whereRaw('product.name = orders.name')
                ->whereRaw('product.user_id = ' . \Auth::id());
        });
    }
}
