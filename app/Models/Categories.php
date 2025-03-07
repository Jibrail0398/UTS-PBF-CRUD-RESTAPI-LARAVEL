<?php

namespace App\Models;

use app\Models\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    
        public function products()
        {
            return $this->hasMany(Products::class);
        }
    
}
