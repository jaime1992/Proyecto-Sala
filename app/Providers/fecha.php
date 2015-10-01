<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class fecha extends ServiceProvider {

	
	public function boot()
	{
	       \Validator::extend('valid_fecha', function($attribute, $value, $parameters)
           {
            return preg_match('/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/', $value);
        });
	}

	
	public function register()
	{
		//
	}

}
