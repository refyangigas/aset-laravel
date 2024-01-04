<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Models\Aset;

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

Route::get('/', [HomeController::class, 'home'])->name('dashboard')->middleware('auth');

Route::get('/aset', [AsetController::class, 'index'])->name('aset')->middleware('auth');

Route::get('/tambahaset', [AsetController::class, 'tambahaset'])->name('tambahaset');
Route::post('/insertdata', [AsetController::class, 'insertdata'])->name('insertdata');

Route::post('/tampilkandata/{id}', [AsetController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [AsetController::class, 'updatedata'])->name('updatedata');

Route::delete('/delete/{id}', [AsetController::class, 'delete'])->name('delete');

// Route::post('/delete/{id}', [AsetController::class, 'delete'])->name('delete');

//export PDF
Route::get('/exportpdf', [AsetController::class, 'exportpdf'])->name('exportpdf');

//auth
Route::get('/login', [loginController::class, 'login'])->name('login');
Route::post('/loginuser', [loginController::class, 'loginuser'])->name('loginuser');
Route::get('/register', [registerController::class, 'register'])->name('register');
Route::post('/registeruser', [registerController::class, 'registeruser'])->name('registeruser');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/jumlah', function () {
    $jumlah = Aset::count();
    return view('dashboard.dashboard', compact('jumlah'));
});
