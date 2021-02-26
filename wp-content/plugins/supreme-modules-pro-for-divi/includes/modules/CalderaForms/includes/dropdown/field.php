<?php
echo et_core_intentionally_unescaped( $wrapper_before, 'html' );
if ( isset( $field['slug'] ) && wp_verify_nonce( sanitize_key( isset( $_GET[ $field['slug'] ] ) ) ) ) {
	$field_value = Caldera_Forms_Sanitize::sanitize( sanitize_text_field( wp_unslash( $_GET[ $field['slug'] ] ) ) );
}

/*
if ( isset( $field['slug'] ) && isset( $_GET[ $field['slug'] ] ) ) {
	// phpcs:ignore
	$field_value = Caldera_Forms_Sanitize::sanitize( sanitize_text_field( wp_unslash( $_GET[ $field['slug'] ] ) ) );
}
*/

$attrs       = array(
	'name'       => $field_name,
	'value'      => $field_value,
	'data-field' => $field_base_id,
	// add class.
	'class'      => $field_class . ' et_pb_contact_select input',
	'id'         => $field_id,
);
$attr_string = caldera_forms_field_attributes( $attrs, $field, $form );

?>
	<?php echo et_core_intentionally_unescaped( $field_label, 'html' ); ?>
	<?php echo et_core_intentionally_unescaped( $field_before, 'html' ); ?>
	<div class="dsm-caldera-forms-select">
		<select <?php echo et_core_intentionally_unescaped( $attr_string, 'html' ) . ' ' . et_core_intentionally_unescaped( $field_required, 'html' ) . ' ' . et_core_intentionally_unescaped( $field_structure['aria'], 'html' ); ?> >
		<?php

		$field_value  = Caldera_Forms_Field_Util::find_select_field_value( $field, $field_value );
		$showed_empty = false;
		if ( ! empty( $field['config']['placeholder'] ) ) {
				$showed_empty = true;
				$sel          = '';
			if ( empty( $field_value ) ) {
				$sel = 'selected';
			}
				$placeholder = Caldera_Forms::do_magic_tags( $field['config']['placeholder'] );

				echo '<option value="" disabled ' . et_core_intentionally_unescaped( $sel, 'html' ) . '>' . et_core_intentionally_unescaped( $placeholder, 'html' ) . '</option>';
		}

		if ( ! empty( $field['config']['option'] ) ) {
			if ( ( empty( $field_value ) && ! $showed_empty ) && 0 !== $field_value ) {
				echo "<option value=\"\"></option>\r\n";
			}


			foreach ( $field['config']['option'] as $option_key => $option ) {
				if ( ! isset( $option['value'] ) ) {
					$option['value'] = $option['label'];
				}
				if ( ! empty( $option['disabled'] ) ) {
					$disabled[ $option_key ] = true;
				}

				?>
					<option value="<?php echo esc_attr( $option['value'] ); ?>" 
					<?php
					if ( $field_value == $option['value'] ) {
						?>
							selected="selected"<?php } ?> data-calc-value="<?php echo esc_attr( Caldera_Forms_Field_Util::get_option_calculation_value( $option, $field, $form ) ); ?>" 
							<?php
							if ( isset( $disabled[ $option_key ] ) && $disabled[ $option_key ] === true ) {
								?>
						disabled<?php } ?>>
					<?php echo esc_html( $option['label'] ); ?>
					</option>
					<?php
			}
		} else {
			if ( ! $showed_empty ) {
				echo "<option value=\"\"></option>\r\n";
			}
		}


		?>
		</select>
	</div>
		<?php echo et_core_intentionally_unescaped( $field_caption, 'html' ); ?>
	<?php echo et_core_intentionally_unescaped( $field_after, 'html' ); ?>
<?php echo et_core_intentionally_unescaped( $wrapper_after, 'html' ); ?>
