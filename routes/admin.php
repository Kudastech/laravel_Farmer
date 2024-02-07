<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/view_category', [AdminController::class, 'view_category']);

Route::post('/add_category', [AdminController::class, 'add_category']);

Route::get('/edit_category/{id}', [AdminController::class, 'edit_category']);

Route::post('/edit_category_confirm/{id}', [AdminController::class, 'edit_category_confirm']);

Route::get('/add_category', [AdminController::class, 'show_category']);

Route::get('/all_category', [AdminController::class, 'all_category']);

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

Route::get('/view_product', [AdminController::class, 'view_product']);

Route::post('/add_product', [AdminController::class, 'add_product']);

Route::get('/show_product', [AdminController::class, 'show_product']);

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

Route::get('/update_product/{id}', [AdminController::class, 'update_product']);

Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

Route::get('/order', [AdminController::class, 'order']);

Route::get('/delivered/{id}', [AdminController::class, 'delivered']);

Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);

Route::get('/send_email/{id}', [AdminController::class, 'send_email']);

Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);

Route::get('/search', [AdminController::class, 'searchdata']);

Route::get('/all_user', [AdminController::class, 'all_user']);

Route::get('/edit_user/{id}', [AdminController::class, 'edit_user']);

Route::get('/edit_admin/{id}', [AdminController::class, 'edit_admin']);
