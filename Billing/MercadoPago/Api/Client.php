<?php

namespace Billing\MercadoPago\Api;

use GuzzleHttp\Client as GuzzleHttp;

class Client
{
	/**
	 * @var GuzzleHttp
	 */
	protected $http;

	public function __construct(GuzzleHttp $http)
	{
		$this->http = $http;
	}

	public function getPaymentMethods(): array
	{
		$response = $this->http->get('payment_methods');

		dd(json_decode($response->getBody()->getContents(), true));
	}
}