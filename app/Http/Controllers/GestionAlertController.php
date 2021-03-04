<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionAlertController extends Controller
{
    


	//Notification de demande de versement 
	    public function alertVers(Request $request)
	    {
	    	//Recoit l'Id du versement et on alert la succursale

	    	//Envoie du mail
	    	//Envoie de sms
	    	//Ajout de notification dans la table notification
	    	
	    	return response()->json();
	    }
}
