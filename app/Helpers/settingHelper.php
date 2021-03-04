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
		
		$taxe = setting::where('cle','=', 'alertMail')->first();
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

?>