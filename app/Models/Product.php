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
        'price',
        'batch_number',
        'expiry_date',
        'user_id',
        'product_type_id',
        'supplier_id',
        'warehouse_location_id',
        'image', // Add image to fillable
    ];

    // Define the relationship with Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A product belongs to a product type.
     */
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function warehouseLocation()
    {
        return $this->belongsTo(WarehouseLocation::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    
    public function dashboard()
    {
        // Fetch all products and group them by type
        $products = Product::all()->groupBy('type');

        return view('customer.dashboard', compact('products'));
    }
}
