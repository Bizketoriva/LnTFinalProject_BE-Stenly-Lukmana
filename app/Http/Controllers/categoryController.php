<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function createCategory(){
        return view('category.createCategory', [
            'title' => 'Create Category'
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect('/create-category');
    }

    public function index(){
        return view('category.index', [
            'title' => 'Categories',
            'categories' => Category::all()
        ]);
    }

}
