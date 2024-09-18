<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'order_date',
        'customer_name',
        'customer_email',
        'customer_phone',
    ];

    /**
     * Each order belongs to a product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}