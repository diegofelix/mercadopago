<?php

use Billing\MercadoPago\Presenters\Address;
use MercadoPago\Address as AddressModel;
use MercadoPago\User;
use Mockery as m;
use Tests\TestCase;

class AddressTest extends TestCase
{
	public function testSingle(): void
	{
		// Set
		$transformer = new Address();
		$user = m::mock(User::class);
		$addressModel = factory(AddressModel::class)->make();
		$expected = [
			'zip_code' => 12345,
			'street_name' => 'some street name',
			'street_number' => 123,
			'neighborhood' => 'neighborhood',
			'city' => 'sao paulo',
			'federal_unit' => 'sao paulo',
		];

		// Expectations
		$user->expects()
			->address()
			->andReturn($addressModel);

		// Actions
		$result = $transformer->single($user);

		// Assertions
		$this->assertSame($expected, $result);
	}

	public function testSingleShouldReturnEmptyAddress(): void
	{
		// Set
		$transformer = new Address();
		$user = m::mock(User::class);
		$expected = [];

		// Expectations
		$user->expects()
			->address()
			->andReturnNull();

		// Actions
		$result = $transformer->single($user);

		// Assertions
		$this->assertEmpty($result);
	}
}