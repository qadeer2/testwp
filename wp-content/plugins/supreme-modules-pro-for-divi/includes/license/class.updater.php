<?php

class DSM_License_CodeAutoUpdate {
	public $api_url;
	private $slug;
	public $plugin;
	public $current_version;
	private $API_VERSION;

	public function __construct( $api_url, $slug, $plugin ) {
		$this->api_url     = $api_url;
		$this->slug        = $slug;
		$this->plugin      = $plugin;
		$this->API_VERSION = 1.1;
	}

	public function check_for_plugin_update( $checked_data ) {
		if ( ! is_object( $checked_data ) || ! isset( $checked_data->response ) ) {
			return $checked_data;
		}

		$request_string = $this->prepare_request( 'plugin_update' );
		if ( $request_string === false ) {
			return $checked_data;
		}

		global $wp_version;

		// Start checking for an update
		$request_uri = $this->api_url . '?' . http_build_query( $request_string, '', '&' );

		//check if cached
		$data = get_site_transient( 'divisupremepro-check_for_plugin_update_' . md5( $request_uri ) );
		if ( $data === false ) {
				$data = wp_remote_get(
					$request_uri,
					array(
						'timeout'    => 20,
						'user-agent' => 'WordPress/' . $wp_version . '; DiviSupremePro/' . DSM_PRO_VERSION . '; ' . DSM_PRO_INSTANCE,
					)
				);

			if ( is_wp_error( $data ) || $data['response']['code'] != 200 ) {
				return $checked_data;
			}

			set_site_transient( 'divisupremepro-check_for_plugin_update_' . md5( $request_uri ), $data, 60 * 60 * 4 );
		}

		$response_block = json_decode( $data['body'] );

		if ( ! is_array( $response_block ) || count( $response_block ) < 1 ) {
			return $checked_data;
		}

		//retrieve the last message within the $response_block
		$response_block = $response_block[ count( $response_block ) - 1 ];
		$response       = isset( $response_block->message ) ? $response_block->message : '';

		if ( is_object( $response ) && ! empty( $response ) ) {
			$response                                = $this->postprocess_response( $response );
			$checked_data->response[ $this->plugin ] = $response;
		}

		return $checked_data;
	}


	public function plugins_api_call( $def, $action, $args ) {
		if ( ! is_object( $args ) || ! isset( $args->slug ) || $args->slug != $this->slug ) {
			return $def;
		}

		$request_string = $this->prepare_request( $action, $args );
		if ( false === $request_string ) {
			return new WP_Error( 'plugins_api_failed', __( 'An error occour when try to identify the plugin.', 'dsm-supreme-modules-pro-for-divi' ) . '&lt;/p> &lt;p>&lt;a href=&quot;?&quot; onclick=&quot;document.location.reload(); return false;&quot;>' . __( 'Try again', 'software-license' ) . '&lt;/a>' );
		}

		$request_uri = $this->api_url . '?' . http_build_query( $request_string, '', '&' );
		$data        = wp_remote_get( $request_uri );

		if ( is_wp_error( $data ) || $data['response']['code'] != 200 ) {
			return new WP_Error( 'plugins_api_failed', __( 'An Unexpected HTTP Error occurred during the API request.', 'dsm-supreme-modules-pro-for-divi' ) . '&lt;/p> &lt;p>&lt;a href=&quot;?&quot; onclick=&quot;document.location.reload(); return false;&quot;>' . __( 'Try again', 'software-license' ) . '&lt;/a>', $data->get_error_message() );
		}

		$response_block = json_decode( $data['body'] );
		//retrieve the last message within the $response_block
		$response_block = $response_block[ count( $response_block ) - 1 ];
		$response       = $response_block->message;

		if ( is_object( $response ) && ! empty( $response ) ) {
			$response = $this->postprocess_response( $response );

			return $response;
		}
	}

	public function prepare_request( $action, $args = array() ) {
		global $wp_version;

		$license_data = get_site_option( 'dsm_pro_license' );
		$license_data_key;
		if ( is_null( $license_data['key'] ) ) {
			$license_data_key = '';
		} else {
			$license_data_key = $license_data['key'];
		}

		return array(
			'woo_sl_action'     => $action,
			'version'           => DSM_PRO_VERSION,
			'product_unique_id' => DSM_PRODUCT_ID,
			'licence_key'       => $license_data_key,
			'domain'            => DSM_PRO_INSTANCE,
			'wp-version'        => $wp_version,
			'api_version'       => $this->API_VERSION,
		);
	}

	private function postprocess_response( $response ) {
		// include slug and plugin data
		$response->slug   = $this->slug;
		$response->plugin = $this->plugin;

		// if sections are being set
		if ( isset( $response->sections ) ) {
			$response->sections = (array) $response->sections;
		}

		// if banners are being set
		if ( isset( $response->banners ) ) {
			$response->banners = (array) $response->banners;
		}

		// if icons being set, convert to array
		if ( isset( $response->icons ) ) {
			$response->icons = (array) $response->icons;
		}

		return $response;

	}
}

function DSM_PRO_run_updater() {
	$wp_plugin_auto_update = new DSM_License_CodeAutoUpdate( DSM_PRO_APP_API_URL, 'supreme-modules-pro-for-divi', 'supreme-modules-pro-for-divi/supreme-modules-pro-for-divi.php' );
	// Take over the update check
	add_filter( 'pre_set_site_transient_update_plugins', array( $wp_plugin_auto_update, 'check_for_plugin_update' ) );
	// Take over the Plugin info screen
	add_filter( 'plugins_api', array( $wp_plugin_auto_update, 'plugins_api_call' ), 10, 3 );
}

add_action( 'after_setup_theme', 'DSM_PRO_run_updater' );
