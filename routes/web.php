<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Productcontroller;
use App\Http\Controllers\admin\Categorycontroller;
use App\Http\Controllers\admin\Colorcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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
Route::get('checkage',function(){
    return view('age');
})->middleware('auth','CeckAge');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/',[HomeController::class,'index']);
    Route::get('add_to_cart',[HomeController::class,'store']);
    Route::get('show_cart',[HomeController::class,'show_cart']);
    Route::post('cart_check_out',[HomeController::class,'check_out']);
    Route::get('cart_delete_item/{id}',[HomeController::class,'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('category', [Categorycontroller::class, 'index']);
    Route::post('category_store', [Categorycontroller::class, 'store']);

    Route::get('color', [Colorcontroller::class, 'index']);
    Route::post('color_store', [Colorcontroller::class, 'store']);
    Route::get('color_delete/{id}', [Colorcontroller::class, 'destroy']);




});

require __DIR__.'/auth.php';

Route::get('product', [Productcontroller::class, 'index']);
Route::post('product_store', [Productcontroller::class, 'store']);
Route::get('product_delete/{id}', [Productcontroller::class, 'destroy']);
Route::get('product_edit/{id}', [Productcontroller::class, 'edit']);
Route::post('product_update', [Productcontroller::class, 'update']);
Route::get('ajax_test',[Productcontroller::class,'ajax_test']);
Route::get('get_products',[Productcontroller::class,'get_products']);
