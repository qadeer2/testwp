<?php

class dsm_widget_library extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget.
			'dsm_widget_library',
			// Widget name will appear in UI.
			__( 'Divi Library Widget', 'dsm-supreme-modules-pro-for-divi' ),
			// Widget description.
			array( 'description' => __( 'Display your Divi saved library layout.', 'dsm-supreme-modules-pro-for-divi' ) )
		);
	}

	// Creating widget front-end.
	public function widget( $args, $instance ) {
		if ( ! class_exists( 'ET_Builder_Element' ) ) {
			return;
		}
		$title        = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$library_name = ( isset( $instance['library_name'] ) && ! empty( $instance['library_name'] ) ) ? 'true' : 'false';
		$library      = empty( $instance['library'] ) ? '' : $instance['library'];

		echo et_core_intentionally_unescaped( $args['before_widget'], 'html' );

		if ( $library_name !== 'false' ) {
			echo et_core_intentionally_unescaped( $args['before_title'] . esc_html( get_the_title( $library ) ) . $args['after_title'], 'html' );
		} elseif ( ! empty( $title ) ) {
			echo et_core_intentionally_unescaped( $args['before_title'] . esc_html( $title ) . $args['after_title'], 'html' );
		}

		if ( ! empty( $library ) && $library !== 'none' ) {
			echo do_shortcode( '[divi_shortcode id="' . $library . '"]' );
		}

		echo et_core_intentionally_unescaped( $args['after_widget'], 'html' );
	}

	// Widget Backend.
	public function form( $instance ) {
		$instance['title']        = ( isset( $instance['title'] ) && ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$instance['library']      = ( isset( $instance['library'] ) && ! empty( $instance['library'] ) ) ? $instance['library'] : '';
		$instance['library_name'] = ( isset( $instance['library_name'] ) && ! empty( $instance['library_name'] ) ) ? $instance['library_name'] : '';
		// Widget admin form.

		$divi_library = array( '-- Select Library --' => 'none' );

		$args = array(
			'post_type'      => 'et_pb_layout',
			'posts_per_page' => -1,
		);

		$load_library = new WP_Query(
			$args
		);

		if ( $load_library->have_posts() ) {
			if ( $categories = get_posts( $args ) ) {
				foreach ( $categories as $category ) {
					$divi_library[ $category->post_title ] = $category->ID;
				}
			}
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dsm-supreme-modules-pro-for-divi' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( esc_attr( $instance['library_name'] ), 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'library_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'library_name' ) ); ?>" /> 
			<label for="<?php echo esc_attr( $this->get_field_id( 'library_name' ) ); ?>"><?php esc_html_e( 'Use Title as Divi Library Name', 'dsm-supreme-modules-pro-for-divi' ); ?></label>
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'library' ) ); ?>"><?php esc_html_e( 'Select Divi Library:', 'dsm-supreme-modules-pro-for-divi' ); ?></label> 
		<select class="widefat" id="<?php print esc_attr( $this->get_field_id( 'library' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'library' ) ); ?>">
			<?php foreach ( $divi_library as $key => $library ) { ?>
				<option value="<?php echo esc_attr( $library ); ?>" <?php selected( $library, $instance['library'] ); ?>><?php echo esc_html( $key ); ?></option>
			<?php } ?>
		</select>
		</p>
		<?php
	}

	// Updating widget replacing old instances with new.
	public function update( $new_instance, $old_instance ) {
		$instance                 = array();
		$instance['title']        = strip_tags( $new_instance['title'] );
		$instance['library_name'] = $new_instance['library_name'];
		$instance['library']      = strip_tags( $new_instance['library'] );
		return $instance;
	}
}
