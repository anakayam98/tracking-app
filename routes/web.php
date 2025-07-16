<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ServisController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

Route::get('/tracking', function () {
        return view('tracking.index');
    })->name('tracking.index');
});

Route::middleware(['auth'])->group(function () {
    // Pelanggan
    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('pelanggan/{pelanggan}', [PelangganController::class, 'show'])->name('pelanggan.show');
    Route::get('pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('pelanggan/{pelanggan}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::delete('pelanggan/{pelanggan}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

    // Jasa
    Route::get('jasa', [JasaController::class, 'index'])->name('jasa.index');
    Route::get('jasa/create', [JasaController::class, 'create'])->name('jasa.create');
    Route::post('jasa', [JasaController::class, 'store'])->name('jasa.store');
    Route::get('jasa/{jasa}', [JasaController::class, 'show'])->name('jasa.show');
    Route::get('jasa/{jasa}/edit', [JasaController::class, 'edit'])->name('jasa.edit');
    Route::put('jasa/{jasa}', [JasaController::class, 'update'])->name('jasa.update');
    Route::delete('jasa/{jasa}', [JasaController::class, 'destroy'])->name('jasa.destroy');

    // Barang
    Route::get('barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('barang/{barang}', [BarangController::class, 'show'])->name('barang.show');
    Route::get('barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');

    // Servis
    Route::get('servis', [ServisController::class, 'index'])->name('servis.index');
    Route::get('servis/create', [ServisController::class, 'create'])->name('servis.create');
    Route::post('servis', [ServisController::class, 'store'])->name('servis.store');
    Route::get('servis/{servis}', [ServisController::class, 'show'])->name('servis.show');
    Route::get('servis/{servis}/edit', [ServisController::class, 'edit'])->name('servis.edit');
    Route::put('servis/{servis}', [ServisController::class, 'update'])->name('servis.update');
    Route::delete('servis/{servis}', [ServisController::class, 'destroy'])->name('servis.destroy');

    // Detail Servis
    Route::get('detailservis', [\App\Http\Controllers\DetailServisController::class, 'index'])->name('detailservis.index');
    Route::get('detailservis/create', [\App\Http\Controllers\DetailServisController::class, 'create'])->name('detailservis.create');
    Route::post('detailservis', [\App\Http\Controllers\DetailServisController::class, 'store'])->name('detailservis.store');
    Route::get('detailservis/{detailServis}/edit', [\App\Http\Controllers\DetailServisController::class, 'edit'])->name('detailservis.edit');
    Route::put('detailservis/{detailServis}', [\App\Http\Controllers\DetailServisController::class, 'update'])->name('detailservis.update');
    Route::delete('detailservis/{detailServis}', [\App\Http\Controllers\DetailServisController::class, 'destroy'])->name('detailservis.destroy');
});