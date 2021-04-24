<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Mail\MailAbonnement;
use App\Mail\AlertExpireAbonnement;
use App\Model\offres;


class abonmntControl extends Controller
{

	//Pour le form de renouvellement abonnement  
        public function updForfait()
        {
            if(isSuperAdmin())
            {
                return view('pages.dash.abonnement.updForfait');
            }
            return '<script> window.location.href="/login"</script>';
        }

    //Page de notification du forfait expirer
        public function forfaitDown()
        {
            if(Auth::id())
            {
                return view('layouts.forfaitDown');
            }
            else
            {
              return redirect('/login');  
            }
        }


    //Envoi de mail d'alert d'expiration d'abonnement
        public function alertAbonmnt(Request $request)
        {
            $lastNotif = getSettingByName('notifExpiration');

            //Conversion de la date de derniere notification
            $lastNotif = date_create_from_format('d/m/Y', $lastNotif)
                ->format('d-m-Y');   
            //Calcul du timestamp de chaqe date
            $tstanpLast = strtotime($lastNotif);
            $tstanpNow = strtotime(date('d-m-Y'));
            //Calcul du temps ecouler entre today et lastNotif
            $ecart = $tstanpNow - $tstanpLast ; //Timestamp de l'ecart

            $ecart2J = 86400*2; //Timestamp de deux jour

            if ($ecart >=$ecart2J) 
            {
                //Le mail es envoyé ssi la date d'ancienne notification
                // et celle d'aujourdhui vaut 02
                $abn = offres::find($request->offre);
                $offre = $abn->libele; 
                $montant = $abn->montant; 
                $domaine ='http://'.getSettingByName('domaine');
                Mail::to(getSettingByName('alertMail'))->queue(new AlertExpireAbonnement($request->nbrJrst,$offre,$domaine)); 
                setSettingByName('notifExpiration',date('d/m/Y'));
            } 
            return response()->json();    
        }
    //Page de notification du forfait expirer
        public function suscribeTry(Request $request)
        {
            //Déclenchement d'alert
            $email = Auth::user()->email;
            $abn = offres::find($request->offre);
            $offre = $abn->libele; 
            $domaine ='http://'.getSettingByName('domaine');
            $pass = Auth::user()->localite;
           /* Mail::to(getSettingByName('supportMail'))->send(new MailAbonnement($email,$offre,$domaine,$pass));*/

            // Lancement de l'opération d'achat CinetPay

               return response()->json([
                                        'email' =>$email,
                                        'offre' =>$offre,
                                        'montant' =>$abn->Coutabonnement,
                                        'domaine' =>$domaine,
                                        'pass' =>$pass
                                        ]);

             
        }



    // apel ajax de formate price
        public function formatPriceJs(Request $request)
        {
            $prix = formatPrice($request->prix);
            return $prix;
        }
          
    //Vue de mon abonnement 
        public function myAbonmnt()
        {
            if(isSuperAdmin())
            {
                return view('pages.dash.abonnement.myAbonmnt');
            }
            return '<script> window.location.href="/login"</script>';

        }
}
