<?php
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.6.4
 */
class DIPL_DiviPlus extends DiviExtension {

    /**
     * The gettext domain for the extension's translations.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $gettext_domain = 'divi-plus';

    /**
     * The extension's WP Plugin name.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $name = 'divi-plus';

    /**
     * The extension's version
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $version = ELICUS_DIVI_PLUS_VERSION;

    /**
     * DIPL_DiviPlus constructor.
     *
     * @param string $name
     * @param array  $args
     */
    public function __construct( $name = 'divi-plus', $args = array() ) {
        $this->plugin_dir           = plugin_dir_path( __FILE__ );
        $this->plugin_dir_url       = plugin_dir_url( $this->plugin_dir );
        $this->_frontend_js_data    = array(
            'ajaxurl'   => admin_url( 'admin-ajax.php' ),
            'ajaxnonce' => wp_create_nonce( 'elicus-divi-plus-nonce' ),
        );

        add_action( 'wp_enqueue_scripts', array( $this, 'dipl_register_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'dipl_fb_enqueue_scripts' ) );

        parent::__construct( $name, $args );
        $this->dipl_plugin_setup();

        if ( $this->dipl_is_testimonial_enabled() || $this->dipl_is_team_enabled() ) {
            add_action( 'init', array( $this, 'dipl_register_post_types' ) );
            add_action( 'init', array( $this, 'dipl_register_taxonomies' ) );
            add_action( 'load-post.php',  array( $this, 'dipl_add_meta_boxes' ) );
            add_action( 'load-post-new.php',  array( $this, 'dipl_add_meta_boxes' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'dipl_admin_enqueue_scripts' ) );
        }

        if ( $this->dipl_is_testimonial_enabled() ) {
            add_action( 'save_post', array( $this, 'dipl_save_testimonial_meta_fields' ) );
        }

        if ( $this->dipl_is_team_enabled() ) {
            add_action( 'save_post', array( $this, 'dipl_save_team_member_meta_fields' ) );
        }
        
        add_action( 'wp_ajax_et_fb_ajax_save', array( $this, 'et_fb_ajax_save' ), 10 );
        add_action( 'wp_ajax_dipl_ajax_search_results', array( $this, 'dipl_ajax_search_results' ) );
        add_action( 'wp_ajax_nopriv_dipl_ajax_search_results', array( $this, 'dipl_ajax_search_results' ) );
        add_filter( 'upload_mimes', array( $this, 'dipl_mime_types' ) );
        add_filter( 'wp_check_filetype_and_ext', array( $this, 'dipl_check_filetype_and_ext' ), 10, 4 );
    }

    /**
     * plugin setup function.
     *
     *@since 1.0.0
     */
    public function dipl_plugin_setup() {
        require_once plugin_dir_path( __FILE__ ) . 'src/functions.php';
        require_once plugin_dir_path( __FILE__ ) . 'panel/init.php';
        require_once plugin_dir_path( __FILE__ ) . 'extensions/extensions.php';
        require_once plugin_dir_path( __FILE__ ) . 'src/class-update.php';
    }

    public function dipl_register_scripts() {
        wp_register_script( 'elicus-isotope-script', "{$this->plugin_dir_url}includes/assets/js/isotope.pkgd.min.js", array('jquery'), '3.0.6', true );
        wp_register_script( 'elicus-images-loaded-script', "{$this->plugin_dir_url}includes/assets/js/imagesloaded.pkgd.min.js", array('jquery'), '4.1.4', true );
        wp_register_script( 'elicus-lottie-script', "{$this->plugin_dir_url}includes/assets/js/lottie.min.js", array('jquery'), '5.7.3', true );
        wp_register_script( 'elicus-twenty-twenty-script', "{$this->plugin_dir_url}includes/assets/js/jquery_twentytwenty.min.js", array('jquery'), null, true );
        wp_register_script( 'elicus-event-move-script', "{$this->plugin_dir_url}includes/assets/js/jquery_event_move.min.js", array('jquery'), '2.0.0', true );
        wp_register_script( 'elicus-tooltipster-script', "{$this->plugin_dir_url}includes/assets/js/tooltipster.bundle.min.js", array('jquery'), null, true );
        wp_register_script( 'elicus-swiper-script', "{$this->plugin_dir_url}includes/assets/js/swiper/swiper.min.js", array('jquery'), '6.4.5', true );
        wp_register_script( 'elicus-particle-script', "{$this->plugin_dir_url}includes/assets/js/particles.min.js", array('jquery'), '2.0.0', true );
        wp_register_script( 'elicus-magnify-script', "{$this->plugin_dir_url}includes/assets/js/jquery.magnify.min.js", array('jquery'), '2.3.3', true );
        wp_register_script( 'elicus-magnify-mobile-script', "{$this->plugin_dir_url}includes/assets/js/jquery.magnify-mobile.min.js", array('jquery'), '2.3.3', true );
        wp_register_script( 'elicus-tilt-script', "{$this->plugin_dir_url}includes/assets/js/tilt.jquery.min.js", array('jquery'), '1.2.1', true );
        wp_register_style( 'elicus-tooltipster-style', "{$this->plugin_dir_url}includes/assets/css/tooltipster.bundle.min.css", array(), null, false );
        wp_register_style( 'elicus-swiper-style', "{$this->plugin_dir_url}includes/assets/css/swiper/swiper.min.css", array(), '6.4.5', false );
        wp_register_style( 'elicus-magnify-style', "{$this->plugin_dir_url}includes/assets/css/magnify/magnify.min.css", array(), null, false );
    }

    public function dipl_fb_enqueue_scripts() {
        if ( et_core_is_fb_enabled() ) {
            wp_enqueue_script( 'elicus-isotope-script' );
            wp_enqueue_script( 'elicus-images-loaded-script' );
            wp_enqueue_script( 'elicus-lottie-script' );
            wp_enqueue_script( 'elicus-twenty-twenty-script' );
            wp_enqueue_script( 'elicus-event-move-script' );
            wp_enqueue_script( 'elicus-tooltipster-script' );
            wp_enqueue_script( 'elicus-swiper-script' );
            wp_enqueue_script( 'elicus-magnify-script' );
            wp_enqueue_script( 'elicus-magnify-mobile-script' );
            wp_enqueue_script( 'elicus-tilt-script' );
            wp_enqueue_style( 'elicus-tooltipster-style' );
            wp_enqueue_style( 'elicus-swiper-style' );
            wp_enqueue_style( 'elicus-magnify-style' );
        }
    }

    public function dipl_admin_enqueue_scripts( $hook_suffix ) {
        if ( $hook_suffix === 'post-new.php' || $hook_suffix === 'post.php' ) {
            wp_enqueue_style( 'dipl-admin-style', "{$this->plugin_dir_url}styles/admin.min.css", array(), $this->version, false );
            wp_enqueue_script( 'dipl-admin-script', "{$this->plugin_dir_url}scripts/admin.min.js", array('jquery'), $this->version, false );
        }
    }

    /**
     * add JSON to allowed file uploads.
     *
     * @since 1.5.2
     */
    public function dipl_mime_types( $mimes ) {
        $mimes['json'] = 'application/json';
        return $mimes;
    }

    /**
     * add JSON to wp_check_filetype_and_ext.
     *
     * @since 1.5.2
     */
    public function dipl_check_filetype_and_ext( $types, $file, $filename, $mimes ) {
        $check_file = wp_check_filetype( $filename );
        if ( 'json' === $check_file['ext'] ) {
            $types['ext']  = 'json';
            $types['type'] = 'application/json';
        }

        return $types;
    }

    public function dipl_is_testimonial_enabled() {
        $plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
        if ( isset( $plugin_options['dipl-modules'] ) ) {
            $modules = explode( ',', $plugin_options['dipl-modules'] );
            if (
                in_array( 'dipl_testimonial_slider', $modules ) ||
                in_array( 'dipl_testimonial_grid', $modules )
            ) {
                return true;
            }
        } else {
            return true;
        }

        return false;
    }

    public function dipl_is_team_enabled() {
        $plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
        if ( isset( $plugin_options['dipl-modules'] ) ) {
            $modules = explode( ',', $plugin_options['dipl-modules'] );
            if ( in_array( 'dipl_team_slider', $modules ) ) {
                return true;
            }
        } else {
            return true;
        }

        return false;
    }

    public function dipl_register_post_types() {

        $labels = array(
            'name'                  => esc_html_x( 'DP Testimonials', 'Post Type General Name', 'divi-plus' ),
            'singular_name'         => esc_html_x( 'DP Testimonial', 'Post Type Singular Name', 'divi-plus' ),
            'menu_name'             => esc_html__( 'DP Testimonials', 'divi-plus' ),
            'name_admin_bar'        => esc_html__( 'DP Testimonial', 'divi-plus' ),
            'archives'              => esc_html__( 'DP Testimonial Archives', 'divi-plus' ),
            'attributes'            => esc_html__( 'DP Testimonial Attributes', 'divi-plus' ),
            'parent_item_colon'     => esc_html__( 'Parent Testimonial:', 'divi-plus' ),
            'all_items'             => esc_html__( 'All Testimonials', 'divi-plus' ),
            'add_new_item'          => esc_html__( 'Add New Testimonial', 'divi-plus' ),
            'add_new'               => esc_html__( 'Add New', 'divi-plus' ),
            'new_item'              => esc_html__( 'New Testimonial', 'divi-plus' ),
            'edit_item'             => esc_html__( 'Edit Testimonial', 'divi-plus' ),
            'update_item'           => esc_html__( 'Update Testimonial', 'divi-plus' ),
            'view_item'             => esc_html__( 'View Testimonial', 'divi-plus' ),
            'view_items'            => esc_html__( 'View Testimonial', 'divi-plus' ),
            'search_items'          => esc_html__( 'Search Testimonial', 'divi-plus' ),
            'not_found'             => esc_html__( 'Not found', 'divi-plus' ),
            'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'divi-plus' ),
            'featured_image'        => esc_html__( 'Testimonial Author Image', 'divi-plus' ),
            'set_featured_image'    => esc_html__( 'Set testimonial author image', 'divi-plus' ),
            'remove_featured_image' => esc_html__( 'Remove testimonial author image', 'divi-plus' ),
            'use_featured_image'    => esc_html__( 'Use as testimonial author image', 'divi-plus' ),
            'insert_into_item'      => esc_html__( 'Insert into item', 'divi-plus' ),
            'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'divi-plus' ),
            'items_list'            => esc_html__( 'Testimonials list', 'divi-plus' ),
            'items_list_navigation' => esc_html__( 'Testimonials list navigation', 'divi-plus' ),
            'filter_items_list'     => esc_html__( 'Filter testimonial list', 'divi-plus' ),
        );
        $args = array(
            'label'                 => esc_html__( 'DP Testimonials', 'divi-plus' ),
            'description'           => esc_html__( 'Divi Plus Testimonials Custom Post', 'divi-plus' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', ),
            'taxonomies'            => array( 'dipl-testimonial-category' ),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 20,
            'menu_icon'             => 'dashicons-format-quote',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );

        if ( $this->dipl_is_testimonial_enabled() ) {
            register_post_type( 'dipl-testimonial', $args );
        }

        $labels = array(
            'name'                  => esc_html__( 'DP Team Members', 'divi-plus' ),
            'singular_name'         => esc_html__( 'DP Team Member', 'divi-plus' ),
            'menu_name'             => esc_html__( 'DP Team Members', 'divi-plus' ),
            'add_new'               => esc_html__( 'Add New', 'divi-plus' ),
            'add_new_item'          => esc_html__( 'Add New Member', 'divi-plus' ),
            'edit_item'             => esc_html__( 'Edit Member', 'divi-plus' ),
            'new_item'              => esc_html__( 'New Member', 'divi-plus' ),
            'view_item'             => esc_html__( 'View Member', 'divi-plus' ),
            'all_items'             => esc_html__( 'All Members', 'divi-plus' ),
            'search_items'          => esc_html__( 'Search Members', 'divi-plus' ),
            'not_found'             => esc_html__( 'No member found', 'divi-plus' ),
            'not_found_in_trash'    => esc_html__( 'No members found in Trash', 'divi-plus' ),
            'featured_image'        => esc_html__( 'Team Member Image', 'divi-plus' ),
            'set_featured_image'    => esc_html__( 'Set team member image', 'divi-plus' ),
            'remove_featured_image' => esc_html__( 'Remove team member image', 'divi-plus' ),
            'use_featured_image'    => esc_html__( 'Use as team member image', 'divi-plus' ),
            'parent_item_colon'     => esc_html__( 'Parent Member:', 'divi-plus' ),
        );

        $args = array(
            'labels'            => $labels,
            'description'       => esc_html__( 'Divi Plus Team Members Custom Post', 'divi-plus' ),
            'public'            => true,
            'supports'          => array( 'title', 'editor', 'author', 'thumbnail', 'revisions' ),
            'taxonomies'        => array( 'dipl-team-member-category' ),
            'hierarchical'      => true,
            'has_archive'       => true,
            'menu_position'     => 20,
            'menu_icon'         => 'dashicons-admin-users',
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'has_archive'       => true,
            'query_var'         => true,
            'capability_type'   => 'post',
        );

        if ( $this->dipl_is_team_enabled() ) {
            register_post_type( 'dipl-team-member', $args );
        }
    }

    public function dipl_register_taxonomies() {

        $labels = array(
            'name'                       => esc_html_x( 'DP Testimonial Categories', 'Taxonomy General Name', 'divi-plus' ),
            'singular_name'              => esc_html_x( 'DP Testimonial Category', 'Taxonomy Singular Name', 'divi-plus' ),
            'menu_name'                  => esc_html__( 'DP Testimonial Categories', 'divi-plus' ),
            'all_items'                  => esc_html__( 'All Testimonial Categories', 'divi-plus' ),
            'parent_item'                => esc_html__( 'Parent Testimonial Category', 'divi-plus' ),
            'parent_item_colon'          => esc_html__( 'Parent Testimonial Category:', 'divi-plus' ),
            'new_item_name'              => esc_html__( 'New Testimonial Category Name', 'divi-plus' ),
            'add_new_item'               => esc_html__( 'Add New Testimonial Category', 'divi-plus' ),
            'edit_item'                  => esc_html__( 'Edit Testimonial Category', 'divi-plus' ),
            'update_item'                => esc_html__( 'Update Testimonial Category', 'divi-plus' ),
            'view_item'                  => esc_html__( 'View Testimonial Category', 'divi-plus' ),
            'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'divi-plus' ),
            'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'divi-plus' ),
            'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'divi-plus' ),
            'popular_items'              => esc_html__( 'Popular Testimonial Categories', 'divi-plus' ),
            'search_items'               => esc_html__( 'Search Testimonial Categories', 'divi-plus' ),
            'not_found'                  => esc_html__( 'Not Found', 'divi-plus' ),
            'no_terms'                   => esc_html__( 'No Testimonial Categories', 'divi-plus' ),
            'items_list'                 => esc_html__( 'Testimonial Categories list', 'divi-plus' ),
            'items_list_navigation'      => esc_html__( 'Testimonial Categories list navigation', 'divi-plus' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => false,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );

        if ( $this->dipl_is_testimonial_enabled() ) {
            register_taxonomy( 'dipl-testimonial-category', array( 'dipl-testimonial' ), $args );
        }

        $labels = array(
            'name'                       => esc_html_x( 'DP Team Member Categories', 'Taxonomy General Name', 'divi-plus' ),
            'singular_name'              => esc_html_x( 'DP Team Member Category', 'Taxonomy Singular Name', 'divi-plus' ),
            'menu_name'                  => esc_html__( 'DP Team Member Categories', 'divi-plus' ),
            'all_items'                  => esc_html__( 'All Team Member Categories', 'divi-plus' ),
            'parent_item'                => esc_html__( 'Parent Team Member Category', 'divi-plus' ),
            'parent_item_colon'          => esc_html__( 'Parent Team Member Category:', 'divi-plus' ),
            'new_item_name'              => esc_html__( 'New Team Member Category Name', 'divi-plus' ),
            'add_new_item'               => esc_html__( 'Add New Team Member Category', 'divi-plus' ),
            'edit_item'                  => esc_html__( 'Edit Team Member Category', 'divi-plus' ),
            'update_item'                => esc_html__( 'Update Team Member Category', 'divi-plus' ),
            'view_item'                  => esc_html__( 'View Team Member Category', 'divi-plus' ),
            'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'divi-plus' ),
            'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'divi-plus' ),
            'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'divi-plus' ),
            'popular_items'              => esc_html__( 'Popular Team Member Categories', 'divi-plus' ),
            'search_items'               => esc_html__( 'Search Team Member Categories', 'divi-plus' ),
            'not_found'                  => esc_html__( 'Not Found', 'divi-plus' ),
            'no_terms'                   => esc_html__( 'No Team Member Categories', 'divi-plus' ),
            'items_list'                 => esc_html__( 'Team Member Categories list', 'divi-plus' ),
            'items_list_navigation'      => esc_html__( 'Team Member Categories list navigation', 'divi-plus' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => false,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );

        if ( $this->dipl_is_team_enabled() ) {
            register_taxonomy( 'dipl-team-member-category', array( 'dipl-team-member' ), $args );
        }
    }

    public function dipl_add_meta_boxes() {
        add_action( 'add_meta_boxes', array( $this, 'dipl_meta_boxes' ) );
    }

    public function dipl_meta_boxes() {
        if ( $this->dipl_is_testimonial_enabled() ) {
            add_meta_box( 'dipl_testimonial_metabox', esc_html__( 'Testimonial Meta Fields', 'divi-plus' ), array( $this, 'dipl_testimonials_metabox_callback' ), 'dipl-testimonial', 'normal', 'high' );
        }

        if ( $this->dipl_is_team_enabled() ) {
            add_meta_box( 'dipl_team_member_metabox', esc_html__( 'Team Member Meta Fields', 'divi-plus' ), array( $this, 'dipl_team_member_metabox_callback' ), 'dipl-team-member', 'normal', 'high' );
        }
    }

    public function dipl_testimonials_metabox_callback( $post ) {
        
        wp_nonce_field( 'dipl_metaboxes_nonce', 'dipl_testimonial_metabox_nonce' );
        
        $author_name        = get_post_meta( $post->ID, 'dipl_testimonial_author_name', true );
        $author_email       = get_post_meta( $post->ID, 'dipl_testimonial_author_email', true );
        $author_designation = get_post_meta( $post->ID, 'dipl_testimonial_author_designation', true );
        $author_company     = get_post_meta( $post->ID, 'dipl_testimonial_author_company', true );
        $author_company_url = get_post_meta( $post->ID, 'dipl_testimonial_author_company_url', true );
        $author_rating      = get_post_meta( $post->ID, 'dipl_testimonial_author_rating', true );

        $ratings = array( '0.5', '1', '1.5', '2', '2.5', '3', '3.5', '4', '4.5', '5' );
        ?>
        <div class="dipl_meta_fields">
            <label for="dipl_testimonial_author_name">
                <?php esc_html_e( 'Author Name', 'divi-plus' ); ?>
            </label>
            <input type="text" id="dipl_testimonial_author_name" name="dipl_testimonial_author_name" value="<?php echo esc_attr( $author_name ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_testimonial_author_email">
                <?php esc_html_e( 'Author Email', 'divi-plus' ); ?>
            </label>
            <input type="email" id="dipl_testimonial_author_email" name="dipl_testimonial_author_email" value="<?php echo esc_attr( $author_email ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_testimonial_author_designation">
                <?php esc_html_e( 'Author Designation', 'divi-plus' ); ?>
            </label>
            <input type="text" id="dipl_testimonial_author_designation" name="dipl_testimonial_author_designation" value="<?php echo esc_attr( $author_designation ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_testimonial_author_company">
                <?php esc_html_e( 'Author Company', 'divi-plus' ); ?>
            </label>
            <input type="text" id="dipl_testimonial_author_company" name="dipl_testimonial_author_company" value="<?php echo esc_attr( $author_company ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_testimonial_author_company_url">
                <?php esc_html_e( 'Author Company Url', 'divi-plus' ); ?>
            </label>
            <input type="text" id="dipl_testimonial_author_company_url" name="dipl_testimonial_author_company_url" value="<?php echo esc_attr( $author_company_url ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_testimonial_author_rating">
                <?php esc_html_e( 'Author Rating', 'divi-plus' ); ?>
            </label>
            <select id="dipl_testimonial_author_rating" name="dipl_testimonial_author_rating">
                <?php
                foreach( $ratings as $rating ) {
                    ?><option value="<?php echo esc_attr( $rating ); ?>" <?php selected( $author_rating, esc_attr( $rating ) ); ?>><?php echo esc_html( $rating ); ?></option><?php
                }
                ?>
            </select>
        </div>
        <?php
    }

    public function dipl_save_testimonial_meta_fields( $post_id ) {
        // doing an auto save.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // verify nonce.
        if ( ! isset( $_POST['dipl_testimonial_metabox_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['dipl_testimonial_metabox_nonce'] ) ), 'dipl_metaboxes_nonce' ) ) {
            return;
        }

        // if current user can not edit the post.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        $fields = array(
            'dipl_testimonial_author_name',
            'dipl_testimonial_author_email',
            'dipl_testimonial_author_designation',
            'dipl_testimonial_author_company',
            'dipl_testimonial_author_company_url',
            'dipl_testimonial_author_rating',
        );

        foreach ( $fields as $field ) {
            if ( isset( $_POST[ $field ] ) ) {
                ${$field} = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
                update_post_meta( $post_id, $field, ${$field} );
            }
        }
    }

    public function dipl_team_member_metabox_callback( $post ) {
        $values         = get_post_custom( $post->ID );
        $short_desc     = isset( $values['dipl_team_member_short_desc'] ) ? $values['dipl_team_member_short_desc'][0] : '';
        $designation    = isset( $values['dipl_team_member_designation'] ) ? $values['dipl_team_member_designation'][0] : '';
        $linkedin       = isset( $values['dipl_team_member_linkedin'] ) ? $values['dipl_team_member_linkedin'][0] : '';
        $facebook       = isset( $values['dipl_team_member_facebook'] ) ? $values['dipl_team_member_facebook'][0] : '';
        $twitter        = isset( $values['dipl_team_member_twitter'] ) ? $values['dipl_team_member_twitter'][0] : '';
        $instagram      = isset( $values['dipl_team_member_instagram'] ) ? $values['dipl_team_member_instagram'][0] : '';
        $youtube        = isset( $values['dipl_team_member_youtube'] ) ? $values['dipl_team_member_youtube'][0] : '';
        $email          = isset( $values['dipl_team_member_email'] ) ? $values['dipl_team_member_email'][0] : '';
        $skills         = isset( $values['dipl_team_member_skills'] ) ? $values['dipl_team_member_skills'][0] : '';
        $skills_value   = isset( $values['dipl_team_member_skills_value'] ) ? $values['dipl_team_member_skills_value'][0] : '';

        wp_nonce_field( 'dipl_metaboxes_nonce', 'dipl_team_member_metabox_nonce' );

        ?>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_short_desc">
                <?php esc_html_e( 'Short Description', 'divi-plus' ); ?>
            </label>
            <textarea type="text" name="dipl_team_member_short_desc" id="dipl_team_member_short_desc"><?php echo esc_attr( $short_desc ); ?></textarea>
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_designation">
                <?php esc_html_e( 'Designation', 'divi-plus' ); ?>
            </label>
            <input type="text" name="dipl_team_member_designation" id="dipl_team_member_designation" value="<?php echo esc_attr( $designation ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_email">
                <?php esc_html_e( 'Email Address', 'divi-plus' ); ?>
            </label>
            <input type="email" name="dipl_team_member_email" id="dipl_team_member_email" value="<?php echo esc_attr( $email ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_facebook">
                <?php esc_html_e( 'Facebook Url', 'divi-plus' ); ?>
            </label>
            <input type="url" name="dipl_team_member_facebook" id="dipl_team_member_facebook" value="<?php echo esc_attr( $facebook ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_twitter">
                <?php esc_html_e( 'Twitter Url', 'divi-plus' ); ?>
            </label>
            <input type="url" name="dipl_team_member_twitter" id="dipl_team_member_twitter" value="<?php echo esc_attr( $twitter ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_linkedin">
                <?php esc_html_e( 'Linkedin Url', 'divi-plus' ); ?>
            </label>
            <input type="url" name="dipl_team_member_linkedin" id="dipl_team_member_linkedin" value="<?php echo esc_attr( $linkedin ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_instagram">
                <?php esc_html_e( 'Instagram Url', 'divi-plus' ); ?>
            </label>
            <input type="url" name="dipl_team_member_instagram" id="dipl_team_member_instagram" value="<?php echo esc_attr( $instagram ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_youtube">
                <?php esc_html_e( 'Youtube Url', 'divi-plus' ); ?>
            </label>
            <input type="url" name="dipl_team_member_youtube" id="dipl_team_member_youtube" value="<?php echo esc_attr( $youtube ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_youtube">
                <?php esc_html_e( 'Skills', 'divi-plus' ); ?>
            </label>
            <div class="dipl_repeator_meta_fields">
                <input type="hidden" id="dipl_team_member_skills" name="dipl_team_member_skills" name="skills" value="<?php echo esc_attr( $skills ); ?>" />
                <input type="hidden" id="dipl_team_member_skills_value" name="dipl_team_member_skills_value" name="skills-value" value="<?php echo esc_attr( $skills_value ); ?>" />
                <?php
                    $skills         = explode( ',', $skills );
                    $skills_value   = explode( ',', $skills_value );
                if ( is_array( $skills ) && ! empty( array_filter( $skills ) ) ) {
                    if ( count($skills) > 1 ) {
                        $row_control = '<span class="dipl_repeator_meta_field_add_row_control dipl_repeator_meta_field_remove_row">-</span>';
                    } else {
                        $row_control = '';
                    }
                    for ( $i=0; $i < count($skills); $i++ ) {
                        $skill_value = array_key_exists( $i, $skills_value ) ? absint( $skills_value[$i] ) : 100;
                        ?>
                        <div class="dipl_repeator_meta_field_row">
                            <div class="dipl_repeator_meta_field">
                                <input type="text" class="dipl_team_member_skills" value="<?php echo esc_attr( $skills[$i] ); ?>" placeholder="Skill" />
                                <input type="number" class="dipl_team_member_skills_value" value="<?php echo esc_attr( $skill_value ); ?>" placeholder="Skill Value Between 0 to 100" step="1" min="0" max="100"/>
                            </div>
                            <p class="dipl_repeator_meta_field_row_controls">
                                <?php echo et_core_intentionally_unescaped( $row_control, 'html' ); ?>
                                <?php 
                                if ( $i === ( count($skills) - 1 ) ) {
                                    ?><span class="dipl_repeator_meta_field_add_row_control dipl_repeator_meta_field_add_row">+</span><?php
                                }
                                ?>
                            </p>
                        </div>
                        <?php
                    }
                } else {
                 ?>
                    <div class="dipl_repeator_meta_field_row">
                        <div class="dipl_repeator_meta_field">
                            <input type="text" class="dipl_team_member_skills" placeholder="Skill" />
                            <input type="number" class="dipl_team_member_skills_value" placeholder="Skill Value Between 0 to 100" step="1" min="0" max="100" />
                        </div>
                        <p class="dipl_repeator_meta_field_row_controls">
                            <span class="dipl_repeator_meta_field_add_row_control dipl_repeator_meta_field_add_row">+</span>
                        </p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <?php
    }

    public function dipl_save_team_member_meta_fields( $post_id ) {
        // doing an auto save.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // verify nonce.
        if ( ! isset( $_POST['dipl_team_member_metabox_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['dipl_team_member_metabox_nonce'] ) ), 'dipl_metaboxes_nonce' ) ) {
            return;
        }

        // if current user can not edit the post.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        $fields = array(
            'dipl_team_member_short_desc',
            'dipl_team_member_designation',
            'dipl_team_member_linkedin',
            'dipl_team_member_facebook',
            'dipl_team_member_twitter',
            'dipl_team_member_instagram',
            'dipl_team_member_youtube',
            'dipl_team_member_email',
            'dipl_team_member_skills',
            'dipl_team_member_skills_value',
        );

        foreach ( $fields as $field ) {
            if ( isset( $_POST[ $field ] ) ) {
                ${$field} = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
                update_post_meta( $post_id, $field, ${$field} );
            }
        }
    }

    public function array_recursion( &$array, $search ) {
        foreach ( $array as $key => &$value ) {
            if ( is_array( $value ) ) {
                $this->array_recursion( $value, $search );
            } else if ( in_array( $key, $search, true ) ) {
                if ( 'dipl_modal' === $value ) {
                    if ( ! isset( $array['attrs']['modal_id'] ) || '' ===  $array['attrs']['modal_id'] ) {
                        $modal_counter = intval( get_option( 'dipl_modal_counter', '1' ) );
                        $array['attrs']['modal_id'] = 'dipl_modal_module_' . $modal_counter;
                        $modal_counter = $modal_counter + 1;
                        update_option( 'dipl_modal_counter', $modal_counter );
                    }
                }
            }
        }
    }

    public function et_fb_ajax_save() {
        /**
         * @see et_fb_ajax_save() in themes/Divi/includes/builder/functions.php
         */
        if (
            ! isset( $_POST['et_fb_save_nonce'] ) ||
            ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['et_fb_save_nonce'] ) ), 'et_fb_save_nonce' )
        ) {
            return;
        }

        $post_id = isset( $_POST['post_id'] ) ? absint( $_POST['post_id'] ) : '';

        if ( '' === $post_id ) {
            return;
        }

        if ( 
            isset( $_POST['options']['status'] ) &&
            function_exists( 'et_fb_current_user_can_save' ) &&
            ! et_fb_current_user_can_save( $post_id, sanitize_text_field( wp_unslash( $_POST['options']['status'] ) ) )
        ) {
            return;
        }

        // Fetch the builder attributes and sanitize them.
        if ( isset ( $_POST['modules'] ) ) {
            // phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized
            $shortcode_data = json_decode( stripslashes( $_POST['modules'] ), true );
            $this->array_recursion( $shortcode_data, array( 'type' ) );
            $_POST['modules'] = addslashes( wp_json_encode( $shortcode_data ) );
        }
        
    }

    public function dipl_ajax_search_results() {
        if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['nonce'] ) ), 'elicus-divi-plus-nonce' ) ) {
            return;
        }

        $search             = isset( $_POST['search'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['search'] ) ) ) : '';
        $post_types         = isset( $_POST['post_types'] ) ? sanitize_text_field( wp_unslash( $_POST['post_types'] ) ) : '';
        $search_in          = isset( $_POST['search_in'] ) ? sanitize_text_field( wp_unslash( $_POST['search_in'] ) ) : '';
        $display_fields     = isset( $_POST['display_fields'] ) ? sanitize_text_field( wp_unslash( $_POST['display_fields'] ) ) : '';
        $url_new_window     = isset( $_POST['url_new_window'] ) ? sanitize_text_field( wp_unslash( $_POST['url_new_window'] ) ) : 'off';
        $number_of_results  = isset( $_POST['number_of_results'] ) ? intval( wp_unslash( $_POST['number_of_results'] ) ) : '10';
        $no_result_text     = isset( $_POST['no_result_text'] ) ? sanitize_text_field( wp_unslash( $_POST['no_result_text'] ) ) : 'No result found';
        $orderby            = isset( $_POST['orderby'] ) ? sanitize_text_field( wp_unslash( $_POST['orderby'] ) ) : 'post_date';
        $order              = isset( $_POST['order'] ) ? sanitize_text_field( wp_unslash( $_POST['order'] ) ) : 'DESC';
        $masonry            = isset( $_POST['masonry'] ) ? sanitize_text_field( wp_unslash( $_POST['masonry'] ) ) : 'off';
        $result_layout      = 'classic';

        if ( empty( $search ) ) {
            echo '';
            exit();
        }

        $link_target = 'on' === $url_new_window ? esc_attr( '_blank' ) : esc_attr( '_self' );

        $raw_post_types = get_post_types( array(
            'public' => true,
            'show_ui' => true,
            'exclude_from_search' => false,
        ), 'objects' );

        $blocklist = array( 'et_pb_layout', 'layout', 'attachment' );
        $whitelisted_post_types = array();

        foreach ( $raw_post_types as $post_type ) {
            $is_blocklisted = in_array( $post_type->name, $blocklist );
            if ( ! $is_blocklisted && post_type_exists( $post_type->name ) ) {
                array_push( $whitelisted_post_types, $post_type->name );
            }
        }

        $post_types = explode( ',', $post_types );
        foreach( $post_types as $key => $post_type ) {
            if ( ! in_array( $post_type, $whitelisted_post_types, true ) ) {
                unset( $post_types[$key] );
            }
        }

        $whitelisted_search_in = array( 'post_title', 'post_content', 'post_excerpt' );
        $search_in = explode( ',', $search_in );
        foreach( $search_in as $key => $in ) {
            if ( ! in_array( $in, $whitelisted_search_in, true ) ) {
                unset( $search_in[$key] );
            }
        }

        $whitelisted_orderby = array( 'post_date', 'post_modified', 'post_title', 'post_name', 'ID', 'rand' );
        if ( ! in_array( $orderby, $whitelisted_orderby, true ) ) {
            $orderby = 'post_date';
        }

        $whitelisted_order = array( 'ASC', 'DESC' );
        if ( ! in_array( $order, $whitelisted_order, true ) ) {
            $order = 'DESC';
        }

        if ( 'rand' === $orderby ) {
            $orderby    = 'RAND()';
            $order      = '';
        }

        global $wpdb;
        $search = '%' . $wpdb->esc_like( $search ) . '%';

        $where_search_in = array();
        if ( ! empty( $search_in ) ) {
            foreach ( $search_in as $in ) {
                array_push( $where_search_in, $wpdb->prepare( esc_sql( $in ) .' LIKE %s', $search ) );
            }
            $where_search_in = implode( ' OR ', $where_search_in );
        } else {
            foreach ( $whitelisted_search_in as $in ) {
                array_push( $where_search_in, $wpdb->prepare( esc_sql( $in ) .' LIKE %s', $search ) );
            }
            $where_search_in = implode( ' OR ', $where_search_in );
        }

        $where_post_type = array();
        if ( ! empty( $post_types ) ) {
            foreach ( $post_types as $post_type ) {
                array_push( $where_post_type, $wpdb->prepare( "post_type = %s", esc_sql( $post_type ) ) );
            }
            $where_post_type = implode( ' OR ', $where_post_type );
        } else {
            foreach ( $whitelisted_post_types as $post_type ) {
                array_push( $where_post_type, $wpdb->prepare( "post_type = %s", esc_sql( $post_type ) ) );
            }
            $where_post_type = implode( ' OR ', $where_post_type );
        }

        $order_clause = " ORDER BY {$orderby} {$order} ";

        if ( -1 !== $number_of_results ) {
            $limit = ' LIMIT '. esc_sql( absint( $number_of_results ) );
        } else {
            $limit = '';
        }

        $where      = "(" . $where_search_in . ") AND (" . $where_post_type . ") AND post_status = 'publish' ";
        $table      = $wpdb->prefix . 'posts';
        $query      = "SELECT DISTINCT ID, post_title FROM " . $table . " WHERE " . $where . $order_clause . $limit;
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.NotPrepared
        $results    = $wpdb->get_results( $query );
        
        if ( ! $results || empty( $results ) ) {
            $output  = '<div class="dipl_ajax_search_results">';
            $output .= esc_html( $no_result_text );
            $output .= '</div>';
            echo et_core_intentionally_unescaped( $output, 'html' );
            exit();
        }

        $whitelisted_display_fields = array( 'title', 'excerpt', 'featured_image', 'product_price' );
        $display_fields = explode( ',', $display_fields );
        foreach( $display_fields as $key => $display_field ) {
            if ( ! in_array( $display_field, $whitelisted_display_fields, true ) ) {
                unset( $display_fields[$key] );
            }
        }

        if ( empty( $display_fields ) ) {
            $display_fields = array( 'title' );
        }
        
        if ( 'on' === $masonry ) {
            $masonry_class = ' dipl_ajax_search_result_masonry';
        } else {
            $masonry_class = '';
        }

        $output  = '<div class="dipl_ajax_search_results' . $masonry_class . '">';
        $output .= '<div class="dipl_ajax_search_items">';
        foreach( $results as $result ) {
            $post_id    = absint( $result->ID );
            $post_title = $result->post_title;

            if ( 'product' === get_post_type( $post_id ) ) {
                $product = wc_get_product( $post_id );
                $product_visibility = $product->get_catalog_visibility();
                if ( ! in_array( $product_visibility, array( 'search', 'visible' ) ) ) {
                    continue;
                }
            } else {
                $product = '';
            }
            
            if ( 'on' === $masonry ) {
                $output .= '<div class="dipl_ajax_search_isotope_item">';
            }

            if ( file_exists( $this->plugin_dir . 'modules/AjaxSearch/layouts/' . sanitize_file_name( $result_layout ) . '.php' ) ) {
                include $this->plugin_dir . 'modules/AjaxSearch/layouts/' . sanitize_file_name( $result_layout ) . '.php';
            } else {
                include $this->plugin_dir . 'modules/AjaxSearch/layouts/classic.php';
            }

            if ( 'on' === $masonry ) {
                $output .= '</div>';
            }
        }
        $output .= '</div>';
        $output .= '</div>';

        echo et_core_intentionally_unescaped( $output, 'html' );
        exit();

    }
    
}

new DIPL_DiviPlus;