<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2019 Elicus Technologies Private Limited
 * @version     1.3.0
 */
class DIPL_ContentToggle extends ET_Builder_Module {

	public $slug       = 'dipl_content_toggle';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Content Toggle', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'content_one' => array(
						'title'    => esc_html__( 'Content One', 'divi-plus' ),
						'priority' => 1,
					),
					'content_two' => array(
						'title'    => esc_html__( 'Content Two', 'divi-plus' ),
						'priority' => 2,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'content_toggle_styling' => array(
						'title'    => esc_html__( 'Toggle Switch Styling', 'divi-plus' ),
						'priority' => 1,
					),
					'toggle_title_text_settings'         => array(
						'title'             => esc_html__( 'Toggle Title Text Setting', 'divi-plus' ),
						'priority'          => 2,
					),
					'content_one_text_settings'         => array(
						'title'             => esc_html__( 'Content One Text Setting', 'divi-plus' ),
						'priority'          => 3,
					),
					'content_two_text_settings'         => array(
						'title'             => esc_html__( 'Content Two Text Setting', 'divi-plus' ),
						'priority'          => 4,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'                 => array(
				'content_toogle_header' => array(
					'label'          => esc_html__( 'Title', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '18px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.5em',
						'range_settings'   => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default_on_front' => '0px',
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'header_level'   => array(
						'default' => 'h5',
					),
					'hide_text_align' => true,
					'css'            => array(
						'main' => '%%order_class%% .dipl_toggle_title_value h1, %%order_class%% .dipl_toggle_title_value h2, %%order_class%% .dipl_toggle_title_value h3, %%order_class%% .dipl_toggle_title_value h4, %%order_class%% .dipl_toggle_title_value h5, %%order_class%% .dipl_toggle_title_value h6',
					),
					'toggle_slug'    => 'toggle_title_text_settings',
				),
				'content_toogle_content_one'   => array(
					'label'          => esc_html__( 'Content One', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '18px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.5em',
						'range_settings'   => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default_on_front' => '0px',
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_content_one_toggle.dipl_content_toggle_text, %%order_class%% .dipl_content_one_toggle.dipl_content_toggle_text p',
					),
					'toggle_slug'    => 'content_one_text_settings',
				),
				'content_toogle_content_two'   => array(
					'label'          => esc_html__( 'Content Two', 'divi-plus' ),
					'font_size'      => array(
						'default_on_front' => '18px',
						'range_settings'   => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'line_height'    => array(
						'default_on_front' => '1.5em',
						'range_settings'   => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default_on_front' => '0px',
						'range_settings'   => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'    => true,
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_content_two_toggle.dipl_content_toggle_text, %%order_class%% .dipl_content_two_toggle.dipl_content_toggle_text p',
					),
					'toggle_slug'    => 'content_two_text_settings',
				),
			),
			'custom_margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'max_width'             => array(
				'css' => array(
					'main'             => '%%order_class%%',
					'module_alignment' => '%%order_class%%',
				),
			),
			'filters'               => false,
			'text'                  => false,
			'borders'               => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => '%%order_class%%',
							'border_radii'  => '%%order_class%%',
						),
					),
				),
			),
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		$layouts[-1] = 'Select Layout';
		$args = array( 
					'post_type' => 'et_pb_layout',
    				'post_status' => 'publish', 
    				'posts_per_page' => -1
    			);
		$query = new WP_Query($args);

		while ($query->have_posts()) {
		    $query->the_post();
		    
		    $post_id = get_the_ID();
		    $post_title = get_the_title();
		    $layouts[$post_id] = $post_title;
		}
		wp_reset_postdata();

		$dipl_content_toggle_fields = array(
			'content_one_title'          => array(
				'label'           => esc_html__( 'Toggle Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content_one',
				'description'     => esc_html__( 'Here you can input the text to be used for the toggle title of Content One.', 'divi-plus' ),
			),
			'select_content_one_type' => array(
                'label'                 => esc_html__( 'Content Type', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'configuration',
                'options'               => array(
                    'dipl_content_one_text'   		=> esc_html__( 'Text', 'divi-plus' ),
                    'dipl_content_one_layout'       => esc_html__( 'Layout', 'divi-plus' ),
                ),
                'default'               => 'dipl_content_one_text',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'content_one',
                'description'           => esc_html__( 'Here you can choose the Content One type.', 'divi-plus' ),
            ),
            'content_one_text'          => array(
				'label'           => esc_html__( 'Content', 'divi-plus' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'show_if'           => array(
					'select_content_one_type' => 'dipl_content_one_text',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content_one',
				'description'     => esc_html__( 'Here you can input the text to be used as content for Content One.', 'divi-plus' ),
			),
			'select_content_one_layout' => array(
                'label'                 => esc_html__( 'Select Layout', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'configuration',
                'options'               => $layouts,
                'show_if'           => array(
					'select_content_one_type' => 'dipl_content_one_layout',
				),
                'default'               => '-1',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'content_one',
                'description'           => esc_html__( 'Here you can choose the layout saved in your Divi library to be used for the Content One.', 'divi-plus' ),
            ),
            'content_two_title'          => array(
				'label'           => esc_html__( 'Toggle Title', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content_two',
				'description'     => esc_html__( 'Here you can input the text to be used for the toggle title of Content Two.', 'divi-plus' ),
			),
			'select_content_two_type' => array(
                'label'                 => esc_html__( 'Content Type', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'configuration',
                'options'               => array(
                    'dipl_content_two_text'   		=> esc_html__( 'Text', 'divi-plus' ),
                    'dipl_content_two_layout'       => esc_html__( 'Layout', 'divi-plus' ),
                ),
                'default'               => 'dipl_content_two_text',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'content_two',
                'description'           => esc_html__( 'Here you can choose the Content Two type.', 'divi-plus' ),
            ),
            'content_two_text'          => array(
				'label'           => esc_html__( 'Content', 'divi-plus' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'show_if'           => array(
					'select_content_two_type' => 'dipl_content_two_text',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content_two',
				'description'     => esc_html__( 'Here you can input the text to be used as content for Content Two.', 'divi-plus' ),
			),
			'select_content_two_layout' => array(
                'label'                 => esc_html__( 'Select Layout', 'divi-plus' ),
                'type'                  => 'select',
                'option_category'       => 'configuration',
                'options'               => $layouts,
                'show_if'           => array(
					'select_content_two_type' => 'dipl_content_two_layout',
				),
                'default'               => '-1',
                'tab_slug'              => 'general',
                'toggle_slug'           => 'content_two',
                'description'           => esc_html__( 'Here you can choose the layout saved in your Divi library to be used for the Content Two.', 'divi-plus' ),
            ),
            'toggle_alignment' => array(
                'label'                 => esc_html__( 'Switch Alignment', 'divi-plus' ),
                'type'                  => 'text_align',
                'option_category'       => 'layout',
                'options'               => et_builder_get_text_orientation_options( array( 'justified' ) ),
                'mobile_options'        => false,
                'tab_slug'     => 'advanced',
				'toggle_slug'  => 'content_toggle_styling',
                'description'           => esc_html__( 'Here you can select the alignment of the toggle switch in the left, right, or center of the module.', 'divi-plus' ),
            ),
            'switch_color_off'                => array(
				'label'        => esc_html__( 'Switch Color(OFF State)', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#000',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'content_toggle_styling',
				'description'  => esc_html__( 'Here you can select the custom color to be used for the circular switch icon during OFF state.', 'divi-plus' ),
			),
			'switch_color_on'                => array(
				'label'        => esc_html__( 'Switch Color(ON State)', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#eee',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'content_toggle_styling',
				'description'  => esc_html__( 'Here you can select the custom color to be used for the circular switch icon during On state.', 'divi-plus' ),
			),
			'switch_bg_color_off'                => array(
				'label'        => esc_html__( 'Switch Background Color(OFF State)', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#eee',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'content_toggle_styling',
				'description'  => esc_html__( 'Here you can select the custom color to be used for the switch background during OFF state.', 'divi-plus' ),
			),
			'switch_bg_color_on'                => array(
				'label'        => esc_html__( 'Switch Background Color(ON State)', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#000',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'content_toggle_styling',
				'description'  => esc_html__( 'Here you can select the custom color to be used for the switch background during On state.', 'divi-plus' ),
			),
			'__content_one_layout'                        => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_ContentToggle', 'dipl_content_one_layout' ),
				'computed_depends_on' => array(
					'select_content_one_type',
					'select_content_one_layout'
				),
			),
			'__content_two_layout'                        => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_ContentToggle', 'dipl_content_two_layout' ),
				'computed_depends_on' => array(
					'select_content_two_type',
					'select_content_two_layout'
				),
			),
		);

		return $dipl_content_toggle_fields;
	}

	public static function dipl_content_one_layout( $args = array() ) {
		$defaults = array(
			'select_content_one_type' => '',
			'select_content_one_layout'  => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$select_content_one_type 	= esc_attr( $args['select_content_one_type'] );
		$select_content_one_layout  = intval( esc_attr( $args['select_content_one_layout'] ) );

		if( 'dipl_content_one_layout' === $select_content_one_type && '' !== $select_content_one_layout && -1 !== $select_content_one_layout ) {
			$output = do_shortcode( get_the_content( null, false, $select_content_one_layout ) );
		} else {
			$output = '';
		}
		return $output;
	}

	public static function dipl_content_two_layout( $args = array() ) {
		$defaults = array(
			'select_content_two_type' => '',
			'select_content_two_layout'  => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$select_content_two_type 	= esc_attr( $args['select_content_two_type'] );
		$select_content_two_layout  = intval( esc_attr( $args['select_content_two_layout'] ) );

		if( 'dipl_content_two_layout' === $select_content_two_type && '' !== $select_content_two_layout && -1 !== $select_content_two_layout ) {
			$output = do_shortcode( get_the_content( null, false, $select_content_two_layout ) );
		} else {
			$output = '';
		}
		return $output;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$content_one_title 					= $this->props['content_one_title'];
		$select_content_one_type 			= $this->props['select_content_one_type'];
        $content_one_text 					= $this->props['content_one_text'];
		$select_content_one_layout 			= (int)$this->props['select_content_one_layout'];
        $content_two_title 					= $this->props['content_two_title'];
		$select_content_two_type 			= $this->props['select_content_two_type'];
        $content_two_text 					= $this->props['content_two_text'];
		$select_content_two_layout 			= (int)$this->props['select_content_two_layout'];
        $toggle_alignment					= esc_attr( $this->props['toggle_alignment'] ) ? esc_attr( $this->props['toggle_alignment'] ) : 'center';
        $switch_color_off					= $this->props['switch_color_off'];
        $switch_color_off_hover 			= esc_attr( $this->get_hover_value( 'switch_color_off' ) );
		$switch_color_on					= $this->props['switch_color_on'];
		$switch_color_on_hover 				= esc_attr( $this->get_hover_value( 'switch_color_on' ) );
		$switch_bg_color_off				= $this->props['switch_bg_color_off'];
		$switch_bg_color_off_hover 			= esc_attr( $this->get_hover_value( 'switch_bg_color_off' ) );
		$switch_bg_color_on					= $this->props['switch_bg_color_on'];
		$switch_bg_color_on_hover 			= esc_attr( $this->get_hover_value( 'switch_bg_color_on' ) );
		$content_toggle_header_level 		= $this->props['content_toogle_header_level'];

		$processed_content_toggle_header_level = et_pb_process_header_level( $content_toggle_header_level, 'h5' );
		$processed_content_toggle_header_level = esc_html( $processed_content_toggle_header_level );

		if ( '' !== $switch_color_off ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 .dipl_switch::before',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_color_off ) ),
					)
				);
		}

		if ( '' !== $switch_color_off_hover ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 .dipl_toggle_button:hover .dipl_switch::before',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_color_off_hover ) ),
					)
				);
		}

		if ( '' !== $switch_color_on ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 .dipl_toggle_field:checked + .dipl_switch::before',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_color_on ) ),
					)
				);
		}

		if ( '' !== $switch_color_on_hover ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1  .dipl_toggle_button:hover .dipl_toggle_field:checked + .dipl_switch::before',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_color_on_hover ) ),
					)
				);
		}

		if ( '' !== $switch_bg_color_off ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 .dipl_toggle_bg',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_bg_color_off ) ),
					)
				);
		}

		if ( '' !== $switch_bg_color_off_hover ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 .dipl_toggle_button:hover .dipl_toggle_bg',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_bg_color_off_hover ) ),
					)
				);
		}

		if ( '' !== $switch_bg_color_on ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 .dipl_toggle_field:checked ~ .dipl_toggle_bg',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_bg_color_on ) ),
					)
				);
		}

		if ( '' !== $switch_bg_color_on_hover ) {
			self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .layout1 .dipl_toggle_button:hover .dipl_toggle_field:checked ~ .dipl_toggle_bg',
						'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $switch_bg_color_on_hover ) ),
					)
				);
		}

		$content_one = '';
		$content_two = '';

		if ( 'dipl_content_one_text' === $select_content_one_type && '' !== $content_one_text ) {
			$content_one = sprintf(
				'<div class="dipl_content_one_toggle dipl_content_toggle_text">
					%1$s
				</div>',
				$content_one_text
			);
		}

		if ( 'dipl_content_one_layout' === $select_content_one_type && '' !== $select_content_one_layout && -1 !== $select_content_one_layout ) {
			$content_one = sprintf(
				'<div class="dipl_content_one_toggle dipl_content_toggle_layout">
					%1$s
				</div>',
				do_shortcode( get_the_content( null, false, $select_content_one_layout ) )
			);
		}

		if ( 'dipl_content_two_text' === $select_content_two_type && '' !== $content_two_text ) {
			$content_two = sprintf(
				'<div class="dipl_content_two_toggle dipl_content_toggle_text">
					%1$s
				</div>',
				$content_two_text
			);
		}

		if ( 'dipl_content_two_layout' === $select_content_two_type && '' !== $select_content_two_layout && -1 !== $select_content_two_layout ) {
			$content_two = sprintf(
				'<div class="dipl_content_two_toggle dipl_content_toggle_layout">
					%1$s
				</div>',
				do_shortcode( get_the_content( null, false, $select_content_two_layout ) )
			);
		}

		if ( '' !== $content_one_title ) {
			$content_one_title = sprintf(
				'<div class="dipl_toggle_title_value dipl_toggle_off_value">
					<%2$s>%1$s</%2$s>
				</div>',
				$content_one_title,
				$processed_content_toggle_header_level
			);
		}

		if ( '' !== $content_two_title ) {
			$content_two_title =  sprintf(
				'<div class="dipl_toggle_title_value dipl_toggle_on_value">
					<%2$s>%1$s</%2$s>
				</div>',
				$content_two_title,
				$processed_content_toggle_header_level
			);
		}

		$toggle_layout = sprintf(
			'<div class="dipl_toggle_button_wrapper layout1 dipl_toggle_%3$s">
				%1$s
				<div class="dipl_toggle_button">
			        <div class="dipl_toggle_button_inner">
						<input class="dipl_toggle_field" type="checkbox" value="" />
						<div class="dipl_switch"></div>
			          	<div class="dipl_toggle_bg"></div>
			        </div>
		      </div>
                %2$s
           	</div>',
			$content_one_title,
			$content_two_title,
			$toggle_alignment
		);

		if ( '' === $content_one && '' === $content_two ) {
			return '';
		} else {
			return sprintf(
				'<div class="dipl_content_toggle_wrapper">
					%1$s%2$s%3$s
				</div>',
				'' === $content_one || '' === $content_two ? '' : $toggle_layout,
				$content_one,
				$content_two
			);
		}
		
	}

	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
		$wrapper_settings    = $this->get_wrapper_settings( $render_slug );
		$slug                = $render_slug;
		$outer_wrapper_attrs = $wrapper_settings['attrs'];
		$inner_wrapper_attrs = $wrapper_settings['inner_attrs'];

		/**
		 * Filters the HTML attributes for the module's outer wrapper. The dynamic portion of the
		 * filter name, '$slug', corresponds to the module's slug.
		 *
		 * @since 3.23 Add support for responsive video background.
		 * @since 3.1
		 *
		 * @param string[]           $outer_wrapper_attrs
		 * @param ET_Builder_Element $module_instance
		 */
		$outer_wrapper_attrs = apply_filters( "et_builder_module_{$slug}_outer_wrapper_attrs", $outer_wrapper_attrs, $this );

		/**
		 * Filters the HTML attributes for the module's inner wrapper. The dynamic portion of the
		 * filter name, '$slug', corresponds to the module's slug.
		 *
		 * @since 3.1
		 *
		 * @param string[]           $inner_wrapper_attrs
		 * @param ET_Builder_Element $module_instance
		 */
		$inner_wrapper_attrs = apply_filters( "et_builder_module_{$slug}_inner_wrapper_attrs", $inner_wrapper_attrs, $this );

		return sprintf(
			'<div%1$s>
				%2$s
				%3$s
				%4$s
				%5$s
				%6$s
			</div>',
			et_html_attrs( $outer_wrapper_attrs ),
			$wrapper_settings['parallax_background'],
			$wrapper_settings['video_background'],
			et_()->array_get( $wrapper_settings, 'video_background_tablet', '' ),
			et_()->array_get( $wrapper_settings, 'video_background_phone', '' ),
			$output
		);
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_content_toggle', $modules ) ) {
        new DIPL_ContentToggle();
    }
} else {
    new DIPL_ContentToggle();
}
