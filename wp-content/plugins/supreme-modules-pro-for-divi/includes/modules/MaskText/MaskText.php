<?php

class DSM_MaskText extends ET_Builder_Module {

	public $slug       = 'dsm_mask_text';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'Supreme Mask Text', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = '%%order_class%% .dsm-mask-text';
		// Toggle settings
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Mask Text', 'dsm-supreme-modules-pro-for-divi' ),
					'image'        => esc_html__( 'Mask Image', 'dsm-supreme-modules-pro-for-divi' ),
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
			'fonts'       => array(
				'header' => array(
					'label'             => esc_html__( 'Mask', 'dsm-supreme-modules-pro-for-divi' ),
					'css'               => array(
						'main' => '%%order_class%% .dsm-mask-text',
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
					'hide_text_color'   => true,
				),
			),
			'text'        => array(
				'use_text_orientation'  => false,
				'use_background_layout' => false,
				'css'                   => array(
					'text_shadow' => '%%order_class%%',
				),
				'options'               => array(
					'background_layout' => array(
						'default' => 'light',
					),
				),
			),
			'background'  => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
			),
			'borders'     => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%%',
							'border_styles' => '%%order_class%%',
						),
					),
				),
			),
			'text_shadow' => array(
				// Don't add text-shadow fields since they already are via font-options
				'default' => false,
			),
			'box_shadow'  => array(
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
			'mask_text'                 => array(
				'label'           => esc_html__( 'Mask Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'image'                     => array(
				'label'              => esc_html__( 'Background Image', 'et_builder' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'et_builder' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'et_builder' ),
				'update_text'        => esc_attr__( 'Set As Image', 'et_builder' ),
				'description'        => esc_html__( 'Upload an image to display image inside text.', 'et_builder' ),
				'toggle_slug'        => 'image',
				'mobile_options'     => true,
				'hover'              => 'tabs',
				'dynamic_content'    => 'image',
			),
			'image_background_size'     => array(
				'label'           => esc_html__( 'Background Image Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'cover'   => __( 'Cover', 'dsm-supreme-modules-pro-for-divi' ),
					'contain' => __( 'Fit', 'dsm-supreme-modules-pro-for-divi' ),
					'initial' => __( 'Actual Size', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'cover',
				'toggle_slug'     => 'image',
			),
			'image_background_position' => array(
				'label'           => esc_html__( 'Background Image Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'top_left'     => __( 'Top Left', 'dsm-supreme-modules-pro-for-divi' ),
					'top'          => __( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'top_right'    => __( 'Top Right', 'dsm-supreme-modules-pro-for-divi' ),
					'center_left'  => __( 'Center Left', 'dsm-supreme-modules-pro-for-divi' ),
					'center'       => __( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'center_right' => __( 'Center Right', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom_left'  => __( 'Bottom Left', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom'       => __( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom_right' => __( 'Bottom Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'center',
				'toggle_slug'     => 'image',
			),
			'image_background_repeat'   => array(
				'label'           => esc_html__( 'Background Image Repeat', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'no-repeat' => __( 'No Repeat', 'dsm-supreme-modules-pro-for-divi' ),
					'repeat'    => __( 'Repeat', 'dsm-supreme-modules-pro-for-divi' ),
					'repeat-x'  => __( 'Repeat X (horizontal)', 'dsm-supreme-modules-pro-for-divi' ),
					'repeat-y'  => __( 'Repeat Y (vertical)', 'dsm-supreme-modules-pro-for-divi' ),
					'space'     => __( 'Space', 'dsm-supreme-modules-pro-for-divi' ),
					'round'     => __( 'Round', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'no-repeat',
				'toggle_slug'     => 'image',
			),
			'heading_html_tag'          => array(
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
		);
	}

	public function get_transition_fields_css_props() {
		$fields        = parent::get_transition_fields_css_props();
		$text_selector = '%%order_class%% .dsm-mask-text';

		$fields['image'] = array(
			'background-image' => $text_selector,
		);

		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$mask_text                 = $this->props['mask_text'];
		$heading_html_tag          = $this->props['heading_html_tag'];
		$image                     = $this->props['image'];
		$image_hover               = $this->get_hover_value( 'image' );
		$image_values              = et_pb_responsive_options()->get_property_values( $this->props, 'image' );
		$image_tablet              = isset( $image_values['tablet'] ) ? $image_values['tablet'] : '';
		$image_phone               = isset( $image_values['phone'] ) ? $image_values['phone'] : '';
		$image_background_size     = $this->props['image_background_size'];
		$image_background_position = $this->props['image_background_position'];
		$image_background_repeat   = $this->props['image_background_repeat'];

		$text_selector = '%%order_class%% .dsm-mask-text';

		$image_style        = sprintf( 'background-image: url(%1$s);', esc_url( $image ) );
		$image_tablet_style = '' !== $image_tablet ? sprintf( 'background-image: url(%1$s);', esc_attr( $image_tablet ) ) : '';
		$image_phone_style  = '' !== $image_phone ? sprintf( 'background-image: url(%1$s);', esc_attr( $image_phone ) ) : '';

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => $text_selector,
				'declaration' => sprintf(
					'background-repeat: %2$s; background-position: %3$s; background-size: %4$s; %1$s -webkit-background-clip: text; -webkit-text-fill-color: transparent;',
					$image_style,
					esc_attr( $image_background_repeat ),
					str_replace( '_', ' ', esc_attr( $image_background_position ) ),
					esc_attr( $image_background_size )
				),
			)
		);

		if ( et_builder_is_hover_enabled( 'image', $this->props ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( $text_selector ),
					'declaration' => sprintf(
						'background-repeat: %2$s; background-position: %3$s; background-size: %4$s; background-image: url(%1$s); -webkit-background-clip: text; -webkit-text-fill-color: transparent;',
						esc_url( $image_hover ),
						esc_attr( $image_background_repeat ),
						str_replace( '_', ' ', esc_attr( $image_background_position ) ),
						esc_attr( $image_background_size )
					),
				)
			);
		}

		if ( '' !== $image_tablet_style ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $text_selector,
					'declaration' => $image_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $image_phone_style ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $text_selector,
					'declaration' => $image_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( '' !== $mask_text ) {
			$mask_text = sprintf(
				'<%1$s class="dsm-mask-text et_pb_module_header">%2$s</%1$s>',
				esc_attr( $heading_html_tag ),
				esc_html( $mask_text )
			);
		}

		// Render module content
		$output = sprintf(
			'%1$s',
			$mask_text
		);

		return $output;
	}
}

new DSM_MaskText;
