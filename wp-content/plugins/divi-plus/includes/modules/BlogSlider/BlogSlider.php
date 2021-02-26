<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2020 Elicus Technologies Private Limited
 * @version     1.4.2
 */
class DIPL_BlogSlider extends ET_Builder_Module {

	public $slug       = 'dipl_blog_slider';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	/**
	 * Track if the module is currently rendering to prevent unnecessary rendering and recursion.
	 *
	 * @var bool
	 */
	protected static $rendering = false;

	public function init() {
		$this->name = esc_html__( 'DP Blog Slider', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title' => esc_html__( 'Content', 'divi-plus' ),
					),
					'elements'     => array(
						'title' => esc_html__( 'Elements', 'divi-plus' ),
					),
					'slider_settings' => array(
						'title' => esc_html__( 'Slider Settings', 'divi-plus' ),
					),
					'display_settings' => array(
						'title' => esc_html__( 'Display Settings', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'slider_arrow_control'      => array(
						'title'    => esc_html__( 'Slider Arrow', 'divi-plus' ),
						'priority' => 1,
					),
					'slider_pagination_control' => array(
						'title'    => esc_html__( 'Slider Pagination', 'divi-plus' ),
						'priority' => 2,
					),
					'text' => array(
						'title' => esc_html__( 'Text', 'divi-plus' ),
					),
					'content_wrapper_toggle' => array(
						'title' => esc_html__( 'Post Content', 'divi-plus' ),
						'priority' => 50,
					),
					'category_toggle' => array(
						'title' => esc_html__( 'Category', 'divi-plus' ),
						'priority' => 50,
					),
					'read_more_settings' => array(
						'title' => esc_html__( 'Read More Settings', 'divi-plus' ),
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts' => array(
				'title' => array(
					'label'          => esc_html__( 'Title', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '18px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.5em',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css' => array(
						'main' => "{$this->main_css_element} .dipl_blog_slider_post_title, {$this->main_css_element} .dipl_blog_slider_post_title a",
						'important' => 'all',
					),
					'header_level' => array(
						'default' => 'h2',
					),
				),
				'body' => array(
					'label'          => esc_html__( 'Body', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.3em',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '5',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css' => array(
						'main' => "{$this->main_css_element} .dipl_blog_slider_content, {$this->main_css_element} .dipl_blog_slider_content p",
						'important' => 'all',
					),
				),
				'meta' => array(
					'label'          => esc_html__( 'Meta', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.3em',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'css' => array(
						'main' => "{$this->main_css_element} .dipl_blog_slider_meta, {$this->main_css_element} .dipl_blog_slider_meta span, {$this->main_css_element} .dipl_blog_slider_meta a",
						'important' => 'all',
					),
				),
			),
			'button' => array(
				'read_more' => array(
					'label'           => esc_html__( 'Read More Button', 'divi-plus' ),
					'css'             => array(
						'main'      => "{$this->main_css_element} .dipl_blog_slider_read_more_link .et_pb_button",
						'alignment' => "{$this->main_css_element} .dipl_blog_slider_read_more_link",
					),
					'margin_padding'  => array(
						'css' => array(
							'margin'    => "{$this->main_css_element} .dipl_blog_slider_read_more_link",
							'padding'   => "{$this->main_css_element} .dipl_blog_slider_read_more_link .et_pb_button",
							'important' => 'all',
						),
					),
					'no_rel_attr'     => true,
					'use_alignment'   => true,
					'box_shadow'      => false,
					'depends_on'      => array( 'show_read_more' ),
					'depends_show_if' => 'on',
				),
			),
			'borders' => array(
				'single_post' => array(
					'label_prefix'    => esc_html__( 'Single Post', 'divi-plus' ),
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_blog_slider_post',
							'border_styles' => '%%order_class%% .dipl_blog_slider_post',
							'important' => 'all',
						),
					),
				),
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => $this->main_css_element,
							'border_styles' => $this->main_css_element,
						),
					),
				),
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'slider_margin_padding' => array(
                'post_content_wrapper' => array(
                    'margin_padding' => array(
                        'css' => array(
                            'margin'    => "{$this->main_css_element} .dipl_blog_slider_content_wrapper",
                            'padding'   => "{$this->main_css_element} .dipl_blog_slider_content_wrapper",
                            'important' => 'all',
                        ),
                    ),
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'margin'    => $this->main_css_element,
                    'padding'   => $this->main_css_element,
                    'important' => 'all',
                ),
            ),
		);
	}

	public function get_fields() {
		
		return array(
			'slider_layout' => array(
                'label'             => esc_html__( 'Layout', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'layout',
                'options'           => array(
                    'layout1'         => esc_html__( 'Layout 1', 'divi-plus' ),
                    'layout2'         => esc_html__( 'Layout 2', 'divi-plus' ),
                ),
                'default'           => 'layout1',
                'tab_slug'          => 'general',
			    'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can select the slider layout.', 'divi-plus' ),
                'computed_affects'  => array(
                    '__blog_slider_data'
                )
            ),
		    'posts_number' => array(
                'label'             => esc_html__( 'Number of Posts', 'divi-plus' ),
                'type'              => 'text',
                'option_category'   => 'configuration',
                'default'           => '10',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can define the value of number of posts you would like to display.', 'divi-plus' ),
                'computed_affects'  => array(
                    '__blog_slider_data'
                )
            ),
            'offset_number' => array(
                'label'            => esc_html__( 'Post Offset Number', 'divi-plus' ),
                'type'             => 'text',
                'option_category'  => 'configuration',
                'default'          => 0,
                'tab_slug'         => 'general',
                'toggle_slug'      => 'main_content',
                'description'      => esc_html__( 'Choose how many posts you would like to skip. These posts will not be shown in the feed.', 'divi-plus' ),
                'computed_affects' => array(
                    '__blog_slider_data',
                ),
            ),
            'post_order' => array(
                'label'            => esc_html__( 'Order', 'divi-plus' ),
                'type'             => 'select',
                'option_category'  => 'configuration',
                'options'          => array(
                    'DESC' => esc_html__( 'DESC', 'divi-plus' ),
                    'ASC'  => esc_html__( 'ASC', 'divi-plus' ),
                ),
                'default'          => 'DESC',
                'tab_slug'         => 'general',
                'toggle_slug'      => 'main_content',
                'description'      => esc_html__( 'Here you can choose the order of your posts.', 'divi-plus' ),
                'computed_affects' => array(
                    '__blog_slider_data',
                ),
            ),
            'post_order_by' => array(
                'label'            => esc_html__( 'Order by', 'divi-plus' ),
                'type'             => 'select',
                'option_category'  => 'configuration',
                'options'          => array(
                    'date'      => esc_html__( 'Date', 'divi-plus' ),
                    'modified'  => esc_html__( 'Modified Date', 'divi-plus' ),
                    'title'     => esc_html__( 'Title', 'divi-plus' ),
                    'name'      => esc_html__( 'Slug', 'divi-plus' ),
                    'ID'        => esc_html__( 'ID', 'divi-plus' ),
                    'rand'      => esc_html__( 'Random', 'divi-plus' ),
                    'relevance' => esc_html__( 'Relevance', 'divi-plus' ),
                    'none'      => esc_html__( 'None', 'divi-plus' ),
                ),
                'default'          => 'date',
                'tab_slug'         => 'general',
                'toggle_slug'      => 'main_content',
                'description'      => esc_html__( 'Here you can choose the order type of your posts.', 'divi-plus' ),
                'computed_affects' => array(
                    '__blog_slider_data',
                ),
            ),
            'include_categories' => array(
                'label'             => esc_html__( 'Select Categories', 'divi-plus' ),
                'type'             => 'categories',
				'option_category'  => 'basic_option',
				'renderer_options' => array(
					'use_terms' => false,
				),
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Choose which categories you would like to include in the feed', 'divi-plus' ),
                'computed_affects'  => array(
                    '__blog_slider_data'
                )
            ),
            'post_date' => array(
				'label'            => esc_html__( 'Post Date Format', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'default'          => 'M j, Y',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'If you would like to adjust the date format, input the appropriate PHP date format here.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_slider_data',
				),
			),
			'ignore_sticky_posts' => array(
				'label'            => esc_html__( 'Ignore Sticky Posts', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'This will decide whether to ingnore sticky posts or not.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_slider_data',
				),
			),
			'show_thumbnail' => array(
				'label'            => esc_html__( 'Show Featured Image', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'on',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'This will turn thumbnails on and off.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_slider_data',
				),
			),
			'featured_image_size' => array(
				'label'            => esc_html__( 'Featured Image Size', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'medium' => esc_html__( 'Medium', 'divi-plus' ),
					'large'  => esc_html__( 'Large', 'divi-plus' ),
					'full'   => esc_html__( 'Full', 'divi-plus' ),
				),
				'show_if'          => array(
					'show_thumbnail' => 'on',
				),
				'default'          => 'large',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'Here you can select the size of the featured image.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_slider_data',
				),
			),
			'show_content' => array(
				'label'            => esc_html__( 'Content', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'Show Excerpt', 'divi-plus' ),
					'on'  => esc_html__( 'Show Content', 'divi-plus' ),
				),
				'default'          => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Showing the full content will not truncate your posts on the index page. Showing the excerpt will only display your excerpt text.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_slider_data',
				),
			),
			'excerpt_length' => array(
				'label'            => esc_html__( 'Excerpt Length', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'show_if'          => array(
					'show_content' => 'off',
				),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can define excerpt length in characters, if 0 no excerpt will be shown. However this won\'t work with the manual excerpt defined in the post.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_slider_data',
				),
			),
			'show_author' => array(
				'label'            => esc_html__( 'Show Author', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'on',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'Turn on or off the Author link.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_slider_data',
				),
			),
			'show_date' => array(
				'label'            => esc_html__( 'Show Date', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'on',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'Turn the Date on or off.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_slider_data',
				),
			),
			'show_categories' => array(
				'label'            => esc_html__( 'Show Categories/Terms', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'on',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'Turn the category/terms links on or off.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_slider_data',
				),
			),
			'show_comments' => array(
				'label'            => esc_html__( 'Show Comment Count', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'on',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'Turn Comment Count on and off.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_slider_data',
				),
			),
			'show_read_more' => array(
				'label'            => esc_html__( 'Show Read More', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'Off', 'divi-plus' ),
					'on'  => esc_html__( 'On', 'divi-plus' ),
				),
				'show_if'          => array(
					'show_content' => 'off',
				),
				'affects'          => array(
					'custom_read_more',
				),
				'default'          => 'on',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'Here you can define whether to show "read more" link after the excerpts or not.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_slider_data',
				),
			),
			'read_more_text' => array(
				'label'            => esc_html__( 'Read More Text', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'show_if'          => array(
					'show_content' 		=> 'off',
					'show_read_more' 	=> 'on',
				),
				'default'		   => 'Read More',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'Here you can define "read more" button/link text.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_slider_data',
				),
			),
			'equalize_posts_height' => array(
				'label'            => esc_html__( 'Equalize Posts Height', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'Off', 'divi-plus' ),
					'on'  => esc_html__( 'On', 'divi-plus' ),
				),
				'default'		   => 'on',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'display_settings',
				'description'      => esc_html__( 'Here you can choose whether or not equalize posts height.', 'divi-plus' ),
			),
			'category_background_color' => array(
				'label'        => esc_html__( 'Category Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'slider_layout' => 'layout2',
					'show_categories' => 'on',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'category_toggle',
				'description'  => esc_html__( 'Here you can define a custom color for the category background.', 'divi-plus' ),
			),
			'category_color' => array(
				'label'        => esc_html__( 'Category Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'slider_layout' => 'layout2',
					'show_categories' => 'on',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'category_toggle',
				'description'  => esc_html__( 'Here you can define a custom text color for the category.', 'divi-plus' ),
			),
			'post_content_wrapper_background_color' => array(
				'label'        => esc_html__( 'Post Content Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'content_wrapper_toggle',
				'description'  => esc_html__( 'Here you can define a custom color for the post content background.', 'divi-plus' ),
			),
			'post_content_wrapper_custom_margin' => array(
                'label'             => esc_html__( 'Content Margin', 'divi-plus' ),
                'type'              => 'custom_padding',
                'option_category'   => 'layout',
                'mobile_options'    => false,
                'hover'             => false,
                'default'           => '',
                'default_on_front'  => '',
                'tab_slug'     => 'advanced',
				'toggle_slug'  => 'content_wrapper_toggle',
                'description'       => esc_html__( 'Margin adds extra space to the outside of the element, increasing the distance between the element and other items on the page.', 'divi-plus' ),
            ),
            'post_content_wrapper_custom_padding' => array(
                'label'             => esc_html__( 'Content Padding', 'divi-plus' ),
                'type'              => 'custom_padding',
                'option_category'   => 'layout',
                'mobile_options'    => true,
                'hover'             => false,
                'default'           => '',
                'default_on_front'  => '',
                'tab_slug'     		=> 'advanced',
				'toggle_slug'  		=> 'content_wrapper_toggle',
                'description'       => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
            ),
            'post_per_slide'               => array(
				'label'           => esc_html__( 'Number of Post Per View', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'1'  => esc_html__( '1', 'divi-plus' ),
					'2'  => esc_html__( '2', 'divi-plus' ),
					'3'  => esc_html__( '3', 'divi-plus' ),
				),
				'default'         => '3',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'slider_settings',
				'description'     => esc_html__( 'Here you can choose the number of posts you want to display per slide.', 'divi-plus' ),
			),
			'show_arrow'                   => array(
				'label'           => esc_html__( 'Show Arrows', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_arrow_control',
				'description'     => esc_html__( 'Here you can choose whether or not to display previous & next arrow on the slider.', 'divi-plus' ),
			),
			'show_arrow_on_hover'          => array(
				'label'           => esc_html__( 'Show Arrows Only On Hover', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'show_if'         => array(
					'show_arrow' => 'on',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_arrow_control',
				'description'     => esc_html__( 'Here you can choose whether or not to display previous and next arrow on hover.', 'divi-plus' ),
			),
			'arrow_font_size'              => array(
				'label'           => esc_html__( 'Arrow Font Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '10',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'         => array(
					'show_arrow' => 'on',
				),
				'show_if_not'     => array(
					'show_arrow' => 'off',
				),
				'default'         => '18px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_arrow_control',
				'description'     => esc_html__( 'Move the slider or input the value to increse or decrease the size of arrows.', 'divi-plus' ),
			),
			'arrow_color'                  => array(
				'label'        => esc_html__( 'Arrow Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow' => 'on',
				),
				'show_if_not'  => array(
					'show_arrow' => 'off',
				),
				'default'      => '#007aff',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_arrow_control',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for arrows.', 'divi-plus' ),
			),
			'use_arrow_background'         => array(
				'label'           => esc_html__( 'Select Arrow Shape', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'show_if'         => array(
					'show_arrow' => 'on',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_arrow_control',
				'description'     => esc_html__( 'Here you can choose whehter or not to apply shape on arrows.', 'divi-plus' ),
			),
			'arrow_background_color'       => array(
				'label'        => esc_html__( 'Arrow Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow'           => 'on',
					'use_arrow_background' => 'on',
				),
				'show_if_not'  => array(
					'show_arrow' => 'off',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_arrow_control',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the shape background of arrows.', 'divi-plus' ),
			),
			'arrow_background_border_size' => array(
				'label'           => esc_html__( 'Arrow Background Border', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '10',
					'step' => '1',
				),
				'show_if'         => array(
					'show_arrow'           => 'on',
					'use_arrow_background' => 'on',
				),
				'show_if_not'     => array(
					'show_arrow' => 'off',
				),
				'default'         => '0px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_arrow_control',
				'description'     => esc_html__( 'Move the slider or input the value to increase or decrease the border size of the arrow background.', 'divi-plus' ),
			),
			'arrow_shape_border_color'     => array(
				'label'        => esc_html__( 'Arrow Shape Border Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_arrow'           => 'on',
					'use_arrow_background' => 'on',
				),
				'show_if_not'  => array(
					'show_arrow' => 'off',
				),
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_arrow_control',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the arrow shape border', 'divi-plus' ),
			),
			'show_control_dot'             => array(
				'label'           => esc_html__( 'Show Pagination', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'slider_pagination_control',
				'description'     => esc_html__( 'Here you choose whether or not to display pagination on the logo slider.', 'divi-plus' ),
			),
			'control_dot_active_color'     => array(
				'label'        => esc_html__( 'Active Pagination Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_control_dot' => 'on',
				),
				'show_if_not'  => array(
					'show_control_dot' => 'off',
				),
				'default'      => '#000000',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_pagination_control',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the pagination of an active item.', 'divi-plus' ),
			),
			'control_dot_inactive_color'   => array(
				'label'        => esc_html__( 'Inactive Pagination Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if'      => array(
					'show_control_dot' => 'on',
				),
				'show_if_not'  => array(
					'show_control_dot' => 'off',
				),
				'default'      => '#007aff',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'slider_pagination_control',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the pagination of inactive items.', 'divi-plus' ),
			),
			'slider_loop'                  => array(
				'label'           => esc_html__( 'Enable Loop', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can choose whether or not to enable loop for the logo slider.', 'divi-plus' ),
			),
			'autoplay'                     => array(
				'label'           => esc_html__( 'Autoplay', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can choose whether or not to autoplay logo slider.', 'divi-plus' ),
			),
			'autoplay_speed'               => array(
				'label'           => esc_html__( 'Autoplay Delay', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '3000',
				'show_if'         => array(
					'autoplay' => 'on',
				),
				'show_if_not'     => array(
					'autoplay' => 'off',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can input the value to delay autoplay after a complete transition of the logo slider.', 'divi-plus' ),
			),
			'transition_duration'          => array(
				'label'           => esc_html__( 'Transition Duration', 'divi-plus' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '1000',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can input the value to delay each slide in a transition.', 'divi-plus' ),
			),
			'pause_on_hover'               => array(
				'label'           => esc_html__( 'Pause On Hover', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'         => 'on',
				'show_if'         => array(
					'autoplay' => 'on',
				),
				'show_if_not'     => array(
					'autoplay' => 'off',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
				'description'     => esc_html__( 'Here you can choose whether or not to pause slides on mouse hover.', 'divi-plus' ),
			),
			'__blog_slider_data' => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_BlogSlider', 'get_blog_posts' ),
				'computed_depends_on' => array(
					'slider_layout',
					'posts_number',
					'offset_number',
					'post_order',
					'post_order_by',
					'include_categories',
					'post_date',
					'ignore_sticky_posts',
					'show_thumbnail',
					'featured_image_size',
					'show_content',
					'excerpt_length',
					'show_author',
					'show_date',
					'show_categories',
					'show_comments',
					'show_read_more',
					'read_more_text',
					'title_level',
				),
			),
		);

	}

	public static function get_blog_posts( $attrs = array(), $conditional_tags = array(), $current_page = array() ) {
		global $et_fb_processing_shortcode_object, $et_pb_rendering_column_content;

		if ( self::$rendering ) {
			// We are trying to render a Blog module while a Blog module is already being rendered
			// which means we have most probably hit an infinite recursion. While not necessarily
			// the case, rendering a post which renders a Blog module which renders a post
			// which renders a Blog module is not a sensible use-case.
			return '';
		}

		/*
		 * Cached $wp_filter so it can be restored at the end of the callback.
		 * This is needed because this callback uses the_content filter / calls a function
		 * which uses the_content filter. WordPress doesn't support nested filter
		 */
		global $wp_filter;
		$wp_filter_cache = $wp_filter;

		$global_processing_original_value = $et_fb_processing_shortcode_object;

		$defaults = array(
			'posts_number'             				=> '10',
			'offset_number'            				=> '0',
			'slider_layout'              			=> 'layout1',
			'post_date'                				=> 'M j, Y',
			'post_order'               				=> 'DESC',
			'post_order_by'            				=> 'date',
			'include_categories'					=> '',
			'ignore_sticky_posts'					=> 'off',
			'show_thumbnail'           				=> 'on',
			'featured_image_size'      				=> 'large',
			'show_content'             				=> 'off',
			'excerpt_length'           				=> '',
			'show_read_more'                		=> 'on',
			'read_more_text'           				=> 'Read More',
			'show_author'              				=> 'on',
			'show_date'                				=> 'on',
			'show_categories'          				=> 'on',
			'show_comments'            				=> 'on',
			'custom_read_more'         				=> 'off',
			'read_more_icon'           				=> '',
			'read_more_use_icon'       				=> 'off',
			'title_level'             				=> 'h2',
		);

		// WordPress' native conditional tag is only available during page load. It'll fail during component update because
		// et_pb_process_computed_property() is loaded in admin-ajax.php. Thus, use WordPress' conditional tags on page load and
		// rely to passed $conditional_tags for AJAX call.
		$is_front_page     = (bool) et_fb_conditional_tag( 'is_front_page', $conditional_tags );
		$is_single         = (bool) et_fb_conditional_tag( 'is_single', $conditional_tags );
		$is_user_logged_in = (bool) et_fb_conditional_tag( 'is_user_logged_in', $conditional_tags );
		$current_post_id   = isset( $current_page['id'] ) ? (int) $current_page['id'] : 0;

		// remove all filters from WP audio shortcode to make sure current theme doesn't add any elements into audio module.
		remove_all_filters( 'wp_audio_shortcode_library' );
		remove_all_filters( 'wp_audio_shortcode' );
		remove_all_filters( 'wp_audio_shortcode_class' );

		$attrs = wp_parse_args( $attrs, $defaults );

		foreach ( $defaults as $key => $default ) {
			${$key} = esc_html( et_()->array_get( $attrs, $key, $default ) );
		}

		$processed_title_level = et_pb_process_header_level( $title_level, 'h2' );
		$processed_title_level = esc_html( $processed_title_level );

		if ( 'on' !== $show_content ) {
			$excerpt_length = ( '' === $excerpt_length ) ? 270 : intval( $excerpt_length );
		}

		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => intval( $posts_number ),
			'post_status'    => 'publish',
			'offset'         => 0,
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		if ( $is_user_logged_in ) {
			$args['post_status'] = array( 'publish', 'private' );
		}

		if ( 'on' === $ignore_sticky_posts ) {
			$args['ignore_sticky_posts'] = true;
		}

		if ( '' !== $include_categories ) {
			$args['cat'] = sanitize_text_field( $include_categories );
		}

		if ( '' !== $offset_number && ! empty( $offset_number ) ) {
			$args['offset'] = intval( $offset_number );
		}

		if ( '' !== $args['offset'] && -1 === intval( $args['posts_per_page'] ) ) {
			$count_posts            = wp_count_posts( 'post', 'readable' );
			$published_posts        = $count_posts->publish;
			$args['posts_per_page'] = intval( $published_posts );
		}

		if ( isset( $post_order_by ) && '' !== $post_order_by ) {
			$args['orderby'] = sanitize_text_field( $post_order_by );
		}

		if ( isset( $post_order ) && '' !== $post_order ) {
			$args['order'] = sanitize_text_field( $post_order );
		}

		if ( $is_single && ! isset( $args['post__not_in'] ) ) {
			$args['post__not_in'] = array( intval( get_the_ID() ) );
		}

		if ( 'on' === $show_read_more ) {
			$read_more_text = ( ! isset( $read_more_text ) || '' === $read_more_text ) ?
			esc_html__( 'Read More', 'divi-plus' ) :
			sprintf(
				esc_html__( '%s', 'divi-plus' ),
				esc_html( $read_more_text )
			);
		}

		$query = new WP_Query( $args );

		self::$rendering = true;

		$output_array = array();

		if ( $query->have_posts() ) {

			while ( $query->have_posts() ) {
				$query->the_post();

				$post_id        = intval( get_the_ID() );
				$thumb          = '';
				$thumb          = dipl_get_post_thumbnail( $post_id, esc_html( $featured_image_size ), 'dipl_blog_slider_post_image' );
				$no_thumb_class = ( '' === $thumb || 'off' === $show_thumbnail ) ? ' dipl_blog_slider_no_thumb' : '';

				$post_classes 	= array_map( 'sanitize_html_class', get_post_class( 'dipl_blog_slider_post' . $no_thumb_class ) );
				$post_classes 	= implode( ' ', $post_classes );

				$output 		= '';

				$read_more_button = dipl_render_divi_button(
					array(
						'button_text'         => et_core_esc_previously( $read_more_text ),
						'button_text_escaped' => true,
						'button_url'          => esc_url( get_permalink( $post_id ) ),
						'button_custom'       => et_core_esc_previously( $custom_read_more ),
						'custom_icon'         => et_core_esc_previously( $read_more_icon ),
						'has_wrapper'         => false,
					)
				);

				if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $slider_layout ) . '.php' ) ) {
					include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $slider_layout ) . '.php';
				}
				
				array_push( $output_array, $output);
			}

			wp_reset_postdata();
		}

		self::$rendering = false;

		return $output_array;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		if ( self::$rendering ) {
			// We are trying to render a Blog module while a Blog module is already being rendered
			// which means we have most probably hit an infinite recursion. While not necessarily
			// the case, rendering a post which renders a Blog module which renders a post
			// which renders a Blog module is not a sensible use-case.
			return '';
		}

		/*
		 * Cached $wp_filter so it can be restored at the end of the callback.
		 * This is needed because this callback uses the_content filter / calls a function
		 * which uses the_content filter. WordPress doesn't support nested filter
		 */
		global $wp_filter;
		$wp_filter_cache = $wp_filter;

		$slider_layout               			= $this->props['slider_layout'];
		$posts_number              				= $this->props['posts_number'];
		$post_date                 				= $this->props['post_date'];
		$offset_number             				= $this->props['offset_number'];
		$post_order               	 			= $this->props['post_order'];
		$post_order_by             				= $this->props['post_order_by'];
		$include_categories             		= $this->props['include_categories'];
		$ignore_sticky_posts					= $this->props['ignore_sticky_posts'];
		$show_thumbnail            				= $this->props['show_thumbnail'];
		$featured_image_size       				= $this->props['featured_image_size'];
		$show_content              				= $this->props['show_content'];
		$show_read_more							= $this->props['show_read_more'];
		$read_more_text							= $this->props['read_more_text'];
		$custom_read_more          				= $this->props['custom_read_more'];
		$read_more_icon            				= $this->props['read_more_icon'];
		$excerpt_length            				= $this->props['excerpt_length'];
		$show_author               				= $this->props['show_author'];
		$show_date                 				= $this->props['show_date'];
		$show_categories           				= $this->props['show_categories'];
		$show_comments             				= $this->props['show_comments'];
		$equalize_posts_height					= esc_attr( $this->props['equalize_posts_height'] );
		$show_arrow          					= esc_attr( $this->props['show_arrow'] );
		$show_control        					= esc_attr( $this->props['show_control_dot'] );
		$show_arrow_on_hover 					= esc_attr( $this->props['show_arrow_on_hover'] );
		
		$arrow_color                    = esc_attr( $this->props['arrow_color'] );
		$arrow_color_hover              = esc_attr( $this->get_hover_value( 'arrow_color' ) );
		$use_arrow_background           = esc_attr( $this->props['use_arrow_background'] );
		$arrow_background_color         = esc_attr( $this->props['arrow_background_color'] );
		$arrow_background_color_hover   = esc_attr( $this->get_hover_value( 'arrow_background_color' ) );
		$arrow_background_border_size   = esc_attr( $this->props['arrow_background_border_size'] );
		$arrow_shape_border_color       = esc_attr( $this->props['arrow_shape_border_color'] );
		$arrow_shape_border_color_hover = esc_attr( $this->get_hover_value( 'arrow_shape_border_color' ) );
		$control_dot_active_color       = esc_attr( $this->props['control_dot_active_color'] );
		$control_dot_inactive_color     = esc_attr( $this->props['control_dot_inactive_color'] );
		$post_per_slide					= intval( $this->props['post_per_slide'] );


		$title_level              				= esc_html( $this->props['title_level'] );
		$order_class                   		 	= $this->get_module_order_class( $render_slug );
		$order_number                   		= esc_attr( preg_replace( '/[^0-9]/', '', esc_attr( $order_class ) ) );
		
		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();
		$processed_title_level     = et_pb_process_header_level( $title_level, 'h2' );
		$processed_title_level     = esc_html( $processed_title_level );

		$arrow_font_size_values = et_pb_responsive_options()->get_property_values( $this->props, 'arrow_font_size' );
		if ( ! empty( array_filter( $arrow_font_size_values ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $arrow_font_size_values, '%%order_class%% .swiper-button-prev::after', 'font-size', $render_slug, '', 'type' );
			et_pb_responsive_options()->generate_responsive_css( $arrow_font_size_values, '%%order_class%% .swiper-button-next::after', 'font-size', $render_slug, '', 'type' );
		}

		// some themes do not include these styles/scripts so we need to enqueue them in this module to support audio post format.
		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_script( 'wp-mediaelement' );

		// include easyPieChart which is required for loading Blog module content via ajax correctly.
		wp_enqueue_script( 'easypiechart' );

		// include ET Shortcode scripts.
		wp_enqueue_script( 'et-shortcodes-js' );

		// remove all filters from WP audio shortcode to make sure current theme doesn't add any elements into audio module.
		remove_all_filters( 'wp_audio_shortcode_library' );
		remove_all_filters( 'wp_audio_shortcode' );
		remove_all_filters( 'wp_audio_shortcode_class' );

		if ( 'on' !== $show_content ) {
			$excerpt_length = ( '' === $excerpt_length ) ? 270 : intval( $excerpt_length );
		}

		if ( '' !== $arrow_color ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-prev::after, %%order_class%% .swiper-button-next::after',
					'declaration' => sprintf( 'color: %1$s;', esc_attr( $arrow_color ) ),
				)
			);
		}

		if ( '' !== $arrow_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%:hover .swiper-button-prev::after, %%order_class%%:hover .swiper-button-next::after',
					'declaration' => sprintf( 'color: %1$s;', esc_attr( $arrow_color_hover ) ),
				)
			);
		}

		if ( 'on' === $use_arrow_background ) {
			if ( '' !== $arrow_background_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev::after, %%order_class%% .swiper-button-next::after',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $arrow_background_color ) ),
					)
				);
			}

			if ( '' !== $arrow_background_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .swiper-button-prev::after, %%order_class%%:hover .swiper-button-next::after',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $arrow_background_color_hover ) ),
					)
				);
			}

			if ( '' !== $arrow_background_border_size ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev::after, %%order_class%% .swiper-button-next::after',
						'declaration' => sprintf( 'border-width: %1$s;', esc_attr( $arrow_background_border_size ) ),
					)
				);
			}

			if ( '' !== $arrow_shape_border_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev::after, %%order_class%% .swiper-button-next::after',
						'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $arrow_shape_border_color ) ),
					)
				);
			}

			if ( '' !== $arrow_shape_border_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%%:hover .swiper-button-prev::after, %%order_class%%:hover .swiper-button-next::after',
						'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $arrow_shape_border_color_hover ) ),
					)
				);
			}
		}

		if ( 'on' === $show_control ) {
			if ( '' !== $control_dot_inactive_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination-bullet',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_inactive_color ) ),
					)
				);
			}

			if ( '' !== $control_dot_active_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination-bullet.swiper-pagination-bullet-active',
						'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_active_color ) ),
					)
				);
			}
		}

		if ( 'on' === $equalize_posts_height ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-wrapper',
					'declaration' => 'align-items: stretch',
				)
			);
		} else if ( 1 === $post_per_slide ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-wrapper',
					'declaration' => 'align-items: center',
				)
			);
		}
		
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => intval( $posts_number ),
			'post_status'    => 'publish',
			'offset'         => 0,
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		if ( is_user_logged_in() ) {
			$args['post_status'] = array( 'publish', 'private' );
		}

		if ( 'on' === $ignore_sticky_posts ) {
			$args['ignore_sticky_posts'] = true;
		}

		if ( '' !== $include_categories ) {
			$args['cat'] = sanitize_text_field( $include_categories );
		}

		if ( '' !== $offset_number && ! empty( $offset_number ) ) {
			$args['offset'] = intval( $offset_number );
		}

		if ( '' !== $args['offset'] && -1 === intval( $args['posts_per_page'] ) ) {
			$count_posts            = wp_count_posts( 'post', 'readable' );
			$published_posts        = $count_posts->publish;
			$args['posts_per_page'] = intval( $published_posts );
		}

		if ( isset( $post_order_by ) && '' !== $post_order_by ) {
			$args['orderby'] = sanitize_text_field( $post_order_by );
		}

		if ( isset( $post_order ) && '' !== $post_order ) {
			$args['order'] = sanitize_text_field( $post_order );
		}

		if ( is_single() && ! isset( $args['post__not_in'] ) ) {
			$args['post__not_in'] = array( intval( get_the_ID() ) );
		}

		if ( 'on' === $show_read_more ) {
			$read_more_text = ( ! isset( $read_more_text ) || '' === $read_more_text ) ?
			esc_html__( 'Read More', 'divi-plus' ) :
			sprintf(
				esc_html__( '%s', 'divi-plus' ),
				esc_html( $read_more_text )
			);
		}

		$query = new WP_Query( $args );

		self::$rendering = true;

		if ( $query->have_posts() ) {

			wp_enqueue_script( 'elicus-swiper-script' );
			wp_enqueue_style( 'elicus-swiper-style' );

			$output = '<div class="dipl_blog_slider_container ' . sanitize_html_class( $slider_layout ) . '"><div class="swiper-container"><div class="swiper-wrapper">';

			while ( $query->have_posts() ) {
				$query->the_post();

				$post_id        = intval( get_the_ID() );

				$read_more_button = $this->render_button(
						array(
							'button_text'         => et_core_esc_previously( $read_more_text ),
							'button_text_escaped' => true,
							'button_url'          => esc_url( get_permalink( $post_id ) ),
							'button_custom'       => isset( $custom_read_more ) ? esc_attr( $custom_read_more ) : 'off',
							'custom_icon'         => isset( $read_more_icon ) ? esc_attr( $read_more_icon ) : '',
							'has_wrapper'         => false,
						)
					);

				$thumb          = '';
				$thumb          = dipl_get_post_thumbnail( $post_id, esc_html( $featured_image_size ), 'dipl_blog_slider_post_image' );
				$no_thumb_class = ( '' === $thumb || 'off' === $show_thumbnail ) ? ' dipl_blog_slider_no_thumb' : '';

				$post_classes = array_map( 'sanitize_html_class', get_post_class( 'dipl_blog_slider_post' . $no_thumb_class ) );
				$post_classes = implode( ' ', $post_classes );

				if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $slider_layout ) . '.php' ) ) {
					include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $slider_layout ) . '.php';
				}
			}

			wp_reset_postdata();

			$output .= '</div></div></div>';
		}

		$this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );

		/* Post Category */
		if ( 'layout2' === $slider_layout ) {
			$category_background_color = et_pb_responsive_options()->get_property_values( $this->props, 'category_background_color' );
			et_pb_responsive_options()->generate_responsive_css( $category_background_color, "{$this->main_css_element} .dipl_blog_slider_post_categories a", 'background-color', $render_slug, '!important;', 'color' );			

			$category_background_color_hover = $this->get_hover_value( 'category_background_color' );
			if ( '' !== $category_background_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => "{$this->main_css_element} .dipl_blog_slider_post_categories a:hover",
						'declaration' => sprintf(
							'background-color: %1$s !important;',
							esc_attr( $category_background_color_hover )
						),
					)
				);
			}

			$category_color = et_pb_responsive_options()->get_property_values( $this->props, 'category_color' );
			et_pb_responsive_options()->generate_responsive_css( $category_color, "{$this->main_css_element} .dipl_blog_slider_post_categories a", 'color', $render_slug, '!important;', 'color' );			

			$category_color_hover = $this->get_hover_value( 'category_color' );
			if ( '' !== $category_background_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => "{$this->main_css_element} .dipl_blog_slider_post_categories a:hover",
						'declaration' => sprintf(
							'color: %1$s !important;',
							esc_attr( $category_color_hover )
						),
					)
				);
			}
		}
		

		/* Post Content Wrapper */
		$content_background_color = et_pb_responsive_options()->get_property_values( $this->props, 'post_content_wrapper_background_color' );
		et_pb_responsive_options()->generate_responsive_css( $content_background_color, "{$this->main_css_element} .dipl_blog_slider_content_wrapper", 'background-color', $render_slug, '!important;', 'color' );

		$content_background_color_hover = $this->get_hover_value( 'post_content_wrapper_background_color' );
		if ( '' !== $content_background_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => "{$this->main_css_element} .dipl_blog_slider_content_wrapper:hover",
					'declaration' => sprintf(
						'background-color: %1$s !important;',
						esc_attr( $content_background_color_hover )
					),
				)
			);
		}

		if ( 'on' === $show_arrow && 'on' === $show_arrow_on_hover ) {
			$output .= sprintf( '<div class="swiper-button-next arrow_on_hover"></div><div class="swiper-button-prev arrow_on_hover"></div>' );
		} elseif ( 'on' === $show_arrow && 'off' === $show_arrow_on_hover ) {
			$output .= sprintf( '<div class="swiper-button-next"></div><div class="swiper-button-prev"></div>' );
		}
		if ( 'on' === $show_control ) {
			$output .= sprintf( '<div class="swiper-pagination"></div>' );
		}

		$script = $this->el_render_blog_slider_script( $order_class, $order_number, $this->props );
		
		self::$rendering = false;

		return $output . $script;
	}

	public function el_render_blog_slider_script( $order_class, $order_number, $props ) {
		$order_class     		= $this->get_module_order_class( 'dipl_blog_slider' );
		$show_arrow          	= esc_attr( $props['show_arrow'] );
		$show_control        	= esc_attr( $props['show_control_dot'] );
		$loop                	= esc_attr( $props['slider_loop'] );
		$autoplay            	= esc_attr( $props['autoplay'] );
		$autoplay_speed      	= (int) esc_attr( $props['autoplay_speed'] );
		$transition_duration 	= (int) esc_attr( $props['transition_duration'] );
		$pause_on_hover      	= esc_attr( $props['pause_on_hover'] );
		$post_per_slide      	= esc_attr( $props['post_per_slide'] );
		$post_per_view        	= $post_per_slide;
		$post_per_view_ipad   	= ( 2 > $post_per_slide ) ? $post_per_slide : 2;
		$post_per_view_mobile 	= 1;
		$post_space_between   	= 15;
		$autoplay_speed      	= '' !== $autoplay_speed ? $autoplay_speed : 3000;
		$transition_duration 	= '' !== $transition_duration ? $transition_duration : 1000;
		$loop_param          	= ( 'on' === $loop ) ? 'true' : 'false';

		if ( 'on' === $show_arrow ) {
            $show_arrow = "{    
                    nextEl: '." . esc_attr( $order_class ) . " .swiper-button-next',
                    prevEl: '." . esc_attr( $order_class ) . " .swiper-button-prev',
            }";
		} else {
			$show_arrow = 'false';
		}

		if ( 'on' === $show_control ) {
            $show_control = "{
                        el: '." . esc_attr( $order_class ) . " .swiper-pagination',
                        clickable: true,
                    }";
		} else {
			$show_control = 'false';
		}

		if ( 'on' === $autoplay ) {
			if ( 'on' === $pause_on_hover ) {
				$autoplay_param = '{
                                delay:' . $autoplay_speed . ',
                                disableOnInteraction: true,
                            }';
			} else {
				$autoplay_param = '{
	                                delay:' . $autoplay_speed . ',
	                                disableOnInteraction: false,
	                            }';
			}
		} else {
			$autoplay_param = 0;
		}

		$script  = '<script>';
		$script .= 'jQuery(function($) {';
		$script .= 'var ' . esc_attr( $order_class ) . '_swiper = new Swiper(\'.' . esc_attr( $order_class ) . ' .swiper-container\', {
                            slidesPerView: ' . $post_per_view . ',
                            autoplay: ' . $autoplay_param . ',
                            spaceBetween: ' . $post_space_between . ',
                            speed: ' . $transition_duration . ',
                            loop: ' . $loop_param . ',
                            pagination: ' . $show_control . ',
                            navigation: ' . $show_arrow . ',
                            grabCursor: \'true\',
                            breakpoints: {
                            	1080: {
		                          slidesPerView: ' . $post_per_view . ',
		                          spaceBetween: ' . $post_space_between . '
		                        },
		                        767: {
		                          slidesPerView: ' . $post_per_view_ipad . ',
		                          spaceBetween: ' . $post_space_between . '
		                        },
		                        0: {
		                          slidesPerView: ' . $post_per_view_mobile . ',
		                          spaceBetween: ' . $post_space_between . '
		                        }
		                    },
                    });';

		if ( 'on' === $pause_on_hover && 'on' === $autoplay ) {
			$script .= 'jQuery(".' . esc_attr( $order_class ) . ' .swiper-container").on("mouseenter", function(e) {
							if ( typeof ' . esc_attr( $order_class ) . '_swiper.autoplay.stop === "function" ) {
								' . esc_attr( $order_class ) . '_swiper.autoplay.stop();
							}
                        });';
            $script .= 'jQuery(".' . esc_attr( $order_class ) . ' .swiper-container").on("mouseleave", function(e) {
        					if ( typeof ' . esc_attr( $order_class ) . '_swiper.autoplay.start === "function" ) {
                            	' . esc_attr( $order_class ) . '_swiper.autoplay.start();
                            }
                        });';
		}

		if ( 'on' !== $loop ) {
			$script .=  esc_attr( $order_class ) . '_swiper.on(\'reachEnd\', function(){
                            ' . esc_attr( $order_class ) . '_swiper.autoplay = false;
                        });';
		}

		$script .= '});</script>';

		return $script;
	}

	public function process_advanced_margin_padding_css( $module, $function_name, $margin_padding ) {
        $utils           = ET_Core_Data_Utils::instance();
        $all_values      = $module->props;
        $advanced_fields = $module->advanced_fields;

        // Disable if module doesn't set advanced_fields property and has no VB support.
        if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
            return;
        }

        $allowed_advanced_fields = array( 'slider_margin_padding' );
        foreach ( $allowed_advanced_fields as $advanced_field ) {
            if ( ! empty( $advanced_fields[ $advanced_field ] ) ) {
                foreach ( $advanced_fields[ $advanced_field ] as $label => $form_field ) {
                    $margin_key  = "{$label}_custom_margin";
                    $padding_key = "{$label}_custom_padding";
                    if ( '' !== $utils->array_get( $all_values, $margin_key, '' ) || '' !== $utils->array_get( $all_values, $padding_key, '' ) ) {
                        $settings = $utils->array_get( $form_field, 'margin_padding', array() );
                        // Ensure main selector exists.
                        $form_field_margin_padding_css = $utils->array_get( $settings, 'css.main', '' );
                        if ( empty( $form_field_margin_padding_css ) ) {
                            $utils->array_set( $settings, 'css.main', $utils->array_get( $form_field, 'css.main', '' ) );
                        }

                        $margin_padding->update_styles( $module, $label, $settings, $function_name, $advanced_field );
                    }
                }
            }
        }
    }
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_blog_slider', $modules ) ) {
        new DIPL_BlogSlider();
    }
} else {
    new DIPL_BlogSlider();
}
