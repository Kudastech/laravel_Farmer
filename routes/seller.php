<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;

Route::get('/view_product', [SellerController::class, 'view_product']);

Route::post('/add_product', [SellerController::class, 'add_product']);

Route::get('/show_product', [SellerController::class, 'show_product']);

Route::get('/delete_product/{id}', [SellerController::class, 'delete_product']);

Route::get('/update_product/{id}', [SellerController::class, 'update_product']);

Route::post('/update_product_confirm/{id}', [SellerController::class, 'update_product_confirm']);
