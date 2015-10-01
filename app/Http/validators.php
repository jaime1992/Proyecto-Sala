<?php namespace App\Http;

Validator::extend('alpha_spaces', function($attribute, $value, $parameters)
{
    return preg_match('/^([-a-z0-9_-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîï
    	ðñòóôõöùúûüýøþÿÐdŒ-\s])+$/i', $value);
    
});  