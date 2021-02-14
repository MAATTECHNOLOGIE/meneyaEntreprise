<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| MBO Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*--------------------------
  GESTION DES ARRIVAGES
----------------------------*/

    //Ajout arrivage
        Route::get('lArrivPrd','p_ArrivController@lArrivPrd')->name('lArrivPrd');

    //Suprimer arrivage
       Route::get('deleteArriv','p_ArrivController@deleteArriv')->name('deleteArriv');

    //Enregistre arrivage
       Route::get('saveArriv','p_ArrivController@saveArriv')->name('saveArriv');

    //Arrivages en attente
       Route::get('arrivAttn','p_ArrivController@arrivAttn')->name('arrivAttn');

       //Detail Arrivage
       Route::get('detailArriv','p_ArrivController@detailArriv')->name('detailArriv');

       // Validation d'un Arrivages
       Route::get('arrivValid','p_ArrivController@arrivValid')->name('arrivValid');

       // Supression d'un Arrivages
       Route::get('arrivDel','p_ArrivController@arrivDel')->name('arrivDel');

       //Arrivages validés
       Route::get('arrivOk','p_ArrivController@arrivOk')->name('arrivOk'); 


/*--------------------------
  GESTION DES APPROVISIONN
----------------------------*/
       //
        Route::get('/approvi', 'ApprovisionnementController@approvi')->name('approvi');