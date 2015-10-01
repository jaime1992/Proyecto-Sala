<?php

return [

	
	"alpha_spaces"         => "El campo :attribute no es valido",
	"valid_rut"            => "El campo :attribute no es valido",
	"alpha_spaces_num"     => "El campo :attribute no es valido",
	"valid_email"          => "El campo :attribute no es valido",
	"entre1y50"            => "El campo :attribute solo puede contener hasta 50 alumnos",
	"valid_fecha"          => "El campo :attribute no es valido",

	

	"accepted"             => "The :attribute must be accepted.",
	"active_url"           => "The :attribute is not a valid URL.",
	"after"                => "The :attribute must be a date after :date.",
	"alpha"                => "El campo :attribute solo puede contener letras.",
	"alpha_dash"           => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"            => "The :attribute may only contain letters and numbers.",
	"array"                => "The :attribute must be an array.",
	"before"               => "The :attribute must be a date before :date.",
	"between"              => [
	    "numeric" => "El campo :attribute debe contener entre :min y :max numeros.",
        "file"    => "El campo :attribute debe pesar entre :min and :max kilobytes.",
        "string"  => "El campo :attribute debe contener entre :min y :max caracteres.",
        "array"   => "El campo :attribute debe contener entre :min y :max items.",
	],
	"boolean"              => "The :attribute field must be true or false.",
    "confirmed"            => "La confirmacion del campo :attribute no coincide.",
	"date"                 => "The :attribute is not a valid date.",
	"date_format"          => "The :attribute does not match the format :format.",
	"different"            => "The :attribute and :other must be different.",
	"digits"               => "The :attribute must be :digits digits.",
	"digits_between"       => "The :attribute must be between :min and :max digits.",
	"email"                => "El campo :attribute debe ser una dirección de correo electrónico válida.",
	"filled"               => "The :attribute field is required.",
	"exists"               => "The selected :attribute is invalid.",
	"image"                => "The :attribute must be an image.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => "The :attribute must be an integer.",
	"ip"                   => "The :attribute must be a valid IP address.",
	"max"                  => [
	    "numeric" => "El campo :attribute no puede tener mas de :max caracteres.",
        "file"    => "El campo :attribute no puede superar los :max kilobytes.",
        "string"  => "El campo :attribute no puede ser mayor que :max caracteres.",
        "array"   => "El campo :attribute no puede tener mas de :max caracteres.",
    ],
    "mimes"                => "El :attribute debe ser un archivo de tipo: :values.",
    "min"                  => [
        "numeric" => "El campo :attribute debe ser por lo menos :min numeros.",
        "file"    => "El campo :attribute debe pesar por lo menos :min kilobytes.",
        "string"  => "El campo :attribute debe ser por lo menos :min caracteres.",
        "array"   => "El campo :attribute debe ser por lo menos :min items.",
	],
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => "El campo :attribute deber ser un numero",
	"regex"                => "The :attribute format is invalid.",
	"required"             => "El campo :attribute es requerido.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => [
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	],
	"unique"               => "El campo :attribute debe ser unico.",
	"url"                  => "The :attribute format is invalid.",
	"timezone"             => "The :attribute must be a valid zone.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [],

];
