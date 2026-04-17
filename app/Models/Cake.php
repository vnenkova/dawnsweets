<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cake extends Model
{
    protected $table = 'cakes';

    protected $fillable = [
        'name',
        'filepath',
        'price',
        'grams'
    ];

    public function cartProducts(): HasMany
    {
        return $this->hasMany(CartProduct::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

}
