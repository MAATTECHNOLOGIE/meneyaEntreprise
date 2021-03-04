$(function()
{



/*--------- -----------------
TABLEAU DE BORD 
-----------------------------*/

    /******************* 
    **  A suprimer    **
    ********************
    //arrivage en attente



/*--------- -----------------
    GESTION DE STOCK PRINCIPALE
-----------------------------*/
            /*--------- -----------------
                GESTION DES SUCCURSALES 
            -----------------------------*/




//dashboard dune succursale
$('#dashSucu').click(function()
{
                loadingScreen();
            $('#main_content').load('dashSucu'); 
})

    $('#statistiqueSuccursale').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/statistiqueSuccursale');
    });




            /*--------- -----------------
            GESTION DES APPROVISIONNEMENT 
            -----------------------------*/

    $('#ajouterApprovisionnement').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/ajouterApprovisionnement');
    }); 

    
    $('#listeApprovisionnement').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/listeApprovisionnement');
    }); 






/*------------------
 menu Vente_Succursale
--------------------*/
    // Achat
     $("#s_Achat").click(function(){
                    loadingScreen();
            $('#main_content').load("/s_Achat");
     });

    // Clients
     $('#s_Client').click(function(){
                     loadingScreen();
            $('#main_content').load("/s_Client");
     });

    // Vente
     $('#s_Vente').click(function(){
                     loadingScreen();
            $('#main_content').load("/s_Vente");
     });

/*-----------------------
 menu Stock_Succursale
-------------------------*/
    // Stock
     $("#s_Stock").click(function(){
                    loadingScreen();
            $('#main_content').load("/s_Stock");
     });

/*-----------------------
 menu Fournisseur
-------------------------*/
    // Nouveau
     $("#p_newF").click(function(){
                    loadingScreen();
            $('#main_content').load("/p_newF");
     });

     // List Fournisseur

     $("#p_listF").click(function(){
                    loadingScreen();
            $('#main_content').load("/p_listF");
     });

    // Echeance
     $("#p_Eche").click(function(){
                    loadingScreen();
            $('#main_content').load("/p_Eche");
     });
   
/*-----------------------
 menu Opérateur
-------------------------*/
    // Nouveau
     $("#p_Opera").click(function(){
            loadingScreen();
            $('#main_content').load("/p_Opera");
     });

    // Stock
     $("#p_OperaStock").click(function(){
                    loadingScreen();
            $('#main_content').load("/p_OperaStock");
     });

    // Nouvelles opérations
     $("#p_OpComd").click(function(){
         loadingScreen();
         $('#main_content').load("/p_OpComd");
     });

    // Liste 
    $("#p_OpListe").click(function(){
         loadingScreen();
         $('#main_content').load("/p_OpListe");
     });






     
/*--------- -----------------
 GESTION DES PROSPECTS
-----------------------------*/
    // Nouveau
     $("#p_prospNew").click(function(){
                     loadingScreen();
            $('#main_content').load("/p_prospNew");
     });

    // Analyse
     $("#p_prospStat").click(function(){
                     loadingScreen();
            $('#main_content').load("/p_prospStat");
     });

    // Besoins
     $("#p_prospbesoin").click(function(){
                     loadingScreen();
            $('#main_content').load("/p_prospbesoin");
     });

    // Relance SMS
    $("#p_RelSMS").click(function(){
                     loadingScreen();
            $('#main_content').load("/p_RelSMS");
    });

    // Liste des prospects
    $("#p_prospL").click(function(){
                     loadingScreen();
            $('#main_content').load("/p_prospL");
    });

/*--------- -----------------
 CAMPAGNE MARKETING
-----------------------------*/
    // Nouveau
    $("#CampgNew").click(function(){
      $("#main_content").load("/CampgNew");
    });

    // Liste
    $("#CampgList").click(function(){
      $("#main_content").load("/CampgList");
    });

/*--------- ------------
 SETING DU COMPTE
------------------------*/

    // Config Param
    $("#setting").click(function(){
      $("#main_content").load("/setting");
    });

});