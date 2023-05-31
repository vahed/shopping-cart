<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['order_id', 'product_id', 'quantity', 'name', 'email', 'address',
        'city', 'county', 'postcode', 'payment_gateway', 'transaction_id', 'total', 'error'
    ];

    /**
     * Get the user's orders.
     */
    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Each order belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Each order belongs to many products
     * When products called from order model
     * need pivot table to distinguish the order
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity');
    }

}
