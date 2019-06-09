<?php

namespace Billing\MercadoPago\Transformers;

use MercadoPago\User;

class Address
{
	public function single(User $user): array
	{
		if (!$address = $user->address()) {
			return [];
		}

		return [
			'zip_code' => $address->zip_code,
			'street_name' => $address->street,
			'street_number' => $address->number,
			'neighborhood' => $address->neighborhood,
			'city' => $address->city,
			'federal_unit' => $address->state,
		];
	}
}