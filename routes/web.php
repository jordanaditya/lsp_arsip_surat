<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ArsipController::class, 'index']);
Route::get('/cari', [ArsipController::class, 'cari']);
Route::get('/hapus/{id}', [ArsipController::class, 'hapus']);
Route::get('/about', [ArsipController::class, 'about']);

Route::get('/arsipkan-surat', [ArsipController::class, 'arsip']);
Route::post('/simpan-surat', [ArsipController::class, 'store']);
Route::get('/lihat-surat/{id}', [ArsipController::class, 'lihat']);
Route::get('/download/{file}', [ArsipController::class, 'download']);
Route::get('/edit-surat/{id}', [ArsipController::class, 'edit']);
Route::post('/update-surat/{id}', [ArsipController::class, 'update']);