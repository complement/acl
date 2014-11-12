<?php

namespace Keycard\Acl\Eloquent;

abstract class User extends Acl
{

	public function roles()
	{
		return $this->belongsToMany( static::$roleModel, static::$userRolePivotTable );
	}

	public function getGrantedPermissions()
	{
		$grantedPermissions = array();

		$roles = $this->roles()->get();

		foreach ( $roles AS $role )
		{
			$rolePermissions = $role->permissions;

			foreach ( $rolePermissions AS $rolePermission => $rolePermissionAllowed )
			{
				if ( empty( $grantedPermissions[ $rolePermission ] ) )
				{
					$grantedPermissions[ $rolePermission ] = $rolePermissionAllowed;
				}
			}
		}

		$userPermissions = $this->permissions;

		foreach ( $userPermissions AS $userPermission => $userPermissionAllowed )
		{
			$grantedPermissions[ $userPermission ] = $userPermissionAllowed;
		}

		return $grantedPermissions;
	}

}
