<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\registerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome',[
        'title' => 'Home Page'
    ]);
});

//Item Controller
Route::get('/catalogue', [itemController::class,'index'])->middleware('auth');
Route::get('/create-item', [itemController::class,'createItem'])->middleware('is_admin');
Route::POST('/store-item', [itemController::class,'store']);
Route::get('/display-item/{item:id}', [itemController::class,'display'])->middleware('auth');
Route::DELETE('/delete-item/{item:id}', [itemController::class,'delete'])->middleware('is_admin');
Route::get('/edit-item/{item:id}', [itemController::class,'edit'])->middleware('is_admin');;
Route::PATCH('/update-item/{item:id}', [itemController::class,'update'])->middleware('is_admin');;

//Category Controller
Route::get('/categories',[categoryController::class, 'index'])->middleware('is_admin');
Route::get('/create-category', [categoryController::class, 'createCategory'])->middleware('is_admin');
Route::POST('/store-category', [categoryController::class, 'store']);

//Login Controller
Route::get('/login', [loginController::class, 'login'])->name('login')->middleware('guest');
Route::POST('/login', [loginController::class, 'authenticate']);
Route::POST('/logout', [loginController::class, 'logout'])->middleware('auth');

//Register Controller
Route::get('/register', [registerController::class, 'register'])->middleware('guest');
Route::POST('/register', [registerController::class, 'store']);

//Cart Controller
Route::get('/cart', [cartController::class, 'index'])->middleware('auth');
Route::get('/add-to-cart-item/{item}', [cartController::class, 'add'])->middleware('auth');
Route::POST('/store-in-cart/{item}', [cartController::class, 'store']);
Route::get('/print-faktur', [cartController::class, 'print'])->middleware('auth');
Route::POST('/store-faktur', [cartController::class, 'storeFaktur']);