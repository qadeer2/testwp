<?php

class DSM_BlockRevealText extends ET_Builder_Module {

	public $slug       = 'dsm_block_reveal_text';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'Supreme Block Reveal Text', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = '%%order_class%%.dsm_block_reveal_text';
		// Toggle settings.
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content'     => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'reveal_animation' => esc_html__( 'Block Reveal Animation', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'heading_settings' => array(
						'title'    => esc_html__( 'Heading Settings', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 50,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'header' => array(
					'label'             => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
					'css'               => array(
						'main'       => "{$this->main_css_element} .dsm_block_reveal_text_header",
						'text_align' => "{$this->main_css_element}",
					),
					'font_size'         => array(
						'default' => '26px',
					),
					'line_height'       => array(
						'default' => '1em',
					),
					'letter_spacing'    => array(
						'default' => '0px',
					),
					'hide_header_level' => true,
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'text',
				),
			),
			'text'           => array(
				'use_text_orientation'  => false,
				'use_background_layout' => true,
				'css'                   => array(
					'text_shadow' => "{$this->main_css_element} .dsm_block_reveal_text_header",
				),
				'options'               => array(
					'background_layout' => array(
						'default' => 'light',
					),
				),
			),
			'background'     => array(
				'css' => array(
					'main' => "{$this->main_css_element}",
				),
			),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element}",
							'border_styles' => "{$this->main_css_element}",
						),
					),
				),
			),
			'margin_padding' => array(
				'draggable_padding' => false,
				'css'               => array(
					'padding'   => "{$this->main_css_element}",
					'margin'    => "{$this->main_css_element}",
					'important' => array( 'custom_margin' ),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => "{$this->main_css_element}",
					),
				),
			),
		);
	}

	public function get_fields() {
		return array(
			'block_reveal_text'      => array(
				'label'            => esc_html__( 'Block Reveal Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'toggle_slug'      => 'main_content',
				'default_on_front' => 'Block Reveal Text',
				'dynamic_content'  => 'text',
			),
			'heading_html_tag'       => array(
				'label'           => esc_html__( 'Heading HTLML Tag', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'h1'   => __( 'H1', 'dsm-supreme-modules-pro-for-divi' ),
					'h2'   => __( 'H2', 'dsm-supreme-modules-pro-for-divi' ),
					'h3'   => __( 'H3', 'dsm-supreme-modules-pro-for-divi' ),
					'h4'   => __( 'H4', 'dsm-supreme-modules-pro-for-divi' ),
					'h5'   => __( 'H5', 'dsm-supreme-modules-pro-for-divi' ),
					'h6'   => __( 'H6', 'dsm-supreme-modules-pro-for-divi' ),
					'div'  => __( 'div', 'dsm-supreme-modules-pro-for-divi' ),
					'span' => __( 'span', 'dsm-supreme-modules-pro-for-divi' ),
					'p'    => __( 'p', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'h2',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'heading_settings',
			),
			'block_reveal_animation' => array(
				'label'           => esc_html__( 'Block Reveal Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'lr' => __( 'Left to Right', 'dsm-supreme-modules-pro-for-divi' ),
					'rl' => __( 'Right to Left', 'dsm-supreme-modules-pro-for-divi' ),
					'tb' => __( 'Top to Bottom', 'dsm-supreme-modules-pro-for-divi' ),
					'bt' => __( 'Bottom to Top', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'lr',
				'toggle_slug'     => 'reveal_animation',
			),
			'block_reveal_color'     => array(
				'default'        => et_builder_accent_color(),
				'label'          => esc_html__( 'Block Reveal Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for the block reveal.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'reveal_animation',
				'mobile_options' => true,
			),
			'block_reveal_delay'     => array(
				'label'            => esc_html__( 'Delay', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust delay for the block reveal animation.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'reveal_animation',
				'default'          => '0.1',
				'default_on_front' => '0.1',
				'unitless'         => true,
				'allow_empty'      => false,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '5',
					'step' => '0.1',
				),
				'responsive'       => false,
				'mobile_options'   => false,
			),
			'block_reveal_viewport'  => array(
				'label'            => esc_html__( 'Animate in Viewport', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Animation when the div comes in viewport.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'reveal_animation',
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
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$block_reveal_text         = $this->props['block_reveal_text'];
		$heading_html_tag          = $this->props['heading_html_tag'];
		$block_reveal_animation    = $this->props['block_reveal_animation'];
		$block_reveal_color        = $this->props['block_reveal_color'];
		$block_reveal_color_values = et_pb_responsive_options()->get_property_values( $this->props, 'block_reveal_color' );
		$block_reveal_color_tablet = isset( $block_reveal_color_values['tablet'] ) ? $block_reveal_color_values['tablet'] : '';
		$block_reveal_color_phone  = isset( $block_reveal_color_values['phone'] ) ? $block_reveal_color_values['phone'] : '';
		$block_reveal_delay        = $this->props['block_reveal_delay'];
		$block_reveal_viewport     = $this->props['block_reveal_viewport'];

		$block_reveal_selector = '%%order_class%%.dsm_block_reveal_text .dsm_block_image_reveal_front';

		// Block Reveal Style.
		$block_reveal_color_style        = sprintf( 'background-color: %1$s;', esc_attr( $block_reveal_color ) );
		$block_reveal_color_tablet_style = '' !== $block_reveal_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $block_reveal_color_tablet ) ) : '';
		$block_reveal_color_phone_style  = '' !== $block_reveal_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $block_reveal_color_phone ) ) : '';

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => $block_reveal_selector,
				'declaration' => $block_reveal_color_style,
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => $block_reveal_selector,
				'declaration' => $block_reveal_color_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => $block_reveal_selector,
				'declaration' => $block_reveal_color_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			)
		);

		$data_attr[] = array(
			'animation' => $block_reveal_animation,
			'color'     => $block_reveal_color,
			'delay'     => $block_reveal_delay,
			'viewport'  => $block_reveal_viewport,
		);

		if ( '' !== $block_reveal_text ) {
			$block_reveal_text = sprintf(
				'<%1$s class="dsm_block_reveal_text_header et_pb_module_header">%2$s</%1$s>',
				esc_attr( $heading_html_tag ),
				et_core_esc_previously( $block_reveal_text )
			);
		}

		wp_enqueue_script( 'dsm-block-reveal-text' );

		// Render module content.
		$output = sprintf(
			'<div class="dsm_block_reveal_text_wrapper" data-dsm-block-reveal-text=%2$s>%1$s</div>',
			$block_reveal_text,
			wp_json_encode( $data_attr )
		);

		return $output;
	}
}

new DSM_BlockRevealText();
