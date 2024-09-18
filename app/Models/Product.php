<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'quantity', 
        'product_type_id', 
        'warehouse_location_id'
    ];

    /**
     * A product belongs to a product type.
     */
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
}
