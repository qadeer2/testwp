<?php

class DSM_Block_Reveal_Image extends ET_Builder_Module {

	public $slug       = 'dsm_block_reveal_image';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Block Reveal Image', 'dsm-supreme-modules-pro-for-divi' );
		$this->plural    = esc_html__( 'Supreme Block Reveal Images', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content'     => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'link'             => esc_html__( 'Link', 'dsm-supreme-modules-pro-for-divi' ),
					'reveal_animation' => esc_html__( 'Block Reveal Animation', 'dsm-supreme-modules-pro-for-divi' ),
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
							'border_radii'  => '%%order_class%% .et_pb_image_wrap',
							'border_styles' => '%%order_class%% .et_pb_image_wrap',
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
					'label_prefix'    => esc_html__( 'Overlay', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'overlay',
					'depends_on'      => array( 'use_overlay' ),
					'depends_show_if' => 'on',
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
			'height'         => array(
				'css' => array(
					'main' => '%%order_class%% .et_pb_image_wrap img',
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
			'src'                         => array(
				'label'              => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
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
				'mobile_options'     => true,
				'hover'              => 'tabs',
			),
			'alt'                         => array(
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
			),
			'title_text'                  => array(
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
			'show_lightbox_other_img'     => array(
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
			'show_lightbox_other_img_src' => array(
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
			'lightbox_close_color'        => array(
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
			'lightbox_max_width'          => array(
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
			'url'                         => array(
				'label'           => esc_html__( 'Image Link URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'off',
				'description'     => esc_html__( 'If you would like your image to be a link, input your destination URL here. No link will be created if this field is left blank.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'link',
			),
			'url_new_window'              => array(
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
			),
			'use_video_popup'             => array(
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
			'use_overlay'                 => array(
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
					'hover_overlay_color',
					'use_icon',
					'overlay_on_hover',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'overlay',
				'description'      => esc_html__( 'If enabled, an overlay color and icon will be displayed when a visitors hovers over the image', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'hover_overlay_color'         => array(
				'label'           => esc_html__( 'Overlay Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'Here you can define a custom color for the overlay', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'use_icon'                    => array(
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
			'overlay_icon_color'          => array(
				'label'           => esc_html__( 'Overlay Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'Here you can define a custom color for the overlay icon', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'hover_icon'                  => array(
				'label'           => esc_html__( 'Icon Picker', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'configuration',
				'default'         => 'P',
				'class'           => array( 'et-pb-font-icon' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'Here you can define a custom icon for the overlay', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'overlay_on_hover'            => array(
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
			'align'                       => array(
				'label'            => esc_html__( 'Image Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text_align',
				'option_category'  => 'layout',
				'options'          => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'default_on_front' => 'left',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'alignment',
				'description'      => esc_html__( 'Here you can choose the image alignment.', 'dsm-supreme-modules-pro-for-divi' ),
				'options_icon'     => 'module_align',
				'mobile_options'   => true,
			),
			'force_fullwidth'             => array(
				'label'            => esc_html__( 'Force Fullwidth', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( "When enabled, this will dsm-supreme-modules-pro-for-divi your image to extend 100% of the width of the column it's in.", 'dsm-supreme-modules-pro-for-divi' ),
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
					'width',
				),
			),
			'block_reveal_animation'      => array(
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
			'block_reveal_color'          => array(
				'default'        => et_builder_accent_color(),
				'label'          => esc_html__( 'Block Reveal Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for the block reveal.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'reveal_animation',
				'mobile_options' => true,
			),
			'block_reveal_delay'          => array(
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
			'block_reveal_viewport'       => array(
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


	public function get_alignment( $device = 'desktop' ) {
		$is_desktop = 'desktop' === $device;
		$suffix     = ! $is_desktop ? "_{$device}" : '';
		$alignment  = $is_desktop && isset( $this->props['align'] ) ? $this->props['align'] : '';

		if ( ! $is_desktop && et_pb_responsive_options()->is_responsive_enabled( $this->props, 'align' ) ) {
			$alignment = et_pb_responsive_options()->get_any_value( $this->props, "align{$suffix}" );
		}

		return et_pb_get_alignment( $alignment );
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$multi_view                  = et_pb_multi_view_options( $this );
		$src                         = $this->props['src'];
		$alt                         = $this->props['alt'];
		$title_text                  = $this->props['title_text'];
		$url                         = $this->props['url'];
		$url_new_window              = $this->props['url_new_window'];
		$show_in_lightbox            = $this->props['show_in_lightbox'];
		$align                       = $this->get_alignment();
		$align_tablet                = $this->get_alignment( 'tablet' );
		$align_phone                 = $this->get_alignment( 'phone' );
		$force_fullwidth             = $this->props['force_fullwidth'];
		$overlay_icon_color          = $this->props['overlay_icon_color'];
		$hover_overlay_color         = $this->props['hover_overlay_color'];
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
		$block_reveal_animation      = $this->props['block_reveal_animation'];
		$block_reveal_color          = $this->props['block_reveal_color'];
		$block_reveal_color_values   = et_pb_responsive_options()->get_property_values( $this->props, 'block_reveal_color' );
		$block_reveal_color_tablet   = isset( $block_reveal_color_values['tablet'] ) ? $block_reveal_color_values['tablet'] : '';
		$block_reveal_color_phone    = isset( $block_reveal_color_values['phone'] ) ? $block_reveal_color_values['phone'] : '';
		$block_reveal_delay          = $this->props['block_reveal_delay'];
		$block_reveal_viewport       = $this->props['block_reveal_viewport'];

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		$block_reveal_selector = '%%order_class%% .dsm_block_image_reveal_front';

		// Handle svg image behaviour.
		$src_pathinfo = pathinfo( $src );
		$is_src_svg   = isset( $src_pathinfo['extension'] ) ? 'svg' === $src_pathinfo['extension'] : false;

		// overlay can be applied only if image has link or if lightbox enabled.
		$is_overlay_applied = 'on' === $use_overlay ? 'on' : 'off';

		if ( 'on' === $force_fullwidth ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'declaration' => 'width: 100%; max-width: 100% !important;',
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

		// Responsive Image Alignment.
		// Set CSS properties and values for the image alignment.
		// 1. Text Align is necessary, just set it from current image alignment value.
		// 2. Margin {Side} is optional. Used to pull the image to right/left side.
		// 3. Margin Left and Right are optional. Used by Center to reset custom margin of point 2.
		$align_values = array(
			'desktop' => array(
				'text-align'      => esc_html( $align ),
				"margin-{$align}" => ! empty( $align ) && 'center' !== $align ? '0' : '',
			),
			'tablet'  => array(
				'text-align'             => esc_html( $align_tablet ),
				'margin-left'            => 'left' !== $align_tablet ? 'auto' : '',
				'margin-right'           => 'left' !== $align_tablet ? 'auto' : '',
				"margin-{$align_tablet}" => ! empty( $align_tablet ) && 'center' !== $align_tablet ? '0' : '',
			),
			'phone'   => array(
				'text-align'            => esc_html( $align_phone ),
				'margin-left'           => 'left' !== $align_phone ? 'auto' : '',
				'margin-right'          => 'left' !== $align_phone ? 'auto' : '',
				"margin-{$align_phone}" => ! empty( $align_phone ) && 'center' !== $align_phone ? '0' : '',
			),
		);

		et_pb_responsive_options()->generate_responsive_css( $align_values, '%%order_class%% .dsm_block_reveal_image_wrapper', '', $render_slug, '', 'alignment' );

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

		if ( 'on' === $is_overlay_applied ) {
			if ( '' !== $overlay_icon_color && 'off' !== $use_icon ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .et_overlay:before',
						'declaration' => sprintf(
							'color: %1$s !important;',
							esc_html( $overlay_icon_color )
						),
					)
				);
			}

			if ( '' !== $hover_overlay_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .et_overlay',
						'declaration' => sprintf(
							'background-color: %1$s;',
							esc_html( $hover_overlay_color )
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
				( '' !== $hover_icon && 'off' !== $use_icon ? ' et_pb_inline_icon' : ' dsm_block_reveal_image_icon_empty' ),
				$data_icon
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

		$box_shadow_overlay_wrap_class = 'none' !== $box_shadow_style
			? ' has-box-shadow-overlay'
			: '';

		$box_shadow_overlay_element = 'none' !== $box_shadow_style
			? '<div class="box-shadow-overlay"></div>'
			: '';

		$image_html = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => array(
					'src'   => '{{src}}',
					'alt'   => '{{alt}}',
					'title' => '{{title_text}}',
				),
				'required' => 'src',
			)
		);

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

		$output = sprintf(
			'<span class="et_pb_image_wrap%3$s" data-dsm-block-reveal-image=%5$s>%4$s%1$s%2$s</span>',
			$image_html,
			'on' === $is_overlay_applied ? $overlay_output : '',
			$box_shadow_overlay_wrap_class,
			$box_shadow_overlay_element,
			wp_json_encode( $data_attr )
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
		// Module classnames.

		$class = 'dsm_block_reveal_image_wrapper';
		if ( ! in_array( $animation_style, array( '', 'none' ) ) ) {
			$this->add_classname( 'et-waypoint' );
		}

		if ( 'on' === $is_overlay_applied ) {
			$class .= ' et_pb_has_overlay';
			if ( 'off' === $overlay_on_hover ) {
				$class .= ' dsm_block_reveal_image_overlay_off';
			}
		}

		wp_enqueue_script( 'dsm-block-reveal-image' );
		if ( 'on' === $show_in_lightbox ) {
			wp_enqueue_script( 'dsm-magnific-popup-image' );
		}

		// Render module content.
		$output = sprintf(
			'<div%3$s class="%2$s" >
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

new DSM_Block_Reveal_Image();
