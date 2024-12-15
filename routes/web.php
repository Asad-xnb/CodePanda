<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     $cities = [
//         [
//             'id' => 1,
//             'name' => 'Lahore',
//             'image' => 'https://images.unsplash.com/photo-1602939590728-4ba9d4ba5d65?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
//         ],
//         [
//             'id' => 2,
//             'name' => 'Islamabad',
//             'image' => 'https://images.unsplash.com/photo-1602939590728-4ba9d4ba5d65?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
//         ],
//         [
//             'id' => 3,
//             'name' => 'Fasialabad',
//             'image' => 'https://images.unsplash.com/photo-1602939590728-4ba9d4ba5d65?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
//         ],
//         [
//             'id' => 3,
//             'name' => 'Karachi',
//             'image' => 'https://images.unsplash.com/photo-1602939590728-4ba9d4ba5d65?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
//         ]
//     ];
//     return view('index', compact('cities'));
// });

Route::get('/', function () {
    $cities = [
                [
                    'id' => 1,
                    'name' => 'Lahore',
                    'image' => 'https://images.unsplash.com/photo-1602939590728-4ba9d4ba5d65?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ],
                [
                    'id' => 2,
                    'name' => 'Islamabad',
                    'image' => 'https://images.unsplash.com/photo-1602939590728-4ba9d4ba5d65?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ],
                [
                    'id' => 3,
                    'name' => 'Fasialabad',
                    'image' => 'https://images.unsplash.com/photo-1602939590728-4ba9d4ba5d65?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ],
                [
                    'id' => 3,
                    'name' => 'Karachi',
                    'image' => 'https://images.unsplash.com/photo-1602939590728-4ba9d4ba5d65?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ]
            ];

    return view('index',  compact('cities'));
})->middleware('auth')->name('index');


Route::get('/restaurants', function () {
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


    return view('restaurants', compact('restaurants'));
});

Route::get('/registerBusiness', function () {
    return view('register-business');
}); 

Route::get('/login', function () {
    return view('login');
});


/*
 * Auth ROUTES
 * 
*/

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
