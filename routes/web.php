<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

use App\Models\City;
use App\Models\Restaurant;

/*
 * BASE ROUTES
 * 
*/

Route::get('/', function () {
    $cities = City::all();
    return view('index', compact('cities'));
})->name("/");

Route::get('/restaurant/{id}', function ($id) {
    $foods = Restaurant::find($id)->foods;
    $restaurant = Restaurant::find($id);
    return view('restaurant', compact('foods', 'restaurant'));
});

Route::get('/restaurants', function () {
    $restaurants = Restaurant::all();
    $restaurants->load('city');
    return view('restaurants', compact('restaurants'));
});

Route::get('/city/{name}', function ($name) {
    $city = City::where('name', $name)->first();
    $restaurants = $city->restaurants;
    // dd($restaurants);
    return view('city', compact('restaurants', 'city'));
});

Route::get('/registerBusiness', function () {
    return view('register-business');
}); 

Route::get('/login', function () {
    return view('login');
});

Route::get('/user', function () {
    $user = auth()->user();
    return view('user', compact('user'));
})->middleware('auth')->name('user');



/*
 * Auth ROUTES
 * 
*/

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
 * Cart ROUTES
 * 
*/

Route::post('/cart/store', [CartController::class, 'addToCart'])->name('cart.store');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');