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
		$('#main_content').load('/arrivagePrincipal');
	});


    

	//Liste de mes approvisionnent

	$('#listArrivage').click(function()
	{
		$('#main_content').load('/listeApprovisionnement');
	});


	$('#produitsPrincipal').click(function()
	{
		$('#main_content').load('/produitsPrincipal');
	});

	$('#stockP').click(function()
	{
		$('#main_content').load('/stock_principal');
	});

            /*--------- -----------------
                GESTION DES ARRIVAGES
            -----------------------------*/


//Ajout arrivage       
        $('#addArriv').click(function()
        {
            $('#main_content').load('/addArriv');
        });


    //arrivage en attente

    $('#arrivAttn').click(function()
    {
        $('#main_content').load('/arrivAttn');
    });
    
    //arrivage valide
    $('#arrivOk').click(function()
    {
        $('#main_content').load('/arrivOk');
    }); 

//lsit arrivage       

    $('#listArriv').click(function()
    {
        $('#main_content').load('/listArriv');
    });
    
//statistique Arrivage
    $('#statArriv').click(function()
    {
        $('#main_content').load('/statArriv');
    });


			/*--------- -----------------
				GESTION DE VENTE PRINCIPALE
			-----------------------------*/
	$('#achatPrincipal').click(function()
	{
		$('#main_content').load('/venteP');
	});

	$('#liste_ventePrincipal').click(function()
	{
		$('#main_content').load('/listeVntP');
	});	

	$('#clientPrincipal').click(function()
	{
		$('#main_content').load('/clientPrincipal');
	});
    	
    $('#proformat').click(function()
    {
        $('#main_content').load('/factVnt');
    });


    


			/*--------- -----------------
				GESTION DES EMPLOYES  PRINCIPALE
			-----------------------------*/

	$('#ajouterEmploye').click(function()
	{
		$('#main_content').load('/ajouterEmploye');
	});	

	$('#listeEmploye').click(function()
	{
		$('#main_content').load('/listeEmploye');
	});	


			/*--------- -----------------
				GESTION DES SUCCURSALES 
			-----------------------------*/

	$('#creerSuccursale').click(function()
	{
		$('#main_content').load('/creerSuccursale');
	});	


	$('#listeSuccursale').click(function()
	{
		$('#main_content').load('/listeSuccursale');
	});	

//dashboard dune succursale
$('#dashSucu').click(function()
{
	$('#main_content').load('dashSucu'); 
})

	$('#statistiqueSuccursale').click(function()
	{
		$('#main_content').load('/statistiqueSuccursale');
	});


	// $('#stock_succ').click(function()
	// {
	// 	$('#main_content').load('/stockSuccursale');
	// });	


			/*--------- -----------------
			GESTION DES APPROVISIONNEMENT 
			-----------------------------*/

	$('#ajouterApprovisionnement').click(function()
	{
		$('#main_content').load('/ajouterApprovisionnement');
	});	

	
	$('#listeApprovisionnement').click(function()
	{
		$('#main_content').load('/listeApprovisionnement');
	});	






/*------------------
 menu Vente_Succursale
--------------------*/
    // Achat
     $("#s_Achat").click(function(){
   	   $("#main_content").load("/s_Achat");
     });

    // Clients
     $('#s_Client').click(function(){
     	$("#main_content").load("/s_Client");
     });

    // Vente
     $('#s_Vente').click(function(){
     	$("#main_content").load("/s_Vente");
     });

/*-----------------------
 menu Stock_Succursale
-------------------------*/
    // Stock
     $("#s_Stock").click(function(){
   	   $("#main_content").load("/s_Stock");
     });

/*-----------------------
 menu Fournisseur
-------------------------*/
    // Nouveau
     $("#p_newF").click(function(){
   	   $("#main_content").load("/p_newF");
     });

     // List Fournisseur

     $("#p_listF").click(function(){
   	   $("#main_content").load("/p_listF");
     });

    // Echeance
     $("#p_Eche").click(function(){
   	   $("#main_content").load("/p_Eche");
     });
   
/*-----------------------
 menu Opérateur
-------------------------*/
    // Nouveau
     $("#p_Opera").click(function(){
   	   $("#main_content").load("/p_Opera");
     });

    // Stock
     $("#p_OperaStock").click(function(){
   	   $("#main_content").load("/p_OperaStock");
     });

    // Commandes opérateurs
     $("#p_OpComd").click(function(){
   	   $("#main_content").load("/p_OpComd");
     });

    // Liste 
    $("#p_OpListe").click(function(){
   	   $("#main_content").load("/p_OpListe");
     });




/*-----------------------
 menu Versement
-------------------------*/
    // Nouveau
     $("#p_NewVers").click(function(){
   	   $("#main_content").load("/p_NewVers");
     });

    // Liste
     $("#p_LVer").click(function(){
   	   $("#main_content").load("/p_LVer");
     });
/*--------- -----------------
 GESTION DES PROSPECTS
-----------------------------*/
    // Nouveau
     $("#p_prospNew").click(function(){
    	$("#main_content").load("/p_prospNew");
     });

    // Analyse
     $("#p_prospStat").click(function(){
    	$("#main_content").load("/p_prospStat");
     });

    // Besoins
     $("#p_prospbesoin").click(function(){
    	$("#main_content").load("/p_prospbesoin");
     });

    // Relance SMS
    $("#p_RelSMS").click(function(){
    	$("#main_content").load("/p_RelSMS");
    });

    // Liste des prospects
    $("#p_prospL").click(function(){
    	$("#main_content").load("/p_prospL");
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