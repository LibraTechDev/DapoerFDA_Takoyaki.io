<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    
route::get('/', [HomeController::class,'index']);    
route::get('/redirect', [HomeController::class,'redirect'])->middleware('auth','verified');    
route::get('/about', [HomeController::class,'about']);


route::get('/category', [AdminController::class,'category']);
route::post('/add_category', [AdminController::class,'add_category']);
route::get('/delete_category/{id}', [AdminController::class,'delete_category']);


route::post('/add_user', [AdminController::class,'add_user']);
route::get('/view_user', [AdminController::class,'view_user']);
route::get('/show_user', [AdminController::class,'show_user']);
route::get('/update_user/{id}', [AdminController::class,'update_user']);
route::post('/update_user_2/{id}', [AdminController::class,'update_user_2']);
route::get('/delete_user/{id}', [AdminController::class,'delete_user']);
route::get('/search_user', [AdminController::class,'search_user']);

route::post('/add_product', [AdminController::class,'add_product']);
route::get('/view_product', [AdminController::class,'view_product']);
route::get('/show_product', [AdminController::class,'show_product']);
route::get('/update_product/{id}', [AdminController::class,'update_product']);
route::post('/update_product_2/{id}', [AdminController::class,'update_product_2']);
route::get('/delete_product/{id}', [AdminController::class,'delete_product']);

route::get('/product_details/{id}', [HomeController::class,'product_details']);
route::post('/add_cart/{id}', [HomeController::class,'add_cart']);
route::get('/show_cart', [HomeController::class,'show_cart']);
route::get('/remove_cart/{id}', [HomeController::class,'remove_cart']);

route::get('/cash_order', [HomeController::class,'cash_order']);
route::get('/stripe/{totalprize}', [HomeController::class,'stripe']);   
route::post('stripe/{totalprize}', [HomeController::class,'stripePost'])->name('stripe.post');

route::get('/order', [AdminController::class,'order']);
route::get('/delivered/{id}', [AdminController::class,'delivered']);
route::get('/print_pdf/{id}', [AdminController::class,'print_pdf']);

route::get('/send_email/{id}', [AdminController::class,'send_email']);
route::post('/send_user_email/{id}', [AdminController::class,'send_user_email']);

route::get('/search_order', [AdminController::class,'search_order']);
route::get('/show_order', [HomeController::class,'show_order']);
route::get('/cancel_order/{id}', [HomeController::class,'cancel_order']);

route::post('/add_voucher/{id}', [HomeController::class,'add_voucher']);
route::post('/add_alamat/{id}', [HomeController::class,'add_alamat']);
route::post('/add_email', [HomeController::class,'add_email']);   
route::post('/add_profile_photo', [HomeController::class,'add_profile_photo']);   