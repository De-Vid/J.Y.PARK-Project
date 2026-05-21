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
        'price',
        'stock',
        'image',
        'image',
        'image1',
        'image2',
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}