<?php
// Prevent direct access to files
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'DSM_SVG_Handler' ) ) {
	class DSM_SVG_Handler {
		const MIME_TYPE = 'image/svg+xml';

		/**
		* add SVG to allowed file uploads.
		*
		* @since 3.3.8
		*/
		public function dsm_mime_types( $mimes ) {
			$mimes['svg'] = 'image/svg+xml';
			return $mimes;
		}
		/**
		* add SVG to wp_check_filetype_and_ext.
		*
		* @since 3.3.8
		*/
		public function dsm_check_filetype_and_ext( $types, $file, $filename, $mimes ) {
			if ( false !== strpos( $filename, '.svg' ) ) {
				$types['ext']  = 'svg';
				$types['type'] = self::MIME_TYPE;
			}

			return $types;
		}

		/**
		 * DSM_SVG_Handler constructor.
		 *
		 * @param string $name
		 * @param array  $args
		 */
		public function __construct() {
			add_filter( 'upload_mimes', array( $this, 'dsm_mime_types' ) );
			add_filter( 'wp_check_filetype_and_ext', array( $this, 'dsm_check_filetype_and_ext' ), 10, 4 );
		}
	}
}
