<?php

namespace KayStrobach\Webdav\ViewHelpers;

/**
 * Class ThumbimageViewHelper
 *
 * @package KayStrobach\Webdav\ViewHelpers
 */
class ThumbimageViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
	 * @param string $src
	 * @param string $path
	 *
	 * @return string
	 */
	public function render($src, $path = 'thumbs.php') {
		$imagePath = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'] . '/' . $src));
		$return = \t3lib_BEfunc::getThumbNail($path, $imagePath);
		return $return;
	}
}