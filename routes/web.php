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

Route::get('/', function () {
    return view('meneya');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*--------------------------
  GESTION DU LANDING PAGE
----------------------------*/
    // Meneya_abonnement
     Route::get('meneyaabonner', function () {
        return view('meneyaabonner');
      });
    // Meneya_test 
     Route::get('meneyatest', function () {
       return view('meneyatest');
     });
    // Meneya_premium 
     Route::get('meneyaacheter', function () {
       return view('meneyaacheter');
     });

