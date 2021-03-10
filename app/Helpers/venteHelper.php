<?php

use App\Model\vente_principales; 

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


if(!function_exists('venteJourSuc'))
{
	function venteJourSuc()
	{
		$idSuc = userHasSucc(Auth::id());
		$venteJ = DB::table('ventes_succursales')->where('succursale_id','=',$idSuc)
										->where('dateV','=', date('d/m/Y'))
										->get();
		return $venteJ;
	}
}


if(!function_exists('venteTotalSuc'))
{
	function venteTotalSuc()
	{
		$idSuc =userHasSucc(Auth::id()); 
		$venteT = DB::table('ventes_succursales')->where('succursale_id','=',$idSuc)
													->get();
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

	

