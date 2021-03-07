$(function()
{



/*--------- -----------------
TABLEAU DE BORD 
-----------------------------*/

    /******************* 
    **  A suprimer    **
    ********************
    //arrivage en attente





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

/*--------- -----------------
 GESTION DES COMMANDES
-----------------------------*/
    // Nouveau
    $("#CommdNew").click(function(){
      $("#main_content").load("/CommdNew");
    });
    
     $("#CommdNewF").click(function(){
      $("#main_content").load("/CommdNew");
    });

    // Liste
    $("#CommdLvr").click(function(){
      $("#main_content").load("/CommdLvr");
    });

/*--------- ------------
 SETING DU COMPTE
------------------------*/

    // Config Param
    $("#setting").click(function(){
      $("#main_content").load("/setting");
    });

});