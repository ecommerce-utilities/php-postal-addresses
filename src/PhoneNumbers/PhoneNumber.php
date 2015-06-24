<?php
namespace Kir\CanonicalAddresses\PhoneNumbers;

class PhoneNumber {
	/** @var string */
	private $countryCode;
	/** @var string */
	private $areaCode;
	/** @var string */
	private $number;

	/**
	 * @param string $countryCode
	 * @param string $areaCode
	 * @param string $number
	 */
	public function __construct($countryCode, $areaCode, $number) {
		$this->countryCode = $countryCode;
		$this->areaCode = $areaCode;
		$this->number = $number;
	}

	/**
	 * @return string
	 */
	public function getCountryCode() {
		return $this->countryCode;
	}

	/**
	 * @return string
	 */
	public function getAreaCode() {
		return $this->areaCode;
	}

	/**
	 * @return string
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * @return string
	 */
	public function __toString() {
		$trim = function ($number) {
			return preg_replace('/[^0-9]/', '', $number);
		};
		return sprintf('+%s.%s.%s', $trim($this->countryCode), $trim($this->areaCode), $trim($this->number));
	}
}
