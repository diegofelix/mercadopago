<?php

use Billing\MercadoPago\Transformers\User as UserTransformer;
use MercadoPago\Address;
use MercadoPago\User;
use Tests\TestCase;
use Mockery as m;

class UserTest extends TestCase
{
	public function testSingle(): void
	{
		// Set
		$transformer = new UserTransformer();
		$user = m::mock(factory(User::class)->make());
		$address = factory(Address::class)->make();
		$expected = [
			'first_name' => 'Diego Felix',
			'email' => 'diegofelix@github.com',
			'identification' => [
				'type' => 'cpf',
				'number' => '32132132145',
			],
			'address' => [
				'zip_code' => 12345,
				'street_name' => 'some street name',
				'street_number' => 123,
				'neighborhood' => 'neighborhood',
				'city' => 'sao paulo',
				'federal_unit' => 'sao paulo',
			],
		];

		// Expectations
		$user->expects()
			->address()
			->andReturn($address);

		// Actions
		$result = $transformer->single($user);

		// Assertions
		$this->assertSame($expected, $result);
	}
}