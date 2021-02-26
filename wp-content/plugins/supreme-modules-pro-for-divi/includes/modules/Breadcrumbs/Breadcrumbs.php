<?php
/**
 * Breadcrumbs class
 */
class DSM_Breadcrumbs extends ET_Builder_Module {

	public $slug = 'dsm_breadcrumbs';

	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->icon_path              = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->name                   = esc_html__( 'Supreme Breadcrumbs', 'dsm-supreme-modules-pro-for-divi' );
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'breadcrumbs' => esc_html__( 'Breadcrumbs', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'alignment'  => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'items'      => esc_html__( 'Items', 'dsm-supreme-modules-pro-for-divi' ),
					'home_icon'  => esc_html__( 'Home Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'separators' => esc_html__( 'Separators', 'dsm-supreme-modules-pro-for-divi' ),
					'current'    => esc_html__( 'Current', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {

		$advanced_fields                 = array();
		$advanced_fields['text']         = false;
		$advanced_fields['text_shadow']  = false;
		$advanced_fields['fonts']        = false;
		$advanced_fields['link_options'] = false;

		$advanced_fields['borders']['default'] = array(
			'css' => array(
				'main' => array(
					'border_radii'  => '%%order_class%%',
					'border_styles' => '%%order_class%%',
				),
			),
		);

		$advanced_fields['borders']['items'] = array(
			'css'         => array(
				'main' => array(
					'border_radii'  => '%%order_class%% .dsm_breadcrumbs li',
					'border_styles' => '%%order_class%% .dsm_breadcrumbs li',
				),
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'items',
		);

		$advanced_fields['box_shadow']['items'] = array(
			'css'         => array(
				'main' => '%%order_class%% .dsm_breadcrumbs li',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'items',
		);

		$advanced_fields['borders']['separators'] = array(
			'css'         => array(
				'main' => array(
					'border_radii'  => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator',
					'border_styles' => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator',
				),
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'separators',
		);

		$advanced_fields['box_shadow']['separators'] = array(
			'css'         => array(
				'main' => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'separators',
		);

		$advanced_fields['box_shadow']['current'] = array(
			'css'         => array(
				'main' => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'current',
		);

		$advanced_fields['borders']['current'] = array(
			'css'         => array(
				'main' => array(
					'border_radii'  => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current',
					'border_styles' => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current',
				),
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'current',
		);

		$advanced_fields['fonts']['items'] = array(
			'label'           => esc_html__( 'Item', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main'  => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item:not(.dsm_breadcrumbs_item_current), %%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item a',
				'hover' => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item:not(.dsm_breadcrumbs_item_current):hover, %%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item:hover a',
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'items',
		);

		$advanced_fields['fonts']['home_icon'] = array(
			'label'               => esc_html__( 'Home Icon', 'dsm-supreme-modules-pro-for-divi' ),
			'css'                 => array(
				'main' => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item span.dsm_home_icon, .et-db #et-boc .et-l %%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item span.dsm_home_icon',
			),
			'hide_font'           => true,
			'hide_text_align'     => true,
			'hide_letter_spacing' => true,
			'hide_line_height'    => true,
			'hide_text_shadow'    => true,
			'tab_slug'            => 'advanced',
			'toggle_slug'         => 'home_icon',
			'show_if'             => array(
				'show_home_icon' => 'on',
			),
			'depends_on'          => array( 'show_home_icon' ),
			'depends_show_if'     => 'on',
		);

		$advanced_fields['fonts']['separators'] = array(
			'label'               => esc_html__( 'Separator', 'dsm-supreme-modules-pro-for-divi' ),
			'css'                 => array(
				'main'  => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator .dsm_separator_icon, .et-db #et-boc .et-l %%order_class%% li.dsm_breadcrumbs_separator .dsm_separator_icon',
				'hover' => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator:hover .dsm_separator_icon, .et-db #et-boc .et-l %%order_class%% li.dsm_breadcrumbs_separator:hover .dsm_separator_icon',

			),
			'hide_font'           => true,
			'hide_text_align'     => true,
			'hide_letter_spacing' => true,
			'hide_line_height'    => true,
			'tab_slug'            => 'advanced',
			'toggle_slug'         => 'separators',
		);

		$advanced_fields['fonts']['current'] = array(
			'label'           => esc_html__( 'Current Item', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main'  => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current, %%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current span',
				'hover' => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current:hover, %%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current:hover span',
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'current',
		);

		return $advanced_fields;
	}

	public function get_fields() {

		$fields = array();

		$fields['show_home'] = array(
			'label'       => esc_html__( 'Show Custom Home', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'yes_no_button',
			'options'     => array(
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default'     => 'on',
			'toggle_slug' => 'breadcrumbs',
		);

		$fields['home_text'] = array(
			'label'       => esc_html__( 'Home Text', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'text',
			'show_if'     => array(
				'show_home' => 'on',
			),
			'default'     => 'Home',
			'toggle_slug' => 'breadcrumbs',
		);

		$fields['show_home_icon'] = array(
			'label'       => esc_html__( 'Show Home Icon', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'yes_no_button',
			'options'     => array(
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default'     => 'on',
			'toggle_slug' => 'breadcrumbs',
			'affects'     => array(
				'home_icon_font_size',
				'home_icon_text_color',
			),
		);

		$fields['home_icon'] = array(
			'label'       => esc_html__( 'Home Icon', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'select_icon',
			'show_if'     => array(
				'show_home_icon' => 'on',
			),
			'default'     => '',
			'toggle_slug' => 'breadcrumbs',
		);

		$fields['show_separator'] = array(
			'label'       => esc_html__( 'Custom Separator Icon', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'yes_no_button',
			'options'     => array(
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default'     => 'on',
			'toggle_slug' => 'breadcrumbs',
		);

		$fields['separator_icon'] = array(
			'label'       => esc_html__( 'Separator Icon', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'select_icon',
			'default'     => '5',
			'toggle_slug' => 'breadcrumbs',
			'show_if'     => array(
				'show_separator' => 'on',
			),
		);

		$fields['align'] = array(
			'label'            => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'text_align',
			'option_category'  => 'layout',
			'options'          => et_builder_get_text_orientation_options( array( 'justified' ) ),
			'default_on_front' => 'left',
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'alignment',
			'description'      => esc_html__( 'Here you can choose the breadcrumbs alignment.', 'dsm-supreme-modules-pro-for-divi' ),
			'options_icon'     => 'module_align',
			'mobile_options'   => true,
		);

		$fields['items_bg_color'] = array(
			'label'        => esc_html__( 'Items Background Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'         => 'color-alpha',
			'custom_color' => true,
			'tab_slug'     => 'advanced',
			'toggle_slug'  => 'items',
			'hover'        => 'tabs',
		);

		$fields['separator_bg_color'] = array(
			'label'        => esc_html__( 'Separators Background Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'         => 'color-alpha',
			'custom_color' => true,
			'tab_slug'     => 'advanced',
			'toggle_slug'  => 'separators',
			'hover'        => 'tabs',
		);

		$fields['current_bg_color'] = array(
			'label'        => esc_html__( 'Items Background Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'         => 'color-alpha',
			'custom_color' => true,
			'tab_slug'     => 'advanced',
			'toggle_slug'  => 'current',
			'hover'        => 'tabs',
		);
		$fields['items_bottom']     = array(
			'label'            => esc_html__( 'Bottom Gap', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'option_category'  => 'configuration',
			'default'          => '10px',
			'default_on_front' => '10px',
			'default_unit'     => 'px',
			'range_settings'   => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'mobile_options'   => true,
			'responsive'       => true,
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'items',
			'hover'            => 'tabs',
		);
		$fields['items_padding']    = array(
			'label'          => esc_html__( 'Items Padding', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'custom_margin',
			'default'        => '0px|0px|0px|0px',
			'mobile_options' => true,
			'responsive'     => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'items',
			'hover'          => 'tabs',
		);

		$fields['separator_bottom'] = array(
			'label'            => esc_html__( 'Separator Bottom Gap', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'option_category'  => 'configuration',
			'default'          => '10px',
			'default_on_front' => '10px',
			'default_unit'     => 'px',
			'range_settings'   => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'mobile_options'   => true,
			'responsive'       => true,
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'separators',
			'hover'            => 'tabs',
		);

		$fields['separator_padding'] = array(
			'label'          => esc_html__( 'Separator Padding', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'custom_margin',
			'default'        => '0px|0px|0px|0px',
			'mobile_options' => true,
			'responsive'     => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'separators',
			'hover'          => 'tabs',
		);

		$fields['current_bottom'] = array(
			'label'            => esc_html__( 'Current Item Bottom Gap', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'option_category'  => 'configuration',
			'default'          => '10px',
			'default_on_front' => '10px',
			'default_unit'     => 'px',
			'range_settings'   => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'mobile_options'   => true,
			'responsive'       => true,
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'current',
			'hover'            => 'tabs',
		);

		$fields['current_padding'] = array(
			'label'          => esc_html__( 'Current Item Padding', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'custom_margin',
			'default'        => '0px|0px|0px|0px',
			'mobile_options' => true,
			'responsive'     => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'current',
			'hover'          => 'tabs',
		);

		$fields['__breadcrumb'] = array(
			'type'                => 'computed',
			'computed_callback'   => array( 'DSM_Breadcrumbs', 'breadcrumbs' ),
			'computed_depends_on' => array(
				'show_home',
				'home_text',
				'show_home_icon',
				'home_icon',
				'show_separator',
				'separator_icon',
			),
		);

		return $fields;
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

	public static function breadcrumbs( $args = array(), $conditional_tags = array(), $current_page = array() ) {

		global $post;

		$custom_taxonomy = 'product_cat';

		$defaults = array(
			'show_home'      => '',
			'home_text'      => '',
			'show_home_icon' => '',
			'home_icon'      => '',
			'show_separator' => '',
			'separator_icon' => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$is_home       = et_fb_conditional_tag( 'is_home', $conditional_tags );
		$is_front_page = et_fb_conditional_tag( 'is_front_page', $conditional_tags );
		$is_single     = et_fb_conditional_tag( 'is_single', $conditional_tags );
		$post_id       = isset( $current_page['id'] ) ? (int) $current_page['id'] : 0;
		$page_object   = get_post( $post_id );

		$is_page = isset( $page_object->post_type ) && 'page' === $page_object->post_type;

		$_post     = get_post( $post_id );
		$parent_id = get_post( $_post->post_parent );

		$output = '';

		ob_start();

		if ( ! $is_front_page ) {

			echo '<ul class="dsm_breadcrumbs">';

			self::render_home_link( $args );

			if ( $is_single ) {

				self::render_separator( true, $args );

				$post_type = get_post_type( $post_id );

				if ( 'post' !== $post_type ) {

					$post_type_object  = get_post_type_object( $post_type );
					$post_type_archive = get_post_type_archive_link( $post_type );

					echo '
						<li class="dsm_breadcrumbs_item">
							<a class="dsm_breadcrumbs_crumb dsm_breadcrumbs_crumb_link" href=' . esc_attr( $post_type_archive ) . ' itemprop="url">
								' . esc_attr( $post_type_object->labels->name ) . '
							</a>
						</li>';

						self::render_separator( true, $args );

				}

				$category = get_the_category( $post_id );

				if ( ! empty( $category ) ) {

					$values           = array_values( $category );
					$last_category    = reset( $values );
					$another_category = next( $values );

					$categories      = array();
					$get_cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
					$cat_parents     = explode( ',', $get_cat_parents );

					if ( $another_category ) {
						$another_get_cat_parents = rtrim( get_category_parents( $another_category->term_id, true, ',' ), ',' );
						$cat_parents             = explode( ',', $another_get_cat_parents );
					}

					foreach ( $cat_parents as $parent ) {
						$categories[] = get_term_by( 'name', $parent, 'category' );
					}

					$cat_display = '';

					foreach ( $categories as $parent ) {
						if ( ! is_wp_error( get_term_link( $parent ) ) ) {
							$cat_display .= '<li class="dsm_breadcrumbs_item dsm_breadcrumbs_item_cat"><a class="dsm_breadcrumbs_crumb dsm_breadcrumbs_crumb_link dsm_breadcrumbs_crumb_cat" href="' . get_term_link( $parent ) . '" itemprop="url">' . $parent->name . '</a></li>';
							$cat_display .= self::render_separator( false, $args );
						}
					}
				}

				$taxonomy_exists = taxonomy_exists( $custom_taxonomy );

				if ( empty( $last_category ) && ! empty( $custom_taxonomy ) && $taxonomy_exists ) {
					$taxonomy_terms = get_the_terms( $post_id, $custom_taxonomy );
				}

				if ( ! empty( $last_category ) ) {

					echo et_core_esc_previously( $cat_display );

					echo '<li class="dsm_breadcrumbs_item dsm_breadcrumbs_item_current">';
					echo '<span class="dsm_breadcrumbs_crumb dsm_breadcrumbs_crumb_current">';
					echo et_core_esc_previously( get_the_title( $post_id ) );
					echo '</span>';
					echo '</li>';

				} elseif ( ! empty( $taxonomy_terms ) ) {

					foreach ( $taxonomy_terms as $index => $taxonomy ) {

						$cat_id       = $taxonomy->term_id;
						$cat_nicename = $taxonomy->slug;
						$cat_link     = get_term_link( $taxonomy->term_id, $custom_taxonomy );
						$cat_name     = $taxonomy->name;

						echo '<li class="dsm_breadcrumbs_item dsm_breadcrumbs_item_cat">';
						echo '<a href=' . et_core_esc_previously( $cat_link ) . ' class="dsm_breadcrumbs_crumb dsm_breadcrumbs_crumb_cat" itemprop="url" >';
						echo et_core_esc_previously( $cat_name );
						echo '</a>';
						echo '</li>';

						self::render_separator( true, $args );

					}

					echo '
						<li class="dsm_breadcrumbs_item dsm_breadcrumbs_item_current">
							<span class="dsm_breadcrumbs_crumb dsm_breadcrumbs_crumb_current">' . et_core_esc_previously( get_the_title( $post_id ) ) . '</span>
						</li>
						';

				} else {
					echo '
						<li class="dsm_breadcrumbs_item dsm_breadcrumbs_item_current">
							<span class="dsm_breadcrumbs_crumb dsm_breadcrumbs_crumb_current">' . et_core_esc_previously( get_the_title( $post_id ) ) . '</span>
						</li>
					';
				}
			} elseif ( $is_page ) {

				self::render_separator( true, $args );

				if ( $parent_id ) {

					$anc = get_post_ancestors( $post_id );

					$anc = array_reverse( $anc );

					if ( ! isset( $parents ) ) {
						$parents = null;
					}

					foreach ( $anc as $ancestor ) {

						$parents .= '
							<li class="dsm_breadcrumbs_item dsm_breadcrumbs_item_parent">
								<a class="dsm_breadcrumbs_crumb dsm_breadcrumbs_crumb_link" href="' . get_permalink( $ancestor ) . '" itemprop="url">
									' . et_core_esc_previously( get_the_title( $ancestor ) ) . '
								</a>
							</li>';

						$parents .= self::render_separator( false, $args );
					}

					echo et_core_esc_previously( $parents );

				}

				echo '
					<li class="dsm_breadcrumbs_item dsm_breadcrumbs_item_current">
						<span class="dsm_breadcrumbs_crumb dsm_breadcrumbs_crumb_current">
							' . et_core_esc_previously( get_the_title( $post_id ) ) . '
						</span>
					</li>
				';
			}

			echo '</ul>';

		} else {
			echo '<ul class="dsm_breadcrumbs">';
			self::render_home_link( $args );
			echo '</ul>';
		}

		$output = ob_get_clean();

		if ( ! $output ) {
			$output = 'No Breadcrumb!';
		}

		return $output;
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$this->apply_css( $render_slug );

		$breadcrumbs = self::breadcrumbs( $this->props );

		return sprintf(
			'<nav class="dsm_breadcrumbs_wrap" role="navigation" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
				%1$s
			</nav>',
			$breadcrumbs
		);

	}

	protected static function render_separator( $output = true, $args = array() ) {

		if ( 'off' === $args['show_separator'] ) {
			return '';
		}

		$html  = '<li class="dsm_breadcrumbs_separator"> ';
		$html .= '<span class="et-pb-icon dsm_separator_icon">';
		$html .= esc_attr( et_pb_process_font_icon( $args['separator_icon'] ) );
		$html .= '</span>';
		$html .= '</li>';

		if ( true === $output ) {
			echo et_core_esc_previously( $html );
			return;
		}

		return $html;
	}

	protected static function render_home_link( $args = array() ) {

		$default_home_icon  = esc_attr( et_pb_process_font_icon( '' ) );
		$selected_home_icon = esc_attr( et_pb_process_font_icon( $args['home_icon'] ) );

		if ( 'on' === $args['show_home'] ) :

			?>

			<li class='dsm_breadcrumbs_item dsm_home_item dsm_home_item_custom'>
				<a href="<?php echo esc_url( get_home_url() ); ?>" itemprop="url">
					<span class='dsm_home_text_wrapper'>
						<?php if ( 'on' === $args['show_home_icon'] ) : ?>
							<span class="et-pb-icon dsm_home_icon"><?php echo esc_attr( $selected_home_icon ); ?></span>
						<?php endif; ?>
							<span class="dsm_home_text" itemprop="name">
								<?php echo esc_attr( $args['home_text'] ); ?>
							</span>
					</span>
				</a>
			</li>

		<?php else : ?>
			<li class="dsm_home_item dsm_home_item_default">
				<a href="<?php echo esc_url( get_home_url() ); ?>" itemprop="url">
					<span class="dsm_home_text_wrapper"> 
						<?php if ( 'on' === $args['show_home_icon'] ) : ?>
							<span class="et-pb-icon dsm_home_icon">
								<?php echo esc_attr( $selected_home_icon ); ?>
							</span>
						<?php endif; ?>
							<span class="dsm_home_text" itemprop="name">
								<?php echo et_core_esc_previously( bloginfo( 'name' ) ); ?> 
							</span>
					</span>
				</a>
			<li>

			<?php
		endif;

		//self::render_separator( true, $args );
	}

	public function apply_css( $render_slug ) {

		$align = $this->get_alignment();
		if ( 'left' === $align ) {
			$align = 'flex-start';
		} elseif ( 'right' === $align ) {
			$align = 'flex-end';
		}
		$align_tablet = $this->get_alignment( 'tablet' );
		if ( 'left' === $align_tablet ) {
			$align_tablet = 'flex-start';
		} elseif ( 'right' === $align_tablet ) {
			$align_tablet = 'flex-end';
		}
		$align_phone = $this->get_alignment( 'phone' );
		if ( 'left' === $align_phone ) {
			$align_phone = 'flex-start';
		} elseif ( 'right' === $align_phone ) {
			$align_phone = 'flex-end';
		}

		$this->items_bottom( $render_slug );
		$this->items_padding( $render_slug );
		$this->separator_bottom( $render_slug );
		$this->separator_padding( $render_slug );
		$this->current_bottom( $render_slug );
		$this->current_padding( $render_slug );

		// Responsive Breadcrumbs Alignment.

		$align_values = array(
			'desktop' => array(
				'justify-content' => esc_html( $align ),
			),
			'tablet'  => array(
				'justify-content' => esc_html( $align_tablet ),
			),
			'phone'   => array(
				'justify-content' => esc_html( $align_phone ),
			),
		);

		et_pb_responsive_options()->generate_responsive_css( $align_values, '%%order_class%% .dsm_breadcrumbs', '', $render_slug, '', 'alignment' );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item:not(.dsm_breadcrumbs_item_current)',
				'declaration' => sprintf(
					'background: %1$s;',
					$this->props['items_bg_color']
				),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item, %%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item a, %%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator,%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current',
				'declaration' => sprintf(
					'transition: border-color %1$s %2$s %3$s, border-radius %1$s %2$s %3$s, box-shadow %1$s %2$s %3$s, color %1$s %2$s %3$s,box-shadow %1$s %2$s %3$s,background-color %1$s %2$s %3$s,box-shadow %1$s %2$s %3$s,padding %1$s %2$s %3$s, margin %1$s %2$s %3$s;',
					$this->props['hover_transition_duration'],
					$this->props['hover_transition_delay'],
					$this->props['hover_transition_speed_curve']
				),
			)
		);

		$items_bg_color_hover = isset( $this->props['items_bg_color__hover'] ) ? $this->props['items_bg_color__hover'] : $this->props['items_bg_color'];

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item:hover',
				'declaration' => sprintf( 'background: %1$s;', $items_bg_color_hover ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator',
				'declaration' => sprintf(
					'background: %1$s;',
					$this->props['separator_bg_color']
				),
			)
		);

		$separator_bg_color_hover = isset( $this->props['separator_bg_color__hover'] ) ? $this->props['separator_bg_color__hover'] : $this->props['separator_bg_color'];

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator:hover',
				'declaration' => sprintf( 'background: %1$s;', $separator_bg_color_hover ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current',
				'declaration' => sprintf(
					'background: %1$s;',
					$this->props['current_bg_color']
				),
			)
		);

		$current_bg_color_hover = isset( $this->props['current_bg_color__hover'] ) ? $this->props['current_bg_color__hover'] : $this->props['current_bg_color'];

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current:hover',
				'declaration' => sprintf( 'background: %1$s;', $current_bg_color_hover ),
			)
		);

	}

	public function items_bottom( $render_slug ) {

		$items_bottom                   = $this->props['items_bottom'];
		$items_bottom_tablet            = $this->props['items_bottom_tablet'];
		$items_bottom_phone             = $this->props['items_bottom_phone'];
		$items_bottom_last_edited       = $this->props['items_bottom_last_edited'];
		$items_bottom_responsive_status = et_pb_get_responsive_status( $items_bottom_last_edited );

		$items_bottom_hover = isset( $this->props['items_bottom__hover'] ) ? $this->props['items_bottom__hover'] : '';

		if ( '' !== $items_bottom ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item',
					'declaration' => sprintf(
						'
					margin-bottom: %1$s;',
						isset( $items_bottom ) ? $items_bottom : ''
					),
				)
			);
		}

		if ( '' !== $items_bottom_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item:hover',
					'declaration' => sprintf(
						'
						margin-bottom: %1$s;',
						isset( $items_bottom_hover ) ? $items_bottom_hover : ''
					),
				)
			);
		}

		if ( '' !== $items_bottom_tablet && $items_bottom_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item',
					'declaration' => sprintf(
						'
					margin-bottom: %1$s;',
						isset( $items_bottom_tablet ) ? $items_bottom_tablet : ''
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $items_bottom_phone && $items_bottom_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item',
					'declaration' => sprintf(
						'
						margin-bottom: %1$s;',
						isset( $items_bottom_phone ) ? $items_bottom_phone : ''
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
	}

	public function items_padding( $render_slug ) {

		$items_padding                   = explode( '|', $this->props['items_padding'] );
		$items_padding_tablet            = explode( '|', $this->props['items_padding_tablet'] );
		$items_padding_phone             = explode( '|', $this->props['items_padding_phone'] );
		$items_padding_last_edited       = $this->props['items_padding_last_edited'];
		$items_padding_responsive_status = et_pb_get_responsive_status( $items_padding_last_edited );

		$items_padding_hover = isset( $this->props['items_padding__hover'] ) ? explode( '|', $this->props['items_padding__hover'] ) : '';

		if ( '' !== $items_padding ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item a',
					'declaration' => sprintf(
						'
					padding-top   : %1$s;
					padding-right : %2$s;
					padding-bottom: %3$s;
					padding-left  : %4$s;',
						isset( $items_padding[0] ) ? $items_padding[0] : '',
						isset( $items_padding[1] ) ? $items_padding[1] : '',
						isset( $items_padding[2] ) ? $items_padding[2] : '',
						isset( $items_padding[3] ) ? $items_padding[3] : ''
					),
				)
			);
		}

		if ( '' !== $items_padding_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item:hover a',
					'declaration' => sprintf(
						'
					padding-top   : %1$s;
					padding-right : %2$s;
					padding-bottom: %3$s;
					padding-left  : %4$s;',
						$items_padding_hover[0],
						$items_padding_hover[1],
						$items_padding_hover[2],
						$items_padding_hover[3]
					),
				)
			);
		}

		if ( '' !== $items_padding_tablet && $items_padding_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item a',
					'declaration' => sprintf(
						'
					padding-top   : %1$s;
					padding-right : %2$s;
					padding-bottom: %3$s;
					padding-left  : %4$s;',
						isset( $items_padding_tablet[0] ) ? $items_padding_tablet[0] : '',
						isset( $items_padding_tablet[1] ) ? $items_padding_tablet[1] : '',
						isset( $items_padding_tablet[2] ) ? $items_padding_tablet[2] : '',
						isset( $items_padding_tablet[3] ) ? $items_padding_tablet[3] : ''
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $items_padding_phone && $items_padding_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item a',
					'declaration' => sprintf(
						'
					padding-top   : %1$s;
					padding-right : %2$s;
					padding-bottom: %3$s;
					padding-left  : %4$s;',
						isset( $items_padding_phone[0] ) ? $items_padding_phone[0] : '',
						isset( $items_padding_phone[1] ) ? $items_padding_phone[1] : '',
						isset( $items_padding_phone[2] ) ? $items_padding_phone[2] : '',
						isset( $items_padding_phone[3] ) ? $items_padding_phone[3] : ''
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
	}

	public function separator_bottom( $render_slug ) {

		$separator_bottom                   = $this->props['separator_bottom'];
		$separator_bottom_tablet            = $this->props['separator_bottom_tablet'];
		$separator_bottom_phone             = $this->props['separator_bottom_phone'];
		$separator_bottom_last_edited       = $this->props['separator_bottom_last_edited'];
		$separator_bottom_responsive_status = et_pb_get_responsive_status( $separator_bottom_last_edited );

		$separator_bottom_hover = isset( $this->props['separator_bottom__hover'] ) ? $this->props['separator_bottom__hover'] : '';

		if ( '' !== $separator_bottom ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator',
					'declaration' => sprintf(
						'
					margin-bottom: %1$s;',
						isset( $separator_bottom ) ? $separator_bottom : ''
					),
				)
			);
		}

		if ( '' !== $separator_bottom_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator:hover',
					'declaration' => sprintf(
						'
						margin-bottom: %1$s;',
						isset( $separator_bottom_hover ) ? $separator_bottom_hover : ''
					),
				)
			);
		}

		if ( '' !== $separator_bottom_tablet && $separator_bottom_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator',
					'declaration' => sprintf(
						'
					margin-bottom: %1$s;',
						isset( $separator_bottom_tablet ) ? $separator_bottom_tablet : ''
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $separator_bottom_phone && $separator_bottom_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator',
					'declaration' => sprintf(
						'
						margin-bottom: %1$s;',
						isset( $separator_bottom_phone ) ? $separator_bottom_phone : ''
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
	}

	public function separator_padding( $render_slug ) {

		$separator_padding                   = explode( '|', $this->props['separator_padding'] );
		$separator_padding_tablet            = explode( '|', $this->props['separator_padding_tablet'] );
		$separator_padding_phone             = explode( '|', $this->props['separator_padding_phone'] );
		$separator_padding_last_edited       = $this->props['separator_padding_last_edited'];
		$separator_padding_responsive_status = et_pb_get_responsive_status( $separator_padding_last_edited );

		$separator_padding_hover = isset( $this->props['separator_padding__hover'] ) ? explode( '|', $this->props['separator_padding__hover'] ) : '';

		if ( '' !== $separator_padding ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator',
					'declaration' => sprintf(
						'
					padding-top   : %1$s !important;
					padding-right : %2$s !important;
					padding-bottom: %3$s !important;
					padding-left  : %4$s !important;',
						isset( $separator_padding[0] ) ? $separator_padding[0] : '',
						isset( $separator_padding[1] ) ? $separator_padding[1] : '',
						isset( $separator_padding[2] ) ? $separator_padding[2] : '',
						isset( $separator_padding[3] ) ? $separator_padding[3] : ''
					),
				)
			);
		}

		if ( '' !== $separator_padding_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator:hover',
					'declaration' => sprintf(
						'
					padding-top   : %1$s !important;
					padding-right : %2$s !important;
					padding-bottom: %3$s !important;
					padding-left  : %4$s !important;',
						$separator_padding_hover[0],
						$separator_padding_hover[1],
						$separator_padding_hover[2],
						$separator_padding_hover[3]
					),
				)
			);
		}

		if ( '' !== $separator_padding_tablet && $separator_padding_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator',
					'declaration' => sprintf(
						'
					padding-top   : %1$s;
					padding-right : %2$s;
					padding-bottom: %3$s;
					padding-left  : %4$s;',
						isset( $separator_padding_tablet[0] ) ? $separator_padding_tablet[0] : '',
						isset( $separator_padding_tablet[1] ) ? $separator_padding_tablet[1] : '',
						isset( $separator_padding_tablet[2] ) ? $separator_padding_tablet[2] : '',
						isset( $separator_padding_tablet[3] ) ? $separator_padding_tablet[3] : ''
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $separator_padding_phone && $separator_padding_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_separator',
					'declaration' => sprintf(
						'
					padding-top   : %1$s;
					padding-right : %2$s;
					padding-bottom: %3$s;
					padding-left  : %4$s;',
						isset( $separator_padding_phone[0] ) ? $separator_padding_phone[0] : '',
						isset( $separator_padding_phone[1] ) ? $separator_padding_phone[1] : '',
						isset( $separator_padding_phone[2] ) ? $separator_padding_phone[2] : '',
						isset( $separator_padding_phone[3] ) ? $separator_padding_phone[3] : ''
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

	}

	public function current_bottom( $render_slug ) {

		$current_bottom                   = $this->props['current_bottom'];
		$current_bottom_tablet            = $this->props['current_bottom_tablet'];
		$current_bottom_phone             = $this->props['current_bottom_phone'];
		$current_bottom_last_edited       = $this->props['current_bottom_last_edited'];
		$current_bottom_responsive_status = et_pb_get_responsive_status( $current_bottom_last_edited );

		$current_bottom_hover = isset( $this->props['current_bottom__hover'] ) ? $this->props['current_bottom__hover'] : '';

		if ( '' !== $current_bottom ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current',
					'declaration' => sprintf(
						'
					margin-bottom: %1$s;',
						isset( $current_bottom ) ? $current_bottom : ''
					),
				)
			);
		}

		if ( '' !== $current_bottom_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current:hover',
					'declaration' => sprintf(
						'
						margin-bottom: %1$s;',
						isset( $current_bottom_hover ) ? $current_bottom_hover : ''
					),
				)
			);
		}

		if ( '' !== $current_bottom_tablet && $current_bottom_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current',
					'declaration' => sprintf(
						'
					margin-bottom: %1$s;',
						isset( $current_bottom_tablet ) ? $current_bottom_tablet : ''
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $current_bottom_phone && $current_bottom_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current',
					'declaration' => sprintf(
						'
						margin-bottom: %1$s;',
						isset( $current_bottom_phone ) ? $current_bottom_phone : ''
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
	}

	public function current_padding( $render_slug ) {

		$current_padding                   = explode( '|', $this->props['current_padding'] );
		$current_padding_tablet            = explode( '|', $this->props['current_padding_tablet'] );
		$current_padding_phone             = explode( '|', $this->props['current_padding_phone'] );
		$current_padding_last_edited       = $this->props['current_padding_last_edited'];
		$current_padding_responsive_status = et_pb_get_responsive_status( $current_padding_last_edited );

		$current_padding_hover = isset( $this->props['current_padding__hover'] ) ? explode( '|', $this->props['current_padding__hover'] ) : '';

		if ( '' !== $current_padding ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current',
					'declaration' => sprintf(
						'
					padding-top   : %1$s;
					padding-right : %2$s;
					padding-bottom: %3$s;
					padding-left  : %4$s;',
						isset( $current_padding[0] ) ? $current_padding[0] : '',
						isset( $current_padding[1] ) ? $current_padding[1] : '',
						isset( $current_padding[2] ) ? $current_padding[2] : '',
						isset( $current_padding[3] ) ? $current_padding[3] : ''
					),
				)
			);
		}

		if ( '' !== $current_padding_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current:hover',
					'declaration' => sprintf(
						'
					padding-top   : %1$s;
					padding-right : %2$s;
					padding-bottom: %3$s;
					padding-left  : %4$s;',
						$current_padding_hover[0],
						$current_padding_hover[1],
						$current_padding_hover[2],
						$current_padding_hover[3]
					),
				)
			);
		}

		if ( '' !== $current_padding_tablet && $current_padding_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current',
					'declaration' => sprintf(
						'
					padding-top   : %1$s;
					padding-right : %2$s;
					padding-bottom: %3$s;
					padding-left  : %4$s;',
						isset( $current_padding_tablet[0] ) ? $current_padding_tablet[0] : '',
						isset( $current_padding_tablet[1] ) ? $current_padding_tablet[1] : '',
						isset( $current_padding_tablet[2] ) ? $current_padding_tablet[2] : '',
						isset( $current_padding_tablet[3] ) ? $current_padding_tablet[3] : ''
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $current_padding_phone && $current_padding_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_breadcrumbs li.dsm_breadcrumbs_item.dsm_breadcrumbs_item_current',
					'declaration' => sprintf(
						'
					padding-top   : %1$s;
					padding-right : %2$s;
					padding-bottom: %3$s;
					padding-left  : %4$s;',
						isset( $current_padding_phone[0] ) ? $current_padding_phone[0] : '',
						isset( $current_padding_phone[1] ) ? $current_padding_phone[1] : '',
						isset( $current_padding_phone[2] ) ? $current_padding_phone[2] : '',
						isset( $current_padding_phone[3] ) ? $current_padding_phone[3] : ''
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
	}

}

new DSM_Breadcrumbs();
