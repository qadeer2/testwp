<?php

class DSM_Content_Toggle extends ET_Builder_Module {

	public $slug       = 'dsm_content_toggle';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Content Toggle', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'content_one' => esc_html__( 'Content One', 'dsm-supreme-modules-pro-for-divi' ),
					'content_two' => esc_html__( 'Content Two', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'switcher'    => esc_html__( 'Switcher', 'dsm-supreme-modules-pro-for-divi' ),
					'heading_one' => esc_html__( 'Heading One', 'dsm-supreme-modules-pro-for-divi' ),
					'heading_two' => esc_html__( 'Heading Two', 'dsm-supreme-modules-pro-for-divi' ),
					'content_one' => esc_html__( 'Content One', 'dsm-supreme-modules-pro-for-divi' ),
					'content_two' => esc_html__( 'Content Two', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {

		$advanced_fields = array();

		$advanced_fields['text']         = false;
		$advanced_fields['text_shadow']  = false;
		$advanced_fields['fonts']        = false;
		$advanced_fields['link_options'] = false;

		$advanced_fields['fonts']['heading_one'] = array(
			'label'           => esc_html__( 'Heading', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main'      => '%%order_class%% .dsm-toggle-head-one',
				'important' => 'all',
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'heading_one',
			'line_height'     => array(
				'range_settings' => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),
			'header_level'    => array(
				'default' => 'h5',
			),
		);

		$advanced_fields['fonts']['heading_two'] = array(
			'label'           => esc_html__( 'Heading', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main'      => '%%order_class%% .dsm-toggle-head-two',
				'important' => 'all',
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'heading_two',
			'line_height'     => array(
				'range_settings' => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),
			'header_level'    => array(
				'default' => 'h5',
			),
		);

		$advanced_fields['fonts']['content_one'] = array(
			'label'           => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main'      => '%%order_class%% .dsm-content-toggle-front p, %%order_class%% .dsm-content-toggle-front a',
				'important' => 'all',
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'content_one',
			'line_height'     => array(
				'range_settings' => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),
		);

		$advanced_fields['borders']['content_one'] = array(
			'css'         => array(
				'main' => array(
					'border_radii'  => '%%order_class%% .dsm-content-toggle-front',
					'border_styles' => '%%order_class%% .dsm-content-toggle-front',
				),
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'content_one',
		);

		$advanced_fields['box_shadow']['content_one'] = array(
			'css'         => array(
				'main' => '%%order_class%% .dsm-content-toggle-front',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'content_one',
		);

		$advanced_fields['fonts']['content_two'] = array(
			'label'           => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main'      => '%%order_class%% .dsm-content-toggle-back p, %%order_class%% .dsm-content-toggle-back a',
				'important' => 'all',
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'content_two',
			'line_height'     => array(
				'range_settings' => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),
		);

		$advanced_fields['borders']['content_two'] = array(
			'css'         => array(
				'main' => array(
					'border_radii'  => '%%order_class%% .dsm-content-toggle-back',
					'border_styles' => '%%order_class%% .dsm-content-toggle-back',
				),
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'content_two',
		);

		$advanced_fields['box_shadow']['content_two'] = array(
			'css'         => array(
				'main' => '%%order_class%% .dsm-content-toggle-back',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'content_two',
		);

		return $advanced_fields;
	}

	public function get_fields() {
		$fields = array(
			'heading_one'           => array(
				'label'           => esc_html__( 'Heading', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'default'         => 'Heading One',
				'toggle_slug'     => 'content_one',
				'dynamic_content' => 'text',
			),

			'content_type_one'      => array(
				'label'            => esc_html__( 'Content Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'default'          => 'content',
				'options'          => array(
					'content'   => esc_html__( 'Custom Content', 'dsm-supreme-modules-pro-for-divi' ),
					'library'   => esc_html__( 'Library', 'dsm-supreme-modules-pro-for-divi' ),
					'shortcode' => esc_html__( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'content_one',
				'computed_affects' => array(
					'__library_one',
				),
			),

			'library_id_one'        => array(
				'label'            => __( 'Select Library', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'options'          => $this->get_divi_library_options(),
				'toggle_slug'      => 'content_one',
				'computed_affects' => array(
					'__library_one',
				),
				'show_if'          => array(
					'content_type_one' => 'library',
				),
			),

			'custom_content_one'    => array(
				'label'           => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'content_one',
				'dynamic_content' => 'text',
				'show_if'         => array(
					'content_type_one' => 'content',
				),
			),

			'shortcode_content_one' => array(
				'label'       => esc_html__( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'text',
				'toggle_slug' => 'content_one',
				'show_if'     => array(
					'content_type_one' => 'shortcode',
				),
			),

			'heading_two'           => array(
				'label'           => esc_html__( 'Heading', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'default'         => 'Heading Two',
				'toggle_slug'     => 'content_two',
				'dynamic_content' => 'text',
			),

			'content_type_two'      => array(
				'label'            => esc_html__( 'Content Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'default'          => 'content',
				'options'          => array(
					'content'   => esc_html__( 'Custom Content', 'dsm-supreme-modules-pro-for-divi' ),
					'library'   => esc_html__( 'Library', 'dsm-supreme-modules-pro-for-divi' ),
					'shortcode' => esc_html__( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'computed_affects' => array(
					'__library_two',
				),
				'toggle_slug'      => 'content_two',
			),

			'library_id_two'        => array(
				'label'            => __( 'Select Library', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'default'          => '',
				'options'          => $this->get_divi_library_options(),
				'computed_affects' => array(
					'__library_one',
				),
				'toggle_slug'      => 'content_two',
				'show_if'          => array(
					'content_type_two' => 'library',
				),
			),

			'custom_content_two'    => array(
				'label'           => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'content_two',
				'dynamic_content' => 'text',
				'show_if'         => array(
					'content_type_two' => 'content',
				),
			),

			'shortcode_content_two' => array(
				'label'       => esc_html__( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'text',
				'toggle_slug' => 'content_two',
				'show_if'     => array(
					'content_type_two' => 'shortcode',
				),
			),

			'__library_one'         => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DSM_Content_Toggle', 'get_content_one' ),
				'computed_depends_on' => array(
					'library_id_one',
					'content_type_one',
				),
			),

			'__library_two'         => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DSM_Content_Toggle', 'get_content_two' ),
				'computed_depends_on' => array(
					'library_id_two',
					'content_type_two',
				),
			),
		);

		$switcher = array(
			'switcher_size'         => array(
				'label'          => esc_html__( 'Switcher Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'range',
				'default'        => '15px',
				'mobile_options' => true,
				'fixed_unit'     => 'px',
				'range_settings' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 200,
				),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'switcher',
			),

			'alignment'             => array(
				'label'          => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'select',
				'default'        => 'center',
				'mobile_options' => true,
				'options'        => array(
					'left'   => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					'center' => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'right'  => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'switcher',
			),

			'switcher_bg_primary'   => array(
				'label'       => esc_html__( 'Switcher Primary Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'tab_slug'    => 'advanced',
				'default'     => '#d3d3d3',
				'toggle_slug' => 'switcher',
			),

			'switcher_bg_secondary' => array(
				'label'       => esc_html__( 'Switcher Secondary Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'tab_slug'    => 'advanced',
				'default'     => '#2ecc71',
				'toggle_slug' => 'switcher',
			),

			'switcher_inner_bg'     => array(
				'label'       => esc_html__( 'Switcher Inner Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'tab_slug'    => 'advanced',
				'default'     => '#ffffff',
				'toggle_slug' => 'switcher',
			),

		);

		$content = array(
			'content_bg_one'          => array(
				'label'       => esc_html__( 'Content Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'tab_slug'    => 'advanced',
				'default'     => '#ffffff',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'content_one',
			),

			'content_bg_two'          => array(
				'label'       => esc_html__( 'Content Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'tab_slug'    => 'advanced',
				'default'     => '#ffffff',
				'toggle_slug' => 'content_two',
			),

			'content_padding_one'     => array(
				'label'          => __( 'Content Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'custom_padding',
				'default'        => '0px|0px|0px|0px',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'content_one',
				'mobile_options' => true,
			),

			'content_spacing_top_one' => array(
				'label'          => esc_html__( 'Content Spacing Top', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'range',
				'default'        => '25px',
				'default_unit'   => 'px',
				'range_settings' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 200,
				),
				'mobile_options' => true,
				'toggle_slug'    => 'content_one',
				'tab_slug'       => 'advanced',
			),

			'content_fullwidth_one'   => array(
				'label'            => esc_html__( 'Make This Layout Fullwidth', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'toggle_slug'      => 'content_one',
				'tab_slug'         => 'advanced',
				'show_if'          => array(
					'content_type_one' => 'library',
					'content_type_one' => 'shortcode',
				),
				'description'      => esc_html__( 'Here you can choose whether or not your to row and section in the layout will be fullwidth.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'content_padding_two'     => array(
				'label'          => __( 'Content Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'custom_padding',
				'default'        => '0px|0px|0px|0px',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'content_two',
				'mobile_options' => true,
			),

			'content_spacing_top_two' => array(
				'label'          => esc_html__( 'Content Spacing Top', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'range',
				'default'        => '25px',
				'default_unit'   => 'px',
				'range_settings' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 200,
				),
				'mobile_options' => true,
				'toggle_slug'    => 'content_two',
				'tab_slug'       => 'advanced',
			),

			'content_fullwidth_two'   => array(
				'label'            => esc_html__( 'Make This Layout Fullwidth', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'toggle_slug'      => 'content_two',
				'tab_slug'         => 'advanced',
				'show_if'          => array(
					'content_type_two' => 'library',
					'content_type_two' => 'shortcode',
				),
				'description'      => esc_html__( 'Here you can choose whether or not your to row and section in the layout will be fullwidth.', 'dsm-supreme-modules-pro-for-divi' ),
			),

		);

		return array_merge( $fields, $switcher, $content );
	}


	protected function get_divi_library_options() {

		$layouts = array();

		$_layouts = get_posts(
			array(
				'post_type'      => 'et_pb_layout',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'orderby'        => 'title',
			)
		);

		$layouts[0] = esc_html__( '-- Select Layout --', 'dsm-supreme-modules-pro-for-divi' );

		if ( ! empty( $_layouts ) ) {

			foreach ( $_layouts as $layout ) {
				$layouts[ $layout->ID ] = $layout->post_title;
			}
		}

		return $layouts;
	}

	public static function get_content_one( $args = array() ) {

		$defaults = array();
		$args     = wp_parse_args( $args, $defaults );

		if ( empty( $args['library_id_one'] ) ) {
			return;
		}

		ob_start();

		ET_Builder_Element::clean_internal_modules_styles();

		echo do_shortcode(
			sprintf(
				'[et_pb_section global_module="%1$s" template_type="section" fullwidth="on"][/et_pb_section]',
				$args['library_id_one']
			)
		);

		$internal_style = ET_Builder_Element::get_style();
		ET_Builder_Element::clean_internal_modules_styles( false );

		if ( $internal_style ) {
			$modules_style = sprintf(
				'<style id="dsm_content_toggle_styles-%2$s" type="text/css" class="dsm_content_toggle_styles-%2$s">
					%1$s
				</style>',
				$internal_style,
				$args['library_id_one']
			);
		}

		if ( function_exists( 'et_core_is_fb_enabled' ) && et_core_is_fb_enabled() ) {
			echo et_core_esc_previously( $modules_style );
		}

		$render_shortcode = ob_get_clean();

		return $render_shortcode;
	}

	public static function get_content_two( $args = array() ) {

		$defaults = array();
		$args     = wp_parse_args( $args, $defaults );

		if ( empty( $args['library_id_two'] ) ) {
			return;
		}

		ob_start();

		ET_Builder_Element::clean_internal_modules_styles();

		echo do_shortcode( sprintf( '[et_pb_section global_module="%1$s" template_type="section" fullwidth="on"][/et_pb_section]', $args['library_id_two'] ) );

		$internal_style = ET_Builder_Element::get_style();
		ET_Builder_Element::clean_internal_modules_styles( false );

		if ( $internal_style ) {
			$modules_style = sprintf(
				'<style type="text/css" class="dsm_content_toggle_styles-%2$s">
					%1$s
				</style>',
				$internal_style,
				$args['library_id_two']
			);
		}

		if ( function_exists( 'et_core_is_fb_enabled' ) && et_core_is_fb_enabled() ) {
			echo et_core_esc_previously( $modules_style );
		}

		$render_shortcode = ob_get_clean();

		return $render_shortcode;
	}

	protected function render_content_one() {
		$content_type_one      = $this->props['content_type_one'];
		$library_id_one        = $this->props['library_id_one'];
		$shortcode_content_one = html_entity_decode( $this->props['shortcode_content_one'] );
		$custom_content_one    = $this->_esc_attr( 'custom_content_one', 'full' );
		$args                  = array( 'library_id_one' => $library_id_one );
		$content_fullwidth_one = $this->props['content_fullwidth_one'];

		if ( 'content' === $content_type_one ) {
			return sprintf(
				'<div class="dsm-content-toggle-front">
                    %1$s
                </div>',
				$this->sanitize_content( $custom_content_one )
			);
		} elseif ( 'shortcode' === $content_type_one ) {
			return sprintf(
				'<div class="dsm-content-toggle-front%2$s">
                    %1$s
                </div>',
				do_shortcode( $shortcode_content_one ),
				'on' === $content_fullwidth_one ? ' dsm-content-force-fullwidth' : ''
			);
		} else {
			return sprintf(
				'<div class="dsm-content-toggle-front%2$s">
                    %1$s
                </div>',
				$this->get_content_one( $args ),
				'on' === $content_fullwidth_one ? ' dsm-content-force-fullwidth' : ''
			);
		}
	}

	protected function render_content_two() {
		$content_type_two      = $this->props['content_type_two'];
		$library_id_two        = $this->props['library_id_two'];
		$shortcode_content_two = html_entity_decode( $this->props['shortcode_content_two'] );
		$custom_content_two    = $this->_esc_attr( 'custom_content_two', 'full' );
		$args                  = array( 'library_id_two' => $library_id_two );
		$content_fullwidth_two = $this->props['content_fullwidth_two'];

		if ( 'content' === $content_type_two ) {
			return sprintf(
				'<div class="dsm-content-toggle-back" style="display: none">
                    %1$s
                </div>',
				$this->sanitize_content( $custom_content_two )
			);
		} elseif ( 'shortcode' === $content_type_two ) {
			return sprintf(
				'<div class="dsm-content-toggle-back%2$s">
                    %1$s
                </div>',
				do_shortcode( $shortcode_content_two ),
				'on' === $content_fullwidth_two ? ' dsm-content-force-fullwidth' : ''
			);
		} else {
			return sprintf(
				'<div class="dsm-content-toggle-back%2$s" style="display: none">
                    %1$s
                </div>',
				$this->get_content_two( $args ),
				'on' === $content_fullwidth_two ? ' dsm-content-force-fullwidth' : ''
			);
		}
	}

	protected function sanitize_content( $content ) {
		return preg_replace( '/^<\/p>(.*)<p>/s', '$1', $content );
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$this->apply_css( $render_slug );
		$order_class  = self::get_module_order_class( $render_slug );
		$order_number = str_replace( '_', '', str_replace( $this->slug, '', $order_class ) );

		$heading_one      = $this->props['heading_one'];
		$header_one_level = $this->props['heading_one_level'];

		$heading_two      = $this->props['heading_two'];
		$header_two_level = $this->props['heading_two_level'];

		wp_enqueue_script( 'dsm-content-toggle' );

		return sprintf(
			'<div class="dsm-content-toggle">
				<div class="dsm-content-toggle-header">
					<div class="dsm-toggle">
						<div class="dsm-toggle-left">
							<%6$s class="dsm-toggle-head-one"><label for="dsm-input-%5$s">%1$s</label></%6$s>
						</div>
						<div class="dsm-toggle-btn">
							<label class="dsm-switch-label" for="dsm-input-%5$s">
								<input id="dsm-input-%5$s" class="dsm-input dsm-toggle-switch" type="checkbox" />
								<span class="dsm-switch-inner"></span>
							</label>
						</div>
						<div class="dsm-toggle-right">
							<%7$s class="dsm-toggle-head-two"><label for="dsm-input-%5$s">%2$s</label></%7$s>
						</div>
					</div>
				</div>
				<div class="dsm-content-toggle-body">
					%3$s %4$s
				</div>
			</div>',
			$heading_one,
			$heading_two,
			$this->render_content_one(),
			$this->render_content_two(),
			$order_number,
			et_pb_process_header_level( $header_one_level, 'h5' ),
			et_pb_process_header_level( $header_two_level, 'h5' )
		);
	}

	public function apply_css( $render_slug ) {

		$content_bg_one = $this->props['content_bg_one'];
		$content_bg_two = $this->props['content_bg_two'];

		$content_padding_one = $this->props['content_padding_one'];
		$content_padding_two = $this->props['content_padding_two'];

		$content_spacing_top_one                   = $this->props['content_spacing_top_one'];
		$content_spacing_top_one_tablet            = $this->props['content_spacing_top_one_tablet'];
		$content_spacing_top_one_phone             = $this->props['content_spacing_top_one_phone'];
		$content_spacing_top_one_last_edited       = $this->props['content_spacing_top_one_last_edited'];
		$content_spacing_top_one_responsive_status = et_pb_get_responsive_status( $content_spacing_top_one_last_edited );

		$content_spacing_top_two                   = $this->props['content_spacing_top_two'];
		$content_spacing_top_two_tablet            = $this->props['content_spacing_top_two_tablet'];
		$content_spacing_top_two_phone             = $this->props['content_spacing_top_two_phone'];
		$content_spacing_top_two_last_edited       = $this->props['content_spacing_top_two_last_edited'];
		$content_spacing_top_two_responsive_status = et_pb_get_responsive_status( $content_spacing_top_two_last_edited );

		$switcher_inner_bg               = $this->props['switcher_inner_bg'];
		$switcher_bg_secondary           = $this->props['switcher_bg_secondary'];
		$switcher_bg_primary             = $this->props['switcher_bg_primary'];
		$switcher_size                   = $this->props['switcher_size'];
		$switcher_size_tablet            = $this->props['switcher_size_tablet'];
		$switcher_size_phone             = $this->props['switcher_size_phone'];
		$switcher_size_last_edited       = $this->props['switcher_size_last_edited'];
		$switcher_size_responsive_status = et_pb_get_responsive_status( $switcher_size_last_edited );

		$content_front_selector = '%%order_class%% .dsm-content-toggle-front';
		$content_back_selector  = '%%order_class%% .dsm-content-toggle-back';

		$this->apply_custom_margin_padding(
			$render_slug,
			'content_padding_one',
			'padding',
			$content_front_selector
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'content_padding_two',
			'padding',
			$content_back_selector
		);

		if ( '25px' !== $content_spacing_top_one ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-toggle-front',
					'declaration' => sprintf( 'margin-top: %1$s;', $content_spacing_top_one ),
				)
			);
		}

		if ( $content_spacing_top_one_tablet && $content_spacing_top_one_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-toggle-front',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					'declaration' => sprintf( 'margin-top: %1$s;', $content_spacing_top_one_tablet ),
				)
			);
		}

		if ( $content_spacing_top_one_phone && $content_spacing_top_one_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-toggle-front',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					'declaration' => sprintf( 'margin-top: %1$s;', $content_spacing_top_one_phone ),
				)
			);
		}

		if ( '25px' !== $content_spacing_top_two ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-toggle-back',
					'declaration' => sprintf( 'margin-top: %1$s;', $content_spacing_top_two ),
				)
			);
		}

		if ( $content_spacing_top_two_tablet && $content_spacing_top_two_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-toggle-back',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					'declaration' => sprintf( 'margin-top: %1$s;', $content_spacing_top_two_tablet ),
				)
			);
		}

		if ( $content_spacing_top_two_phone && $content_spacing_top_two_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-toggle-back',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					'declaration' => sprintf( 'margin-top: %1$s;', $content_spacing_top_two_phone ),
				)
			);
		}

		if ( '' !== $content_bg_one ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-toggle-front',
					'declaration' => sprintf( 'background-color: %1$s;', $content_bg_one ),
				)
			);
		}

		if ( '' !== $content_bg_two ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-toggle-back',
					'declaration' => sprintf( 'background-color: %1$s;', $content_bg_two ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-toggle-btn',
				'declaration' => sprintf( 'font-size: %1$s;', $switcher_size ),
			)
		);

		if ( $switcher_size_tablet && $switcher_size_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-toggle-btn',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					'declaration' => sprintf( 'font-size: %1$s;', $switcher_size_tablet ),
				)
			);
		}

		if ( $switcher_size_phone && $switcher_size_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-toggle-btn',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					'declaration' => sprintf( 'font-size: %1$s;', $switcher_size_phone ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-switch-inner',
				'declaration' => sprintf( ' background-color: %1$s;', $switcher_bg_primary ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-toggle-switch:checked+.dsm-switch-inner',
				'declaration' => sprintf( ' background-color: %1$s;', $switcher_bg_secondary ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-switch-inner:before',
				'declaration' => sprintf( ' background-color: %1$s;', $switcher_inner_bg ),
			)
		);

		$alignment                   = $this->props['alignment'];
		$alignment_tablet            = $this->props['alignment_tablet'] ? $this->props['alignment_tablet'] : $alignment;
		$alignment_phone             = $this->props['alignment_phone'] ? $this->props['alignment_phone'] : $alignment_tablet;
		$alignment_last_edited       = $this->props['alignment_last_edited'];
		$alignment_responsive_status = et_pb_get_responsive_status( $alignment_last_edited );

		if ( 'left' === $alignment ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-toggle',
					'declaration' => 'justify-content: flex-start;',
				)
			);
		} elseif ( 'center' === $alignment ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-toggle',
					'declaration' => 'justify-content: center;',
				)
			);
		} elseif ( 'right' === $alignment ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-toggle',
					'declaration' => 'justify-content: flex-end;',
				)
			);
		}

		if ( 'left' === $alignment_tablet && $alignment_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-toggle',
					'declaration' => 'justify-content: flex-start;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		} elseif ( 'center' === $alignment_tablet && $alignment_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-toggle',
					'declaration' => 'justify-content: center;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		} elseif ( 'right' === $alignment_tablet && $alignment_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-toggle',
					'declaration' => 'justify-content: flex-end;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'left' === $alignment_phone && $alignment_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-toggle',
					'declaration' => 'justify-content: flex-start;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		} elseif ( 'center' === $alignment_phone && $alignment_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-toggle',
					'declaration' => 'justify-content: center;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		} elseif ( 'right' === $alignment_phone && $alignment_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-toggle',
					'declaration' => 'justify-content: flex-end;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

	}

	/**
	 * Apply Margin and Padding
	 */
	public function apply_custom_margin_padding( $function_name, $slug, $type, $class, $important = false ) {
		$slug_value                   = $this->props[ $slug ];
		$slug_value_tablet            = $this->props[ $slug . '_tablet' ];
		$slug_value_phone             = $this->props[ $slug . '_phone' ];
		$slug_value_last_edited       = $this->props[ $slug . '_last_edited' ];
		$slug_value_responsive_active = et_pb_get_responsive_status( $slug_value_last_edited );

		if ( isset( $slug_value ) && ! empty( $slug_value ) ) {
			ET_Builder_Element::set_style(
				$function_name,
				array(
					'selector'    => $class,
					'declaration' => et_builder_get_element_style_css( $slug_value, $type, $important ),
				)
			);
		}

		if ( isset( $slug_value_tablet ) && ! empty( $slug_value_tablet ) && $slug_value_responsive_active ) {
			ET_Builder_Element::set_style(
				$function_name,
				array(
					'selector'    => $class,
					'declaration' => et_builder_get_element_style_css( $slug_value_tablet, $type, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( isset( $slug_value_phone ) && ! empty( $slug_value_phone ) && $slug_value_responsive_active ) {
			ET_Builder_Element::set_style(
				$function_name,
				array(
					'selector'    => $class,
					'declaration' => et_builder_get_element_style_css( $slug_value_phone, $type, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
		if ( et_builder_is_hover_enabled( $slug, $this->props ) ) {
			if ( isset( $this->props[ $slug . '__hover' ] ) ) {
				$hover = $this->props[ $slug . '__hover' ];
				ET_Builder_Element::set_style(
					$function_name,
					array(
						'selector'    => $this->add_hover_to_order_class( $class ),
						'declaration' => et_builder_get_element_style_css( $hover, $type, $important ),
					)
				);
			}
		}
	}
}

new DSM_Content_Toggle();
