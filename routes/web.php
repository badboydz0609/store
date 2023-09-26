<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PriavateControlller;

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
    'verified'
])->group(function () {
    Route::get('/dashboard',[HomeController::class , 'dashboard'])->name('dashboard');
});


/*----------------------------HHHHHHHHHHHOOOOOOOOOMMMMMMMMMMMMEEEEEEEEEEE---------------------------------*/
route::get('/',[HomeController::class , 'index'])->name('websitehome');
route::get('/redirect',[HomeController::class , 'redirect']);
route::get('/view_about',[HomeController::class , 'view_about'])->name('view_about');
route::post('/search_item',[HomeController::class , 'search_item'])->name('search_item');
route::get('/demo_category/{id?}',[HomeController::class , 'demo_category'])->where('id', '[0-9]+')->name('demo_category');
Route::get('/demo_item/{id?}', [HomeController::class, 'demo_item'])->where('id', '[0-9]+')->name('demo_item');
route::get('/customer/{id?}',[HomeController::class , 'customer'])->where('id', '[0-9]+')->name('customer');

/*---------------------------------------------------------------------------------------------------------*/

/*----------------------------SSSSSSSSSSSAAAAAAAAMMMMMMMMMMMMMMEEEEEEEEEEE---------------------------------*/
route::get('/view_setting',[PriavateControlller::class , 'view_setting'])->name('view_setting')->middleware('check.auth.priavate');
route::post('/retype_email',[PriavateControlller::class , 'retype_email'])->name('retype_email')->middleware('check.auth.priavate');
route::post('/retype_pass',[PriavateControlller::class , 'retype_pass'])->name('retype_pass')->middleware('check.auth.priavate');
route::post('/add_new_photo',[PriavateControlller::class , 'add_new_photo'])->name('add_new_photo')->middleware('check.auth.priavate');
route::post('/add_new_info',[PriavateControlller::class , 'add_new_info'])->name('add_new_info')->middleware('check.auth.priavate');
route::post('/retype_pay',[PriavateControlller::class , 'retype_pay'])->name('retype_pay')->middleware('check.auth.priavate');

/*---------------------------------------------------------------------------------------------------------*/

/*----------------------------AAAAAAAADDDDDDDDDMMMMMMMMMIIIIIIIINNNNNNNNNN---------------------------------*/

/*            CCCAAATTTTAAAGGGGOOOORRRRYYYYYYY       */
route::get('/view_categorys',[AdminController::class , 'view_categorys'])->name('view_categorys')->middleware('check.auth.admin');
route::get('/add_catagory',[AdminController::class , 'add_catagory'])->name('add_catagory')->middleware('check.auth.admin');
route::post('/add_new_catagory',[AdminController::class , 'add_new_catagory'])->name('add_new_catagory')->middleware('check.auth.admin');
route::get('/sup_catagory/{id?}',[AdminController::class , 'sup_catagory'])->where('id', '[0-9]+')->name('sup_catagory')->middleware('check.auth.admin');
route::match(['get', 'post'],'/edit_catagory/{id?}',[AdminController::class , 'edit_catagory'])->where('id', '[0-9]+')->name('edit_catagory')->middleware('check.auth');

/*            USEEEEEEEEEEEEEEEEERRRRRRRRRRRRR AAAAADDDDDDMMMMMMIIIIINNNNNNNN    */
route::get('/view_user',[AdminController::class , 'view_user'])->name('view_user')->middleware('check.auth.admin');
route::get('/add_user',[AdminController::class , 'add_user'])->name('add_user')->middleware('check.auth.admin');
route::post('/add_new_user',[AdminController::class , 'add_new_user'])->name('add_new_user')->middleware('check.auth.admin');
route::post('/edit_new_user',[AdminController::class , 'edit_new_user'])->name('edit_new_user')->middleware('check.auth.admin');
route::get('/sup_user/{id?}',[AdminController::class , 'sup_user'])->where('id', '[0-9]+')->name('sup_user')->middleware('check.auth.admin');
route::get('/edit_user/{id?}',[AdminController::class , 'edit_user'])->where('id', '[0-9]+')->name('edit_user')->middleware('check.auth.admin');

/*            PPPPPPRRRRRROOOOOODDDDDUUCCTTTTT AAAAAAADDDDDMMMMMIIIIINNNNNNNN     */
route::get('/view_accepteditem',[AdminController::class , 'view_accepteditem'])->name('view_accepteditem')->middleware('check.auth.admin');
route::get('/show_product/{id?}',[AdminController::class , 'show_product'])->where('id', '[0-9]+')->name('show_product')->middleware('check.auth.admin');
route::get('/accept_product/{id?}',[AdminController::class , 'accept_product'])->where('id', '[0-9]+')->name('accept_product')->middleware('check.auth.admin');
route::get('/sup_item/{id?}',[AdminController::class , 'sup_item'])->where('id', '[0-9]+')->name('sup_item')->middleware('check.auth.admin');

/*---------------------------------------------------------------------------------------------------------*/


/*--------------------------------CCCCCCUUUSSSSSTTTOOOOMMMEEEEEERRRR---------------------------------------*/

/*            PPPPPPRRRRRROOOOOODDDDDUUCCTTTTT CCCCUUUUUSSSTTTTOOOOOMMMMMEEEERRRRR       */
route::get('/view_sellitem',[CustomerController::class , 'view_sellitem'])->name('view_sellitem')->middleware('check.auth.customer');
route::get('/view_buyitem',[CustomerController::class , 'view_buyitem'])->name('view_buyitem')->middleware('check.auth.customer');
route::get('/view_product',[CustomerController::class , 'view_product'])->name('view_product')->middleware('check.auth.customer');
route::get('/add_product',[CustomerController::class , 'add_product'])->name('add_product')->middleware('check.auth.customer');
route::post('/add_new_product',[CustomerController::class , 'add_new_product'])->name('add_new_product')->middleware('check.auth.customer');
route::post('/edit_new_product',[CustomerController::class , 'edit_new_product'])->name('edit_new_product')->middleware('check.auth.customer');
route::get('/sup_product/{id?}',[CustomerController::class , 'sup_product'])->where('id', '[0-9]+')->name('sup_product')->middleware('check.auth.customer');
route::get('/edit_product/{id?}',[CustomerController::class , 'edit_product'])->where('id', '[0-9]+')->name('edit_product')->middleware('check.auth.customer');
route::get('/show_buydetils/{id?}',[CustomerController::class , 'show_buydetils'])->where('id', '[0-9]+')->name('show_buydetils')->middleware('check.auth.customer');
/*---------------------------------------------------------------------------------------------------------*/

/*--------------------------------UUUUUUUUUSSSSSSSSSEEEEEEEERRRRRRRR---------------------------------------*/
route::get('/add_favorite/{id?}',[UserController::class , 'add_favorite'])->where('id', '[0-9]+')->name('add_favorite')->middleware('check.auth.user');
route::match(['get', 'post'],'/add_salla/{id?}',[UserController::class , 'add_salla'])->where('id', '[0-9]+')->name('add_salla')->middleware('check.auth.user');
route::get('/cart',[UserController::class , 'cart'])->name('cart')->middleware('check.auth.user');
route::get('/sup_cart_item/{id?}',[UserController::class , 'sup_cart_item'])->where('id', '[0-9]+')->name('sup_cart_item')->middleware('check.auth.user');
route::post('/edit_cart_item',[UserController::class , 'edit_cart_item'])->middleware('check.auth.user');
route::get('/favorite_items',[UserController::class , 'favorite_items'])->middleware('check.auth.user');
route::get('/buy_items',[UserController::class , 'buy_items'])->middleware('check.auth.user');
route::get('/sup_favorite/{id?}',[UserController::class , 'sup_favorite'])->where('id', '[0-9]+')->name('sup_favorite')->middleware('check.auth.user');
route::get('/method/{id?}',[UserController::class , 'method'])->where('id', '[0-9]+')->name('method')->middleware('check.auth.user');
route::get('/checkout',[UserController::class , 'checkout'])->name('checkout')->middleware('check.auth.user');

route::post('/pay_now',[UserController::class , 'pay_now'])->name('pay_now')->middleware('check.auth.user');
route::get('/pay/{id?}',[UserController::class , 'pay'])->where('id', '[0-9]+')->name('pay')->middleware('check.auth.user');


/*---------------------------------------------------------------------------------------------------------*/
