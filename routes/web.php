<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LoginController;

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
    return view('auth.login');
});
Auth::routes();
Route::middleware(['auth'])->group(function (){
    // Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/laporan', [OrderController::class, 'index'])->name('laporan');
    Route::get('/general', [LaporanController::class, 'index'])->name('general');
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');

    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::resource('transaksi', TransaksiController::class);

    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/tambahbarang', [BarangController::class, 'create'])->name('tambahbarang');
    // Route::get('/menus/show', [MenuController::class, 'index'])->name('show');
    // Route::get('/menu', MenuController::class)->middleware('auth')->missing(fn () => redirect()->back());
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::resource('barang', BarangController::class);
});