<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartProduct extends Model
{
    use SoftDeletes;

    protected $table = 'cart_products';

    protected $fillable = [
        'cake_id',
        'user_id',
        'quantity'
    ];

    public function cake(): BelongsTo
    {
        return $this->belongsTo(Cake::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
