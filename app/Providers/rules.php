<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Validator;

class rules extends ServiceProvider {

	
	public function boot()
	{
		\Validator::extend('alpha_spaces', function($attribute, $value, $parameters)
           {
            return preg_match('/^([-a-z - _-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîï
    	      ðñòóôõöùúûüýøþÿÐdŒ-\s])+$/i', $value);
        });
	}

	
	public function register()
	{
	   

	}

}
