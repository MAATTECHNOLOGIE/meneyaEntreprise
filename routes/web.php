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
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

/*--------------------------
  GESTION DU LANDING PAGE
----------------------------*/
    // Landing Page
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



/*--------------------------
  GESTION DES OPERATEURS
----------------------------*/
  /*
   *******************
    * Cas pratique*
    ---------------
     Une personne depose une somme d'argent
     pour une ou plusieurs opérations données.
     Il faut suivre les sorties et la solvabilité 
     de l'operation de l'opérateur en question.
   ********************
  */
        //Opérateur => Formulaire de création
         Route::get('/p_Opera', 'p_OperaController@p_Opera')->name('p_Opera');

        // Opérateur => Nouveau
         Route::post('/p_AddOpera', 'p_OperaController@p_AddOpera')->name('p_AddOpera');

        // Opérateur => Liste
         Route::get('p_OpListe','p_OperaController@p_OpListe')->name('p_OpListe');

        // Opérateur => Suppression
         Route::get('p_OpDele','p_OperaController@p_OpDele')->name('p_OpDele');

        // Opérateur => Modification phase 1
          Route::get('p_OpUpd','p_OperaController@p_OpUpd')->name('p_OpUpd');

        // Opérateur => Modification phase 2 
          Route::get('p_OpUpval','p_OperaController@p_OpUpval')->name('p_OpUpval');

        // Opérateur => Opération
          Route::post('p_OpTion','p_OperaController@p_OpTion')->name('p_OpTion');

        // Opérateur => Modification phase 2
         Route::get('p_OperaUpd2','p_OperaController@p_OperaUpd2')->name('p_OperaUpd2');

        // Affectation d'opérations à un opérateur
         Route::get('p_opeOpNew','p_OperaController@p_opeOpNew')->name('p_opeOpNew');

        //Liste des sorties de l'operateur
         Route::post('p_listeSortie','p_OperaController@p_listeSortie');
         Route::get('p_opRecuSorti','p_OperaController@p_opRecuSorti');

        // Sortie => Effectuer une sortie pour l'opérateur
          Route::post('p_OpSortie','p_OperaController@p_OpSortie')->name('p_OpSortie');
         

        //opération => Liste
         Route::get('/p_OpComd', 'p_OperaController@p_OpComd')->name('p_OpComd');

        // Opération => Nouvelle
         Route::post('/p_AddOperation','p_OperaController@p_AddOperation')->name('p_AddOperation');
         Route::get('p_opetNew','p_OperaController@p_opetNew')->name('p_opetNew');

        // Opération => Suppression
         Route::get('p_cmdDOp','p_OperaController@p_cmdDOp')->name('p_cmdDOp');

        // Opération  => Modification Phase 1
         Route::get('p_OperaUpd','p_OperaController@p_OperaUpd')->name('p_OperaUpd');

/*--------------------------
  GESTION DES PROSPECTS
----------------------------*/
  /*
   *******************
    * Cas pratique*
    ---------------
     Un propspect est une personne qui vient prendre des 
     rensignements sur un produit sans acheter.
     L'objectif est de faire une prospection automatque.
   ********************
  */
        // Nouveau => Formulaire  prospect
         Route::get('p_prospNew','p_prospController@p_prospNew')->name('p_prospNew');
        
        // Liste des prospects
         Route::get('p_prospL','p_prospController@p_prospL')->name('prospect');

        // Analyse statistique
         Route::get('p_prospStat','p_prospController@p_prospStat')->name('p_prospStat');

        // Besoins
         Route::get('p_prospbesoin','p_prospController@p_prstBesoin')->name('p_prstBesoin');

        // Relance SMS
          Route::get('p_RelSMS','p_prospController@p_RelSMS')->name('p_RelSMS');

        // Ajouter
         Route::get('p_AddPros','p_prospController@p_AddPros')->name('p_AddPros');

        // Bésoins
         Route::get('p_PrBes','p_prospController@p_PrBes')->name('p_PrBes');

        // Affectation de prospect-besoins
         Route::get('p_besoL','p_prospController@p_besoL')->name('p_besoL');

        // Supprimer
          Route::get('p_DelP','p_prospController@p_DelP')->name('p_DelP');

        // SMS
          Route::get('ProsSMS','p_prospController@ProsSMS')->name('ProsSMS');

        // Modification
          Route::get('p_PrUpd','p_prospController@p_PrUpd')->name('p_PrUpd');
          Route::get('prosUp','p_prospController@prosUp')->name('prosUp');

        // Suppression de besoins
         Route::get('p_DelPB','p_prospController@p_DelPB')->name('p_DelPB');

        // Modification de besoins | prosBUp
          Route::get('p_PrUpdB','p_prospController@p_PrUpdB')->name('p_PrUpdB');
          Route::get('prosBUp','p_prospController@prosBUp')->name('prosBUp');
          Route::get('p_besAdd','p_prospController@p_besAdd')->name('p_besAdd');

        // Analyse des besoins-prospects
         Route::get('statBes','p_prospController@statBes')->name('statBes');



/*--------------------------
  CAMPAGNE MARKETING
----------------------------*/
  /*
   *******************
    * Cas pratique*
    ---------------
     La campagne marketing consiste à faire une campagne SMS
     aux clients: Toute personne ayant effectué déjà un achat.
   ********************
  */
    // Nouveau
     Route::get('CampgNew','p_CampMarkController@CampgNew')->name('CampgNew');

    // Liste
     Route::get('CampgList','p_CampMarkController@CampgList')->name('CampgList');

    // SMS Marketing unique
     Route::get('sendUniqSMS','p_CampMarkController@sendUniqSMS')->name('sendUniqSMS');

    // Campagne marketing groupé 
     Route::get('sendNSMS','p_CampMarkController@sendNSMS')->name('sendNSMS');

    // Vider l'historique des sms
     Route::get('emptySMS','p_CampMarkController@emptySMS')->name('emptySMS');

/*--------------------------
  FOURNISSEUR
----------------------------*/
  /*
   *******************
    * Cas pratique*
    ---------------
     Le fournisseur est une personne qui fourni ou ravitaille votre structure en produit
     IL vous faut suivre leur paiement et le niveau de leur solvabilité
   ********************
  */
    // Nouveau
     Route::get('/p_newF', 'p_FourniController@p_newF')->name('p_newF');

    // List Fournisseur
     Route::get('/p_listF', 'p_FourniController@p_listF')->name('p_listF');

    // Ajouter
     Route::post('/p_AddF','p_FourniController@p_AddF')->name('p_AddF');

    // Supprimer un fournisseur
     Route::get('/delFour', 'p_FourniController@delFour')->name('delFour');

    // Fournisseur => Update 
     Route::post('/editF', 'p_FourniController@editF')->name('editF');
     Route::post('/updateF', 'p_FourniController@updateF')->name('updateF');
    
    // Fournisseur => Echeance consulter
     Route::post('/showFour','p_FourniController@showFour')->name('showFour');
    
    // Echeance
     Route::get('/p_Eche', 'p_FourniController@p_Eche')->name('p_Eche');
     Route::post('/EcheFour','p_FourniController@EcheFour')->name('EcheFour');
     Route::get('/delEch','p_FourniController@delEch')->name('delEch');



/*--------- -----------------
        GESTION DES ARRIVAGES
-----------------------------*/
        //Ajout arrivage
    Route::get('addArriv','p_ArrivController@addArriv')->name('addArriv');

       //Enregistre produit arrivage
    Route::post('saveArrivPrd','p_ArrivController@saveArrivPrd')->name('saveArrivPrd');

/*--------- ------------------------------
     GESTION DES PRODUITS ET CATEGORIES
----------------------------------------*/
        //Ajout de categorie
    Route::get('ajaxAddCatg','p_ArrivController@ajaxAddCatg')->name('ajaxAddCatg');




