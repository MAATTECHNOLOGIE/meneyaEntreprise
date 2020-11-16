<?php
use App\Model\categorieProduit;
use App\Model\produitHasCategorie;
use App\Model\produits;

if(!function_exists('getCatgoEle'))
{
	function getCatgoEle($idCatgo)
	{
 		 $ele = produitHasCategorie::where('categorie_id','=',$idCatgo)->get();
 		return $ele;

	}
}

//Recuperer les categorie
	if(!function_exists('getCatgo'))
	{
		function getCatgo()
		{
	 		 $ele = categorieProduit::where('active','=',1)->get();
	 		return $ele;

		}
	}
//Recuperer une categorie particuliere 
	if(!function_exists('getOneCatgo'))
	{
		function getOneCatgo($idCat)
		{
	 		 $ele = categorieProduit::where('active','=',1)->where('id','=',$idCat)->first();
	 		return $ele;

		}
	}

?>