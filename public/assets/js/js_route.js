$(function()
{



/*--------- -----------------
TABLEAU DE BORD 
-----------------------------*/


/*--------- -----------------
    GESTION DE STOCK PRINCIPALE
-----------------------------*/

    $('#arrivagePrincipal').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/arrivagePrincipal');
    });


    

    //Liste de mes approvisionnent

    $('#listArrivage').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/listeApprovisionnement');
    });


    $('#produitsPrincipal').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/produitsPrincipal');
    });

    $('#stockP').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/stock_principal');
    });

            /*--------- -----------------
                GESTION DES ARRIVAGES
            -----------------------------*/


//Ajout arrivage       
        $('#addArriv').click(function()
        {
          
              loadingScreen();
            $('#main_content').load('/addArriv');
        });


    //arrivage en attente

    $('#arrivAttn').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/arrivAttn');
    });
    
    //arrivage valide
    $('#arrivOk').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/arrivOk');
    }); 

//lsit arrivage       

    $('#listArriv').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/listArriv');
    });
    
//statistique Arrivage
    $('#statArriv').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/statArriv');
    });


            /*--------- -----------------
                GESTION DE VENTE PRINCIPALE
            -----------------------------*/
    $('#achatPrincipal').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/venteP');
    });

    $('#liste_ventePrincipal').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/listeVntP');
    }); 

    $('#clientPrincipal').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/clientPrincipal');
    });
        
    $('#proformat').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/factVnt');
    });


    


            /*--------- -----------------
                GESTION DES EMPLOYES  PRINCIPALE
            -----------------------------*/

    $('#ajouterEmploye').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/ajouterEmploye');
    }); 

    $('#listeEmploye').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/listeEmploye');
    }); 


            /*--------- -----------------
                GESTION DES SUCCURSALES 
            -----------------------------*/

    $('#creerSuccursale').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/creerSuccursale');
    }); 


    $('#listeSuccursale').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/listeSuccursale');
    }); 

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


    // $('#stock_succ').click(function()
    // {
    //              loadingScreen();
            $('#main_content').load('/stockSuccursale');
    // });  


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

    // Commandes opérateurs
     $("#p_OpComd").click(function(){
                    loadingScreen();
            $('#main_content').load("/p_OpComd");
     });

    // Liste 
    $("#p_OpListe").click(function(){
                    loadingScreen();
            $('#main_content').load("/p_OpListe");
     });




/*-----------------------
 menu Versement
-------------------------*/
    // Nouveau
     $("#p_NewVers").click(function(){
                    loadingScreen();
            $('#main_content').load("/p_NewVers");
     });

    // Liste
     $("#p_LVer").click(function(){
                    loadingScreen();
            $('#main_content').load("/p_LVer");
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