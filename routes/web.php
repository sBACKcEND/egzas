<?php

use App\Http\Controllers\RestaurantController;
use App\Models\Restaurant;
use App\Http\Controllers\DishController;
use App\Models\Dish;

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::resource('restaurants', RestaurantController::class);
    Route::resource('dishes', DishController::class);
});

Route::get('restaurants/{id}/dishes',[DishController::class, 'restaurantDishes'])->name('restaurantDishes');


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
