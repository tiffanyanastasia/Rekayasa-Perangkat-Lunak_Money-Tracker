<?php


use App\Http\Controllers\LoginController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\Home;
use App\Http\Controllers\analysis;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Rekening;

use function PHPUnit\Framework\returnSelf;

Route::get('/', [Home::class,'index'])->middleware('auth');

Route::get('/pemasukan',[PemasukanController::class, 'index'])->middleware('auth');

Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->middleware('auth');

Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->middleware('auth');

Route::post('/pemasukan', [PemasukanController::class, 'store'])->middleware('auth');

Route::get('/wallet', [RekeningController::class, 'index'])->middleware('auth');

Route::get('/add', function(){
    return view('tambahrekening');
})->middleware('auth');

Route::post('/add', [RekeningController::class, 'store'])->middleware('auth');

Route::get('/analysis', [analysis::class, 'index'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/wallet/{id}/edit', [RekeningController::class, 'edit']);

Route::post('/wallet/{id}/edit', [RekeningController::class, 'update']);

Route::delete('/wallet/{id}', [RekeningController::class, 'destroy'])->name('wallet.destroy');

Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit']);

Route::post('/pengeluaran/{id}/edit', [PengeluaranController::class, 'update']);

Route::delete('/pengeluaran/{id}', [PengeluaranController::class, 'destroy']);

Route::get('/pemasukan/{id}/edit', [PemasukanController::class, 'edit']);

Route::post('/pemasukan/{id}/edit', [PemasukanController::class, 'update']);

Route::delete('/pemasukan/{id}', [PemasukanController::class, 'destroy']);