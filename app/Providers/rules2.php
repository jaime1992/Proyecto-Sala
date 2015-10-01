<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Validator;

class rules2 extends ServiceProvider {

	
	public function boot()
	{
		\Validator::extend('alpha_spaces_num', function($attribute, $value, $parameters)
           {
            return preg_match('/^([-a-z-_ 0-9-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîï
    	      ðñòóôõöùúûüýøþÿÐdŒ-\s])+$/i', $value);
        });
	}


public function register()
	{
		//
	}

	


}
