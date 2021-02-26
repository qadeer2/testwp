<?php

class DSM_FacebookEmbed extends ET_Builder_Module {
	public $slug       = 'dsm_facebook_embed';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'Supreme Facebook Embed', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = '%%order_class%%';
		// Toggle settings
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Facebook Embed Settings', 'dsm-supreme-modules-pro-for-divi' ),
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
					'main' => "{$this->main_css_element}",
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
							'border_radii'  => "{$this->main_css_element}",
							'border_styles' => "{$this->main_css_element}",
						),
					),
				),
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main' => "{$this->main_css_element}",
					),
				),
			),
			'filters'    => false,
		);
	}

	public function get_fields() {
		return array(
			'fb_app_id_notice'       => array(
				'type'        => 'warning',
				'value'       => isset( get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] ) && '' !== get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] ? true : false,
				'display_if'  => false,
				'message'     => sprintf(
					'The Facebook APP ID is currently empty in the <a href="%s" target="_blank">Divi Supreme Plugin Page</a>. This module might not function properly without the Facebook APP ID.',
					admin_url( 'admin.php?page=divi_supreme_settings#dsm_settings_social_media' )
				),
				'toggle_slug' => 'main_content',
			),
			'fb_app_id'              => array(
				'label'            => esc_html__( 'Facebook APP ID', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'attributes'       => 'readonly',
				'default_on_front' => isset( get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] ) && '' !== get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] ? get_option( 'dsm_settings_social_media' )['dsm_facebook_app_id'] : '',
				'description'      => et_get_safe_localization( sprintf( __( 'The Facebook module uses the Facebook APP ID and requires a Facebook APP ID to function. Before using all Facebook module, please make sure you have added your Facebook APP ID inside the Divi Supreme Plugin Page. You can go to <a href="%1$s">Facebook Developer</a> and click on Create New App to get one.', 'dsm-supreme-modules-pro-for-divi' ), esc_url( 'https://developers.facebook.com/apps/' ) ) ),
				'toggle_slug'      => 'main_content',
			),
			'fb_type'                => array(
				'label'            => esc_html__( 'Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'post'  => esc_html__( 'Post', 'dsm-supreme-modules-pro-for-divi' ),
					'video' => esc_html__( 'Video', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Select which type of embed is you would like: Post or Video.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'          => 'post',
				'default_on_front' => 'post',
			),
			'fb_post_url'            => array(
				'label'            => esc_html__( 'Post URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'Enter the Facebook Post URL.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'main_content',
				'default_on_front' => 'https://www.facebook.com/divisupreme/photos/a.318525935577439/631773864252643/',
				'show_if'          => array(
					'fb_type' => 'post',
				),
				'dynamic_content'  => 'url',
			),
			'fb_video_url'           => array(
				'label'            => esc_html__( 'Video URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'Enter the Facebook Video URL.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'main_content',
				'default_on_front' => 'https://www.facebook.com/facebook/videos/10153231379946729/',
				'show_if'          => array(
					'fb_type' => 'video',
				),
				'dynamic_content'  => 'url',
			),
			'fb_show_text'           => array(
				'label'            => esc_html__( 'Show Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'false' => esc_html__( 'Hide', 'dsm-supreme-modules-pro-for-divi' ),
					'true'  => esc_html__( 'Show', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Applied to photo/video post. Set to Show to include the text from the Facebook post or video, if any.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'false',
			),
			'fb_video_fullscreen'    => array(
				'label'            => esc_html__( 'Allow Video Fullscreen', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'false' => esc_html__( 'Disallow', 'dsm-supreme-modules-pro-for-divi' ),
					'true'  => esc_html__( 'Allow', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Allow the video to be played in fullscreen mode. Can be allow or disallow.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'false',
				'show_if'          => array(
					'fb_type' => 'video',
				),
			),
			'fb_video_autoplay'      => array(
				'label'            => esc_html__( 'Video Autoplay', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'false' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'true'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Automatically start playing the video when the page loads. The video will be played without sound (muted). People can turn on sound via the video player controls. This setting does not apply to mobile devices.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'false',
				'show_if'          => array(
					'fb_type' => 'video',
				),
			),
			'fb_video_show_captions' => array(
				'label'            => esc_html__( 'Show Video Captions', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'false' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'true'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Set to show to show captions (if available) by default. Captions are only available on desktop.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'false',
				'show_if'          => array(
					'fb_type' => 'video',
				),
			),
			/*
			'fb_width'         => array(
				'label'            => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'main_content',
				'validate_unit'    => true,
				'default'          => '',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'allow_empty'      => true,
				'range_settings'   => array(
					'min'  => '350',
					'max'  => '750',
					'step' => '1',
				),
				'description'      => esc_html__( 'The width of the post. Min. 350 pixel; Max. 750 pixel. Leave empty to use fluid width (responsive).', 'dsm-supreme-modules-pro-for-divi' ),
			),*/
			'fb_alignment'           => array(
				'label'           => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text_align',
				'option_category' => 'configuration',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'alignment',
				'description'     => esc_html__( 'Here you can define the alignment of Facebook Like Button', 'dsm-supreme-modules-pro-for-divi' ),
				'default'         => 'left',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$fb_app_id              = $this->props['fb_app_id'];
		$fb_type                = $this->props['fb_type'];
		$fb_post_url            = $this->props['fb_post_url'];
		$fb_video_url           = $this->props['fb_video_url'];
		$fb_show_text           = $this->props['fb_show_text'];
		$fb_video_fullscreen    = $this->props['fb_video_fullscreen'];
		$fb_video_autoplay      = $this->props['fb_video_autoplay'];
		$fb_video_show_captions = $this->props['fb_video_show_captions'];
		// $fb_width         = floatval( $this->props['fb_width'] );
		$fb_alignment = $this->props['fb_alignment'];

		$this->add_classname(
			array(
				"et_pb_text_align_{$fb_alignment}",
			)
		);

		wp_enqueue_script( 'dsm-facebook' );
		// Render module content
		$output = sprintf(
			'<div class="fb-%1$s dsm-facebook-embed" data-href="%2$s" data-show-text="%3$s" data-lazy="true"></div>',
			esc_attr( $fb_type ),
			'post' === $fb_type ? esc_url( $fb_post_url ) : esc_url( $fb_video_url ),
			esc_attr( $fb_show_text ),
			'video' === $fb_type ? esc_attr( " data-allowfullscreen=$fb_video_fullscreen" ) : '',
			'video' === $fb_type ? esc_attr( " data-autoplay=$fb_video_autoplay" ) : '',
			'video' === $fb_type ? esc_attr( " data-show-captions=$fb_video_show_captions" ) : ''
		);

		return $output;
	}
}

new DSM_FacebookEmbed();
