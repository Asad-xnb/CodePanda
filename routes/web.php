<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

use Darryldecode\Cart\Facades\CartFacade as Cart;

use App\Models\City;
use App\Models\Restaurant;
use App\Models\Checkout;
use App\Models\OrderDetail;


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

Route::post('/updateprofile', function (Request $request) {
    $validated = $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
    ]);

    $user = auth()->user();
    $user->name = $request->username;
    $user->address = $request->address;
    $user->phone = $request->phone;
    $user->save();
    
    
    return redirect()->route('user')->with('success', 'Profile updated successfully!');
})->middleware('auth')->name('updateProfile');

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


/*
 * Dashboard ROUTES
 * 
*/

Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->is_restaurant) {
        $restaurant = $user->restaurant;
        $foods = $restaurant->foods;
        $checkouts = Checkout::where('restaurant_id', $restaurant['id'])->get();
        return view('dashboard', compact('restaurant', 'foods', 'checkouts'));
    }
    return redirect()->route('home')->with('error', 'You are not a restaurant owner');
})->middleware('auth')->name('dashboard');

Route::get('/dashboard/add-food', function () {
    $user = auth()->user();
    if ($user->is_restaurant) {
        $restaurant = $user->restaurant;
        $foods = $restaurant->foods;
        return view('add-food');
    }
    return redirect()->route('home')->with('error', 'You are not a restaurant owner');
    
})->middleware('auth')->name('addFoodForm');

Route::post('/dashboard/add-food', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:9048',

    ]);
    
    $image = $request->file('image');
    $imageName = time() . '.' . $image->extension();
    
    $user = auth()->user();
    $restaurant = $user->restaurant;
    $discount = $restaurant->discount;
    $restaurant->foods()->create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'discount' => $request->discount ?? 0,
        'image' => $imageName,
    ]);
    if ($discount < $request->discount) {
        $restaurant->discount = $request->discount;
        $restaurant->save();
    }
    
    $image->move(public_path('images'), $imageName);
    
    return redirect()->route('addFoodForm')->with('success', 'Food added successfully!');
})->middleware('auth')->name('addFood');

Route::get('/dashboard/menu', function () {
    $user = auth()->user();
    if ($user->is_restaurant) {
        $restaurant = $user->restaurant;
        $foods = $restaurant->foods;
        return view('dashboard-menu', compact('foods'));
    }
    return redirect()->route('home')->with('error', 'You are not a restaurant owner');
})->middleware('auth')->name('menu');

Route::get('/dashboard/menu/update/{id}', function ($id) {
    $user = auth()->user();
    if ($user->is_restaurant) {
        $restaurant = $user->restaurant;
        $food = $restaurant->foods->find($id);
        if (!$food) {
            return redirect()->route('menu')->with('error', 'Food not found');
        }
        return view('dashboard-update', compact('food'));
    }
    return redirect()->route('home')->with('error', 'You are not a restaurant owner');
})->middleware('auth')->name('editFood');

Route::post('/dashboard/menu/update/', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg|max:9048',
    ]);
    
    $id = $request->id;
    $user = auth()->user();
    $restaurant = $user->restaurant;
    $food = $restaurant->foods->find($id);
    if (!$food) {
        return redirect()->route('menu')->with('error', 'Food not found');
    }
    
    $food->name = $request->name;
    $food->description = $request->description;
    $food->price = $request->price;
    $food->discount = $request->discount ?? 0;
    
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $food->image = $imageName;
        $image->move(public_path('images'), $imageName);
    }
    
    $food->save();
    
    return redirect()->route('menu')->with('success', 'Food updated successfully!');
})->middleware('auth')->name('updateFood');

Route::get('/dashboard/menu/delete/{id}', function (Request $request, $id) {
    
    $user = auth()->user();
    $restaurant = $user->restaurant;
    $food = $restaurant->foods->find($id);
    if (!$food) {
        return redirect()->route('menu')->with('error', 'Food not found');
    }
    
    $food->delete();
    
    return redirect()->route('menu')->with('success', 'Food deleted successfully!');
})->middleware('auth')->name('deleteFood');

/*
 * Order ROUTES
 * 
*/

Route::get('/order', function () {
    $user = auth()->user();
    $orders = $user->orders;
    return view('order', compact('orders'));
})->middleware('auth')->name('order');


Route::post('/order', function (Request $request) {
    $cart = Cart::getContent();
    $user = auth()->user();

    foreach ($cart as $item) {
        Checkout::create([
            'restaurant_id' => $item->attributes->restaurant_id,
            'user_id' => $user->id,
            'quantity' => $item->quantity,
            'price' => $item->price,
            'name' => $item->name,
        ]);
    }

    Cart::clear();
     
   return redirect()->back()->with('success', 'Order placed successfully!');
})->middleware('auth')->name('order.place');