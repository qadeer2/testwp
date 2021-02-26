<?php

class DSM_Lottie extends ET_Builder_Module {

	public $slug       = 'dsm_lottie';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Lottie', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';
		// Toggle settings
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Lottie', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'text'       => false,
			'fonts'      => false,
			'background' => array(
				'css'     => array(
					'main' => '%%order_class%%',
				),
				'options' => array(
					'parallax_method' => array(
						'default' => 'off',
					),
				),
			),
			'max_width'  => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
			),
			'borders'    => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%%',
							'border_styles' => '%%order_class%%',
						),
					),
				),
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'filters'    => false,
		);
	}

	public function get_fields() {
		return array(
			'lottie_url'                => array(
				'label'              => esc_html__( 'Lottie JSON File', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'data_type'          => 'json',
				'upload_button_text' => esc_attr__( 'Upload a json file', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose a JSON file', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As JSON for the module', 'dsm-supreme-modules-pro-for-divi' ),
				'computed_affects'   => array(
					'__lottie',
				),
			),
			'lottie_loop'               => array(
				'label'            => esc_html__( 'Loop', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'on',
				'description'      => esc_html__( 'Here you can choose whether or not your Lottie will animate in loop.', 'dsm-supreme-modules-pro-for-divi' ),
				'computed_affects' => array(
					'__lottie',
				),
				'show_if_not'      => array(
					'lottie_play_on_hover' => 'on',
				),

			),
			'loop_no_times'             => array(
				'label'            => esc_html__( 'Number of times', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'validate_unit'    => false,
				'unitless'         => true,
				'description'      => esc_html__( 'This option is only available if Yes is selected for Loop. Enter the number of times you wish to have the animation loop before stopping.', 'dsm-supreme-modules-pro-for-divi' ),
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '10',
					'step' => '1',
				),
				'show_if'          => array(
					'lottie_loop' => 'on',
				),
				'show_if_not'      => array(
					'lottie_play_on_hover' => 'on',
				),
				'computed_affects' => array(
					'__lottie',
				),
			),
			/*
			'lottie_autoplay'           => array(
				'label'            => esc_html__( 'Autoplay', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'on',
				'description'      => esc_html__( 'Here you can choose whether or not your Lottie will autoplay on load.', 'dsm-supreme-modules-pro-for-divi' ),
				'computed_affects' => array(
					'__lottie',
				),
			),*/
			'lottie_delay'              => array(
				'label'            => esc_html__( 'Delay', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default_on_front' => '0ms',
				'validate_unit'    => true,
				'allowed_units'    => array( 'ms' ),
				'description'      => esc_html__( 'Delay the lottie animation (in ms).', 'dsm-supreme-modules-pro-for-divi' ),
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '8000',
					'step' => '1',
				),
				'show_if'          => array(
					'lottie_autoplay' => 'on',
				),
				'computed_affects' => array(
					'__lottie',
				),
			),
			'lottie_direction'          => array(
				'label'            => esc_html__( 'Direction', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'1'  => esc_html__( 'Normal', 'dsm-supreme-modules-pro-for-divi' ),
					'-1' => esc_html__( 'Reverse', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => '1',
				'computed_affects' => array(
					'__lottie',
				),
			),
			'lottie_speed'              => array(
				'label'            => esc_html__( 'Speed (More is faster)', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default_on_front' => '1',
				'validate_unit'    => false,
				'unitless'         => true,
				'description'      => esc_html__( 'The speed of the animation.', 'dsm-supreme-modules-pro-for-divi' ),
				'range_settings'   => array(
					'min'  => '0.1',
					'max'  => '2.5',
					'step' => '0.1',
				),
				'computed_affects' => array(
					'__lottie',
				),
			),
			'lottie_play_on_hover'      => array(
				'label'            => esc_html__( 'Trigger', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'description'      => esc_html__( 'Here you can choose whether or not your Lottie will animate on hover.', 'dsm-supreme-modules-pro-for-divi' ),
				'computed_affects' => array(
					'__lottie',
				),
			),
			'lottie_trigger_method'     => array(
				'label'            => esc_html__( 'Trigger Method', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'on_hover'  => esc_html__( 'Play Animation  On Hover/Mouse Over', 'dsm-supreme-modules-pro-for-divi' ),
					'on_click'  => esc_html__( 'Play Animation On Click', 'dsm-supreme-modules-pro-for-divi' ),
					'on_scroll' => esc_html__( 'Play Animation On Scroll', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'on_hover',
				'show_if'          => array(
					'lottie_play_on_hover' => 'on',
				),
				'computed_affects' => array(
					'__lottie',
				),
			),
			'lottie_scroll'             => array(
				'label'            => esc_html__( 'Relative To', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'page' => esc_html__( 'Entire Page', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'on_hover',
				'show_if'          => array(
					'lottie_play_on_hover'  => 'on',
					'lottie_trigger_method' => 'on_scroll',
				),
				'computed_affects' => array(
					'__lottie',
				),
			),
			'lottie_mouseout_action'    => array(
				'label'            => esc_html__( 'On Mouseout Action', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'no_action' => esc_html__( 'No Action', 'dsm-supreme-modules-pro-for-divi' ),
					'stop'      => esc_html__( 'Stop', 'dsm-supreme-modules-pro-for-divi' ),
					'pause'     => esc_html__( 'Pause', 'dsm-supreme-modules-pro-for-divi' ),
					'reverse'   => esc_html__( 'Reverse', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'no_action',
				'show_if'          => array(
					'lottie_play_on_hover'  => 'on',
					'lottie_trigger_method' => 'on_hover',
				),
				'computed_affects' => array(
					'__lottie',
				),
			),
			'lottie_animation_viewport' => array(
				'label'            => esc_html__( 'Animate in Viewport', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Animation when the element is in viewport.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'default'          => '80%',
				'default_on_front' => '80%',
				'unitless'         => false,
				'allow_empty'      => false,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'responsive'       => false,
				'mobile_options'   => false,
				'computed_affects' => array(
					'__lottie',
				),
				'show_if'          => array(
					'lottie_play_on_hover' => 'off',
				),
			),
			'__lottie'                  => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DSM_Lottie', 'getLottie' ),
				'computed_depends_on' => array(
					'lottie_url',
					'lottie_loop',
					'loop_no_times',
					'lottie_delay',
					'lottie_direction',
					'lottie_speed',
					'lottie_play_on_hover',
					'lottie_trigger_method',
					'lottie_scroll',
					'lottie_mouseout_action',
					'lottie_animation_viewport',
				),
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$lottie_url    = $this->props['lottie_url'];
		$lottie_loop   = $this->props['lottie_loop'];
		$loop_no_times = $this->props['loop_no_times'];
		// $lottie_autoplay           = $this->props['lottie_autoplay'];
		$lottie_delay              = $this->props['lottie_delay'];
		$lottie_direction          = $this->props['lottie_direction'];
		$lottie_speed              = $this->props['lottie_speed'];
		$lottie_play_on_hover      = $this->props['lottie_play_on_hover'];
		$lottie_trigger_method     = $this->props['lottie_trigger_method'];
		$lottie_scroll             = $this->props['lottie_scroll'];
		$lottie_mouseout_action    = $this->props['lottie_mouseout_action'];
		$lottie_animation_viewport = $this->props['lottie_animation_viewport'];

		wp_enqueue_script( 'dsm-lottie-module' );

		$data_attrs[] = array(
			'path'      => $lottie_url,
			'loop'      => 'off' !== $lottie_loop ? true : false,
			'loop_no'   => $loop_no_times,
			'delay'     => $lottie_delay,
			'direction' => $lottie_direction,
			'speed'     => $lottie_speed,
			'hover'     => 'off' !== $lottie_play_on_hover ? true : false,
			'trigger'   => $lottie_trigger_method,
			'scroll'    => $lottie_scroll,
			'mouseout'  => $lottie_mouseout_action,
			'viewport'  => $lottie_animation_viewport,
		);

		// Render module content.
		$output = sprintf(
			'<div class="dsm_lottie_wrapper" data-percent-viewport="" data-params=%1$s>
			</div>',
			wp_json_encode( $data_attrs )
		);

		return $output;
	}
}

new DSM_Lottie();
