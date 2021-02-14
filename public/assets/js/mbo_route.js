$(function()
{



/*--------- -----------------
TABLEAU DE BORD 
-----------------------------*/


            /*--------- -----------------
                GESTION DES ARRIVAGES
            -----------------------------*/

    $('#arrivAttn').click(function()
    {
                    loadingScreen();
            $('#main_content').load('/mbo/arrivAttn');
    });
    
    //arrivage valide
    $('#arrivOk').click(function()
    {
                    loadingScreen();
            $('#main_content').load('mbo/arrivOk');
    }); 

    $('#arrivagePrincipal').click(function()
    {
                    loadingScreen();
            $('#main_content').load('mbo/approvi');
    });


});