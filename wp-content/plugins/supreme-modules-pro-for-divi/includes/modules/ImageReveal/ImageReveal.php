<?php

class DSM_ImageReveal extends ET_Builder_Module {

	public $slug       = 'dsm_image_reveal';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name                   = esc_html__( 'Supreme Image Text Reveal', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path              = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'overlay'   => esc_html__( 'Overlay', 'dsm-supreme-modules-pro-for-divi' ),
					'alignment' => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'width'     => array(
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
			'fonts'          => array(
				'reveal_text' => array(
					'label'          => esc_html__( 'Reveal', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% h1.et_pb_module_header, %%order_class%% h2.et_pb_module_header, %%order_class%% h3.et_pb_module_header, %%order_class%% h4.et_pb_module_header, %%order_class%% h5.et_pb_module_header, %%order_class%% h6.et_pb_module_header',
					),
					'font_size'      => array(
						'default' => '22px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'header_level'   => array(
						'default' => 'h3',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'important' => array( 'custom_margin' ),
				),
			),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .et_pb_image_wrap',
							'border_styles' => '%%order_class%% .et_pb_image_wrap',
						),
					),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main'         => '%%order_class%% .et_pb_image_wrap',
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
			'text'           => array(
				'use_background_layout' => true,
				'use_text_orientation'  => true,
				'css'                   => array(
					'main' => '%%order_class%% .dsm-image-reveal-text',
				),
				'options'               => array(
					'background_layout' => array(
						'default_on_front' => 'dark',
					),
					'text_orientation'  => array(
						'default_on_front' => 'center',
					),
				),
			),
			'button'         => false,
		);
	}

	public function get_fields() {
		$dsm_animation_type_list = array(
			'fadeIn'            => esc_html__( 'fadeIn', 'et_builder' ),
			'bounce'            => esc_html__( 'bounce', 'et_builder' ),
			'flash'             => esc_html__( 'flash', 'et_builder' ),
			'pulse'             => esc_html__( 'pulse', 'et_builder' ),
			'rubberBand'        => esc_html__( 'rubberBand', 'et_builder' ),
			'shake'             => esc_html__( 'shake', 'et_builder' ),
			'swing'             => esc_html__( 'swing', 'et_builder' ),
			'tada'              => esc_html__( 'tada', 'et_builder' ),
			'wobble'            => esc_html__( 'wobble', 'et_builder' ),
			'jello'             => esc_html__( 'jello', 'et_builder' ),
			'bounceIn'          => esc_html__( 'bounceIn', 'et_builder' ),
			'bounceInDown'      => esc_html__( 'bounceInDown', 'et_builder' ),
			'bounceInLeft'      => esc_html__( 'bounceInLeft', 'et_builder' ),
			'bounceInRight'     => esc_html__( 'bounceInRight', 'et_builder' ),
			'bounceInUp'        => esc_html__( 'bounceInUp', 'et_builder' ),
			'fadeInDown'        => esc_html__( 'fadeInDown', 'et_builder' ),
			'fadeInDownBig'     => esc_html__( 'fadeInDownBig', 'et_builder' ),
			'fadeInLeft'        => esc_html__( 'fadeInLeft', 'et_builder' ),
			'fadeInLeftBig'     => esc_html__( 'fadeInLeftBig', 'et_builder' ),
			'fadeInRight'       => esc_html__( 'fadeInRight', 'et_builder' ),
			'fadeInRightBig'    => esc_html__( 'fadeInRightBig', 'et_builder' ),
			'fadeInDown'        => esc_html__( 'fadeInDown', 'et_builder' ),
			'fadeInDownBig'     => esc_html__( 'fadeInDownBig', 'et_builder' ),
			'fadeInUp'          => esc_html__( 'fadeInUp', 'et_builder' ),
			'fadeInUpBig'       => esc_html__( 'fadeInUpBig', 'et_builder' ),
			'slideInUp'         => esc_html__( 'slideInUp', 'et_builder' ),
			'slideInDown'       => esc_html__( 'slideInDown', 'et_builder' ),
			'slideInLeft'       => esc_html__( 'slideInLeft', 'et_builder' ),
			'slideInRight'      => esc_html__( 'slideInRight', 'et_builder' ),
			'flip'              => esc_html__( 'flip', 'et_builder' ),
			'flipInX'           => esc_html__( 'flipInX', 'et_builder' ),
			'flipInY'           => esc_html__( 'flipInY', 'et_builder' ),
			'rotateIn'          => esc_html__( 'rotateIn', 'et_builder' ),
			'rotateInDownLeft'  => esc_html__( 'rotateInDownLeft', 'et_builder' ),
			'rotateInDownRight' => esc_html__( 'rotateInDownRight', 'et_builder' ),
			'rotateInUpLeft'    => esc_html__( 'rotateInUpLeft', 'et_builder' ),
			'rotateInUpRight'   => esc_html__( 'rotateInUpRight', 'et_builder' ),
			'zoomIn'            => esc_html__( 'zoomIn', 'et_builder' ),
			'zoomInDown'        => esc_html__( 'zoomInDown', 'et_builder' ),
			'zoomInLeft'        => esc_html__( 'zoomInLeft', 'et_builder' ),
			'zoomInRight'       => esc_html__( 'zoomInRight', 'et_builder' ),
			'zoomInUp'          => esc_html__( 'zoomInUp', 'et_builder' ),
			'lightSpeedIn'      => esc_html__( 'lightSpeedIn', 'et_builder' ),
			'rollIn'            => esc_html__( 'rollIn', 'et_builder' ),
			'hinge'             => esc_html__( 'hinge', 'et_builder' ),
		);
		return array(
			'reveal_text'             => array(
				'label'           => esc_html__( 'Reveal Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'src'                     => array(
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'hide_metadata'      => false,
				'affects'            => array(
					'alt',
					'title_text',
				),
				'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'main_content',
				'dynamic_content'    => 'image',
			),
			'alt'                     => array(
				'label'           => esc_html__( 'Image Alternative Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'on',
				'depends_on'      => array(
					'src',
				),
				'description'     => esc_html__( 'This defines the HTML ALT text. A short description of your image can be placed here.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),
			'title_text'              => array(
				'label'           => esc_html__( 'Image Title Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'on',
				'depends_on'      => array(
					'src',
				),
				'description'     => esc_html__( 'This defines the HTML Title text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),

			'reveal_text_animation'   => array(
				'label'            => esc_html__( 'Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => $dsm_animation_type_list,
				'default'          => 'fadeIn',
				'default_on_front' => 'fadeIn',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'animation',
			),

			// Reveal Overlay
			'reveal_overlay_color'    => array(
				'label'        => esc_html__( 'Reveal Overlay Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#1fe0ba',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'overlay',
				'description'  => esc_html__( 'Here you can define a custom color for the overlay', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'align'                   => array(
				'label'            => esc_html__( 'Image Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text_align',
				'option_category'  => 'layout',
				'options'          => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'default_on_front' => 'left',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'alignment',
				'description'      => esc_html__( 'Here you can choose the image alignment.', 'dsm-supreme-modules-pro-for-divi' ),
				'options_icon'     => 'module_align',
			),
			'force_fullwidth'         => array(
				'label'            => esc_html__( 'Force Fullwidth', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'width',
				'affects'          => array(
					'max_width',
				),
			),
			'always_center_on_mobile' => array(
				'label'            => esc_html__( 'Always Center Image On Mobile', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'on',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'alignment',
			),
		);
	}

	public function get_alignment() {
		$alignment = isset( $this->props['align'] ) ? $this->props['align'] : '';

		return et_pb_get_alignment( $alignment );
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$src                     = $this->props['src'];
		$alt                     = $this->props['alt'];
		$title_text              = $this->props['title_text'];
		$align                   = $this->get_alignment();
		$force_fullwidth         = $this->props['force_fullwidth'];
		$always_center_on_mobile = $this->props['always_center_on_mobile'];
		$animation_style         = $this->props['animation_style'];
		$text_orientation        = $this->props['text_orientation'];
		$background_layout       = $this->props['background_layout'];
		$reveal_text             = $this->props['reveal_text'];
		$reveal_text_animation   = $this->props['reveal_text_animation'];
		$reveal_overlay_color    = $this->props['reveal_overlay_color'];
		$header_level            = $this->props['reveal_text_level'];

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		// Handle svg image behaviour
		$src_pathinfo = pathinfo( $src );
		$is_src_svg   = isset( $src_pathinfo['extension'] ) ? 'svg' === $src_pathinfo['extension'] : false;

		if ( 'on' === $force_fullwidth ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'declaration' => 'max-width: 100% !important;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .et_pb_image_wrap, %%order_class%% img',
					'declaration' => 'width: 100%;',
				)
			);
		}

		if ( ! $this->_is_field_default( 'align', $align ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-image-wrapper',
					'declaration' => sprintf(
						'text-align: %1$s;',
						esc_html( $align )
					),
				)
			);
		}

		if ( 'center' !== $align ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'declaration' => sprintf(
						'margin-%1$s: 0;',
						esc_html( $align )
					),
				)
			);
		}

		if ( 'fadeInDown' !== $reveal_text_animation ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm-image-reveal-hover:hover .dsm-image-reveal-text .char',
					'declaration' => sprintf(
						'animation: %1$s 0.2s both; animation-delay: calc(30ms * var(--char-index));',
						esc_attr( $reveal_text_animation )
					),
				)
			);
		}

		if ( $reveal_overlay_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-image-reveal-overlay',
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_html( $reveal_overlay_color )
					),
				)
			);
		}

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

		if ( '' !== $reveal_text ) {
			$reveal_text = sprintf( '<div class="dsm-image-reveal-text-wrapper"><%1$s class="dsm-image-reveal-text et_pb_module_header et_pb_text_align_%3$s" data-splitting>%2$s</%1$s></div>', et_pb_process_header_level( $header_level, 'h3' ), $reveal_text, esc_attr( $text_orientation ) );
		}

		$output = sprintf(
			'<div class="dsm-image-wrapper"><span class="et_pb_image_wrap"><div class="dsm-image-reveal-overlay"></div><img src="%1$s" alt="%2$s"%3$s />%4$s</span></div>',
			esc_attr( $src ),
			esc_attr( $alt ),
			( '' !== $title_text ? sprintf( ' title="%1$s"', esc_attr( $title_text ) ) : '' ),
			$reveal_text
		);

		wp_enqueue_script( 'dsm-gsap' );
		wp_enqueue_script( 'dsm-image-text-reveal' );

		// Module classnames
		$class = "dsm-image-reveal et_pb_bg_layout_{$background_layout}";
		if ( ! in_array( $animation_style, array( '', 'none' ) ) ) {
			$this->add_classname( 'et-waypoint' );
		}

		if ( 'on' === $always_center_on_mobile ) {
			$class .= ' et_always_center_on_mobile';
		}

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

		// return $this->_render_module_wrapper( $output, $render_slug );
	}
}

new DSM_ImageReveal();
