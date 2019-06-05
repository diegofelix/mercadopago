<?php

namespace Billing\MercadoPago\Transformers;

use MercadoPago\User as UserModel;

class User
{
	public function single(UserModel $user): array
	{
		return [
			'first_name' => $user->name,
			'email' => $user->email,
			'identification' => [
				'type' => 'cpf',
				'number' => $user->cpf,
			],
			'address' => $this->transformAddress($user),
		];
	}

	private function transformAddress(UserModel $user): array
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