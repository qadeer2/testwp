<?php

class DSM_ImageHoverReveal extends ET_Builder_Module {

	public $slug       = 'dsm_image_hover_reveal';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Image Hover Reveal', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content'   => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'split_settings' => esc_html__( 'Settings', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'width' => array(
						'title'    => esc_html__( 'Sizing', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 65,
					),
				),
			),
			'custom_css' => array(
				'toggles' => array(
					'animation'  => array(
						'title'    => esc_html__( 'Animation', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 90,
					),
					'attributes' => array(
						'title'    => esc_html__( 'Attributes', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 95,
					),
				),
			),
		);

	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => false,
			'margin_padding' => array(
				'css' => array(
					'important' => array( 'custom_margin' ),
				),
			),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%%',
							'border_styles' => '%%order_class%%',
						),
					),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main'         => '%%order_class%% .dsm-image-wrapper',
						'custom_style' => true,
					),
				),
			),
			'max_width'      => array(
				'options' => array(
					'max_width' => array(
						'depends_show_if' => 'off',
					),
				),
			),
			'text'           => false,
			'button'         => false,
		);
	}

	public function get_fields() {
		return array(
			'image_reveal_animation' => array(
				'default'         => 'vert-slide-down',
				'label'           => esc_html__( 'Image Reveal Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'vert-slide-down'   => esc_html__( 'Vertical Slide Down', 'dsm-supreme-modules-pro-for-divi' ),
					'vert-slide-up'     => esc_html__( 'Vertical Slide Up', 'dsm-supreme-modules-pro-for-divi' ),
					'horiz-slide-right' => esc_html__( 'Horizontal Slide Right', 'dsm-supreme-modules-pro-for-divi' ),
					'horiz-slide-left'  => esc_html__( 'Horizontal Slide Left', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'split_settings',
			),
			'src'                    => array(
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				//'default_on_front'   => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==',
				'hide_metadata'      => false,
				'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'main_content',
				'dynamic_content'    => 'image',
			),
			/*
			'split_num'              => array(
				'label'            => esc_html__( 'Split', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '5',
				'default_on_front' => '5',
				'default_unit'     => '',
				'validate_unit'    => false,
				'unitless'         => true,
				'range_settings'   => array(
					'min'  => '2',
					'max'  => '20',
					'step' => '1',
				),
				'toggle_slug'      => 'split_settings',
				'description'      => esc_html__( 'Split the number of columns or rows of the image.', 'dsm-supreme-modules-pro-for-divi' ),
			),*/
			'image_reveal_height'    => array(
				'label'            => esc_html__( 'Height', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'width',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'default'          => '260px',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '1200',
					'step' => '1',
				),
				'responsive'       => true,
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$src = $this->props['src'];
		//$split_num                       = $this->props['split_num'];
		$image_reveal_animation          = $this->props['image_reveal_animation'];
		$image_reveal_height             = $this->props['image_reveal_height'];
		$image_reveal_height_tablet      = $this->props['image_reveal_height_tablet'];
		$image_reveal_height_phone       = $this->props['image_reveal_height_phone'];
		$image_reveal_height_last_edited = $this->props['image_reveal_height_last_edited'];

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		// Handle svg image behaviour
		$src_pathinfo = pathinfo( $src );
		$is_src_svg   = isset( $src_pathinfo['extension'] ) ? 'svg' === $src_pathinfo['extension'] : false;

		// Set display block for svg image to avoid disappearing svg image
		if ( $is_src_svg ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .et_pb_image_wrap',
					'declaration' => 'display: block;',
				)
			);
		}

		if ( '' !== $src ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-image-reveal-back, %%order_class%% .splitting',
					'declaration' => sprintf(
						'background-image: url(%1$s);',
						esc_attr( $src )
					),
				)
			);
		}

		if ( '' !== $image_reveal_height_tablet || '' !== $image_reveal_height_phone || '' !== $image_reveal_height ) {
			$image_reveal_height_responsive_active = et_pb_get_responsive_status( $image_reveal_height_last_edited );

			$image_reveal_height_values = array(
				'desktop' => $image_reveal_height,
				'tablet'  => $image_reveal_height_responsive_active ? $image_reveal_height_tablet : '',
				'phone'   => $image_reveal_height_responsive_active ? $image_reveal_height_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $image_reveal_height_values, '%%order_class%% .dsm-image-reveal .splitting', 'height', $render_slug );
		}

		$output = sprintf(
			'<span class="et_pb_image_wrap %3$s"%1$s%2$s><span class="dsm-image-reveal-back"></span></span>',
			( 'horiz-slide-left' === $image_reveal_animation || 'horiz-slide-right' === $image_reveal_animation ? ' data-rows="5"' : '' ),
			( 'vert-slide-down' === $image_reveal_animation || 'vert-slide-up' === $image_reveal_animation ? ' data-columnss="5"' : '' ),
			esc_attr( $image_reveal_animation )
		);

		wp_enqueue_script( 'dsm-image-hover-reveal' );

		// Module classnames
		$class = 'dsm-image-reveal';

		// Render module content
		$output = sprintf(
			'<div%3$s class="%2$s">
				%5$s
				%4$s
				%1$s
			</div>',
			$output,
			esc_attr( $class ),
			$this->module_id(),
			$video_background,
			$parallax_image_background
		);

		return $output;

		//return $this->_render_module_wrapper( $output, $render_slug );
	}
}

new DSM_ImageHoverReveal;
