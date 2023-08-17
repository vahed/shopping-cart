<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'user_id', 'product_id', 'product_feature_id', 'image_url_id', 'quantity', 'name', 'email', 'address',
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
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getUserOrders($userId)
    {
        return Order::where('user_id', $userId)
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('product_features', 'orders.product_feature_id', '=', 'product_features.id')
            ->join('images', 'orders.image_url_id', '=', 'images.id')
            ->paginate(15);
    }

    /**
     * Each order belongs to many products
     * When products called from order model
     * need pivot table to distinguish the order
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
