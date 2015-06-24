<?php
namespace Kir\CanonicalAddresses\Common;

class Culture {
	/** @var string */
	private $languageCode;
	/** @var string */
	private $countryCode;
	/** @var array */
	private $defaultLanguageCodeForCountryCode = array(
		'DE' => 'de',
	);

	/**
	 * @param string $languageCode
	 * @param string $countryCode
	 */
	public function __construct($countryCode, $languageCode = null) {
		$this->countryCode = $countryCode;
		if($languageCode === null && array_key_exists($languageCode, $this->defaultLanguageCodeForCountryCode)) {
			$languageCode = $this->defaultLanguageCodeForCountryCode[$languageCode];
		}
		$this->languageCode = $languageCode;
	}

	/**
	 * @return string
	 */
	public function getLanguageCode() {
		return $this->languageCode;
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
	function __toString() {
		return sprintf('%s_%s', $this->languageCode, $this->countryCode);
	}
}
