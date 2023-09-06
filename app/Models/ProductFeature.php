<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use AmrShawky\LaravelCurrency\Facade\Currency;

class ProductFeature extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'price', 'quantity', 'color', 'size', 'description', 'discount', 'in_stock'];

    /**
     * Get the product's price and convert it into Rials.
     *
     * @param  string  $value
     * @return string
     */
    public function getPriceAttribute($value)
    {
        return Currency::convert()
            ->from('GBP')
            ->to('IRR')
            ->amount($value)
            ->throw()
            ->get();
    }

    public function products():belongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function productFeature(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
