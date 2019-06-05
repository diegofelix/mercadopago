<?php

use Billing\MercadoPago\Transformers\Address;
use Billing\MercadoPago\Transformers\User as UserTransformer;
use MercadoPago\User;
use Mockery as m;
use Tests\TestCase;

class UserTest extends TestCase
{
	public function testSingle(): void
	{
		// Set
		$transformer = new UserTransformer();
		$user = factory(User::class)->make();
		$address = $this->instance(Address::class, m::mock(Address::class));
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