<?php

class DSM_ShuffleLetters extends ET_Builder_Module {

	public $slug       = 'dsm_shuffle_letters';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);


	public function init() {
		$this->name      = esc_html__( 'Supreme Shuffle Letters', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';
		// Toggle settings
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content'   => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
					'shuffle_option' => esc_html__( 'Shuffle Letters Options', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'shuffle_styles' => esc_html__( 'Shuffle Letters Styles', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'      => array(
				'before' => array(
					'label'          => esc_html__( 'Before', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-before-shuffle-text',
					),
					'font_size'      => array(
						'default' => '30px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
				),
				'header' => array(
					'label'          => esc_html__( 'Shuffle', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% h1.et_pb_module_header, %%order_class%% h2.et_pb_module_header, %%order_class%% h3.et_pb_module_header, %%order_class%% h4.et_pb_module_header, %%order_class%% h5.et_pb_module_header, %%order_class%% h6.et_pb_module_header',
					),
					'font_size'      => array(
						'default' => '30px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'header_level'   => array(
						'default' => 'h1',
					),
				),
				'after'  => array(
					'label'          => esc_html__( 'After', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-after-shuffle-text',
					),
					'font_size'      => array(
						'default' => '30px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
				),
			),
			'text'       => array(
				'use_text_orientation'  => true,
				'use_background_layout' => true,
				'css'                   => array(
					'text_shadow' => '%%order_class%%',
				),
				'options'               => array(
					'background_layout' => array(
						'default' => 'light',
					),
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
		);
	}

	public function get_fields() {
		return array(
			'before_shuffle_text'   => array(
				'label'           => esc_html__( 'Before Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'title'                 => array(
				'label'            => esc_html__( 'Shuffle Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'The title of your Shuffle Effect.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'Divi Shuffle Letters',
				'toggle_slug'      => 'main_content',
				'dynamic_content'  => 'text',
			),
			'before_new_line'       => array(
				'label'           => esc_html__( 'Shuffle Text On a New line', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'description'     => esc_html__( 'If enabled, your shuffle text will appear on the next line after the before text.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
			),
			'after_shuffle_text'    => array(
				'label'           => esc_html__( 'After Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'after_new_line'        => array(
				'label'           => esc_html__( 'After Text On a New line', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'description'     => esc_html__( 'If enabled, your after text will appear on the next line after the Shuffle text.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
			),
			'shuffle_text_speed'    => array(
				'label'           => esc_html__( 'Shuffle Speed (in s)', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'default'         => '0.075s',
				'default_unit'    => 's',
				'allowed_units'   => array( 's' ),
				'validate_unit'   => true,
				'range_settings'  => array(
					'min'  => '0.01',
					'max'  => '2',
					'step' => '0.001',
				),
				'toggle_slug'     => 'shuffle_option',
			),
			'shuffle_text_duration' => array(
				'label'           => esc_html__( 'Duration (in s)', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'default'         => '3.5s',
				'default_unit'    => 's',
				'allowed_units'   => array( 's' ),
				'validate_unit'   => true,
				'range_settings'  => array(
					'min'  => '0.1',
					'max'  => '20',
					'step' => '0.1',
				),
				'description'     => esc_html__( 'Text will be revealed after shuffle completed.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'shuffle_option',
			),
			'shuffle_text_change'   => array(
				'label'            => esc_html__( 'Overwrite Random Shuffle Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( "Enter only if you want to have your own random character text. Use without space e.g 'Shuffle Text'", 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'shuffle_option',
				'default_on_front' => 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz~!@#$%^&*()-+=[]{}|;:,./<>?',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$before_shuffle_text   = $this->props['before_shuffle_text'];
		$title                 = $this->props['title'];
		$before_new_line       = $this->props['before_new_line'];
		$after_shuffle_text    = $this->props['after_shuffle_text'];
		$after_new_line        = $this->props['after_new_line'];
		$shuffle_text_speed    = $this->props['shuffle_text_speed'];
		$shuffle_text_duration = $this->props['shuffle_text_duration'];
		$shuffle_text_change   = $this->props['shuffle_text_change'];

		$background_layout = $this->props['background_layout'];
		$header_level      = $this->props['header_level'];

		if ( '' !== $before_shuffle_text ) {
			$before_shuffle_text = sprintf(
				'<span class="dsm-before-shuffle-text%2$s">%1$s%3$s</span>',
				esc_html( $before_shuffle_text ),
				( 'on' === $before_new_line ? ' dsm-text-newline' : '' ),
				( 'on' === $before_new_line ? '' : esc_html( '&nbsp;' ) )
			);
		}

		if ( '' !== $after_shuffle_text ) {
			$after_shuffle_text = sprintf(
				'<span class="dsm-after-shuffle-text%2$s">%3$s%1$s</span>',
				esc_html( $after_shuffle_text ),
				( 'on' === $after_new_line ? ' dsm-text-newline' : '' ),
				( 'on' === $after_new_line ? '' : esc_html( '&nbsp;' ) )
			);
		}

		if ( '' !== $title ) {
			$title = sprintf(
				'<%1$s class="dsm-shuffle-letters et_pb_module_header">%2$s<span class="dsm-shuffle-text" data-dsm-shuffle-text="%5$s" data-dsm-shuffle-speed="%6$s" data-dsm-shuffle-duration="%7$s">%4$s</span>%3$s</%1$s>',
				et_pb_process_header_level( $header_level, 'h1' ),
				$before_shuffle_text,
				$after_shuffle_text,
				esc_html( $title ),
				( '' !== $shuffle_text_change ? esc_html( $shuffle_text_change ) : '' ),
				esc_attr( $shuffle_text_speed ),
				esc_attr( $shuffle_text_duration )
			);
		}

		$this->add_classname(
			array(
				"et_pb_bg_layout_{$background_layout}",
				$this->get_text_orientation_classname(),
			)
		);

		wp_enqueue_script( 'dsm-shuffle-letters' );

		$output = sprintf(
			'%1$s',
			$title
		);

		return $output;
	}
}

new DSM_ShuffleLetters();
