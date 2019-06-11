<?php

namespace Billing\MercadoPago\Presenters;

use MercadoPago\User as UserModel;

class User
{
	/**
	 * @var Address Transformer
	 */
	protected $address;

	public function __construct(Address $address)
	{
		$this->address = $address;
	}

	public function single(UserModel $user): array
	{
		return [
			'first_name' => $user->name,
			'email' => $user->email,
			'identification' => [
				'type' => 'cpf',
				'number' => $user->cpf,
			],
			'address' => $this->address->single($user),
		];
	}
}