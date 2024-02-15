<?php

namespace App\Models;

use App\Models\User;
use App\Models\CartItem;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'itemName',
        'price',
        'quantity',
        'category_id',
        'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cartItem(){
        return $this->hasMany(CartItem::class);
    }

}
