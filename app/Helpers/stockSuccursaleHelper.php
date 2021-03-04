
<?php

use App\Model\produits;
use App\Model\stock_principale;
use App\Model\vente_principale;
use App\Model\client_principale;
use App\Model\succursale;
use App\Model\ressourcesHum;
use App\Model\ventes_succursale;
use App\User;

if(!function_exists('recupInfoProduitSucu'))
{
	function recupInfoProduitSuccu($id_produit)
	{
		
		return  produits::where('id','=',$id_produit)->first();
	}
}


	/*----------------------------------------------
		Recuperation des produits manquant
	-------------------------------------------------*/

	// if(!function_exists('produitManquant'))
	// {
	// 	function produitManquant($quantite)
	// 	{
	// 		if($quantite<= 0)
	// 		{
	// 			return  'bg-white text-danger h6';
	// 		}
	// 		elseif ($quantite<=10)
	// 		 {
	// 			return 'bg-white text-warning h6';
	// 		}
	// 		else
	// 		{
	// 			return 'h6';
	// 		}
			
	// 	}
	// }

	/*----------------------------------------------
		Recuperation du client de la commande
	-------------------------------------------------*/

	if(!function_exists('getComdQte'))
	{
		function getComdQte($NumComd)
		 {
		  	//Lecture de la quantité en fonction du numéro de commandes
		  	 $comd = ventes_succursale::where('NumVente','=',$NumComd)->get();
		  	 //recup quantite total
		  	 $qte =0;
			 for ($i=0; $i <count($comd) ; $i++) 
			  { 
				 $qte += $comd[$i]['qte'];
			  }

		  	 return $qte;
		  }
	}



	/*----------------------------------------------
		Recuperation du prix globale de la commande
	-------------------------------------------------*/

	if(!function_exists('getCmdMnt'))
	{
		function getCmdMnt($NumComd)
		 {
		  	//Lecture de la quantité en fonction du numéro de commandes
		  	 $comd = ventes_succursale::where('NumVente','=',$NumComd)->get();
		  	 //recup quantite total
		  	 $prix = 0;
			 for ($i=0; $i <count($comd) ; $i++) 
			  { 
				 $prix += $comd[$i]['prix'];
			  }

		  	 return $prix;
		  }
	}



	/*----------------------------------------------
		Recuperation du client de la commande
	-------------------------------------------------*/

	if(!function_exists('getComdClient'))
	{
		function getComdClient($NumComd)
		 {
		  	//Lecture de la quantité en fonction du numéro de commandes
		  	 $idclient = ventes_succursale::where('NumVente','=',$NumComd)->get()->first();

		  	 $infoClient = succursale::findOrfail($idclient->succursale_id);
		  	 //recup quantite total
		  	 // var_dump($infoClient->client_principaleNom);
		  	 // die();
		  	 

		  	 return $infoClient;
		  }
	}

	// if (!function_exists('getCountPrdInStock')) 
	// {
	// 	function getCountPrdInStock()
	// 		{
	// 			$qteArticle = stock_succursale::where();
	// 			return $qteArticle;


	// 		}
	// }

		if (!function_exists('getPrixPrdInStockSuc')) 
		{
		function getPrixPrdInStockSuc($id_suc)
			{
				$stock = DB::table('stock_succursales')
				->join('produits','stock_succursales.produits_id','=','produits.id')
				->where('stock_succursales.succursale_id','=',$id_suc)
				->select('stock_succursales.*', 'produits.produitPrix')
				->get();
				$stockprice = 0;
				foreach ($stock as $key => $value) 
				{
					$stockprice+= $value->produitPrix* $value->stock_Qte;
				}
				return $stockprice;


			}
		}

		if (!function_exists('getDiffPrdInStock')) 
		{
		function getDiffPrdInStock()
			{
				return $nbrCategorie = stock_principale::all()->count('produits_idproduits');


			}
		}



		if(!function_exists("gerantSuc"))
		{
			function gerantSuc($id)
			{
				$gerant = User::find($id);
				return $gerant;
			}
		}


if(!function_exists('isAdminSuc'))
{
	function isAdminSuc($idUser)
	{
		$isAdmin = succursale::where('user_id','=',$idUser)->get();
		if (count($isAdmin) == 0) 
		{
			return 0;
		}
		else
		{
			return 1;
		}

	}
}


		

	






?>