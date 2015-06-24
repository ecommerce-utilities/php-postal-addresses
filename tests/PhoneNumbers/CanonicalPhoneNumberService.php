<?php
namespace Kir\CanonicalAddresses\PhoneNumbers;

use Kir\CanonicalAddresses\Common\Culture;

class CanonicalPhoneNumberServiceTest extends \PHPUnit_Framework_TestCase {
	/**
	 */
	public function testGetCanonicalPhoneNumber() {
		$service = new CanonicalPhoneNumberService(new PhoneNumberCountryCodes());
		$phoneNumber = $service->getCanonicalPhoneNumber(new Culture('DE', 'de'), '+49 1234 567890');

		$this->assertEquals('0049', $phoneNumber->getAreaCode());
	}
}
