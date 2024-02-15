<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{

    public function add(Item $item){
        $user = Auth::user();

        return view('cart.addToCart', [
            'title' => 'Add To Cart',
            'user' => $user,
            'item' => $item
        ]);
    }

    public function store(Item $item, Request $request){
        $user = Auth::user();

        $request->validate([
            'user_id' => 'required',
            'item_id' => 'required',
            'amount' => 'required|integer|min:0|max:'.$item->quantity
        ]);
        
        $amount = $request->input('amount');
        $subtotal = $item->price * $amount;

        if($amount == 0){
            CartItem::where('user_id', $request->user_id)->where('item_id', $request->item_id)->delete();
        }
        else{
            CartItem::updateOrCreate([
                'user_id' => $request->user_id,
                'item_id' => $request->item_id,
                'amount' => $request->amount,
                'subtotal' => $subtotal
            ]);
        }

        return redirect('/catalogue');
    }

    public function index(){
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();;
        $itemIds = $cartItems->pluck('item_id');
        $items = Item::whereIn('id', $itemIds)->get();;
        return view('cart.index', [
            'title' => 'Cart',
            'cartItems' => $cartItems,
            'user' => $user,
            'items' => $items
        ]);
    }

    public function print(){
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();;
        return view('cart.printFaktur', [
            'title' => 'Cetak Faktur',
            'cartItems' => $cartItems,
            'user' => $user
        ]);
    }

    public function storeFaktur(Request $request){

        $user = Auth::user();

        $request->validate([
            'invoice' => 'required|unique:carts,invoice',
            'user_id' => 'required',
            'address' => 'required|string',
            'postal' => 'required|string|min:5|max:5',
            'total' => 'required|integer'
        ]);

        Cart::create([
            'invoice' => $request->invoice,
            'user_id' => $request->user_id,
            'address' => $request->address,
            'postal' => $request->postal,
            'total' => $request->total
        ]);

        $cartItems = CartItem::where('user_id', $user->id)->get();

        foreach($cartItems as $cartItem){
            $item = Item::find($cartItem->item_id);

            if($item->quantity >= $cartItem->amount){
                $item->decrement('quantity', $cartItem->amount);
            }
            else{
                return back()->with('error','Insufficient stock for amount ordered');
            }
        }

        return redirect('/');
    }
}
