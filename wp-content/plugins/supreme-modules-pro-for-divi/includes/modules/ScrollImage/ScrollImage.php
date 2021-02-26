<?php

class DSM_Scroll_Image extends ET_Builder_Module {

	public $slug       = 'dsm_scroll_image';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Scroll Image', 'dsm-supreme-modules-pro-for-divi' );
		$this->plural    = esc_html__( 'Supreme Scroll Images', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'link'         => esc_html__( 'Link', 'dsm-supreme-modules-pro-for-divi' ),
					'settings'     => esc_html__( 'Scroll Settings', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'overlay'   => esc_html__( 'Overlay', 'dsm-supreme-modules-pro-for-divi' ),
					'lightbox'  => esc_html__( 'Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
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
				'overlay' => array(
					'css'             => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .et_overlay',
							'border_styles' => '%%order_class%% .et_overlay',
						),
					),
					'label_prefix'    => esc_html__( 'Overlay', 'et_builder' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'overlay',
					'depends_on'      => array( 'use_overlay' ),
					'depends_show_if' => 'on',
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main'         => '%%order_class%%',
						'custom_style' => true,
					),
				),
			),
			'height'         => array(
				'css'     => array(
					'main' => '%%order_class%% .dsm-scroll-image-wrapper',
				),
				'options' => array(
					'height' => array(
						'default' => '320px',
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
			'fonts'          => false,
			'text'           => false,
			'button'         => false,
			'link_options'   => false,
		);
	}

	public function get_fields() {
		return array(
			'src'                            => array(
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'hide_metadata'      => true,
				'affects'            => array(
					'alt',
					'title_text',
				),
				'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'main_content',
				'dynamic_content'    => 'image',
			),
			'alt'                            => array(
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
			'title_text'                     => array(
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
			'show_in_lightbox'               => array(
				'label'            => esc_html__( 'Open in Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'affects'          => array(
					'url',
					'url_new_window',
					'show_lightbox_other_img',
					'lightbox_close_color',
					'lightbox_max_width',
				),
				'toggle_slug'      => 'link',
				'description'      => esc_html__( 'Here you can choose whether or not the image should open in Lightbox. Note: if you select to open the image in Lightbox, url options below will be ignored.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'show_lightbox_other_img'        => array(
				'label'            => esc_html__( 'Use Other Lightbox Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'affects'          => array(
					'show_lightbox_other_img_src',
				),
				'toggle_slug'      => 'link',
				'description'      => esc_html__( 'Here you can choose whether you want to have another image should open in Lightbox.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'show_lightbox_other_img_src'    => array(
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an Lightbox image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Lightbox Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Lightbox Image', 'dsm-supreme-modules-pro-for-divi' ),
				'hide_metadata'      => true,
				'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'link',
				'dynamic_content'    => 'image',
			),
			'lightbox_close_color'           => array(
				'label'           => esc_html__( 'Close Color', 'dsm-supreme-modules-pro-for-divi' ),
				'description'     => esc_html__( 'Here you can define a custom color for the lightbox close button.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'default'         => 'rgba(255,255,255,0.2)',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'lightbox',
				'hover'           => 'tabs',
				'depends_show_if' => 'on',
			),
			'lightbox_max_width'             => array(
				'label'           => esc_html__( 'Max Width', 'dsm-supreme-modules-pro-for-divi' ),
				'description'     => esc_html__( 'Setting a maximum width will prevent your lightbox from ever surpassing the defined width value. Maximum width can be used in combination with the standard width setting. Maximum width supersedes the normal width value.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'default'         => 'none',
				'default_tablet'  => 'none',
				'default_unit'    => 'px',
				'allowed_values'  => et_builder_get_acceptable_css_string_values( 'max-width' ),
				'range_settings'  => array(
					'min'  => '100',
					'max'  => '1200',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'lightbox',
				'mobile_options'  => true,
				'depends_show_if' => 'on',
			),
			'url'                            => array(
				'label'           => esc_html__( 'Image Link URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'off',
				'description'     => esc_html__( 'If you would like your image to be a link, input your destination URL here. No link will be created if this field is left blank.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'link',
				'dynamic_content' => 'url',
			),
			'url_new_window'                 => array(
				'label'            => esc_html__( 'Image Link Target', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'depends_show_if'  => 'off',
				'toggle_slug'      => 'link',
				'description'      => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'dsm-supreme-modules-pro-for-divi' ),
				'dynamic_content'  => 'url',
			),
			'use_video_popup'                => array(
				'label'            => esc_html__( 'Use as Video Popup', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'link',
				'description'      => esc_html__( 'Put the Video link on the Image URL. Copy the video URL link and paste it here. Support: YouTube, Vimeo and Dailymotion.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'off',
				'show_if_not'      => array(
					'show_in_lightbox' => 'on',
				),
				'affects'          => array(
					'lightbox_close_color',
					'lightbox_max_width',
				),
			),
			'scroll_image_speed'             => array(
				'label'            => esc_html__( 'Scroll Speed (in s)', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'settings',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'default'          => '10s',
				'default_unit'     => 's',
				'default_on_front' => '10s',
				'allowed_units'    => array( 's' ),
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '30',
					'step' => '1',
				),
			),
			/*
			'scroll_image_direction' => array(
				'label'           => esc_html__( 'Scroll Direction', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'vertical'  => esc_html__( 'Vertical', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'settings',
				'description'     => esc_html__( 'Here you can choose whether your image should scroll in vertical.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front'=> 'vertical',
			),*/
			'scroll_image_reverse_direction' => array(
				'label'            => esc_html__( 'Scroll Reverse Direction', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'settings',
				'default_on_front' => 'off',
			),
			'use_overlay'                    => array(
				'label'            => esc_html__( 'Image Overlay', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'affects'          => array(
					'border_radii_overlay',
					'border_styles_overlay',
					'overlay_color',
					'use_icon',
					'overlay_on_hover',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'overlay',
				'description'      => esc_html__( 'If enabled, an overlay color and icon will be displayed when a visitors hovers over the image', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'overlay_color'                  => array(
				'label'           => esc_html__( 'Overlay Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'Here you can define a custom color for the overlay', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'use_icon'                       => array(
				'label'            => esc_html__( 'Use Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'on',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'overlay',
				'affects'          => array(
					'overlay_icon_color',
					'hover_icon',
				),
				'description'      => esc_html__( 'If enabled, icon will only show up.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'overlay_icon_color'             => array(
				'label'           => esc_html__( 'Overlay Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'Here you can define a custom color for the overlay icon', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'hover_icon'                     => array(
				'label'           => esc_html__( 'Icon Picker', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'configuration',
				'class'           => array( 'et-pb-font-icon' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'default'         => 'P',
				'description'     => esc_html__( 'Here you can define a custom icon for the overlay', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'overlay_on_hover'               => array(
				'label'            => esc_html__( 'Show Overlay On Hover', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'on',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'overlay',
				'description'      => esc_html__( 'If enabled, overlay will only show on hover.', 'dsm-supreme-modules-pro-for-divi' ),
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$src                         = $this->props['src'];
		$alt                         = $this->props['alt'];
		$title_text                  = $this->props['title_text'];
		$url                         = $this->props['url'];
		$url_new_window              = $this->props['url_new_window'];
		$show_in_lightbox            = $this->props['show_in_lightbox'];
		$overlay_icon_color          = $this->props['overlay_icon_color'];
		$overlay_color               = $this->props['overlay_color'];
		$use_icon                    = $this->props['use_icon'];
		$hover_icon                  = $this->props['hover_icon'];
		$use_overlay                 = $this->props['use_overlay'];
		$overlay_on_hover            = $this->props['overlay_on_hover'];
		$animation_style             = $this->props['animation_style'];
		$box_shadow_style            = $this->props['box_shadow_style'];
		$show_lightbox_other_img     = $this->props['show_lightbox_other_img'];
		$show_lightbox_other_img_src = $this->props['show_lightbox_other_img_src'];
		$use_video_popup             = $this->props['use_video_popup'];
		$hover                       = et_pb_hover_options();
		$lightbox_max_width_values   = et_pb_responsive_options()->get_property_values( $this->props, 'lightbox_max_width' );
		$lightbox_close_color_values = et_pb_responsive_options()->get_property_values( $this->props, 'lightbox_close_color' );
		$scroll_image_speed          = $this->props['scroll_image_speed'];
		//$scroll_image_direction = $this->props['scroll_image_direction'];
		$scroll_image_reverse_direction = $this->props['scroll_image_reverse_direction'];
		$height                         = $this->props['height'];

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		$wrapper_selector  = '%%order_class%% .dsm-scroll-image-wrapper';
		$image_style_hover = '';

		// Handle svg image behaviour
		$src_pathinfo = pathinfo( $src );
		$is_src_svg   = isset( $src_pathinfo['extension'] ) ? 'svg' === $src_pathinfo['extension'] : false;

		// overlay can be applied only if image has link or if lightbox enabled
		$is_overlay_applied = 'on' === $use_overlay ? 'on' : 'off';

		if ( 'none' !== $this->props['lightbox_max_width'] ) {
			et_pb_responsive_options()->generate_responsive_css( $lightbox_max_width_values, '%%order_class%%.dsm-lightbox-custom .mfp-content', 'max-width', $render_slug, '', 'max-width' );
		}

		if ( 'rgba(255,255,255,0.2)' !== $this->props['lightbox_close_color'] ) {
			et_pb_responsive_options()->generate_responsive_css( $lightbox_close_color_values, '%%order_class%%.dsm-lightbox-custom .mfp-close', 'color', $render_slug, '', 'color' );
		}

		if ( $hover->is_enabled( 'lightbox_close_color', $this->props ) && $hover->get_value( 'lightbox_close_color', $this->props ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm-lightbox-custom .mfp-close:hover',
					'declaration' => sprintf(
						'color: %1$s !important;',
						esc_html( $hover->get_value( 'lightbox_close_color', $this->props ) )
					),
				)
			);
		}

		if ( 'on' === $is_overlay_applied ) {
			if ( '' !== $overlay_icon_color && 'off' !== $use_icon ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .et_overlay:before',
						'declaration' => sprintf(
							'color: %1$s;',
							esc_html( $overlay_icon_color )
						),
					)
				);
			}

			if ( '' !== $overlay_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .et_overlay',
						'declaration' => sprintf(
							'background-color: %1$s;',
							esc_html( $overlay_color )
						),
					)
				);
			}

			$data_icon = '' !== $hover_icon
				? sprintf(
					' data-icon="%1$s"',
					esc_attr( et_pb_process_font_icon( $hover_icon ) )
				)
				: '';

			$overlay_output = sprintf(
				'<span class="et_overlay%1$s"%2$s></span>',
				( '' !== $hover_icon && 'off' !== $use_icon ? ' et_pb_inline_icon' : ' dsm-scroll-image-icon-empty' ),
				$data_icon
			);
		}

		if ( '' !== $scroll_image_speed ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm_scroll_image img',
					'declaration' => sprintf(
						'transition: all %1$s; -webkit-transition: all %1$s; -o-transition: all %1$s;',
						esc_attr( $scroll_image_speed )
					),
				)
			);
		}

		if ( '320px' !== $height ) {
			//if ($scroll_image_direction === 'vertical') {
			if ( 'on' === $scroll_image_reverse_direction ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-scroll-direction-vertical.dsm-scroll-reverse-direction img',
						'declaration' => sprintf(
							'margin-top: %1$s;',
							esc_attr( $height )
						),
					)
				);
			} else {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .dsm-scroll-direction-vertical img',
						'declaration' => sprintf(
							'margin-top: %1$s;',
							esc_attr( $height )
						),
					)
				);
			}
			//}
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

		$box_shadow_overlay_wrap_class = 'none' !== $box_shadow_style
			? 'has-box-shadow-overlay'
			: '';

		$box_shadow_overlay_element = 'none' !== $box_shadow_style
			? '<div class="box-shadow-overlay"></div>'
			: '';

		$output = sprintf(
			'<span class="et_pb_image_wrap %5$s">%6$s<img src="%1$s" alt="%2$s"%3$s />%4$s</span>',
			esc_attr( $src ),
			esc_attr( $alt ),
			( '' !== $title_text ? sprintf( ' title="%1$s"', esc_attr( $title_text ) ) : '' ),
			'on' === $is_overlay_applied ? $overlay_output : '',
			$box_shadow_overlay_wrap_class,
			$box_shadow_overlay_element
		);

		if ( 'on' === $show_in_lightbox ) {
			$output = sprintf(
				'<a href="%1$s" class="et_pb_lightbox_image dsm-image-lightbox" title="%3$s" data-mfp-src="%4$s" data-dsm-lightbox-id="%5$s">%2$s</a>',
				esc_attr( $src ),
				$output,
				esc_attr( $alt ),
				'on' === $show_lightbox_other_img && '' !== $show_lightbox_other_img_src ? esc_url( $show_lightbox_other_img_src ) : esc_url( $src ),
				ET_Builder_Element::get_module_order_class( $render_slug )
			);
		} elseif ( '' !== $url ) {
			$output = sprintf(
				'<a href="%1$s"%3$s class="%4$s" data-dsm-lightbox-id="%5$s">%2$s</a>',
				esc_url( $url ),
				$output,
				( 'on' === $url_new_window ? ' target="_blank"' : '' ),
				'off' !== $use_video_popup ? 'dsm-video-lightbox' : '',
				ET_Builder_Element::get_module_order_class( $render_slug )
			);
		}

		$class = 'dsm-scroll-image-wrapper';
		if ( ! in_array( $animation_style, array( '', 'none' ) ) ) {
			$this->add_classname( 'et-waypoint' );
		}

		$class .= ' dsm-scroll-direction-vertical';
		if ( 'on' === $scroll_image_reverse_direction ) {
			$class .= ' dsm-scroll-reverse-direction';
		}

		if ( 'on' === $is_overlay_applied ) {
			$class .= ' et_pb_has_overlay';
			if ( 'off' === $overlay_on_hover ) {
				$class .= ' dsm-scroll-image-overlay-off';
			}
		}

		if ( 'on' === $show_in_lightbox ) {
			if ( ! wp_script_is( 'dsm-magnific-popup-image', 'enqueued' ) ) {
				wp_enqueue_script( 'dsm-magnific-popup-image' );
			}
		}

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
	}
}

new DSM_Scroll_Image;
