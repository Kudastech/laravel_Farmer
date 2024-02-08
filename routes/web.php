<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/index', [AdminController::class, 'index']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
//     return view('dashboard');
// })->name('dashboard');

// Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/view_product', [SellerController::class, 'view_product']);

Route::post('/add_product', [SellerController::class, 'add_product']);

Route::get('/show_product', [SellerController::class, 'show_product']);

Route::get('/delete_product/{id}', [SellerController::class, 'delete_product']);

Route::get('/update_product/{id}', [SellerController::class, 'update_product']);

Route::post('/update_product_confirm/{id}', [SellerController::class, 'update_product_confirm']);


// Home controller Section

// Route::get('/product_details', [HomeController::class, 'product_details']);

Route::get('/shop', [HomeController::class, 'shop']);

Route::get('/product_details/{slug}', [HomeController::class, 'product_details']);

Route::post('/add_cart/{slug}', [HomeController::class, 'add_cart']);

Route::get('/show_cart', [HomeController::class, 'show_cart']);

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

Route::get('/checkout', [HomeController::class, 'checkout']);

Route::get('/cash_order', [HomeController::class, 'cash_order']);

Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);

Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');

Route::get('/show_order', [HomeController::class, 'show_order']);

Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);

Route::post('/add_comment', [HomeController::class, 'add_comment']);

Route::post('/add_reply', [HomeController::class, 'add_reply']);

Route::get('/product_search', [HomeController::class, 'product_search']);




// Name: Test

// Number: 4242 4242 4242 4242

// CSV: 123

// Expiration Month: 12

// Expiration Year: 2028
