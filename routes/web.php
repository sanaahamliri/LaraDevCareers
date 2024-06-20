<?php

use App\Http\Controllers\ProfileController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;


// ******All Listings**********
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listing',
        'listings' => Listing::all()
    ]);
});


Route::get('/listings/{listing}', function (Listing $listing) {
    
    return view('listing', [
        'listing' => $listing
    ]);

});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
