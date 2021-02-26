<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2020 Elicus Technologies Private Limited
 * @version     1.4.2
 */
class DIPL_PriceListItem extends ET_Builder_Module {

    public $slug           = 'dipl_price_list_item';
    public $type           = 'child';
    public $vb_support     = 'on';

    protected $module_credits = array(
        'module_uri' => 'https://diviextended.com/product/divi-plus/',
        'author'     => 'Elicus',
        'author_uri' => 'https://elicus.com/',
    );

    public function init() {
        $this->name                         = esc_html__( 'DP Price List Item', 'divi-plus' );
        $this->advanced_setting_title_text  = esc_html__( 'Price List Item', 'divi-plus' );
        $this->child_title_var              = 'item_name';
        $this->main_css_element             = '.dipl_price_list %%order_class%%';
    }

    public function get_settings_modal_toggles() {
        return array(
            'general'  => array(
                'toggles' => array(
                    'main_content' => array(
                        'title' => esc_html__( 'Content', 'divi-plus' ),
                        'priority' => 1,
                        'tab' => 'active',
                    ),
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
            'text_shadow'   => false,
        );
    }

    public function get_fields() {
        $fields = array(
            'item_name' => array(
                'label'            => esc_html__( 'Item Name', 'divi-plus' ),
                'type'             => 'text',
                'option_category'  => 'basic_option',
                'default'          => 'Item Name',
                'tab_slug'         => 'general',
                'toggle_slug'      => 'main_content',
                'description'      => esc_html__( 'Here you can input the item name.', 'divi-plus' ),
            ),
            'item_currency' => array(
                'label'            => esc_html__( 'Currency', 'divi-plus' ),
                'type'             => 'text',
                'option_category'  => 'basic_option',
                'default'          => '$',
                'tab_slug'         => 'general',
                'toggle_slug'      => 'main_content',
                'description'      => esc_html__( 'Here you can input the currency symbol.', 'divi-plus' ),
            ),
            'item_price' => array(
                'label'            => esc_html__( 'Item Price', 'divi-plus' ),
                'type'             => 'text',
                'option_category'  => 'basic_option',
                'default'          => '10',
                'tab_slug'         => 'general',
                'toggle_slug'      => 'main_content',
                'description'      => esc_html__( 'Here you can input the item price.', 'divi-plus' ),
            ),
            'item_thumbnail' => array(
                'label'              => esc_html__( 'Item Thumbnail', 'divi-plus' ),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__( 'Upload an image', 'divi-plus' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'divi-plus' ),
                'update_text'        => esc_attr__( 'Set As Image', 'divi-plus' ),
                'tab_slug'           => 'general',
                'toggle_slug'        => 'main_content',
                'description'        => esc_html__( 'Here you can add an item image.', 'divi-plus'),
            ),
            'item_thumbnail_alt' => array(
                'label'            => esc_html__( 'Item Thumbnail Alt Text', 'divi-plus' ),
                'type'             => 'text',
                'option_category'  => 'basic_option',
                'dynamic_content'  => 'text',
                'tab_slug'         => 'general',
                'toggle_slug'      => 'main_content',
                'description'      => esc_html__( 'Here you can add an item image alt text.', 'divi-plus'),
            ),
            'content' => array(
                'label'           => esc_html__( 'Item description', 'divi-plus' ),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'tab_slug'        => 'general',
                'toggle_slug'     => 'main_content',
                'description'     => esc_html__( 'Here you can input short description for item.', 'divi-plus' ),
            ),
        );

        return $fields;
    }

    public function render( $attrs, $content = null, $render_slug ) {
        global $dp_pl_parent_name_level, $dp_pl_parent_item_list_layout;

        $item_list_layout       = '' === $dp_pl_parent_item_list_layout ? 'layout1' : $dp_pl_parent_item_list_layout;
        $item_thumbnail_alt     = $this->props['item_thumbnail_alt'];
        $name_level             = $this->props['name_level'];
        $name_level             = '' === $name_level && '' !== $dp_pl_parent_name_level ? $dp_pl_parent_name_level : $name_level;
        $processed_name_level   = et_pb_process_header_level( $name_level, 'h4' );
        $processed_name_level   = esc_html( $processed_name_level );

        if ( '' === $this->props['item_name'] ) {
            return '';
        }

        $multi_view             = et_pb_multi_view_options( $this );

        $item_name = $multi_view->render_element(
            array(
                'tag'       => esc_html( $processed_name_level ),
                'attrs'     => array(
                    'class' => 'dipl_price_list_item_name'
                ),
                'content'   => '{{item_name}}',
                'required'  => 'item_name',
            )
        );

        $item_thumbnail = $multi_view->render_element(
            array(
                'tag'      => 'img',
                'attrs'    => array(
                    'src'   => '{{item_thumbnail}}',
                    'alt'   => esc_attr( $item_thumbnail_alt ),
                ),
                'required' => 'item_thumbnail',
            )
        );

        $item_price = $multi_view->render_element(
            array(
                'tag'       => 'span',
                'attrs'     => array(
                    'class' => 'dipl_price_list_item_price'
                ),
                'content'   => '{{item_price}}',
                'required'  => 'item_price',
            )
        );

        $item_currency = $multi_view->render_element(
            array(
                'tag'       => 'span',
                'attrs'     => array(
                    'class' => 'dipl_price_list_item_currency',
                ),
                'content'   => '{{item_currency}}',
                'required'  => 'item_currency',
            )
        );

        $item_desc = $multi_view->render_element(
            array(
                'tag'       => 'div',
                'attrs'     => array(
                    'class' => 'dipl_price_list_item_description'
                ),
                'content'   => '{{content}}',
                'required'  => 'content',
            )
        );

        $item_inner_wrap = '';

        if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $item_list_layout ) . '.php' ) ) {
            include ( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $item_list_layout ) . '.php' );
        }

        $dipl_price_list_item_wrap = sprintf(
            '<div class="dipl_price_list_item_wrap%2$s">%1$s</div>',
            et_core_intentionally_unescaped( $item_inner_wrap, 'html' ),
            '' === $item_thumbnail ? ' no_thumbnail' : ''
        );

        return et_core_intentionally_unescaped( $dipl_price_list_item_wrap, 'html' );
    }

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_price_list', $modules ) ) {
        new DIPL_PriceListItem();
    }
} else {
    new DIPL_PriceListItem();
}