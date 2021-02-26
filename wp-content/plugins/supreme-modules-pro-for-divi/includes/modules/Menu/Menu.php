<?php

class DSM_NavMenu extends ET_Builder_Module {

	public $slug       = 'dsm_menu';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Menu', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';
		// Toggle settings
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Menu', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'layout'        => array(
						'title'    => esc_html__( 'Layout', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 19,
					),
					'header'        => array(
						'title'    => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 25,
					),
					'menu_style'    => array(
						'title'    => esc_html__( 'Menu', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 29,
					),
					'submenu_style' => array(
						'title'    => esc_html__( 'Sub Menu', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 39,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'header'   => array(
					'label'          => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main'      => '%%order_class%% h1.dsm-menu-title, %%order_class%% h2.dsm-menu-title, %%order_class%% h3.dsm-menu-title, %%order_class%% h4.dsm-menu-title, %%order_class%% h5.dsm-menu-title, %%order_class%% h6.dsm-menu-title',
						'important' => 'all',
					),
					'font_size'      => array(
						'default' => '18px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'header_level'   => array(
						'default' => 'h4',
					),

				),
				'menu'     => array(
					'label'           => esc_html__( 'Menu', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main'        => '%%order_class%% ul.dsm-menu li a',
						'plugin_main' => '%%order_class%% ul.dsm-menu li a',
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'font_size'       => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '12',
							'max'  => '24',
							'step' => '1',
						),
					),
					'letter_spacing'  => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '8',
							'step' => '1',
						),
					),
					'hide_text_align' => true,
					'hide_text_color' => true,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'menu_style',
				),
				'sub_menu' => array(
					'label'           => esc_html__( 'Sub Menu', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main'        => '%%order_class%% ul.dsm-menu .menu-item-has-children .sub-menu li a',
						'plugin_main' => '%%order_class%% ul.dsm-menu .menu-item-has-children .sub-menu li a',
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'font_size'       => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '12',
							'max'  => '24',
							'step' => '1',
						),
					),
					'letter_spacing'  => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '8',
							'step' => '1',
						),
					),
					'hide_text_align' => true,
					'hide_text_color' => false,
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'submenu_style',
				),
			),
			'text'           => array(
				'use_background_layout' => true,
				'options'               => array(
					'text_orientation'  => array(
						'default_on_front' => 'left',
					),
					'background_layout' => array(
						'default_on_front' => 'light',
						'hover'            => 'tabs',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main' => '%%order_class%%.et_pb_module.dsm_menu',
				),
			),
			'link_options'   => false,
			'button'         => false,
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		return array(
			'title'                        => array(
				'label'           => esc_html__( 'Menu Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'The title will appear above the menu.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
			),
			'title_bottom_gap'             => array(
				'label'           => esc_html__( 'Bottom Gap', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'header',
				'hover'           => 'tabs',
				'responsive'      => true,
				'default_unit'    => 'px',
				'default'         => '10px',
			),
			'menu_id'                      => array(
				'label'            => esc_html__( 'Menu', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'basic_option',
				'options'          => et_builder_get_nav_menus_options(),
				'description'      => sprintf(
					'<p class="description">%2$s. <a href="%1$s" target="_blank">%3$s</a>.</p>',
					esc_url( admin_url( 'nav-menus.php' ) ),
					esc_html__( 'Select a menu that should be used in the module', 'dsm-supreme-modules-pro-for-divi' ),
					esc_html__( 'Click here to create new menu', 'dsm-supreme-modules-pro-for-divi' )
				),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'__menu',
				),
			),
			'menu_link_text_color'         => array(
				'label'        => esc_html__( 'Menu Link Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'menu_style',
				'hover'        => 'tabs',
			),
			'active_link_color'            => array(
				'label'        => esc_html__( 'Active Link Color', 'dsm-supreme-modules-pro-for-divi' ),
				'description'  => esc_html__( 'An active link is the page currently being visited. You can pick a color to be applied to active links to differentiate them from other links.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'menu_style',
				'hover'        => 'tabs',
			),
			'menu_link_text_active_color'  => array(
				'label'        => esc_html__( 'Menu Link Active Color (:active pseudo)', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'menu_style',
				'description'  => esc_html__( 'The :active pseudo selector changes the appearance of a link while it is being activated (being clicked on or otherwise activated).', 'dsm-supreme-modules-pro-for-divi' ),

			),
			'menu_link_text_visited_color' => array(
				'label'        => esc_html__( 'Menu Link Visited Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'menu_style',
			),
			'menu_space_between'           => array(
				'label'           => esc_html__( 'Space Between', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'hover'           => 'tabs',
				'mobile_options'  => true,
				'default_unit'    => 'px',
				'default'         => '0px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'menu_style',
			),
			'menu_layout'                  => array(
				'label'            => esc_html__( 'Menu Layout', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'vertical' => esc_html__( 'Vertical', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'vertical',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'layout',
			),
			'menu_left_space'              => array(
				'label'           => esc_html__( 'Left Spacing', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'hover'           => 'tabs',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'menu_style',
				'default_unit'    => 'px',
				'default'         => '0px',
				'show_if'         => array(
					'menu_layout' => 'vertical',
				),
			),
			'list_style_type'              => array(
				'label'            => esc_html__( 'List Style Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'none'    => esc_html__( 'None', 'dsm-supreme-modules-pro-for-divi' ),
					'disc'    => esc_html__( 'Disc', 'dsm-supreme-modules-pro-for-divi' ),
					'circle'  => esc_html__( 'Circle', 'dsm-supreme-modules-pro-for-divi' ),
					'decimal' => esc_html__( 'Decimal', 'dsm-supreme-modules-pro-for-divi' ),
					'square'  => esc_html__( 'Square', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'disc',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'menu_style',
				'show_if'          => array(
					'menu_layout' => 'vertical',
				),
			),
			'list_style_position'          => array(
				'label'            => esc_html__( 'List Style Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'inside'  => esc_html__( 'Inside', 'dsm-supreme-modules-pro-for-divi' ),
					'outside' => esc_html__( 'Outside', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'inside',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'menu_style',
				'show_if'          => array(
					'menu_layout' => 'vertical',
				),
			),
			'list_style_color'             => array(
				'label'          => esc_html__( 'List Style Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'menu_style',
				'hover'          => 'tabs',
				'mobile_options' => true,
				'show_if_not'    => array(
					'list_style_type' => 'none',
				),
				'show_if'        => array(
					'menu_layout' => 'vertical',
				),
			),
			'submenu_left_space'           => array(
				'label'           => esc_html__( 'Left Spacing', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'hover'           => 'tabs',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'submenu_style',
				'default_unit'    => 'px',
				'default'         => '20px',
				'show_if'         => array(
					'menu_layout' => 'vertical',
				),
			),
			'menu_animation'               => array(
				'label'            => esc_html__( 'Use Link Hover Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'animation',
				'description'      => esc_html__( 'Here you can choose whether or not to have hover animation on your menu links.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'off',
				'default'          => 'off',
			),
			'menu_animation_type'          => array(
				'label'            => esc_html__( 'Animation Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'underline' => esc_html__( 'Underline', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'underline',
				'default'          => 'underline',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'animation',
				'show_if'          => array(
					'menu_animation' => 'on',
				),
			),
			'underline_animation'          => array(
				'label'            => esc_html__( 'Underline Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'left-right' => esc_html__( 'Left to Right', 'dsm-supreme-modules-pro-for-divi' ),
					'right-left' => esc_html__( 'Right to Left', 'dsm-supreme-modules-pro-for-divi' ),
					'center-out' => esc_html__( 'Center Out', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'left-right',
				'default'          => 'left-right',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'animation',
				'show_if'          => array(
					'menu_animation'      => 'on',
					'menu_animation_type' => 'underline',
				),
			),
			'underline_animation_color'    => array(
				'label'            => esc_html__( 'Link Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'color-alpha',
				'custom_color'     => true,
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'animation',
				'default_on_front' => '#2ea3f2',
				'show_if'          => array(
					'menu_animation'      => 'on',
					'menu_animation_type' => 'underline',
				),
			),
			'__menu'                       => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DSM_NavMenu', 'get_dsm_navmenu' ),
				'computed_depends_on' => array(
					'menu_id',
					'list_style_type',
				),
			),
		);
	}

	/**
	 * Add the class with page ID to menu item so it can be easily found by ID in Frontend Builder
	 *
	 * @return menu item object
	 */
	static function modify_dsm_menu_item( $menu_item ) {
		// Since PHP 7.1 silent conversion to array is no longer supported.
		$menu_item->classes = (array) $menu_item->classes;

		if ( esc_url( home_url( '/' ) ) === $menu_item->url ) {
			$fw_menu_custom_class = 'et_pb_menu_page_id-home';
		} else {
			$fw_menu_custom_class = 'et_pb_menu_page_id-' . $menu_item->object_id;
		}

		$menu_item->classes[] = $fw_menu_custom_class;
		return $menu_item;
		/*
		if ( esc_url( home_url( '/' ) ) === $menu_item->url ) {
			$fw_menu_custom_class = 'et_pb_menu_page_id-home';
		} else {
			$fw_menu_custom_class = 'et_pb_menu_page_id-' . $menu_item->object_id;
		}
		$menu_item->classes[] = $fw_menu_custom_class;
		return $menu_item;*/
	}

	/**
	 * Get fullwidth menu markup for fullwidth menu module
	 *
	 * @return string of fullwidth menu markup
	 */
	static function get_dsm_navmenu( $args = array() ) {
		$defaults = array(
			'list_style_type'     => '',
			'menu_layout'         => '',
			'menu_animation'      => '',
			'menu_animation_type' => '',
			'underline_animation' => '',
			'menu_id'             => '',
		);

		// modify the menu item to include the required data
		add_filter(
			'nav_menu_link_attributes',
			function( $atts ) {
				$atts['itemprop'] = 'url';
				return $atts;
			},
			10,
			3
		);

		add_filter( 'wp_setup_nav_menu_item', array( 'DSM_NavMenu', 'modify_dsm_menu_item' ) );

		$args = wp_parse_args( $args, $defaults );

		$menu = '<nav class="dsm-menu-container" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">';

		$menu_class = 'dsm-menu';

		if ( ! et_is_builder_plugin_active() && 'on' == et_get_option( 'divi_disable_toptier' ) ) {
			$menu_class .= ' et_disable_top_tier';
		}
		$menu_class .= sprintf( ' %s', esc_attr( 'dsm-menu-style-type-' . $args['list_style_type'] ) );
		$menu_class .= sprintf( ' %s', esc_attr( 'dsm-menu-layout-' . $args['menu_layout'] ) );
		$menu_class .= ( 'on' === $args['menu_animation'] ? sprintf( ' %s', esc_attr( 'dsm-menu-animation dsm-menu-animation-' . $args['underline_animation'] ) ) : '' );
		$primary_nav = '';

		$menu_args = array(
			'theme_location' => 'primary-menu',
			'container'      => '',
			'fallback_cb'    => '',
			'link_before'    => '<span itemprop="name">',
			'link_after'     => '</span>',
			'menu_class'     => $menu_class,
			'menu_id'        => '',
			'echo'           => false,
		);

		if ( '' !== $args['menu_id'] ) {
			$menu_args['menu'] = (int) $args['menu_id'];
		}

		$primary_nav = wp_nav_menu( apply_filters( 'dsm_menu_args', $menu_args ) );

		if ( empty( $primary_nav ) ) {
			$menu .= sprintf(
				'<ul class="%1$s">
					%2$s',
				esc_attr( $menu_class ),
				( ! et_is_builder_plugin_active() && 'on' === et_get_option( 'divi_home_link' )
					? sprintf(
						'<li%1$s><a href="%2$s" itemprop="url"><span itemprop="name">%3$s</span></a></li>',
						( is_home() ? ' class="current_page_item"' : '' ),
						esc_url( home_url( '/' ) ),
						esc_html__( 'Home', 'dsm-supreme-modules-pro-for-divi' )
					)
					: ''
				)
			);

			ob_start();

			// @todo: check if Fullwidth Menu module works fine with no menu selected in settings
			if ( et_is_builder_plugin_active() ) {
				wp_page_menu();
			} else {
				show_page_menu( $menu_class, false, false );
				show_categories_menu( $menu_class, false );
			}

			$menu .= ob_get_contents();

			$menu .= '</ul>';

			ob_end_clean();
		} else {
			$menu .= $primary_nav;
		}

		$menu .= '</nav>';

		remove_filter( 'wp_setup_nav_menu_item', array( 'DSM_NavMenu', 'modify_dsm_menu_item' ) );

		return $menu;
	}

	public function get_transition_fields_css_props() {
		$fields = parent::get_transition_fields_css_props();

		$fields['title_bottom_gap'] = array(
			'padding-bottom' => '%%order_class%% .dsm-menu-title',
		);

		$fields['list_style_color'] = array(
			'color' => '%%order_class%% ul.dsm-menu li',
		);

		$fields['menu_link_text_color'] = array(
			'color' => '%%order_class%% ul.dsm-menu li a',
		);

		$fields['menu_space_between'] = array(
			'margin-bottom' => '%%order_class%% .dsm-menu li:not(:last-child)',
			'margin-top'    => '%%order_class%% .dsm-menu .menu-item-has-children .sub-menu>li',
		);

		$fields['submenu_left_space'] = array(
			'padding-left' => '%%order_class%% .dsm-menu .menu-item-has-children .sub-menu',
		);

		$fields['menu_left_space'] = array(
			'padding-left' => '%%order_class%% ul.dsm-menu',
		);

		return $fields;

	}

	public function render( $attrs, $content = null, $render_slug ) {
		$background_layout              = $this->props['background_layout'];
		$title                          = $this->props['title'];
		$title_bottom_gap_hover         = $this->get_hover_value( 'title_bottom_gap' );
		$title_bottom_gap               = $this->props['title_bottom_gap'];
		$title_bottom_gap_tablet        = $this->props['title_bottom_gap_tablet'];
		$title_bottom_gap_phone         = $this->props['title_bottom_gap_phone'];
		$title_bottom_gap_last_edited   = $this->props['title_bottom_gap_last_edited'];
		$menu_id                        = $this->props['menu_id'];
		$menu_layout                    = $this->props['menu_layout'];
		$list_style_type                = $this->props['list_style_type'];
		$list_style_color_hover         = $this->get_hover_value( 'list_style_color' );
		$list_style_color               = $this->props['list_style_color'];
		$list_style_color_tablet        = $this->props['list_style_color_tablet'];
		$list_style_color_phone         = $this->props['list_style_color_phone'];
		$list_style_color_last_edited   = $this->props['list_style_color_last_edited'];
		$list_style_position            = $this->props['list_style_position'];
		$menu_link_text_color           = $this->props['menu_link_text_color'];
		$menu_link_text_color_hover     = $this->get_hover_value( 'menu_link_text_color' );
		$menu_link_text_active_color    = $this->props['menu_link_text_active_color'];
		$menu_link_text_visited_color   = $this->props['menu_link_text_visited_color'];
		$active_link_color              = $this->props['active_link_color'];
		$active_link_color_hover        = $this->get_hover_value( 'active_link_color' );
		$menu_space_between_hover       = $this->get_hover_value( 'menu_space_between' );
		$menu_space_between             = $this->props['menu_space_between'];
		$menu_space_between_tablet      = $this->props['menu_space_between_tablet'];
		$menu_space_between_phone       = $this->props['menu_space_between_phone'];
		$menu_space_between_last_edited = $this->props['menu_space_between_last_edited'];
		$menu_left_space_hover          = $this->get_hover_value( 'menu_left_space' );
		$menu_left_space                = $this->props['menu_left_space'];
		$menu_left_space_tablet         = $this->props['menu_left_space_tablet'];
		$menu_left_space_phone          = $this->props['menu_left_space_phone'];
		$menu_left_space_last_edited    = $this->props['menu_left_space_last_edited'];
		$submenu_left_space_hover       = $this->get_hover_value( 'submenu_left_space' );
		$submenu_left_space             = $this->props['submenu_left_space'];
		$submenu_left_space_tablet      = $this->props['submenu_left_space_tablet'];
		$submenu_left_space_phone       = $this->props['submenu_left_space_phone'];
		$submenu_left_space_last_edited = $this->props['submenu_left_space_last_edited'];
		$menu_animation                 = $this->props['menu_animation'];
		$menu_animation_type            = $this->props['menu_animation_type'];
		$underline_animation            = $this->props['underline_animation'];
		$underline_animation_color      = $this->props['underline_animation_color'];
		$header_level                   = $this->props['header_level'];

		$menu = self::get_dsm_navmenu(
			array(
				'menu_id'             => $menu_id,
				'list_style_type'     => $list_style_type,
				'menu_layout'         => $menu_layout,
				'menu_animation'      => $menu_animation,
				'menu_animation_type' => $menu_animation_type,
				'underline_animation' => $underline_animation,
			)
		);

		if ( '' !== $title_bottom_gap || '' !== $title_bottom_gap_tablet || '' !== $title_bottom_gap_phone ) {
			$title_bottom_gap_responsive_active = et_pb_get_responsive_status( $title_bottom_gap_last_edited );

			$title_bottom_gap_values = array(
				'desktop' => $title_bottom_gap,
				'tablet'  => $title_bottom_gap_responsive_active ? $title_bottom_gap_tablet : '',
				'phone'   => $title_bottom_gap_responsive_active ? $title_bottom_gap_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $title_bottom_gap_values, '%%order_class%% .dsm-menu-title', 'padding-bottom', $render_slug );
		}

		if ( et_builder_is_hover_enabled( 'title_bottom_gap', $this->props ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%% .dsm-menu-title' ),
					'declaration' => sprintf(
						'padding-bottom: %1$s;',
						esc_html( $title_bottom_gap_hover )
					),
				)
			);
		}

		if ( '' !== $menu_space_between || '' !== $menu_space_between_tablet || '' !== $menu_space_between_phone ) {
			$menu_space_between_responsive_active = et_pb_get_responsive_status( $menu_space_between_last_edited );

			$menu_space_between_values = array(
				'desktop' => $menu_space_between,
				'tablet'  => $menu_space_between_responsive_active ? $menu_space_between_tablet : '',
				'phone'   => $menu_space_between_responsive_active ? $menu_space_between_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $menu_space_between_values, '%%order_class%% .dsm-menu li:not(:last-child)', 'margin-bottom', $render_slug );
			et_pb_responsive_options()->generate_responsive_css( $menu_space_between_values, '%%order_class%% .dsm-menu .menu-item-has-children .sub-menu>li', 'margin-top', $render_slug );

		}

		if ( et_builder_is_hover_enabled( 'menu_space_between', $this->props ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%% .dsm-menu li:not(:last-child)' ),
					'declaration' => sprintf(
						'margin-bottom: %1$s;',
						esc_html( $menu_space_between_hover )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%% .dsm-menu .menu-item-has-children .sub-menu>li' ),
					'declaration' => sprintf(
						'margin-top: %1$s;',
						esc_html( $menu_space_between_hover )
					),
				)
			);
		}

		if ( '' !== $menu_left_space || '' !== $menu_left_space_tablet || '' !== $menu_left_space_phone ) {
			$menu_left_space_responsive_active = et_pb_get_responsive_status( $menu_left_space_last_edited );

			$menu_left_space_values = array(
				'desktop' => $menu_left_space,
				'tablet'  => $menu_left_space_responsive_active ? $menu_left_space_tablet : '',
				'phone'   => $menu_left_space_responsive_active ? $menu_left_space_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $menu_left_space_values, '%%order_class%% ul.dsm-menu', 'padding-left', $render_slug );
		}

		if ( et_builder_is_hover_enabled( 'menu_left_space', $this->props ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%% ul.dsm-menu' ),
					'declaration' => sprintf(
						'padding-left: %1$s;',
						esc_html( $menu_left_space_hover )
					),
				)
			);
		}

		if ( '' !== $submenu_left_space || '' !== $submenu_left_space_tablet || '' !== $submenu_left_space_phone ) {
			$submenu_left_space_responsive_active = et_pb_get_responsive_status( $submenu_left_space_last_edited );

			$submenu_left_space_values = array(
				'desktop' => $submenu_left_space,
				'tablet'  => $submenu_left_space_responsive_active ? $submenu_left_space_tablet : '',
				'phone'   => $submenu_left_space_responsive_active ? $submenu_left_space_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $submenu_left_space_values, '%%order_class%% .dsm-menu .menu-item-has-children .sub-menu', 'padding-left', $render_slug );
		}

		if ( et_builder_is_hover_enabled( 'submenu_left_space', $this->props ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%% .dsm-menu .menu-item-has-children .sub-menu' ),
					'declaration' => sprintf(
						'padding-left: %1$s;',
						esc_html( $submenu_left_space_hover )
					),
				)
			);
		}

		if ( '' !== $menu_link_text_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% ul.dsm-menu li a',
					'declaration' => sprintf(
						'color: %1$s;',
						esc_html( $menu_link_text_color )
					),
				)
			);
		}

		if ( '' !== $menu_link_text_visited_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% ul.dsm-menu li a:visited',
					'declaration' => sprintf(
						'color: %1$s;',
						esc_html( $menu_link_text_visited_color )
					),
				)
			);
		}

		if ( et_builder_is_hover_enabled( 'menu_link_text_color', $this->props ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% ul.dsm-menu li a:hover',
					'declaration' => sprintf(
						'color: %1$s;',
						esc_html( $menu_link_text_color_hover )
					),
				)
			);
		}

		if ( '' !== $menu_link_text_active_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% ul.dsm-menu li a:active',
					'declaration' => sprintf(
						'color: %1$s;',
						esc_html( $menu_link_text_active_color )
					),
				)
			);
		}

		if ( '' !== $active_link_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% ul.dsm-menu li.current-menu-item a',
					'declaration' => sprintf(
						'color: %1$s;',
						esc_html( $active_link_color )
					),
				)
			);
		}

		if ( et_builder_is_hover_enabled( 'active_link_color', $this->props ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% ul.dsm-menu li.current-menu-item a:hover',
					'declaration' => sprintf(
						'color: %1$s;',
						esc_html( $active_link_color_hover )
					),
				)
			);
		}

		if ( 'disc' !== $list_style_type ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '#et-boc %%order_class%% ul.dsm-menu, %%order_class%% ul.dsm-menu, %%order_class%% ul.dsm-menu .sub-menu',
					'declaration' => sprintf(
						'list-style-type: %1$s;',
						esc_attr( $list_style_type )
					),
				)
			);
		}

		if ( 'inside' !== $list_style_position ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '#et-boc %%order_class%% ul.dsm-menu, %%order_class%% ul.dsm-menu, %%order_class%% ul.dsm-menu .sub-menu',
					'declaration' => sprintf(
						'list-style-position: %1$s;',
						esc_attr( $list_style_position )
					),
				)
			);
		}

		$list_style_color_style        = sprintf( 'color: %1$s;', esc_attr( $list_style_color ) );
		$list_style_color_tablet_style = '' !== $list_style_color_tablet ? sprintf( 'color: %1$s;', esc_attr( $list_style_color_tablet ) ) : '';
		$list_style_color_phone_style  = '' !== $list_style_color_phone ? sprintf( 'color: %1$s;', esc_attr( $list_style_color_phone ) ) : '';
		$list_style_color_style_hover  = '';

		if ( et_builder_is_hover_enabled( 'list_style_color', $this->props ) ) {
			$list_style_color_style_hover = sprintf( 'color: %1$s;', esc_attr( $list_style_color_hover ) );
		}

		if ( '' !== $list_style_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% ul.dsm-menu li',
					'declaration' => $list_style_color_style,
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% ul.dsm-menu li',
				'declaration' => $list_style_color_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% ul.dsm-menu li',
				'declaration' => $list_style_color_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			)
		);

		if ( '' !== $list_style_color_style_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%% ul.dsm-menu li' ),
					'declaration' => $list_style_color_style_hover,
				)
			);
		}

		if ( 'on' === $menu_animation && 'underline' === $menu_animation_type ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => "%%order_class%% .dsm-menu-animation-{$underline_animation} li a span:after",
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_html( $underline_animation_color )
					),
				)
			);
		}

		if ( '' !== $title ) {
			$title = sprintf(
				'<%1$s class="dsm-menu-title et_pb_module_header">%2$s</%1$s>',
				et_pb_process_header_level( $header_level, 'h4' ),
				$title
			);
		}

		$this->add_classname(
			array(
				$this->get_text_orientation_classname(),
				"et_pb_bg_layout_{$background_layout}",
			)
		);

		// Render module content.
		$output = sprintf(
			'%2$s%1$s',
			$menu,
			$title
		);

		return $output;
	}
}

new DSM_NavMenu();
