<?php

class DSM_MasonryGallery extends ET_Builder_Module {

	public $slug       = 'dsm_masonry_gallery';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->icon_path              = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->name                   = esc_html__( 'Supreme Masonry Gallery', 'dsm-supreme-modules-pro-for-divi' );
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'gallery'  => esc_html__( 'Gallery', 'dsm-supreme-modules-pro-for-divi' ),
					'settings' => esc_html__( 'Settings', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'layout'  => esc_html__( 'Grid Layout', 'dsm-supreme-modules-pro-for-divi' ),
					'grid'    => esc_html__( 'Grid Items', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay' => esc_html__( 'Overlay', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {

		$advanced_fields                = array();
		$advanced_fields['text']        = false;
		$advanced_fields['text_shadow'] = false;
		$advanced_fields['fonts']       = false;

		$advanced_fields['borders']['default'] = array(
			'css' => array(
				'main' => array(
					'border_radii'  => '%%order_class%%',
					'border_styles' => '%%order_class%%',
				),
			),
		);

		$advanced_fields['borders']['grid'] = array(
			'label_prefix' => esc_html__( 'Grid Items', 'dsm-supreme-modules-pro-for-divi' ),
			'toggle_slug'  => 'grid',
			'tab_slug'     => 'advanced',
			'css'          => array(
				'main' => array(
					'border_radii'  => '%%order_class%% .grid .et_pb_image_wrap',
					'border_styles' => '%%order_class%% .grid .et_pb_image_wrap',
				),
			),
		);

		$advanced_fields['box_shadow']['grid'] = array(
			'label'       => esc_html__( 'Grid Items Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
			'toggle_slug' => 'grid',
			'tab_slug'    => 'advanced',
			'css'         => array(
				'main' => '%%order_class%% .grid .et_pb_image_wrap',
			),
		);

		$advanced_fields['fonts']['image_title'] = array(
			'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm-overlay-title',
			),
			'important'       => 'all',
			'hide_text_align' => true,
			'header_level'    => array(
				'default' => 'h4',
			),
			'line_height'     => array(
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '0.1',
				),
			),
			'header_level'    => array(
				'default'          => 'h4',
				'computed_affects' => array(
					'__gallery',
				),
			),
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'overlay',
		);

		$advanced_fields['fonts']['image_desc'] = array(
			'label'           => esc_html__( 'Description', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm-overlay-desc',
			),
			'important'       => 'all',
			'hide_text_align' => true,
			'line_height'     => array(
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '0.1',
				),
			),
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'overlay',
		);

		return $advanced_fields;
	}

	public function get_fields() {

		$fields = array();

		$fields['gallery_ids'] = array(
			'label'            => esc_html__( 'Add Images', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'upload-gallery',
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'gallery',
		);

		$fields['columns'] = array(
			'label'            => esc_html__( 'Columns', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'default'          => '3',
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '12',
				'step' => '1',
			),
			'computed_affects' => array(
				'__gallery',
			),
			'mobile_options'   => true,
			'responsive'       => true,
			'unitless'         => true,
			'toggle_slug'      => 'layout',
			'tab_slug'         => 'advanced',
		);

		$fields['gutter'] = array(
			'label'            => esc_html__( 'Columns Gap', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'default'          => '12',
			'mobile_options'   => true,
			'responsive'       => true,
			'computed_affects' => array(
				'__gallery',
			),
			'range_settings'   => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'toggle_slug'      => 'layout',
			'tab_slug'         => 'advanced',
			'unitless'         => true,
		);

		$fields['use_overlay'] = array(
			'label'            => esc_html__( 'Use Overlay', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'off',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'settings',
		);

		$fields['use_lightbox'] = array(
			'label'            => esc_html__( 'Use Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'off',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'settings',
		);

		$fields['lightbox_title'] = array(
			'label'            => esc_html__( 'Show Image Lightbox Title', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'on',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'lightbox',
			'show_if'          => array(
				'use_lightbox' => 'on',
			),
		);

		$fields['lightbox_caption'] = array(
			'label'            => esc_html__( 'Show Image Lightbox Caption', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'on',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'lightbox',
			'show_if'          => array(
				'use_lightbox' => 'on',
			),
		);

		$fields['overlay_title'] = array(
			'label'            => esc_html__( 'Show Image Overlay Title', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'on',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'overlay',
			'show_if'          => array(
				'use_overlay' => 'on',
			),
		);

		$fields['overlay_description'] = array(
			'label'            => esc_html__( 'Show Image Overlay Description', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'on',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'overlay',
		);

		$fields['overlay_color'] = array(
			'label'       => esc_html__( 'Overlay Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'color-alpha',
			'default'     => et_builder_accent_color(),
			'show_if'     => array(
				'use_overlay' => 'on',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'overlay',
			'show_if'     => array(
				'use_overlay' => 'on',
			),
		);

		$fields['use_horizontal_order'] = array(
			'label'            => esc_html__( 'Use Horizontal Order', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'on',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'settings',
		);

		$fields['use_zoom_on_hover'] = array(
			'label'            => esc_html__( 'Use Zoom On Hover', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'off',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'settings',
		);

		$fields['__gallery'] = array(
			'type'                => 'computed',
			'computed_callback'   => array( 'DSM_MasonryGallery', 'get_galleries' ),
			'computed_depends_on' => array(
				'gallery_ids',
				'columns',
				'gutter',
				'use_lightbox',
				'use_overlay',
				'overlay_description',
				'overlay_title',
				'image_title_level',
				'use_horizontal_order',
				'use_zoon_on_hover',
			),
			'computed_minimum'    => array(
				'gallery_ids',
			),
		);

		return $fields;
	}

	static function get_galleries( $args = array(), $conditional_tags = array(), $current_page = array() ) {

		$defaults = array(
			'gallery_ids'         => array(),
			'use_overlay'         => 'off',
			'use_zoom_on_hover'   => 'off',
			'overlay_title'       => 'on',
			'overlay_description' => 'on',
			'lightbox_title'      => 'on',
			'lightbox_caption'    => 'on',
			'image_title_level'   => 'h4',

		);

		$args = wp_parse_args( $args, $defaults );

		$gallery_ids = explode( ',', $args['gallery_ids'] );

		$output = array(
			'<div class="grid-sizer"></div>',
			'<div class="gutter-sizer"></div>',
		);

		foreach ( $gallery_ids as $gallery_id ) {
			$dsm_upload_gallery_custom_link_url       = get_post_meta( $gallery_id, 'dsm_upload_gallery_custom_link_url', true );
			$dsm_upload_gallery_link_url_target       = get_post_meta( $gallery_id, 'dsm_upload_gallery_link_url_target', true );
			$dsm_upload_gallery_link_as_download_file = get_post_meta( $gallery_id, 'dsm_upload_gallery_link_as_download_file', true );

			$image         = wp_get_attachment_image_src( $gallery_id, 'full' );
			$image_title   = get_the_title( $gallery_id );
			$image_caption = wp_get_attachment_caption( $gallery_id );

			$gallery           = get_post( $gallery_id );
			$image_description = $gallery->post_content;

			$image_title_render = sprintf(
				'<%2$s class="dsm-overlay-title">
                    %1$s
                </%2$s>',
				esc_attr( $image_title ),
				esc_attr( $args['image_title_level'] )
			);

			$image_description_render = sprintf(
				'<p class="dsm-overlay-desc">
                    %1$s
                </p>',
				esc_attr( $image_description )
			);

			$overlay = '';
			if ( 'on' === $args['use_overlay'] ) {
				$overlay = sprintf(
					'<span class="et_overlay dsm-overlay">
                        <div class="dsm-overlay-inner">
                            %1$s
                            %2$s
                        </div>
                    </span>',
					'on' === $args['overlay_title'] ? $image_title_render : '',
					'on' === $args['overlay_description'] ? $image_description_render : ''
				);
			}

			$lightbox = '';
			if ( 'on' === $args['use_lightbox'] ) {
				$lightbox = sprintf(
					'<a href="%1$s" %3$s %4$s>
                        <div class="et_pb_image_wrap">
                            <img src="%1$s" />
                            %2$s
                        </div>
                    </a>',
					$image[0],
					$overlay,
					'on' === $args['lightbox_title'] ? " data-title='$image_title'" : '',
					'on' === $args['lightbox_caption'] ? " data-caption='" . $image_caption . "'" : ''
				);
			} elseif ( '' !== $dsm_upload_gallery_custom_link_url ) {
				$lightbox = sprintf(
					'<a href="%3$s" target="%4$s" %5$s>
						<div class="et_pb_image_wrap">
                        	<img src="%1$s" />
							%2$s
						</div>
					</a>
					',
					$image[0],
					$overlay,
					esc_url( $dsm_upload_gallery_custom_link_url ),
					esc_attr( $dsm_upload_gallery_link_url_target ),
					( '1' === $dsm_upload_gallery_link_as_download_file ? ' download' : '' )
				);
			} else {
				$lightbox = sprintf(
					'<div class="et_pb_image_wrap">
                        <img src="%1$s" />
                        %2$s
                    </div>',
					$image[0],
					$overlay
				);
			}

			$output[] = sprintf(
				'<div class="grid-item">
                    %2$s
                </div>',
				$image[0],
				$lightbox
			);
		}

		return implode( '', $output );
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$gutter                   = $this->props['gutter'];
		$gutter_last_edited       = $this->props['gutter_last_edited'];
		$gutter_responsive_status = isset( $gutter_last_edited ) && et_pb_get_responsive_status( $gutter_last_edited );
		$gutter_tablet            = $gutter_responsive_status && $this->props['gutter_tablet'] ? $this->props['gutter_tablet'] : $gutter;
		$gutter_phone             = $gutter_responsive_status && $this->props['gutter_phone'] ? $this->props['gutter_phone'] : $gutter_tablet;

		$columns                   = $this->props['columns'];
		$columns_last_edited       = $this->props['columns_last_edited'];
		$columns_responsive_status = isset( $columns_last_edited ) && et_pb_get_responsive_status( $columns_last_edited );
		$columns_tablet            = $columns_responsive_status && $this->props['columns_tablet'] ? $this->props['columns_tablet'] : $columns;
		$columns_phone             = $columns_responsive_status && $this->props['columns_phone'] ? $this->props['columns_phone'] : $columns_tablet;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .gutter-sizer',
				'declaration' => "width: {$gutter}px;",
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .gutter-sizer',
				'declaration' => "width: {$gutter_tablet}px;",
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .gutter-sizer',
				'declaration' => "width: {$gutter_phone}px;",
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item, %%order_class%% .grid-sizer',
				'declaration' => "width: calc((100% - ({$columns} - 1) * {$gutter}px) / {$columns});",
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item, %%order_class%% .grid-sizer',
				'declaration' => "width: calc((100% - ({$columns_tablet} - 1) * {$gutter_tablet}px) / {$columns_tablet});",
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item, %%order_class%% .grid-sizer',
				'declaration' => "width: calc((100% - ({$columns_phone} - 1) * {$gutter_phone}px) / {$columns_phone});",
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item',
				'declaration' => "margin-bottom: {$gutter}px;",
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item',
				'declaration' => "margin-bottom: {$gutter_tablet}px;",
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item',
				'declaration' => "margin-bottom: {$gutter_phone}px;",
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item .dsm-overlay',
				'declaration' => "background: {$this->props['overlay_color']} !important;",
			)
		);

		$galleries = self::get_galleries( $this->props );

		wp_enqueue_script( 'dsm-masonry-gallery' );

		return sprintf(
			'<div class="dsm-gallery grid%4$s" data-lightbox="%2$s" data-horizontalorder="%3$s">
                %1$s
             </div>',
			$galleries,
			'on' === $this->props['use_lightbox'] ? esc_attr( 'true' ) : esc_attr( 'false' ),
			'on' === $this->props['use_horizontal_order'] ? esc_attr( 'true' ) : esc_attr( 'false' ),
			'on' === $this->props['use_zoom_on_hover'] ? esc_attr( ' dsm_masonry_zoom_hover' ) : ''
		);

	}

}

new DSM_MasonryGallery();
