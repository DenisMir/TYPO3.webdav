<?php

/**
 * Sabre_DAV_Exception_ServiceUnavailable
 *
 * This exception is thrown in case the service
 * is currently not available (e.g. down for maintenance).
 *
 * @package Sabre
 * @subpackage DAV
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @license http://sabre.io/license/ Modified BSD License
 */

class Sabre_DAV_Exception_ServiceUnavailable extends Sabre_DAV_Exception {

	/**
	 * Returns the HTTP statuscode for this exception
	 *
	 * @return int
	 */
	public function getHTTPCode() {

		return 503;

	}

}
