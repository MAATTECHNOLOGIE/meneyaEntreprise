<?php
  use App\Model\credit;
use App\Model\creditHistorique;

if(!function_exists('getSommeCrdPaye'))
{
	function getSommeCrdPaye($idCrd)
	{
 		 $histPaiement = creditHistorique::where('credit_id','=',$idCrd)->sum('montantPaye');
 		return $histPaiement;

	}
}


?>