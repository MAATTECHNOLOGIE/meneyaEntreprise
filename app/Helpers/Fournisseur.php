<?php 
  use App\Model\echeance;
use App\Model\EcheanceHistorique;
use App\Model\fournisseur;



 	function recupFourniEch($id_fourni)
 	{
 		$echanceFourni = echeance::where('fournisseur_id','=',$id_fourni)->get()->first();
 		return $echanceFourni;
 	}

if(!function_exists('getTransF'))
{
	function getTransF($idF)
	{
		$transTotal = echeance::where('fournisseur_id','=',$idF)->sum('echeanceMontant');
		return $transTotal;
	}
}

if(!function_exists('getSommePaye'))
{
	function getSommePaye($idEch)
	{
 		 $histPaiement = EcheanceHistorique::where('idEch','=',$idEch)->sum('montantPaye');
 		return $histPaiement;

	}
}

if(!function_exists('getNbrFour'))
{
	function getNbrFour()
	{
 		 $nbrf = fournisseur::all();
 		return $nbrf;

	}
} 

?>
