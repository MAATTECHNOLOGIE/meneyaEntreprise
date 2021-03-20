<?php

use App\Model\clients;

if(!function_exists('getClient'))
{
	function getClient($idC)
	{

	return clients::find($idC);
	}
}

if(!function_exists('getClientNbr'))
{
	function getClientNbr()
	{

	return clients::all();
	}
}


if(!function_exists('allCltSuc'))
{
	function allCltSuc($idSuc)
	{
		$cltSuc =DB::table('succursale_has_clients')
	                    ->join('clients','clients.id','=','succursale_has_clients.clients_id')
	                    ->select('clients.*', 'clients.id as clientId')
	                    ->where('succursale_has_clients.succursale_id','=',$idSuc)
	                    ->orderBy('id','desc')->get();
		return $cltSuc;
	}
}


?>