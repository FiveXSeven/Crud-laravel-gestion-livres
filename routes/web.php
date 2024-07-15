<?php

use App\Http\Controllers\LivreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ROUTES OF THE CRUD
    // ROUTES OF THE CRUD

    // searchBar
    

    Route::get('search', [LivreController::class, 'search'])->name('livre.search');
    Route::get('resultat', [LivreController::class, 'resultSearch'])->name('livre.result');


    // MIDDLEWARE ADMIN
    // MIDDLEWARE ADMIN

    Route::middleware('admin')->group(function () {
        Route::get('ajouter', [LivreController::class, 'create'])->name('livre.ajouter');
        //store route
        Route::post('store', [LivreController::class, 'store'])->name('livre.store');
        //edit page
        Route::get('modifier/{id}', [LivreController::class, 'edit'])->name('livre.edit');
        Route::put('modifier/{id}', [LivreController::class , 'update'])->name('livre.update');
    Route::delete('delete/{id}', [LivreController::class, 'destroy'])->name('livre.delete');
    });

    // home page
    Route::get('liste', [LivreController::class, 'index'])->name('livre.liste');
    // add page

});

require __DIR__.'/auth.php';
