<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'total_price',
        'order_date',
    ];

    /**
     * Define a relationship to the Customer model.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Define a relationship to the Product model.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
