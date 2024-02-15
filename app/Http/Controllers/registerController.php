<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register(){
        return view('register.index',[
            'title' => 'register'
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|string|min:3|max:40',
            'email'=>'required|string|email:dns|ends_with:@gmail.com|unique:users',
            'password'=>'required|string|min:6|max:12',
            'phoneNumber'=>'required|string|min:12|max:12|regex:/^08\d+/'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login');
    }
}
