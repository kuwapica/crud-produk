<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;


Route::resource('/produk', ProdukController::class);

Route::get('/', [ProdukController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });
