<?php

namespace Billing\MercadoPago\PaymentMethods;

class Factory
{
	/**
	 * Payment methods array.
	 * 
	 * @var array
	 */
	protected $paymentMethods = [
		'amex' => AmericanExpress::class,
		'bolbradesco' => BradescoTicket::class,
		'elo' => Elo::class,
		'hipercard' => Hipercard::class,
		'master' => MasterCard::class,
		'pec' => Pec::class,
		'visa' => Visa::class,
	];

	public function get(array $paymentMethod): PaymentMethodInterface
	{
		$paymentMethodId = $paymentMethod['id'] ?? null;

		if (!$this->paymentMethodExists($paymentMethodId)) {
			throw new PaymentMethodNotFoundException($paymentMethodId);
		}
		
		return app($this->paymentMethods[$paymentMethodId], compact('paymentMethod'));
	}

	public function paymentMethodExists(?string $paymentMethodId): bool
	{
		return !is_null($paymentMethodId) 
			&& array_key_exists($paymentMethodId, $this->paymentMethods);
	}
}