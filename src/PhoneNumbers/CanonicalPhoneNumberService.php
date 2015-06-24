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
		$countryId = $culture->getCountryCode();
		$phoneNumber = trim($phoneNumber);
		if($countryId === 'DE') {
			$number = $phoneNumber;
			list($countryCode, $number) = $this->extractPhoneCountryCode($countryId, $number);
			return new PhoneNumber($countryCode, null, $number);
		}
		return new PhoneNumber(null, null, $phoneNumber);
	}

	/**
	 * @param string $countryId
	 * @param string $phoneNumber
	 * @return string
	 * @throws PhoneNumberCountryCodes\CountryCodeNotFoundException
	 */
	private function extractPhoneCountryCode($countryId, $phoneNumber) {
		if(preg_match('/^(?:\\+\\s*|00)(\\d+)(.*)$/', $phoneNumber, $matches)) {
			if($this->countryCodes->hasPhoneCountryCode($matches[1])) {
				$number = trim($matches[2]);
				$number = ltrim($number, '0');
				return [sprintf('00%d', trim($matches[1])), $number];
			}
		}
		$areaCode = $this->countryCodes->getPhoneCountryCodeByCountryCode($countryId);
		$phoneNumber = ltrim('0', $phoneNumber);
		return [$areaCode, $phoneNumber];
	}
}
