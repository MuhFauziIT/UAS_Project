<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// route untuk front end
route::get('/', [DashboardController::class, 'index']);
route::get('/bajuayaka', [DashboardController::class, 'bajuayaka']);
route::get('/jaketayaka', [DashboardController::class, 'jaketayaka']);
route::get('/figureayaka', [DashboardController::class, 'figureayaka']);
route::get('/formpemesanan', [DashboardController::class, 'formpemesanan']);
route::get('/terimakasih', [DashboardController::class, 'terimakasih']);

// route untuk admin
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Buat Routing Produk
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('/produk/create', [ProdukController::class, 'create']);
    Route::post('/produk/store', [ProdukController::class, 'store']);
    Route::get('produk/edit/{id}', [ProdukController::class, 'edit']);
    Route::put('/produk/update/{id}', [ProdukController::class, 'update']);
    Route::get('/produk/delete/{id}', [ProdukController::class, 'destroy']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
// route crud
// Route::get('/produk/create', [ProdukController::class, 'create']);
// Route::post('/produk/store', [ProdukController::class, 'store']);
// Route::get('produk/edit/{id}', [ProdukController::class, 'edit']);
// Route::put('/produk/update/{id}', [ProdukController::class, 'update']);
// Route::get('/produk/delete/{id}', [ProdukController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');