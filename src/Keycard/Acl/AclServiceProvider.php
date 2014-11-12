<?php

namespace Keycard\Acl;

use Illuminate\Support\ServiceProvider;

class AclServiceProvider extends ServiceProvider
{

	protected $defer = false;

	public function boot()
	{
		$this->package( 'keycard/acl', 'keycard/acl' );

		Eloquent\Acl::$userModel = $this->app[ 'config' ][ 'keycard/acl::user_model' ];
		Eloquent\Acl::$roleModel = $this->app[ 'config' ][ 'keycard/acl::role_model' ];
		Eloquent\Acl::$userRolePivotTable = $this->app[ 'config' ][ 'keycard/acl::user_role_pivot_table' ];
	}

	public function register()
	{

	}

	public function provides()
	{
		return array();
	}

}
