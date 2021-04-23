<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Mail\MailAbonnement;
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

    //Page de notification du forfait expirer
        public function suscribeTry(Request $request)
        {
            //Déclenchement d'alert
            $email = Auth::user()->email;
            $abn = offres::find($request->offre);
            $offre = $abn->libele; 
            $domaine =getSettingByName('domaine');
            $pass = Auth::user()->localite;
            Mail::to(getSettingByName('supportMail'))->send(new MailAbonnement($email,$offre,$domaine,$pass));
            return "ok";
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
