<?php
namespace Kir\CanonicalAddresses\PhoneNumbers;

use Kir\CanonicalAddresses\Common\Culture;

class CanonicalPhoneNumberService {
	/** @var PhoneNumberCountryCodes */
	private $countryCodes;

	/**
	 * @param PhoneNumberCountryCodes $countryCodes
	 */
	public function __construct(PhoneNumberCountryCodes $countryCodes) {
		$this->countryCodes = $countryCodes;
	}

	/**
	 * @param Culture $culture
	 * @param string $phoneNumber
	 * @return PhoneNumber
	 */
	public function getCanonicalPhoneNumber(Culture $culture, $phoneNumber) {
		$phoneNumber = trim($phoneNumber);
		$fn = $this->getParser($culture);
		$pn = call_user_func($fn, $phoneNumber);
		return $pn;
	}

	/**
	 * @param Culture $culture
	 * @return array
	 */
	private function getParser(Culture $culture) {
		static $cache = array();
		if(!array_key_exists((string) $culture, $cache)) {
			$cache[(string) $culture] = require __DIR__."/parsers/{$culture}.php";
		}
		return $cache[(string) $culture];
	}
}
