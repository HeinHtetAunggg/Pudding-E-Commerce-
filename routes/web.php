<?php

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\AdminPuddingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PuddingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/',[PuddingController::class,'intro']);
Route::get('/menu',[PuddingController::class,'index','addToCart']);
Route::get('/admin/category/create',[CategoryController::class,'create'])->middleware('can:admin');
Route::post('/admin/category/store',[CategoryController::class,'store'])->middleware('can:admin');

Route::get('/admin/puddings/create',[AdminPuddingController::class,'create'])->middleware('can:admin');
Route::post('/admin/puddings/store',[AdminPuddingController::class,'store'])->middleware('can:admin');



Route::post('/cart/add','PrductController@addToCart')->name('cart.add');
//User Registration

Route::get('/register',[AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');

Route::get('/login',[AuthController::class,'login'])->middleware('guest')->name('login');
Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

//Shopping Cart
Route::get("add-to-cart/{id}",[PuddingController::class,'addToCart'])->name('add_to_cart')->middleware('auth');
Route::get("/cart",[PuddingController::class,'cart'])->middleware('auth');
Route::patch('/update-cart',[PuddingController::class,'update'])->name('update_cart')->middleware('auth');
Route::delete("/remove-from-cart",[PuddingController::class,'remove'])->name('remove_from_cart')->middleware('auth');

