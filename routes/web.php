<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;


// ******All Listings**********
Route::get('/', [ListingController::class, 'index']);

Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth');

// store data
Route::post('/listings',[ListingController::class, 'store'])->middleware('auth');

// edit form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');


// edit submit to update

Route::put('/listings/{listing}',[ListingController::class, 'update'])->middleware('auth');

// delete listing
Route::delete('/listings/{listing}',[ListingController::class, 'destroy'])->middleware('auth');




Route::get('/listings/{listing}',[ListingController::class, 'show'])->middleware('guest');


Route::get('/register',[UserController::class, 'create'])->middleware('guest');

// create new user
Route::post('/users',[UserController::class, 'store']);


// log out users
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');

// login users
Route::post('users/authenticate',[UserController::class, 'authenticate']);



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
