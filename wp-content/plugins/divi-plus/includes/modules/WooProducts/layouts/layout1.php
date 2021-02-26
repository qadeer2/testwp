<?php
$dipl_product = wc_get_product( $product_id );

if ( 'on' === $show_thumbnail ) {
	$thumbnail = sprintf(
		'<div class="dipl_single_woo_product_thumbnail_wrapper">
			<div class="dipl_single_woo_product_thumbnail">
				<a href="%3$s" title="%4$s">%1$s</a>
			</div>
			%2$s
		</div>',
		woocommerce_get_product_thumbnail( esc_attr( $thumbnail_size ) ),
		'on' === $show_sale_badge ? dipl_product_sale_badge( $dipl_product, 'percentage' === $sale_badge_text ? true : false ) : '',
		esc_url( get_permalink( $product_id ) ),
		esc_html( wp_strip_all_tags( $dipl_product->get_title() ) )
	);
}

if ( 'on' === $show_price ) {
	$price = sprintf(
		'<div class="dipl_single_woo_product_price">%1$s</div>',
		$dipl_product->get_price_html()
	);
}

if ( 'on' === $show_add_to_cart ) {
	$add_to_cart = sprintf(
		'<div class="dipl_single_woo_product_add_to_cart%2$s">%1$s</div>',
		do_shortcode('[add_to_cart id="' . $product_id . '" show_price="false" style=""]'),
		'on' === $show_add_to_cart_on_hover ? ' dipl_single_woo_product_add_to_cart_on_hover' : ''
	);
}

$output .= sprintf(
	'<div class="dipl_single_woo_product">
		%1$s
		<div class="dipl_single_woo_product_content">
			<%2$s class="dipl_single_woo_product_title">
				<a href="%6$s" title="%3$s">%3$s</a>
			</%2$s>
			%4$s
			%5$s
		</div>
	</div>',
	'on' === $show_thumbnail ? $thumbnail : '',
	esc_html( $processed_title_level ),
	esc_html( wp_strip_all_tags( $dipl_product->get_title() ) ),
	'on' === $show_price ? $price : '',
	'on' === $show_add_to_cart ? $add_to_cart : '',
	esc_url( get_permalink( $product_id ) )
);