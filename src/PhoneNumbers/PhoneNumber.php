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
		return sprintf('%s%s%s', $this->countryCode, $this->areaCode, $this->number);
	}
}
