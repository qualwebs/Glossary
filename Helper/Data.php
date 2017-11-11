<?php
/**
 * Qualwebs Glossary Helper Data
 *
 * @category    Qualwebs
 * @package     Qualwebs_Glossary
 * @author      Qualwebs Solutions
 *
 */
namespace Qualwebs\Glossary\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
	/**
	 * @return mixed
	 */
	public function getGlossaryIndexUrl () {
		return $this->_getUrl('glossary');
	}

	/**
	 * @param string $letter
	 *
	 * @return string
	 */
	public  function asciiLetter ($letter) {
		if (preg_match('/^[a-z]$/i', $letter)) {
			return strtoupper($letter);
		}
		switch ($letter) {
			case 'ä':
			case 'Ä':
				return 'A';
			case 'ö':
			case 'Ö':
				return 'O';
			case 'ü':
			case 'Ü':
				return 'U';
			default:
				return '123';
		}
	}

	/**
	 * @param string $string
	 * @return string
	 */
	public function convertUmlauts($string) {
		$replace = array(
			' ' => '_',
			'Ä' => 'Ae',
			'Ö' => 'Oe',
			'Ü' => 'Ue',
			'ä' => 'ae',
			'ö' => 'oe',
			'ü' => 'ue',
			'ß' => 'ss'
		);
		return strtr($string, $replace);
	}
}