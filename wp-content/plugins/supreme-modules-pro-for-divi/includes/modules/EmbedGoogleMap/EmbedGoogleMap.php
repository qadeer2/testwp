<?php

class DSM_EmbedGoogleMap extends ET_Builder_Module {

	public $slug       = 'dsm_embed_google_map';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name                   = esc_html__( 'Supreme Embed Google Map', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path              = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->settings_modal_toggles = array(
			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Embed Google Map', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'      => false,
			'button'     => false,
			'text'       => false,
			'background' => false,
			'height'     => array(
				'css'     => array(
					'main' => '%%order_class%% iframe',
				),
				'options' => array(
					'height' => array(
						'default'        => '320px',
						'default_tablet' => '320px',
						'default_phone'  => '320px',
					),
				),
			),
		);
	}

	public function get_fields() {
		return array(
			'address' => array(
				'label'            => esc_html__( 'Address', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'Enter the address for the embed Google Map.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => '1233 Howard St Apt 3A San Francisco, CA 94103-2775',
				'toggle_slug'      => 'main_content',
				'dynamic_content'  => 'text',
			),
			'zoom'    => array(
				'label'           => esc_html__( 'Zoom', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'toggle_slug'     => 'main_content',
				'default_unit'    => '',
				'default'         => '10',
				'allow_empty'     => false,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '22',
					'step' => '1',
				),
			),
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
		$address = $this->props['address'];
		$zoom    = $this->props['zoom'];

		$output = sprintf(
			'<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=%1$s&amp;t=m&amp;z=%2$s&amp;output=embed&amp;iwloc=near&hl=%4$s" aria-label="%3$s"></iframe>',
			rawurlencode( $address ),
			absint( $zoom ),
			esc_attr( $address ),
			esc_attr( get_locale() )
		);

		return $output;
	}
}

new DSM_EmbedGoogleMap;
