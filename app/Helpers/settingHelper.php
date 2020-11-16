<?php

use App\Model\settings;
use App\Model\devise;

if(!function_exists('getTxDouane'))
{
	function getTxDouane()
	{
		
		$taxe = settings::where('cle','=','dedouanement')->first();
		// dd($taxe->valeur);
		return $taxe->valeur;
	}
}

if(!function_exists('getTxPort'))
{
	function getTxPort()
	{
		
		$taxe = settings::where('cle','=', 'taxePort')->first();
		return $taxe->valeur;
	}
}

if(!function_exists('getMgvente'))
{
	function getMgvente()
	{
		
		$taxe = settings::where('cle','=', 'margeVente')->first();
		return $taxe->valeur;
	}
}


if(!function_exists('getTxAnexe'))
{
	function getTxAnexe()
	{
		
		$taxe = settings::where('cle','=', 'fraisAnnexe')->first();
		return $taxe->valeur;
	}
}

if(!function_exists('getSeuil'))
{
	function getSeuil()
	{
		
		$taxe = settings::where('cle','=', 'seuilPrd')->first();
		return $taxe->valeur;
	}
}

if(!function_exists('getAlertTel'))
{
	function getAlertTel()
	{
		
		$taxe = settings::where('cle','=', 'alertTel')->first();
		return $taxe->valeur;
	}
}

if(!function_exists('getAlertMail'))
{
	function getAlertMail()
	{
		
		$taxe = settings::where('cle','=', 'alertMail')->first();
		return $taxe->valeur;
	}
}


if(!function_exists('getAlertEtat'))
{
	function getAlertEtat()
	{
		
		$taxe = settings::where('cle','=', 'etatAlert')->first();
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
			
			$date = settings::where('cle','=', 'dateMiseEnligne')->first();
			return $date->valeur;
			}
	}

//Recup la devise de l'utilisateur
	if(!function_exists('getMyDevise'))
	{
		function getMyDevise()
		{

			
			$date = settings::where('cle','=', 'devise')->first();
			return getDeviceSymbole($date->valeur);
			}
	}

//Recup toutes les devises avec nom & symbole
	
	if(!function_exists('getAllDevises'))
	{
		function getAllDevises()
		{
			
			$devise = devise::all();
			return $devise;
			}
	}

//Recup le symbole d'une devise
	
	if(!function_exists('getDeviceSymbole'))
	{
		function getDeviceSymbole($id)
		{
			$id = (int)$id;
			$devise = devise::where('id','=',$id)->first();
			return $devise->symbole;
		}
	}

?>