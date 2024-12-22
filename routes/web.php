<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    if (!session()->has('cart')) {
        session(['cart' => []]);
    }
    return view('index', compact('cities'));
})->name("home");

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
    if ($restaurants->isEmpty()) {
        return redirect()->route('home')->with('error', 'No restaurants found in '.$city->name);
    }
    // dd($restaurants);
    return view('city', compact('restaurants', 'city'));
});

Route::get('/registerBusiness', function () {
    $cities = City::all();
    return view('register-business', compact('cities')); 
})->name('registerBusiness')->middleware('auth'); 

Route::post('/registerBusiness', function (Request $request) {
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'city' => 'required|integer',
        'terms' => 'accepted',
    ]);
    
    $image = $request->file('image');
    $imageName = time() . '.' . $image->extension();
    
    
    $user = auth()->user();
    $user->restaurant()->create([
        'name' => $request->name,
        'image' => $imageName,
        'address' => $request->address,
        'phone' => $request->phone,
        'city_id' => $request->city,
    ]);
    $user->is_restaurant = true;
    $user->save();
    
    $image->move(public_path('images'), $imageName);
    
    
    return redirect()->route('home')->with('success', 'Business registered successfully!');
})->name('registerBusiness')->middleware('auth');

/*
* Auth ROUTES
* 
*/


Route::get('/user', function () {
    $user = auth()->user();
    return view('user', compact('user'));
})->middleware('auth')->name('user');

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
 * Cart ROUTES
 * 
*/

Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart/save', [CartController::class, 'saveCartToDatabase'])->name('cart.save');
Route::post('/cart/restore', [CartController::class, 'restoreCartFromDatabase'])->name('cart.restore');
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');