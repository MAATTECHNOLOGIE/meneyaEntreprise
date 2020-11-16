<?php

use App\Model\vente_principale;

if(!function_exists('venteJourP'))
{
	function venteJourP()
	{
		
		$venteJ = DB::table('vente_principales')->where('dateV','=', date('d/m/Y'))->get();
		return $venteJ;
	}
}

if(!function_exists('venteTotalP'))
{
	function venteTotalP()
	{
		
		$venteT = DB::table('vente_principales')->get();
		return $venteT;
	}
}

//Recup meileur Vente
	if(!function_exists('bestVente'))
	{
		function bestVente()
		{
	
			$bVente = DB::table('vente_principales')->orderBy('prix','desc')->get();
			return $bVente;
		}
	}

	

