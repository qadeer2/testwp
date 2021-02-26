<?php
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.6.6
 */
if ( ! function_exists( 'dipl_get_post_thumbnail' ) ) {
    function dipl_get_post_thumbnail( $post_id, $size, $class, $print = false, $url = false ) {
        if ( ! $post_id ) {
            return;
        }

        $thumb     = '';
        $thumb_url = '';
        $atts      = array();
        if ( has_post_thumbnail( $post_id ) ) {
            $attach_id = get_post_thumbnail_id( $post_id );
            if ( 0 !== $attach_id && '' !== $attach_id && '0' !== $attach_id ) {
                $atts['alt'] = get_post_meta( $attach_id, '_wp_attachment_image_alt', true );
            } else {
                $atts['alt'] = get_the_title( $post_id );
            }

            if ( $class ) {
                $atts['class'] = $class;
            }
            $thumb     = get_the_post_thumbnail( $post_id, esc_attr( $size ), $atts );
            $thumb_url = get_the_post_thumbnail_url( $post_id, esc_attr( $size ) );
        } else {
            $post_object         = get_post( $post_id );
            $unprocessed_content = $post_object->post_content;

            // truncate Post based shortcodes if Divi Builder enabled to avoid infinite loops.
            if ( function_exists( 'et_strip_shortcodes' ) ) {
                $unprocessed_content = et_strip_shortcodes( $post_object->post_content, true );
            }

            // Check if content should be overridden with a custom value.
            $custom = apply_filters( 'et_first_image_use_custom_content', false, $unprocessed_content, $post_object );
            // apply the_content filter to execute all shortcodes and get the correct image from the processed content.
            $processed_content = false === $custom ? apply_filters( 'the_content', $unprocessed_content ) : $custom;

            $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $processed_content, $matches );
            if ( isset( $matches[1][0] ) ) {
                $image = trim( $matches[1][0] );
            }

            if ( isset( $image ) ) {
                $attach_id = attachment_url_to_postid( $image );
                if ( 0 !== $attach_id && '' !== $attach_id && '0' !== $attach_id ) {
                    $atts['alt'] = get_post_meta( $attach_id, '_wp_attachment_image_alt', true );
                } else {
                    $atts['alt'] = get_the_title( $post_id );
                }
                if ( $class ) {
                    $atts['class'] = esc_attr( $class );
                }
                $thumb_url = wp_get_attachment_image_url( $attach_id, esc_attr( $size ) );
                $thumb     = wp_get_attachment_image( $attach_id, esc_attr( $size ), false, $atts );
            }
        }

        if ( $print ) {
            if ( $url ) {
                echo esc_url( $thumb_url );
            } else {
                echo et_core_intentionally_unescaped( $thumb, 'html' );
            }
        } else {
            if ( $url ) {
                return esc_url( $thumb_url );
            } else {
                return et_core_intentionally_unescaped( $thumb, 'html' );
            }
        }
    }
}

if ( ! function_exists( 'dipl_strip_shortcodes' ) ) {
    function dipl_strip_shortcodes( $content, $truncate_post_based_shortcodes_only = false ) {
        global $shortcode_tags;

        $content = trim( $content );

        $strip_content_shortcodes = array(
            'et_pb_code',
            'et_pb_fullwidth_code',
            'dipl_modal',
            'el_modal_popup',
        );

        // list of post-based shortcodes.
        if ( $truncate_post_based_shortcodes_only ) {
            $strip_content_shortcodes = array(
                'et_pb_post_slider',
                'et_pb_fullwidth_post_slider',
                'et_pb_blog',
                'et_pb_blog_extras',
                'et_pb_comments',
            );
        }

        foreach ( $strip_content_shortcodes as $shortcode_name ) {
            $regex = sprintf(
                '(\[%1$s[^\]]*\][^\[]*\[\/%1$s\]|\[%1$s[^\]]*\])',
                esc_html( $shortcode_name )
            );

            $content = preg_replace( $regex, '', $content );
        }

        // do not proceed if we need to truncate post-based shortcodes only.
        if ( $truncate_post_based_shortcodes_only ) {
            return $content;
        }

        $shortcode_tag_names = array();
        foreach ( $shortcode_tags as $shortcode_tag_name => $shortcode_tag_cb ) {
            if ( 0 !== strpos( $shortcode_tag_name, 'et_pb_' ) ) {
                continue;
            }

            $shortcode_tag_names[] = $shortcode_tag_name;
        }

        $et_shortcodes = implode( '|', $shortcode_tag_names );

        $regex_opening_shortcodes = sprintf( '(\[(%1$s)[^\]]+\])', esc_html( $et_shortcodes ) );
        $regex_closing_shortcodes = sprintf( '(\[\/(%1$s)\])', esc_html( $et_shortcodes ) );

        $content = preg_replace( $regex_opening_shortcodes, '', $content );
        $content = preg_replace( $regex_closing_shortcodes, '', $content );

        return et_core_intentionally_unescaped( $content, 'html' );
    }
}

if ( ! function_exists( 'dipl_truncate_post' ) ) {
    function dipl_truncate_post( $amount, $echo = true, $post_id = '', $strip_shortcodes = false ) {
        global $shortname;

        if ( '' === $post_id ) {
            return '';
        }

        $post_object = get_post( $post_id );

        $post_excerpt = '';
        $post_excerpt = apply_filters( 'the_excerpt', $post_object->post_excerpt );

        if ( 'on' === et_get_option( $shortname . '_use_excerpt' ) && '' !== $post_excerpt ) {
            if ( $echo ) {
                echo et_core_intentionally_unescaped( $post_excerpt, 'html' );
            } else {
                return $post_excerpt;
            }
        } else {
            // get the post content.
            $truncate = $post_object->post_content;

            // remove caption shortcode from the post content.
            $truncate = preg_replace( '@\[caption[^\]]*?\].*?\[\/caption]@si', '', $truncate );

            // remove post nav shortcode from the post content.
            $truncate = preg_replace( '@\[et_pb_post_nav[^\]]*?\].*?\[\/et_pb_post_nav]@si', '', $truncate );

            // Remove audio shortcode from post content to prevent unwanted audio file on the excerpt
            // due to unparsed audio shortcode.
            $truncate = preg_replace( '@\[audio[^\]]*?\].*?\[\/audio]@si', '', $truncate );

            // Remove embed shortcode from post content.
            $truncate = preg_replace( '@\[embed[^\]]*?\].*?\[\/embed]@si', '', $truncate );

            if ( $strip_shortcodes ) {
                $truncate = dipl_strip_shortcodes( $truncate );
            } else {
                // apply content filters.
                $truncate = apply_filters( 'the_content', $truncate );
            }

            // decide if we need to append dots at the end of the string.
            if ( strlen( $truncate ) <= $amount ) {
                $echo_out = '';
            } else {
                $echo_out = '...';
                if ( $amount > 3 ) {
                    $amount = $amount - 3;
                }
            }

            // trim text to a certain number of characters, also remove spaces from the end of a string ( space counts as a character ).
            $truncate = rtrim( et_wp_trim_words( $truncate, $amount, '' ) );

            // remove the last word to make sure we display all words correctly.
            if ( '' !== $echo_out ) {
                $new_words_array = (array) explode( ' ', $truncate );
                array_pop( $new_words_array );

                $truncate = implode( ' ', $new_words_array );

                // append dots to the end of the string.
                if ( '' !== $truncate ) {
                    $truncate .= $echo_out;
                }
            }

            if ( $echo ) {
                echo et_core_intentionally_unescaped( $truncate, 'html' );
            } else {
                return et_core_intentionally_unescaped( $truncate, 'html' );
            }
        }
    }
}

if ( ! function_exists( 'dipl_render_divi_button' ) ) {
    function dipl_render_divi_button( $args = array() ) {
        // Prepare arguments.
        $defaults = array(
            'button_id'           => '',
            'button_classname'    => array(),
            'button_custom'       => '',
            'button_rel'          => '',
            'button_text'         => '',
            'button_text_escaped' => false,
            'button_url'          => '',
            'custom_icon'         => '',
            'custom_icon_tablet'  => '',
            'custom_icon_phone'   => '',
            'display_button'      => true,
            'has_wrapper'         => true,
            'url_new_window'      => '',
            'multi_view_data'     => '',
        );

        $args = wp_parse_args( $args, $defaults );

        // Do not proceed if display_button argument is false.
        if ( ! $args['display_button'] ) {
            return '';
        }

        $button_text = $args['button_text_escaped'] ? $args['button_text'] : esc_html( $args['button_text'] );

        // Do not proceed if button_text argument is empty and not having multi view value.
        if ( '' === $button_text && ! $args['multi_view_data'] ) {
            return '';
        }

        // Button classname.
        $button_classname = array( 'et_pb_button' );

        if ( ( '' !== $args['custom_icon'] || '' !== $args['custom_icon_tablet'] || '' !== $args['custom_icon_phone'] ) && 'on' === $args['button_custom'] ) {
            $button_classname[] = 'et_pb_custom_button_icon';
        }

        // Add multi view CSS hidden helper class when button text is empty on desktop mode.
        if ( '' === $button_text && $args['multi_view_data'] ) {
            $button_classname[] = 'et_multi_view_hidden';
        }

        if ( ! empty( $args['button_classname'] ) ) {
            $button_classname = array_merge( $button_classname, $args['button_classname'] );
        }

        // Custom icon data attribute.
        $use_data_icon = '' !== $args['custom_icon'] && 'on' === $args['button_custom'];
        $data_icon     = $use_data_icon ? sprintf(
            ' data-icon="%1$s"',
            esc_attr( el_process_font_icon( $args['custom_icon'] ) )
        ) : '';

        $use_data_icon_tablet = '' !== $args['custom_icon_tablet'] && 'on' === $args['button_custom'];
        $data_icon_tablet     = $use_data_icon_tablet ? sprintf(
            ' data-icon-tablet="%1$s"',
            esc_attr( el_process_font_icon( $args['custom_icon_tablet'] ) )
        ) : '';

        $use_data_icon_phone = '' !== $args['custom_icon_phone'] && 'on' === $args['button_custom'];
        $data_icon_phone     = $use_data_icon_phone ? sprintf(
            ' data-icon-phone="%1$s"',
            esc_attr( el_process_font_icon( $args['custom_icon_phone'] ) )
        ) : '';

        // Render button.
        return sprintf(
            '%6$s<a%8$s class="%5$s" href="%1$s"%3$s%4$s%9$s%10$s%11$s>%2$s</a>%7$s',
            esc_url( $args['button_url'] ),
            et_core_esc_previously( $button_text ),
            ( 'on' === $args['url_new_window'] ? ' target="_blank"' : '' ),
            et_core_esc_previously( $data_icon ),
            esc_attr( implode( ' ', array_unique( $button_classname ) ) ), // #5
            $args['has_wrapper'] ? '<div class="et_pb_button_wrapper">' : '',
            $args['has_wrapper'] ? '</div>' : '',
            '' !== $args['button_id'] ? sprintf( ' id="%1$s"', esc_attr( $args['button_id'] ) ) : '',
            et_core_esc_previously( $data_icon_tablet ),
            et_core_esc_previously( $data_icon_phone ), // #10
            et_core_esc_previously( $args['multi_view_data'] )
        );
    }
}

if ( ! function_exists( 'dipl_process_font_icon' ) ) {
    function dipl_process_font_icon( $font_icon, $symbols_function = 'default' ) {
        // the exact font icon value is saved.
        if ( 1 !== preg_match( '/^%%/', trim( $font_icon ) ) ) {
            return $font_icon;
        }

        // the font icon value is saved in the following format: %%index_number%%.
        $icon_index   = (int) str_replace( '%', '', $font_icon );
        $icon_symbols = 'default' === $symbols_function ? dipl_get_font_icon_symbols() : call_user_func( $symbols_function );
        $font_icon    = isset( $icon_symbols[ $icon_index ] ) ? $icon_symbols[ $icon_index ] : '';

        return $font_icon;
    }
}

if ( ! function_exists( 'dipl_get_font_icon_symbols' ) ) {
    function dipl_get_font_icon_symbols() {
        $symbols = array( '&amp;#x21;', '&amp;#x22;', '&amp;#x23;', '&amp;#x24;', '&amp;#x25;', '&amp;#x26;', '&amp;#x27;', '&amp;#x28;', '&amp;#x29;', '&amp;#x2a;', '&amp;#x2b;', '&amp;#x2c;', '&amp;#x2d;', '&amp;#x2e;', '&amp;#x2f;', '&amp;#x30;', '&amp;#x31;', '&amp;#x32;', '&amp;#x33;', '&amp;#x34;', '&amp;#x35;', '&amp;#x36;', '&amp;#x37;', '&amp;#x38;', '&amp;#x39;', '&amp;#x3a;', '&amp;#x3b;', '&amp;#x3c;', '&amp;#x3d;', '&amp;#x3e;', '&amp;#x3f;', '&amp;#x40;', '&amp;#x41;', '&amp;#x42;', '&amp;#x43;', '&amp;#x44;', '&amp;#x45;', '&amp;#x46;', '&amp;#x47;', '&amp;#x48;', '&amp;#x49;', '&amp;#x4a;', '&amp;#x4b;', '&amp;#x4c;', '&amp;#x4d;', '&amp;#x4e;', '&amp;#x4f;', '&amp;#x50;', '&amp;#x51;', '&amp;#x52;', '&amp;#x53;', '&amp;#x54;', '&amp;#x55;', '&amp;#x56;', '&amp;#x57;', '&amp;#x58;', '&amp;#x59;', '&amp;#x5a;', '&amp;#x5b;', '&amp;#x5c;', '&amp;#x5d;', '&amp;#x5e;', '&amp;#x5f;', '&amp;#x60;', '&amp;#x61;', '&amp;#x62;', '&amp;#x63;', '&amp;#x64;', '&amp;#x65;', '&amp;#x66;', '&amp;#x67;', '&amp;#x68;', '&amp;#x69;', '&amp;#x6a;', '&amp;#x6b;', '&amp;#x6c;', '&amp;#x6d;', '&amp;#x6e;', '&amp;#x6f;', '&amp;#x70;', '&amp;#x71;', '&amp;#x72;', '&amp;#x73;', '&amp;#x74;', '&amp;#x75;', '&amp;#x76;', '&amp;#x77;', '&amp;#x78;', '&amp;#x79;', '&amp;#x7a;', '&amp;#x7b;', '&amp;#x7c;', '&amp;#x7d;', '&amp;#x7e;', '&amp;#xe000;', '&amp;#xe001;', '&amp;#xe002;', '&amp;#xe003;', '&amp;#xe004;', '&amp;#xe005;', '&amp;#xe006;', '&amp;#xe007;', '&amp;#xe009;', '&amp;#xe00a;', '&amp;#xe00b;', '&amp;#xe00c;', '&amp;#xe00d;', '&amp;#xe00e;', '&amp;#xe00f;', '&amp;#xe010;', '&amp;#xe011;', '&amp;#xe012;', '&amp;#xe013;', '&amp;#xe014;', '&amp;#xe015;', '&amp;#xe016;', '&amp;#xe017;', '&amp;#xe018;', '&amp;#xe019;', '&amp;#xe01a;', '&amp;#xe01b;', '&amp;#xe01c;', '&amp;#xe01d;', '&amp;#xe01e;', '&amp;#xe01f;', '&amp;#xe020;', '&amp;#xe021;', '&amp;#xe022;', '&amp;#xe023;', '&amp;#xe024;', '&amp;#xe025;', '&amp;#xe026;', '&amp;#xe027;', '&amp;#xe028;', '&amp;#xe029;', '&amp;#xe02a;', '&amp;#xe02b;', '&amp;#xe02c;', '&amp;#xe02d;', '&amp;#xe02e;', '&amp;#xe02f;', '&amp;#xe030;', '&amp;#xe103;', '&amp;#xe0ee;', '&amp;#xe0ef;', '&amp;#xe0e8;', '&amp;#xe0ea;', '&amp;#xe101;', '&amp;#xe107;', '&amp;#xe108;', '&amp;#xe102;', '&amp;#xe106;', '&amp;#xe0eb;', '&amp;#xe010;', '&amp;#xe105;', '&amp;#xe0ed;', '&amp;#xe100;', '&amp;#xe104;', '&amp;#xe0e9;', '&amp;#xe109;', '&amp;#xe0ec;', '&amp;#xe0fe;', '&amp;#xe0f6;', '&amp;#xe0fb;', '&amp;#xe0e2;', '&amp;#xe0e3;', '&amp;#xe0f5;', '&amp;#xe0e1;', '&amp;#xe0ff;', '&amp;#xe031;', '&amp;#xe032;', '&amp;#xe033;', '&amp;#xe034;', '&amp;#xe035;', '&amp;#xe036;', '&amp;#xe037;', '&amp;#xe038;', '&amp;#xe039;', '&amp;#xe03a;', '&amp;#xe03b;', '&amp;#xe03c;', '&amp;#xe03d;', '&amp;#xe03e;', '&amp;#xe03f;', '&amp;#xe040;', '&amp;#xe041;', '&amp;#xe042;', '&amp;#xe043;', '&amp;#xe044;', '&amp;#xe045;', '&amp;#xe046;', '&amp;#xe047;', '&amp;#xe048;', '&amp;#xe049;', '&amp;#xe04a;', '&amp;#xe04b;', '&amp;#xe04c;', '&amp;#xe04d;', '&amp;#xe04e;', '&amp;#xe04f;', '&amp;#xe050;', '&amp;#xe051;', '&amp;#xe052;', '&amp;#xe053;', '&amp;#xe054;', '&amp;#xe055;', '&amp;#xe056;', '&amp;#xe057;', '&amp;#xe058;', '&amp;#xe059;', '&amp;#xe05a;', '&amp;#xe05b;', '&amp;#xe05c;', '&amp;#xe05d;', '&amp;#xe05e;', '&amp;#xe05f;', '&amp;#xe060;', '&amp;#xe061;', '&amp;#xe062;', '&amp;#xe063;', '&amp;#xe064;', '&amp;#xe065;', '&amp;#xe066;', '&amp;#xe067;', '&amp;#xe068;', '&amp;#xe069;', '&amp;#xe06a;', '&amp;#xe06b;', '&amp;#xe06c;', '&amp;#xe06d;', '&amp;#xe06e;', '&amp;#xe06f;', '&amp;#xe070;', '&amp;#xe071;', '&amp;#xe072;', '&amp;#xe073;', '&amp;#xe074;', '&amp;#xe075;', '&amp;#xe076;', '&amp;#xe077;', '&amp;#xe078;', '&amp;#xe079;', '&amp;#xe07a;', '&amp;#xe07b;', '&amp;#xe07c;', '&amp;#xe07d;', '&amp;#xe07e;', '&amp;#xe07f;', '&amp;#xe080;', '&amp;#xe081;', '&amp;#xe082;', '&amp;#xe083;', '&amp;#xe084;', '&amp;#xe085;', '&amp;#xe086;', '&amp;#xe087;', '&amp;#xe088;', '&amp;#xe089;', '&amp;#xe08a;', '&amp;#xe08b;', '&amp;#xe08c;', '&amp;#xe08d;', '&amp;#xe08e;', '&amp;#xe08f;', '&amp;#xe090;', '&amp;#xe091;', '&amp;#xe092;', '&amp;#xe0f8;', '&amp;#xe0fa;', '&amp;#xe0e7;', '&amp;#xe0fd;', '&amp;#xe0e4;', '&amp;#xe0e5;', '&amp;#xe0f7;', '&amp;#xe0e0;', '&amp;#xe0fc;', '&amp;#xe0f9;', '&amp;#xe0dd;', '&amp;#xe0f1;', '&amp;#xe0dc;', '&amp;#xe0f3;', '&amp;#xe0d8;', '&amp;#xe0db;', '&amp;#xe0f0;', '&amp;#xe0df;', '&amp;#xe0f2;', '&amp;#xe0f4;', '&amp;#xe0d9;', '&amp;#xe0da;', '&amp;#xe0de;', '&amp;#xe0e6;', '&amp;#xe093;', '&amp;#xe094;', '&amp;#xe095;', '&amp;#xe096;', '&amp;#xe097;', '&amp;#xe098;', '&amp;#xe099;', '&amp;#xe09a;', '&amp;#xe09b;', '&amp;#xe09c;', '&amp;#xe09d;', '&amp;#xe09e;', '&amp;#xe09f;', '&amp;#xe0a0;', '&amp;#xe0a1;', '&amp;#xe0a2;', '&amp;#xe0a3;', '&amp;#xe0a4;', '&amp;#xe0a5;', '&amp;#xe0a6;', '&amp;#xe0a7;', '&amp;#xe0a8;', '&amp;#xe0a9;', '&amp;#xe0aa;', '&amp;#xe0ab;', '&amp;#xe0ac;', '&amp;#xe0ad;', '&amp;#xe0ae;', '&amp;#xe0af;', '&amp;#xe0b0;', '&amp;#xe0b1;', '&amp;#xe0b2;', '&amp;#xe0b3;', '&amp;#xe0b4;', '&amp;#xe0b5;', '&amp;#xe0b6;', '&amp;#xe0b7;', '&amp;#xe0b8;', '&amp;#xe0b9;', '&amp;#xe0ba;', '&amp;#xe0bb;', '&amp;#xe0bc;', '&amp;#xe0bd;', '&amp;#xe0be;', '&amp;#xe0bf;', '&amp;#xe0c0;', '&amp;#xe0c1;', '&amp;#xe0c2;', '&amp;#xe0c3;', '&amp;#xe0c4;', '&amp;#xe0c5;', '&amp;#xe0c6;', '&amp;#xe0c7;', '&amp;#xe0c8;', '&amp;#xe0c9;', '&amp;#xe0ca;', '&amp;#xe0cb;', '&amp;#xe0cc;', '&amp;#xe0cd;', '&amp;#xe0ce;', '&amp;#xe0cf;', '&amp;#xe0d0;', '&amp;#xe0d1;', '&amp;#xe0d2;', '&amp;#xe0d3;', '&amp;#xe0d4;', '&amp;#xe0d5;', '&amp;#xe0d6;', '&amp;#xe0d7;', '&amp;#xe600;', '&amp;#xe601;', '&amp;#xe602;', '&amp;#xe603;', '&amp;#xe604;', '&amp;#xe605;', '&amp;#xe606;', '&amp;#xe607;', '&amp;#xe608;', '&amp;#xe609;', '&amp;#xe60a;', '&amp;#xe60b;', '&amp;#xe60c;', '&amp;#xe60d;', '&amp;#xe60e;', '&amp;#xe60f;', '&amp;#xe610;', '&amp;#xe611;', '&amp;#xe612;', '&amp;#xe008;' );

        $symbols = apply_filters( 'et_pb_font_icon_symbols', $symbols );

        return $symbols;
    }
}

if ( ! function_exists( 'el_modal_remove_shortcode' ) ) {
    function el_modal_remove_shortcode( $content = '' ) {
        $content = trim( $content );

        if ( '' === $content ) {
            return '';
        }

        $strip_content_shortcodes = array(
            'dipl_modal',
            'el_modal_popup'
        );

        foreach ( $strip_content_shortcodes as $shortcode_name ) {
            $regex = sprintf(
                '(\[%1$s[^\]]*\][^\[]*\[\/%1$s\]|\[%1$s[^\]]*\])',
                esc_html( $shortcode_name )
            );

            $content = preg_replace( $regex, '', $content );
        }

        return et_core_intentionally_unescaped( $content, 'html' );
    }
}

if ( ! function_exists( 'el_add_divi_plus_action_links' ) ) {
    function el_add_divi_plus_action_links( $links ) {
        $settings = array( '<a href="' . esc_url( admin_url( '/options-general.php?page=divi-plus-options/' ) ) . '">' . esc_html__( 'Settings', 'divi-plus' ) . '</a>' );
        return array_merge( $settings, $links );
    }
    add_filter( 'plugin_action_links_divi-plus/divi-plus.php', 'el_add_divi_plus_action_links' );
}

if ( ! function_exists( 'dipl_product_sale_badge' ) ) {
    function dipl_product_sale_badge( $product, $percent = false ) {
        if ( ! $product->is_on_sale() ) {
            return '';
        }

        if ( ! $percent ) {
            ob_start();
            woocommerce_show_product_sale_flash();
            $sale_flash = ob_get_contents();
            ob_end_clean();

            return  sprintf(
                '<div class="dipl_single_woo_product_sale_badge">
                    %1$s
                </div>',
                esc_html( wp_strip_all_tags( $sale_flash ) )
            );
        }

        $max_percentage = 0;
       
        if ( $product->is_type( 'variable' ) ) {
            $variation_prices = $product->get_variation_prices();
            foreach ( $variation_prices['regular_price'] as $product_id => $regular_price ) {
                if ( 0 === $regular_price ) { 
                    continue;
                }
                if ( $regular_price == $variation_prices['sale_price'][$product_id] ) {
                    continue;
                }
                $percentage = ( ( $regular_price - $variation_prices['sale_price'][$product_id] ) / $regular_price ) * 100;
                if ( $percentage > $max_percentage ) {
                    $max_percentage = $percentage;
                }
            }
        } else if ( $product->is_type( 'grouped' ) ) {
            foreach ( $product->get_children() as $child_product_id ) {
                $child_product  = wc_get_product( $child_product_id );
                $regular_price  = $child_product->get_regular_price();
                $sale_price     = $child_product->get_sale_price();
                if ( 0 !== $regular_price && ! empty( $sale_price ) ) {
                    $percentage = ( ( $regular_price - $sale_price ) / $regular_price ) * 100;
                    if ( $percentage > $max_percentage ) {
                        $max_percentage = $percentage;
                    }
                }
            }
        } else {
            $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
        }

        if ( isset( $max_percentage ) && round( $max_percentage ) > 0 ) {
            return  sprintf(
                '<div class="dipl_single_woo_product_sale_badge">
                    -%1$s%%
                </div>',
                absint( round( $max_percentage ) )
            );
        }

        return '';
    }
}

if ( ! function_exists( 'dipl_woocommerce_category_thumbnail' ) ) {
    function dipl_woocommerce_category_thumbnail( $category, $size = 'woocommerce_thumbnail' ) {
        $dimensions           = wc_get_image_size( $size );
        $thumbnail_id         = get_term_meta( $category->term_id, 'thumbnail_id', true );

        if ( $thumbnail_id ) {
            $image        = wp_get_attachment_image_src( $thumbnail_id, $size );
            $image        = $image[0];
            $image_srcset = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $thumbnail_id, $size ) : false;
            $image_sizes  = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $thumbnail_id, $size ) : false;
        } else {
            $image        = wc_placeholder_img_src();
            $image_srcset = false;
            $image_sizes  = false;
        }

        if ( $image ) {
            // Prevent esc_url from breaking spaces in urls for image embeds.
            // Ref: https://core.trac.wordpress.org/ticket/23605.
            $image = str_replace( ' ', '%20', $image );

            // Add responsive image markup if available.
            if ( $image_srcset && $image_sizes ) {
                return '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" srcset="' . esc_attr( $image_srcset ) . '" sizes="' . esc_attr( $image_sizes ) . '" />';
            } else {
                return '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" />';
            }
        }
    }
}