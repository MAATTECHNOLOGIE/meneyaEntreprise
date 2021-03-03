<?php
  use App\Model\succursale;
  // use DB;

if(!function_exists('getSuccInfo'))
{
	function getSuccInfo($id_succ)
	{
         $sucInfo = DB::table('succursales')
            ->join('users','succursales.id','=','users.succursale_id')
            ->join('ressources_hums','ressources_hums.id','=','users.ressourcesHum_id')
            ->select('ressources_hums.*', 'succursales.*')
            ->where('succursales.id','=',$id_succ)
            ->get()
            ->first();

            return $sucInfo;
	}
}
