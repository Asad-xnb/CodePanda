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

Route::get('/restaurant', function () {
    $restaurants = [
        [
            'id' => 1,
            'name' => 'Restaurant A',
            'image' => 'https://images.deliveryhero.io/image/fd-pk/LH/omwm-listing.jpg?width=400&height=225',
            'discount' => 10
        ],
        [
            'id' => 2,
            'name' => 'Restaurant B',
            'image' => 'https://images.deliveryhero.io/image/fd-pk/LH/omwm-listing.jpg?width=400&height=225',
            'discount' => 15
        ],
        [
            'id' => 3,
            'name' => 'Restaurant C',
            'image' => 'https://images.deliveryhero.io/image/fd-pk/LH/omwm-listing.jpg?width=400&height=225',
            'discount' => 20
        ]
    ];


    return view('restaurant');
});

Route::get('/restaurants', function () {
    $restaurants = Restaurant::all();

    return view('restaurants', compact('restaurants'));
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