<?php

use App\Model\produits;

if(!function_exists('getPrd'))
{
	function getPrd($id)
	{
		
		$prd = produits::where('id','=',$id)->get()->first();
		return $prd;
	}
}

if(!function_exists('prdTotalP'))
{
	function prdTotalP()
	{
		
		$prdT = DB::table('produits')->get();
		return $prdT;
	}
}

if(!function_exists('venteTotalS'))
{
	function prdTotalS($id_suc)
	{
		
		$prdT = DB::table('produits')->get();
		return $prdT;
	}
}