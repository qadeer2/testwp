<?php

class DSM_FloatingMultiImagesChild extends ET_Builder_Module {

	public $slug       = 'dsm_floating_multi_images_child';
	public $vb_support = 'on';
	public $type       = 'child';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com',
	);

	public function init() {
		$this->name                        = esc_html__( 'Floating Multi Images', 'dsm-supreme-modules-pro-for-divi' );
		$this->advanced_setting_title_text = esc_html__( 'Image Item', 'dsm-supreme-modules-pro-for-divi' );
		$this->settings_text               = esc_html__( 'Image Settings', 'dsm-supreme-modules-pro-for-divi' );
		$this->child_title_var             = 'admin_title';

		// Toggle settings.
		$this->settings_modal_toggles = array(
			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'max_width'       => array(
				'css'     => array(
					'main' => '%%order_class%%.et_pb_module',
				),
				'options' => array(
					'max_width' => array(
						'default'         => '50%',
						'depends_show_if' => 'off',
					),
				),
			),
			'borders'         => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%% img',
							'border_styles' => '%%order_class%% img',
						),
					),
				),
			),
			'box_shadow'      => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%% img',
					),
				),
			),
			'fonts'           => false,
			'text'            => false,
			'button'          => false,
			'position_fields' => false,
		);
	}

	public function get_fields() {
		return array(
			'admin_title'      => array(
				'label'       => esc_html__( 'Admin Label', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the floating image item in the builder for easy identification.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug' => 'admin_label',
			),
			'src'              => array(
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'hide_metadata'      => true,
				'affects'            => array(
					'alt',
				),
				'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'main_content',
				'dynamic_content'    => 'image',
			),
			'alt'              => array(
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
			'horizontal_align' => array(
				'label'           => esc_html__( 'Horizontal Align', 'dsm-supreme-modules-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'width',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '0%',
				'default_unit'    => '%',
				'range_settings'  => array(
					'min'  => '-150',
					'max'  => '150',
					'step' => '1',
				),
				'responsive'      => true,
			),
			'vertical_align'   => array(
				'label'           => esc_html__( 'Vertical Align', 'dsm-supreme-modules-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'width',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '0%',
				'default_unit'    => '%',
				'range_settings'  => array(
					'min'  => '-150',
					'max'  => '150',
					'step' => '1',
				),
				'responsive'      => true,
			),
			'show_in_lightbox'            => array(
				'label'            => esc_html__( 'Open in Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'toggle_slug'      => 'link_options',
				'description'      => esc_html__( 'Here you can choose whether or not the image should open in Lightbox. Note: if you select to open the image in Lightbox, url options below will be ignored.', 'dsm-supreme-modules-pro-for-divi' ),
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$src                          = $this->props['src'];
		$alt                          = $this->props['alt'];
		$horizontal_align             = $this->props['horizontal_align'];
		$horizontal_align_tablet      = $this->props['horizontal_align_tablet'];
		$horizontal_align_phone       = $this->props['horizontal_align_phone'];
		$horizontal_align_last_edited = $this->props['horizontal_align_last_edited'];
		$vertical_align               = $this->props['vertical_align'];
		$vertical_align_tablet        = $this->props['vertical_align_tablet'];
		$vertical_align_phone         = $this->props['vertical_align_phone'];
		$vertical_align_last_edited   = $this->props['vertical_align_last_edited'];
		$show_in_lightbox             = $this->props['show_in_lightbox'];
		// Handle svg image behaviour.
		$src_pathinfo = pathinfo( $src );
		$is_src_svg   = isset( $src_pathinfo['extension'] ) ? 'svg' === $src_pathinfo['extension'] : false;

		if ( '' !== $horizontal_align_tablet || '' !== $horizontal_align_phone || '' !== $horizontal_align ) {
			$horizontal_align_responsive_active = et_pb_get_responsive_status( $horizontal_align_last_edited );

			$horizontal_align_values = array(
				'desktop' => $horizontal_align,
				'tablet'  => $horizontal_align_responsive_active ? $horizontal_align_tablet : '',
				'phone'   => $horizontal_align_responsive_active ? $horizontal_align_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $horizontal_align_values, '%%order_class%%', 'left', $render_slug );
		}

		if ( '' !== $vertical_align_tablet || '' !== $vertical_align_phone || '' !== $vertical_align ) {
			$vertical_align_responsive_active = et_pb_get_responsive_status( $vertical_align_last_edited );

			$vertical_align_values = array(
				'desktop' => $vertical_align,
				'tablet'  => $vertical_align_responsive_active ? $vertical_align_tablet : '',
				'phone'   => $vertical_align_responsive_active ? $vertical_align_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $vertical_align_values, '%%order_class%%', 'top', $render_slug );
		}

		// Set display block for svg image to avoid disappearing svg image.
		if ( $is_src_svg ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'declaration' => 'width: 100%;',
				)
			);
		}

		$images_output = sprintf(
			'<img src="%1$s" alt="%2$s" />',
			esc_url( $src ),
			esc_attr( $alt )
		);

		if ( 'on' === $show_in_lightbox ) {
			$images_output = sprintf(
				'<a href="%1$s" class="et_pb_lightbox_image dsm-image-lightbox" data-mfp-src="%1$s"><img src="%1$s" alt="%2$s" /></a>',
				esc_url( $src ),
				esc_attr( $alt )
			);
			if ( ! wp_script_is( 'dsm-magnific-popup-image', 'enqueued' ) ) {
				wp_enqueue_script( 'dsm-magnific-popup-image' );
			}
		}

		$output = sprintf(
			'%1$s',
			$images_output
		);

		return $output;

	}
}

new DSM_FloatingMultiImagesChild();
