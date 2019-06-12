<?php

namespace Billing\MercadoPago\Api;

use Billing\MercadoPago\PaymentMethods\Factory;
use GuzzleHttp\Client as GuzzleHttp;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;

class Client
{
	/**
	 * @var GuzzleHttp
	 */
	protected $http;

	/**
	 * @var Factory
	 */
	private $factory;

	public function __construct(GuzzleHttp $http, Factory $factory)
	{
		$this->http = $http;
		$this->factory = $factory;
	}

	public function getPaymentMethods(): array
	{
		$response = $this->http->get('payment_methods');

		foreach ($this->getPaymentMethodData($response) as $data) {
			$paymentMethods[] = $this->factory->get($data);
		}

		return $paymentMethods ?? [];
	}

	protected function getPaymentMethodData(Response $response): array
	{
		return json_decode($response->getBody()->getContents(), true);
	}
}