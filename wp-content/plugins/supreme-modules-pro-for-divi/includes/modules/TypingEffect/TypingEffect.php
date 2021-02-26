<?php
/**
 * Divi Supreme Typing Module.
 *
 * @since 1.0.0
 */
class DSM_TypingEffect extends ET_Builder_Module {
	/**
	 * Slug
	 *
	 * @var $slug The slug of the module name.
	 */
	public $slug = 'dsm_typing_effect';
	/**
	 * Visual Builder support.
	 *
	 * @var $vb_support Visual Builder Support.
	 */
	public $vb_support = 'on';
	/**
	 * Module Credits.
	 *
	 * @var $module_credits Credit Author.
	 */
	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);
	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 */
	public function init() {
		$this->name      = esc_html__( 'Supreme Typing', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content'  => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
					'typing_option' => esc_html__( 'Typing Options', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'typing_styles' => array(
						'title'    => esc_html__( 'Typing Styles', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 56,
					),
				),
			),
		);
	}

	/**
	 * Module's advanced fields configuration
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'header' => array(
					'label'          => esc_html__( 'Main', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main'       => '%%order_class%% h1.et_pb_module_header, %%order_class%% h2.et_pb_module_header, %%order_class%% h3.et_pb_module_header, %%order_class%% h4.et_pb_module_header, %%order_class%% h5.et_pb_module_header, %%order_class%% h6.et_pb_module_header',
						'text_align' => '%%order_class%%',
					),
					'font_size'      => array(
						'default' => '30px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'header_level'   => array(
						'default' => 'h1',
					),
				),
				'before' => array(
					'label'          => esc_html__( 'Before', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-before-typing-effect',
					),
					'font_size'      => array(
						'default' => '30px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),

				),
				'typing' => array(
					'label'          => esc_html__( 'Typing', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-typing-effect .dsm-typing-wrapper',
					),
					'font_size'      => array(
						'default' => '30px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'toggle_slug'    => 'typing_styles',
				),
				'after'  => array(
					'label'          => esc_html__( 'After', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-after-typing-effect',
					),
					'font_size'      => array(
						'default' => '30px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
				),
			),
			'text'           => array(
				'use_text_orientation'  => false,
				'use_background_layout' => true,
				'css'                   => array(
					'text_shadow' => '%%order_class%%',
				),
				'options'               => array(
					'background_layout' => array(
						'default' => 'light',
					),
				),
				'toggle_slug'           => 'header',
			),
			'text_shadow'    => array(
				// Don't add text-shadow fields since they already are via font-options.
				'default' => false,
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => "{$this->main_css_element}",
					'important' => 'all',
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
				'before'  => array(
					'css'             => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-typing-effect .dsm-before-typing-effect',
							'border_styles' => '%%order_class%% .dsm-typing-effect .dsm-before-typing-effect',
						),
					),
					'label_prefix'    => esc_html__( 'Typing', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'before',
					'depends_show_if' => 'off',
				),
				'typing'  => array(
					'css'             => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-typing-effect .dsm-typing-wrapper',
							'border_styles' => '%%order_class%% .dsm-typing-effect .dsm-typing-wrapper',
						),
					),
					'label_prefix'    => esc_html__( 'Typing', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'typing_styles',
					'depends_show_if' => 'off',
				),
				'after'   => array(
					'css'             => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-typing-effect .dsm-after-typing-effect',
							'border_styles' => '%%order_class%% .dsm-typing-effect .dsm-after-typing-effect',
						),
					),
					'label_prefix'    => esc_html__( 'Typing', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'after',
					'depends_show_if' => 'off',
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
		);
	}

	/**
	 * Module's specific fields
	 *
	 * The following modules are automatically added regardless being defined or not:
	 *   Tabs     | Toggles          | Fields
	 *   --------- ------------------ -------------
	 *   Content  | Admin Label      | Admin Label
	 *   Advanced | CSS ID & Classes | CSS ID
	 *   Advanced | CSS ID & Classes | CSS Class
	 *   Advanced | Custom CSS       | Before
	 *   Advanced | Custom CSS       | Main Element
	 *   Advanced | Custom CSS       | After
	 *   Advanced | Visibility       | Disable On
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function get_fields() {
		return array(
			'before_typing_effect'           => array(
				'label'           => esc_html__( 'Before Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'typing_effect'                  => array(
				'label'            => esc_html__( 'Typing Effect Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( 'The title of your Typing Effect Text. Use "|" as a separator. eg Word One|Text Two|Divi 3', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'Design Divi sites with|Divi|Supreme',
				'toggle_slug'      => 'main_content',
				'dynamic_content'  => 'text',
			),
			'before_new_line'                => array(
				'label'           => esc_html__( 'Typing Text On a New line', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'description'     => esc_html__( 'If enabled, your shuffle text will appear on the next line after the before text.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
			),
			'after_typing_effect'            => array(
				'label'           => esc_html__( 'After Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			),
			'after_new_line'                 => array(
				'label'           => esc_html__( 'After Text On a New line', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'description'     => esc_html__( 'If enabled, your after text will appear on the next line after the Shuffle text.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
			),
			'typing_loop'                    => array(
				'label'            => esc_html__( 'Use Loop', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'default'          => 'on',
				'default_on_front' => 'on',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'description'      => esc_html__( 'If enabled, typing effect will loop infinite.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'typing_option',
			),
			'typing_remove_cursor'           => array(
				'label'            => esc_html__( 'Remove Cursor After Completed', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'default_on_front' => 'off',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'typing_option',
				'show_if'          => array(
					'typing_loop' => 'off',
				),
			),
			'typing_speed'                   => array(
				'label'            => esc_html__( 'Typing Speed (in ms)', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '100ms',
				'default_on_front' => '100ms',
				'default_unit'     => 'ms',
				'range_settings'   => array(
					'min'  => '10',
					'max'  => '3000',
					'step' => '1',
				),
				'toggle_slug'      => 'typing_option',
			),
			'typing_backspeed'               => array(
				'label'            => esc_html__( 'Typing Backspeed (in ms)', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '50ms',
				'default_on_front' => '50ms',
				'default_unit'     => 'ms',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '300',
					'step' => '1',
				),
				'toggle_slug'      => 'typing_option',
			),
			'typing_backdelay'               => array(
				'label'            => esc_html__( 'Back delay (in ms)', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '700ms',
				'default_on_front' => '700ms',
				'range_settings'   => array(
					'min'  => '200',
					'max'  => '2000',
					'step' => '100',
				),
				'description'      => esc_html__( 'Time before backspacing', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'typing_option',
			),
			'typing_fadeout'                 => array(
				'label'            => esc_html__( 'Use Fade Out', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'default_on_front' => 'off',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'typing_option',
			),
			'typing_shuffle'                 => array(
				'label'            => esc_html__( 'Use Shuffle', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'default_on_front' => 'off',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'typing_option',
			),
			'typing_cursor'                  => array(
				'label'            => esc_html__( 'Cursor Character', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'default_on_front' => '|',
				'toggle_slug'      => 'typing_option',
				'description'      => esc_html__( 'Character for cursor.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'typing_cursor_color'            => array(
				'label'        => esc_html__( 'Cursor Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'typing_styles',
			),
			'typing_background_color'        => array(
				'label'        => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'hover'        => 'tabs',
				'toggle_slug'  => 'typing_styles',
			),
			'typing_padding'                 => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust padding to specific values, or leave blank to use the default padding.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'typing_styles',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			),
			'before_typing_background_color' => array(
				'label'        => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'hover'        => 'tabs',
				'toggle_slug'  => 'before',
			),
			'before_typing_padding'          => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust padding to specific values, or leave blank to use the default padding.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'before',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			),
			'after_typing_background_color'  => array(
				'label'        => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'hover'        => 'tabs',
				'toggle_slug'  => 'after',
			),
			'after_typing_padding'           => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'option_category' => 'layout',
				'description'     => esc_html__( 'Adjust padding to specific values, or leave blank to use the default padding.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'after',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			),
		);
	}

	/**
	 * Transition Fields
	 *
	 * @since 1.0.0
	 * @package    get_transition_fields_css_props
	 */
	public function get_transition_fields_css_props() {
		$fields                                   = parent::get_transition_fields_css_props();
		$fields['before_typing_background_color'] = array(
			'background-color' => '%%order_class%% .dsm-typing-effect .dsm-before-typing-effect',
		);
		$fields['after_typing_background_color']  = array(
			'background-color' => '%%order_class%% .dsm-typing-effect .dsm-after-typing-effect',
		);
		$fields['typing_background_color']        = array(
			'background-color' => '%%order_class%% .dsm-typing-effect .dsm-typing-wrapper',
		);

		return $fields;
	}

	/**
	 * Render module output
	 *
	 * @since 1.0.0
	 *
	 * @param array  $attrs       List of unprocessed attributes.
	 * @param string $content     Content being processed.
	 * @param string $render_slug Slug of module that is used for rendering output.
	 *
	 * @return string module's rendered output
	 */
	public function render( $attrs, $content = null, $render_slug ) {
		$before_typing_effect                 = $this->props['before_typing_effect'];
		$typing_effect                        = $this->props['typing_effect'];
		$after_typing_effect                  = $this->props['after_typing_effect'];
		$before_new_line                      = $this->props['before_new_line'];
		$before_typing_padding                = $this->props['before_typing_padding'];
		$before_typing_padding_tablet         = $this->props['before_typing_padding_tablet'];
		$before_typing_padding_phone          = $this->props['before_typing_padding_phone'];
		$before_typing_padding_last_edited    = $this->props['before_typing_padding_last_edited'];
		$before_typing_background_color       = $this->props['before_typing_background_color'];
		$before_typing_background_color_hover = $this->get_hover_value( 'before_typing_background_color' );
		$after_new_line                       = $this->props['after_new_line'];
		$after_typing_padding                 = $this->props['after_typing_padding'];
		$after_typing_padding_tablet          = $this->props['after_typing_padding_tablet'];
		$after_typing_padding_phone           = $this->props['after_typing_padding_phone'];
		$after_typing_padding_last_edited     = $this->props['after_typing_padding_last_edited'];
		$after_typing_background_color        = $this->props['after_typing_background_color'];
		$after_typing_background_color_hover  = $this->get_hover_value( 'after_typing_background_color' );
		$typing_loop                          = $this->props['typing_loop'];
		$typing_remove_cursor                 = $this->props['typing_remove_cursor'];
		$typing_speed                         = $this->props['typing_speed'];
		$typing_backspeed                     = $this->props['typing_backspeed'];
		$typing_backdelay                     = $this->props['typing_backdelay'];
		$typing_fadeout                       = $this->props['typing_fadeout'];
		$typing_shuffle                       = $this->props['typing_shuffle'];
		$typing_cursor                        = $this->props['typing_cursor'];
		$typing_cursor_color                  = $this->props['typing_cursor_color'];
		$typing_padding                       = $this->props['typing_padding'];
		$typing_padding_tablet                = $this->props['typing_padding_tablet'];
		$typing_padding_phone                 = $this->props['typing_padding_phone'];
		$typing_padding_last_edited           = $this->props['typing_padding_last_edited'];
		$typing_background_color              = $this->props['typing_background_color'];
		$typing_background_color_hover        = $this->get_hover_value( 'typing_background_color' );
		$background_layout                    = $this->props['background_layout'];
		$header_level                         = $this->props['header_level'];
		$animation_delay                      = $this->props['animation_delay'];

		if ( '' !== $before_typing_effect ) {
			$before_typing_effect = sprintf(
				'<span class="dsm-before-typing-effect">%1$s</span>%2$s',
				( 'on' === $before_new_line ? esc_html( $before_typing_effect ) : esc_html( "{$before_typing_effect}&nbsp;" ) ),
				( 'on' === $before_new_line ? '<br>' : '' )
			);
		}

		if ( '' !== $after_typing_effect ) {
			$after_typing_effect = sprintf(
				'%2$s<span class="dsm-after-typing-effect">%1$s</span>',
				( 'on' === $after_new_line ? esc_html( $after_typing_effect ) : esc_html( "&nbsp;{$after_typing_effect}" ) ),
				( 'on' === $after_new_line ? '<br>' : '' )
			);
		}

		if ( '' !== $typing_effect ) {
			$typing_effect = sprintf(
				'<%1$s class="dsm-typing-effect et_pb_module_header">%7$s<span class="dsm-typing-wrapper"><span class="dsm-typing-strings">%9$s</span><span class="dsm-typing" data-dsm-typing-strings="%2$s"%3$s%4$s%5$s%6$s%10$s></span></span>%8$s</%1$s>',
				et_pb_process_header_level( $header_level, 'h1' ),
				htmlspecialchars( $typing_effect, ENT_QUOTES ),
				esc_attr( " data-dsm-typing-speed={$typing_speed} data-dsm-typing-backspeed={$typing_backspeed} data-dsm-typing-backdelay={$typing_backdelay} data-dsm-typing-cursor={$typing_cursor}" ),
				( 'off' !== $typing_loop ? esc_attr( ' data-dsm-typing-loop=true' ) : esc_attr( " data-dsm-typing-loop=false data-dsm-typing-remove-cursor={$typing_remove_cursor}" ) ),
				( 'off' !== $typing_fadeout ? esc_attr( ' data-dsm-typing-fadeout=true' ) : esc_attr( ' data-dsm-typing-fadeout=false' ) ),
				( 'off' !== $typing_shuffle ? esc_attr( ' data-dsm-typing-shuffle=true' ) : esc_attr( ' data-dsm-typing-shuffle=false' ) ),
				$before_typing_effect,
				$after_typing_effect,
				str_replace( '|', ' ', esc_html( $typing_effect ) ),
				esc_attr( " data-dsm-typing-delay={$animation_delay}" )
			);
		}

		if ( '' !== $typing_cursor_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-typing-effect .typed-cursor',
					'declaration' => sprintf(
						'color: %1$s;',
						esc_html( $typing_cursor_color )
					),
				)
			);
		}

		if ( '' !== $typing_background_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-typing-effect .dsm-typing-wrapper',
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_html( $typing_background_color )
					),
				)
			);
		}

		if ( et_builder_is_hover_enabled( 'typing_background_color', $this->props ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%% .dsm-typing-effect .dsm-typing-wrapper' ),
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_html( $typing_background_color_hover )
					),
				)
			);
		}

		$this->apply_custom_margin_padding(
			$render_slug,
			'typing_padding',
			'padding',
			'%%order_class%% .dsm-typing-effect .dsm-typing-wrapper'
		);

		if ( '' !== $before_typing_background_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-typing-effect .dsm-before-typing-effect',
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_html( $before_typing_background_color )
					),
				)
			);
		}

		if ( et_builder_is_hover_enabled( 'before_typing_background_color', $this->props ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%% .dsm-typing-effect .dsm-before-typing-effect' ),
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_html( $before_typing_background_color_hover )
					),
				)
			);
		}

		if ( '' !== $after_typing_background_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-typing-effect .dsm-after-typing-effect',
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_html( $after_typing_background_color )
					),
				)
			);
		}

		if ( et_builder_is_hover_enabled( 'after_typing_background_color', $this->props ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%% .dsm-typing-effect .dsm-after-typing-effect' ),
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_html( $after_typing_background_color_hover )
					),
				)
			);
		}

		$this->apply_custom_margin_padding(
			$render_slug,
			'before_typing_padding',
			'padding',
			'%%order_class%% .dsm-typing-effect .dsm-before-typing-effect'
		);

		$this->add_classname(
			array(
				"et_pb_bg_layout_{$background_layout}",
				$this->get_text_orientation_classname(),
			)
		);

		wp_enqueue_script( 'dsm-typing-effect' );

		// Render module content.
		$output = sprintf(
			'%1$s',
			$typing_effect
		);

		return $output;
	}

	/**
	 * Credits https://github.com/elegantthemes/create-divi-extension/issues/125#issuecomment-445442095.
	 *
	 * @since 1.0.0
	 * @package    apply_custom_margin_padding
	 * @param string $function_name function name.
	 * @param string $slug render_slug.
	 * @param string $type type of CSS.
	 * @param string $class order_class.
	 * @param string $important Set Important.
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
	}
}

new DSM_TypingEffect();
