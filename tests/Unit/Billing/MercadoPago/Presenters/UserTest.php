<?php

use Billing\MercadoPago\Presenters\Address;
use Billing\MercadoPago\Presenters\User as UserTransformer;
use MercadoPago\User;
use Mockery as m;
use Tests\TestCase;

class UserTest extends TestCase
{
	public function testSingle(): void
	{
		// Set
		$address = m::mock(Address::class);
		$transformer = new UserTransformer($address);
		$user = factory(User::class)->make();
		$expected = [
			'first_name' => 'Diego Felix',
			'email' => 'diegofelix@github.com',
			'identification' => [
				'type' => 'cpf',
				'number' => '32132132145',
			],
			'address' => [
				'user' => 'address',
			],
		];

		// Expectations
		$address->expects()
			->single($user)
			->andReturn(['user' => 'address']);

		// Actions
		$result = $transformer->single($user);

		// Assertions
		$this->assertSame($expected, $result);
	}
}