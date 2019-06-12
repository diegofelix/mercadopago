<?php

namespace Billing\MercadoPago\PaymentTypes;

abstract class AbstractPaymentType
{
	/**
	 * @var string Type of payment method (e.g: bolbradesco).
	 */
	protected $id;

	/**
	 * @var string Name of the payment method.
	 */
	protected $name;

	/**
	 * @var string the method of payment (e.g: ticket).
	 */
	protected $payment_type_id;

	/**
	 * @var string It can be active or not, depending on user.
	 */
	protected $status;

	/**
	 * @var string Https url to the thumbnail.
	 */
	protected $secure_thumbnail;

	/**
	 * @var string
	 */
	protected $thumbnail;

	/**
	 * @var string
	 */
	protected $deferred_capture;

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @var array Some additional information the user must provide in
	 *      	  order to accomplish the payment.
	 */
	protected $additional_info_needed;

	/**
	 * @var int The minimum value allowed in reais (e.g: 4 => R$4.00).
	 */
	protected $min_allowed_amount;

	/**
	 * @var int The maximum amount value (e.g: 1000 = R$1.000).
	 */
	protected $max_allowed_amount;

	/**
	 * @var int The time that the payment will take to be confirmed.
	 */
	protected $accreditation_time;

	/**
	 * @var array
	 */
	protected $financial_institutions;

	/**
	 * @var array
	 */
	protected $processing_modes;

	public function __construct(array $paymentType)
	{
		$this->id = $paymentType->id;
		$this->name = $paymentType->name;
		$this->payment_type_id = $paymentType->payment_type_id;
		$this->status = $paymentType->status;
		$this->secure_thumbnail = $paymentType->secure_thumbnail;
		$this->thumbnail = $paymentType->thumbnail;
		$this->deferred_capture = $paymentType->deferred_capture;
		$this->settings = $paymentType->settings;
		$this->additional_info_needed = $paymentType->additional_info_needed;
		$this->min_allowed_amount = $paymentType->min_allowed_amount;
		$this->max_allowed_amount = $paymentType->max_allowed_amount;
		$this->accreditation_time = $paymentType->accreditation_time;
		$this->financial_institutions = $paymentType->financial_institutions;
		$this->processing_modes = $paymentType->processing_modes;
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getPaymentType(): string
	{
		return $this->payment_type_id;
	}

	public function getStatus(): string
	{
		return $this->status;
	}

	public function getSecureThumbnail(): string
	{
		return $this->secure_thumbnail;
	}

	public function getThumbnail(): string
	{
		return $this->thumbnail;
	}

	public function getDeferredCapture(): string
	{
		return $this->deferred_capture;
	}

	public function getSettings(): array
	{
		return $this->settings;
	}

	public function getAdditionalInfoNeeded(): array
	{
		return $this->additional_info_needed;
	}

	public function getMinAllowedAmount(): int
	{
		return $this->min_allowed_amount;
	}

	public function getMaxAllowedAmount(): int
	{
		return $this->max_allowed_amount;
	}

	public function getAccreditationTime(): int
	{
		return $this->accreditation_time;
	}

	public function getFinancialInstitutions(): array
	{
		return $this->financial_institutions;
	}

	public function getProcessingModes(): array
	{
		return $this->processing_modes;
	}

}