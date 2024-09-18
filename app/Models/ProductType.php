<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    // The fields that are mass assignable
    protected $fillable = ['name'];

    /**
     * A product type has many products.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
