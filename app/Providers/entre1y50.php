<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class entre1y50 extends ServiceProvider {

	
	public function boot()
	{
		 \Validator::extend('entre1y50', function($attribute, $value, $parameters)
           {
            return preg_match('/(^[1-9]{1}$|^[1-4]{1}[0-9]{1}$|^50$)/', $value);
        });
	}

	
	public function register()
	{
		//
	}

}
