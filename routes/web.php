<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeuserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    if (Auth::user()->usertype == 'administrator') {
        return view('administrator/index');
    }
    if (Auth::user()->usertype == 'admin-pelatihan') {
        return view('admin-pelatihan/index');
    }
    // return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
route::get('administrator', [HomeController::class, 'index'])->middleware(['auth', 'administrator']);
route::get('admin-pelatihan', [HomeuserController::class, 'index'])->middleware(['auth', 'admin-pelatihan']);
