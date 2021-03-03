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
?>