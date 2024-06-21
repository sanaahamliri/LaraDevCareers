<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;


// ******All Listings**********
Route::get('/', [ListingController::class, 'index']);

Route::get('/listings/create',[ListingController::class, 'create']);

// store data
Route::post('/listings',[ListingController::class, 'store']);

// edit form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit']);


// edit submit to update

Route::put('/listings/{listing}',[ListingController::class, 'update']);

// delete listing
Route::delete('/listings/{listing}',[ListingController::class, 'destroy']);




Route::get('/listings/{listing}',[ListingController::class, 'show']);






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
