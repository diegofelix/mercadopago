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
		return app(Address::class)->single($user);
	}
}