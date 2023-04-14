<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemesananController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
});

require __DIR__.'/auth.php';

route::get('/logout',[ProfileController::class,'logout']);
route::get('/tables',[AdminController::class,'index']);
route::get('/form',[AdminController::class,'form']);

route::get('/tables',[PemesananController::class,'index'])->name('tables');

//create
route::get('/form',[PemesananController::class,'create']);
route::post('/tables/store',[PemesananController::class,'store'])->name('store');

route::delete('/tables/{id}',[PemesananController::class,'destroy']);

route::get('/edit/{id}',[PemesananController::class,'edit']);
route::put('/tables/{id}',[PemesananController::class,'update']);