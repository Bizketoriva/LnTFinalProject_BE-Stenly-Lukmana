<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class itemController extends Controller
{
    public function createItem(){  
        $categories = Category::all();

        return view('items.createItem',[
            'title' => 'Create Item',
            'categories' => $categories
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'itemName' => 'required|string|min:5|max:80',
            'category_id' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'image' => 'required'
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $request->itemName.'-'.$request->category_id.'.'.$extension;
        $request->file('image')->storeAs('/public/item_images', $filename);
        
        Item::create([
            'itemName' => $request->itemName,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $filename
        ]);

        return redirect('/');
    }

    public function index(){
        $items = Item::all();
        $user = Auth::user();
        return view('items.catalogue',[
            'title' => 'Catalogue',
            'items' => $items,
            'user' => $user
        ]);
    }

    public function display(Item $item){
        $user = Auth::user();
        return view('items.displayItem', [
            'title' => 'Item Display',
            'item' => $item,
            'user' => $user
        ]);
    }

    public function delete(Item $item){
        $item->delete();
        return redirect('/catalogue');
    }

    public function edit(Item $item){
        return view('items.editItem', [
            'title' => 'Edit Item',
            'item' => $item
        ]);
    }

    public function update(Item $item, Request $request){
        $request->validate([
            'itemName' => 'required|min:5|max:80',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $item->update([
            'itemName' => $request->itemName,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect('/catalogue');
    }

}
