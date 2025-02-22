<?php

use App\FoodTypeEnum;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->redirectTo('/app/login');
});

Route::get('/test', function () {
	dd(array_column(FoodTypeEnum::cases(), 'value'));
//	dd(Auth::user()->days()->first()->meals()->first());
//	dd(App\Models\Day::withoutGlobalScopes());
});


//Route::middleware('auth')->group(function () {
//	Route::get('/dashboard', [AppController::class, 'index'])->name('dashboard');
//	Route::get('/add', [AppController::class, 'add'])->name('add');
//	Route::get('/settings', [AppController::class, 'settings'])->name('settings');
//	Route::post('/add', [AppController::class, 'store'])->name('store');
//});
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

//require __DIR__.'/auth.php';
