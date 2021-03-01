<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PizzaController@showPizza');

Route::get('/register', 'AuthController@showRegister');
Route::post('/doRegister', 'AuthController@doRegister');

Route::get('/login', 'AuthController@showLogin');
Route::post('/doLogin', 'AuthController@doLogin');

Route::get('/logout', 'AuthController@doLogout');

Route::get('/pizza/{id}', 'PizzaController@showPizzaDetail');
Route::post('/addOrder', 'OrderController@addOrder')->middleware('check.member');

Route::get('/add', 'PizzaController@showAdd')->middleware('check.admin');
Route::post('/addPizza', 'PizzaController@addPizza')->middleware('check.admin');

Route::get('/update/{id}', 'PizzaController@showUpdate')->middleware('check.admin');
Route::post('/updatePizza', 'PizzaController@updatePizza')->middleware('check.admin');

Route::get('/delete/{id}', 'PizzaController@showDelete')->middleware('check.admin');
Route::post('/deletePizza', 'PizzaController@deletePizza')->middleware('check.admin');

Route::get('/view/users', 'UserController@showAll')->middleware('check.admin');

Route::get('/view/cart', 'OrderController@showCart')->middleware('check.member');
Route::post('/updateOrder', 'OrderController@updateOrder')->middleware('check.member');
Route::post('/deleteOrder', 'OrderController@deleteOrder')->middleware('check.member');
Route::post('/checkout', 'OrderController@checkout')->middleware('check.member');

Route::get('/view/transaction/{id}', 'OrderController@showTransaction')->middleware('check.member');
Route::get('/view/transaction/details/{order_id}', 'OrderController@showTransactionDetails')->middleware('check.logged');
Route::get('/view/transaction', 'OrderController@showAllTransaction')->middleware('check.admin');