<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2020 Elicus Technologies Private Limited
 * @version     1.4.2
 */
class DIPL_PriceList extends ET_Builder_Module {

    public $slug       = 'dipl_price_list';
    public $child_slug = 'dipl_price_list_item';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://diviextended.com/product/divi-plus/',
        'author'     => 'Elicus',
        'author_uri' => 'https://elicus.com/',
    );

    public function init() {
        $this->name             = esc_html__( 'DP Price List', 'divi-plus' );
        $this->child_item_text  = esc_html__( 'Item', 'divi-plus' );
        $this->main_css_element = '%%order_class%%';
    }

    public function get_settings_modal_toggles() {
        return array(
            'general'  => array(
                'toggles' => array(
                    'main_content'  => esc_html__( 'Configuration', 'divi-plus' ),
                ),
            ),
            'advanced'  => array(
                'toggles' => array(
                    'text' => array(
                        'title' => esc_html__( 'Alignment', 'divi-plus' ),
                    ),
                    'name' => array(
                        'title' => esc_html__( 'Name', 'divi-plus' ),
                    ),
                    'price' => array(
                        'title' => esc_html__( 'Price', 'divi-plus' ),
                    ),
                    'currency' => array(
                        'title' => esc_html__( 'Currency', 'divi-plus' ),
                    ),
                    'desc' => array(
                        'title' => esc_html__( 'Description', 'divi-plus' ),
                        'tabbed_subtoggles' => true,
                        'bb_icons_support'  => true,
                        'sub_toggles'       => array(
                            'p'     => array(
                                'name' => 'P',
                                'icon' => 'text-left',
                            ),
                            'a'     => array(
                                'name' => 'A',
                                'icon' => 'text-link',
                            ),
                            'ul'    => array(
                                'name' => 'UL',
                                'icon' => 'list',
                            ),
                            'ol'    => array(
                                'name' => 'OL',
                                'icon' => 'numbered-list',
                            ),
                            'quote' => array(
                                'name' => 'QUOTE',
                                'icon' => 'text-quote',
                            ),
                        ),
                    ),
                ),
            ),
        );
    }

    public function get_advanced_fields_config() {
        return array(
            'fonts' => array(
                'name' => array(
                    'label'     => esc_html__( 'Item Name', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '20px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.2',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'header_level' => array(
                        'default' => 'h4',
                    ),
                    'hide_text_align' => true,
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_price_list_item_name",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'name',
                ),
                'price' => array(
                    'label'     => esc_html__( 'Price', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '18px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'hide_text_align' => true,
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_price_list_item_price",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'price',
                ),
                'currency' => array(
                    'label'     => esc_html__( 'Currency Symbol', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '18px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'hide_text_align' => true,
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_price_list_item_currency",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'currency',
                ),
                'desc_text' => array(
                    'label'     => esc_html__( 'Description', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '14px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.3',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_price_list_item_description, {$this->main_css_element} .dipl_price_list_item_description p",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'desc',
                    'sub_toggle'  => 'p',
                ),
                'desc_link' => array(
                    'label'     => esc_html__( 'Description Link', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '14px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.3',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_price_list_item_description a",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'desc',
                    'sub_toggle'  => 'a',
                ),
                'desc_link' => array(
                    'label'     => esc_html__( 'Link', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '14px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.3',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_price_list_item_description a",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'desc',
                    'sub_toggle'  => 'a',
                ),
                'desc_ul' => array(
                    'label'     => esc_html__( 'Unordered List', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '14px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.3',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_price_list_item_description ul li",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'desc',
                    'sub_toggle'  => 'ul',
                ),
                'desc_ol' => array(
                    'label'     => esc_html__( 'Ordered List', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '14px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.3',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_price_list_item_description ol li",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'desc',
                    'sub_toggle'  => 'ol',
                ),
                'desc_quote' => array(
                    'label'     => esc_html__( 'Blockquote', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '14px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.3',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'css' => array(
                        'main' => "{$this->main_css_element} .dipl_price_list_item_description blockquote",
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'desc',
                    'sub_toggle'  => 'quote',
                ),
            ),
            'borders' => array(
                'thumbnail' => array(
                    'label_prefix' => 'Thumbnail',
                    'css'          => array(
                        'main' => array(
                            'border_radii'  => "{$this->main_css_element} .dipl_price_list_item_thumbnail img",
                            'border_styles' => "{$this->main_css_element} .dipl_price_list_item_thumbnail img",
                        ),
                    ),
                    'tab_slug'     => 'advanced',
                    'toggle_slug'  => 'border',
                ),
                'default' => array(
                    'label_prefix' => 'Item List',
                    'css'          => array(
                        'main' => array(
                            'border_radii'  => $this->main_css_element,
                            'border_styles' => $this->main_css_element,
                        ),
                    ),
                    'tab_slug'     => 'advanced',
                    'toggle_slug'  => 'border',
                ),
            ),
            'box_shadow' => array(
                'thumbnail' => array(
                    'label'       => esc_html__( 'Thumbnail Box Shadow', 'divi-plus' ),
                    'css'          => array(
                        'main' => "{$this->main_css_element} .dipl_price_list_item_thumbnail img",
                    ),
                    'tab_slug'     => 'advanced',
                    'toggle_slug'  => 'box_shadow',
                ),
                'default' => array(
                    'label'       => esc_html__( 'Item List Box Shadow', 'divi-plus' ),
                    'css'         => array(
                        'main' => $this->main_css_element,
                    ),
                    'tab_slug'    => 'advanced',
                    'toggle_slug' => 'box_shadow',
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'main'      => $this->main_css_element,
                    'important' => 'all',
                ),
            ),
            'text' => array(
                'text_orientation' => array(
                    'exclude_options' => array( 'justified' ),
                ),
                'css'              => array(
                    'text_orientation' => $this->main_css_element,
                ),
            ),
            'text_shadow'       => false,
            'link_options'      => false,
        );
    }

    public function get_fields() {
        $fields = array(
            'item_list_layout' => array(
                'label'             => esc_html__( 'Layout', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'layout',
                'options'           => array(
                    'layout1' => esc_html( 'Layout 1' ),
                    'layout2' => esc_html( 'Layout 2' ),
                ),
                'default'           => 'layout1',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can select the price list layout.', 'divi-plus' ),
            ),
        );

        return $fields;
    }

    public function before_render() {
        global $dp_pl_parent_name_level, $dp_pl_parent_item_list_layout;
        $dp_pl_parent_name_level            = 'h4' === $this->props['name_level'] ? '' : $this->props['name_level'];
        $dp_pl_parent_item_list_layout      = $this->props['item_list_layout'];
    }

    public function render( $attrs, $content = null, $render_slug ) {
        $price_list_wrapper = sprintf(
            '<div class="dipl_price_list_%1$s">%2$s</div>',
            esc_attr( $this->props['item_list_layout'] ),
            et_core_intentionally_unescaped( $this->content, 'html' )
        );

        return et_core_intentionally_unescaped( $price_list_wrapper, 'html' );
    }

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_price_list', $modules ) ) {
        new DIPL_PriceList();
    }
} else {
    new DIPL_PriceList();
}