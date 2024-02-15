<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'item_id',
        'amount',
        'subtotal'
    ];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function calculateSubtotal(){
        return $this->amount * $this->item->price;
    }
}
