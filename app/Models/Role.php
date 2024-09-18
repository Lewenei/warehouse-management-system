<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Allow 'name' to be mass assignable.

    /**
     * A role can have many users.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
