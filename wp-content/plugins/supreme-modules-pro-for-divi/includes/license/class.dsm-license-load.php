<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class DSM_LICENSE_LOAD {
	var $licence;

	/**
	 *
	 * Run on class construct
	 */
	function __construct() {
		$this->licence = new DSM_PRO_licence();

	}
}

