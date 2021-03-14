<?php

use App\Model\setting;
use App\Model\devises;

if(!function_exists('getTxDouane'))
{
	function getTxDouane()
	{
		
		$taxe = setting::where('cle','=','dedouanement')->first();
		// dd($taxe->valeur);
		return $taxe->valeur;
	}
}


if(!function_exists('getTxPort'))
{
	function getTxPort()
	{
		
		$taxe = setting::where('cle','=', 'taxePort')->first();
		return $taxe->valeur;
	}
}

if(!function_exists('getMgvente'))
{
	function getMgvente()
	{
		
		$taxe = setting::where('cle','=', 'margeVente')->first();
		return $taxe->valeur;
	}
}


if(!function_exists('getTxAnexe'))
{
	function getTxAnexe()
	{
		
		$taxe = setting::where('cle','=', 'fraisAnnexe')->first();
		return $taxe->valeur;
	}
}

if(!function_exists('getSeuil'))
{
	function getSeuil()
	{
		
		$taxe = setting::where('cle','=', 'seuilPrd')->first();
		return $taxe->valeur;
	}
}

if(!function_exists('getAlertTel'))
{
	function getAlertTel()
	{
		
		$taxe = setting::where('cle','=', 'alertTel')->first();
		return $taxe->valeur;
	}
}

if(!function_exists('getAlertMail'))
{
	function getAlertMail()
	{
		
		$taxe = setting::where('cle','=', 'alertMail')->first();
		return $taxe->valeur;
	}
}

if(!function_exists('getContact'))
{
	function getContact()
	{
		
		$taxe = setting::where('cle','=', 'contact')->first();
		return $taxe->valeur;
	}
}



if(!function_exists('getAlertEtat'))
{
	function getAlertEtat()
	{
		
		$taxe = setting::where('cle','=', 'etatAlert')->first();
		if ($taxe->valeur == 1) 
		{
		return "Activé";
			
		}
		else
		{
			return "Desactivé";
		}
	}
}

//Calcul la durre du service de Meneya

	if(!function_exists('getDure'))
	{
		function getDure()
		{
			
			$date = setting::where('cle','=', 'dateMiseEnligne')->first();
			return $date->valeur;
			}
	}

//Recup la devise de l'utilisateur
	if(!function_exists('getMyDevise'))
	{
		function getMyDevise()
		{

			
			$date = setting::where('cle','=', 'devise')->first();
			return getDeviceSymbole($date->valeur);
			}
	}

//Recup toutes les devises avec nom & symbole
	
	if(!function_exists('getAllDevises'))
	{
		function getAllDevises()
		{
			
			$devise = devises::all();
			return $devise;
			}
	}

//Recup le symbole d'une devise
	
	if(!function_exists('getDeviceSymbole'))
	{
		function getDeviceSymbole($id)
		{
			$id = (int)$id;
			$devise = devises::where('id','=',$id)->first();
			return $devise->symbole;
		}
	}

//SetPrix calculé
	if(!function_exists('getPrixAuto'))
	{
		function getPrixAuto($prixFour)
		{
			$prix = $prixFour + ($prixFour* ((getTxDouane() + getTxPort() + getMgvente() + getTxAnexe())/100 ));
			return $prix;
		}
	}

//Format quantite
	if(!function_exists('formatQte'))
	{
		function formatQte($qte)
		{
			$qte = number_format( $qte,0,',',' .');
			return $qte;
		}
	}
	

//Format Prix
	if(!function_exists('formatPrice'))
	{
		function formatPrice($prix)
		{
			$prix = number_format( $prix,0,',','.').' '.getMyDevise();
			return $prix;
		}
	}	                



// Lecture des commandes du client
if(!function_exists('getCommande'))
{
	function getCommande()
	{
		
		$cmd = DB::table('sms_has_interesses')
		         ->select('sms_has_interesses.*')
		         ->get();
		$nbcmd = count($cmd);
		return $nbcmd;
	}
}

// Local de l'entreprise
if(!function_exists('getLocal'))
{
	function getLocal()
	{
		
		$local = setting::where('cle','=','local')->first();
		// dd($taxe->valeur);
		return $local->valeur;
	}
}

// Logo de l'entreprise
if(!function_exists('getLogo'))
{
	function getLogo()
	{
		
		$logo = setting::where('cle','=','logo')->first();
		// dd($taxe->valeur);
		return $logo->valeur;
	}
}

// Contact de l'entreprise
if(!function_exists('getContact'))
{
	function getContact()
	{
		
		$contact = setting::where('cle','=','contact')->first();
		// dd($taxe->valeur);
		return $contact->valeur;
	}
}

// Nom Entreprise
if(!function_exists('getEntreprise'))
{
	function getEntreprise()
	{
		
		$entreprise = setting::where('cle','=','Entreprise')->first();
		// dd($taxe->valeur);
		return $entreprise->valeur;
	}
}

// Sender
if(!function_exists('getSender'))
{
	function getSender()
	{
		
		$sender = setting::where('cle','=','sender')->first();
		// dd($taxe->valeur);
		return $sender->valeur;
	}
}
    if(!function_exists('getShop'))
	{
		function getShop()
		{
			
			$shop = setting::where('cle','=', 'about')->first();
			return $shop->valeur;
		}
	}


    if(!function_exists('whatsAppShop'))
	{
		function whatsAppShop()
		{
			
			$whatsAp = setting::where('cle','=', 'whatsApp')->first();
			//dd($whatsAp->valeur);
			return $whatsAp->valeur;
		}
	}

	if(!function_exists('facebookShop'))
	{
		function facebookShop()
		{
			
			$facebook = setting::where('cle','=', 'facebook')->first();
			return $facebook->valeur;
		}
	}

	if(!function_exists('faceLinkShop'))
	{
		function faceLinkShop()
		{
			
			$fbLink = setting::where('cle','=', 'fblink')->first();
			return $fbLink->valeur;
		}
	}


	?>