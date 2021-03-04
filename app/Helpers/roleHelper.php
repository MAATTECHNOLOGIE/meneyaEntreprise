<?php
use App\Model\user_has_acces;

if(!function_exists('getRole'))
{
	function getRole()
	{
		$role = DB::table('role_has_users')
            ->join('roles', 'roles.id', '=', 'role_has_users.roles_id')
            ->select('roles.*')
            ->where('role_has_users.user_id','=', Auth::id())
            ->first();

           return $role->libelle;

	}
}

if(!function_exists('getUserRole'))
{
	function getUserRole($idUser)
	{
		$role = DB::table('role_has_users')
            ->join('roles', 'roles.id', '=', 'role_has_users.roles_id')
            ->select('roles.*','roles.id as roleId')
            ->where('role_has_users.user_id','=', $idUser)
            ->first();

           return $role;

	}
}




if(!function_exists('allRole'))
{
	function allRole()
	{
		$role = DB::table('roles')->orderBy('id','desc')->get();
           return $role;
	}
}



if(!function_exists('allUser'))
{
	function allUser()
	{
		$user = DB::table('users')->orderBy('id','desc')->get();
           return $user;
	}
}

if(!function_exists('hasStatAccesto'))
{
	function hasStatAccesto($user_id,$acces_id)
	{
		$nb = user_has_acces::where("user_id","=",$user_id)->where("acces_id","=",$acces_id)->get();

			if (count($nb) == 0) 
			{
				return 0;
			}
			else
			{

				return $nb->first()->status;
			}
           
	}
}


