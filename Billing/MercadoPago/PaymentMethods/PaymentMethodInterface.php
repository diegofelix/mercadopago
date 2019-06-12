<?php

namespace Billing\MercadoPago\PaymentMethods;

interface PaymentMethodInterface
{
	public function getId(): string;

	public function getName(): string;

	public function getPaymentType(): string;

	public function getStatus(): string;

	public function getSecureThumbnail(): string;

	public function getThumbnail(): string;

	public function getDeferredCapture(): string;

	public function getSettings(): array;

	public function getAdditionalInfoNeeded(): array;

	public function getMinAllowedAmount(): int;

	public function getMaxAllowedAmount(): int;

	public function getAccreditationTime(): int;

	public function getFinancialInstitutions(): array;

	public function getProcessingModes(): array;
}