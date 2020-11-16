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




Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

/*--------------------------
  GESTION DU LANDING PAGE
----------------------------*/
    Route::get('/', function () {
        return view('meneya');
    });
    // Meneya_abonnement
     Route::get('meneyaabonner', 'landing@meneyaabonner');
     
    // Envoie Form Meneya_test 
     Route::post('formTest', 'landing@formTest');

    // Meneya_test 
     Route::get('meneyatest', 'landing@meneyatest');
     
    // Meneya_premium 
     Route::get('meneyaacheter','landing@meneyaacheter');


