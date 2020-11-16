<?php

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