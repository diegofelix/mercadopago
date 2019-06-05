<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use MercadoPago\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
    	'zip_code' => 12345,
		'street' => 'some street name',
		'number' => 123,
		'neighborhood' => 'neighborhood',
		'city' => 'sao paulo',
		'state' => 'sao paulo',
    ];
});
