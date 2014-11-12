<?php

namespace Keycard\Acl\Eloquent;

abstract class Role extends Acl
{

	public function users()
	{
		return $this->belongsToMany( static::$userModel, static::$userRolePivotTable );
	}

	public function getGrantedPermissions()
	{
		return $this->permissions;
	}

}
