<?php
/**
 * Plugin Name:       Availability Search - Custom Product Display
 * Description:       Applies a filter to customize the way products are displayed. Code runs directly without a settings page.
 * Version:           1.0
 * Author:            Extra Woo
 * Author URI:        https://extrawoo.com/
 */

// Commment out the below line to disable the filter.
add_filter( 'aswb_display_products', 'aswb_custom_filter_product_display', 11 );

function aswb_custom_filter_product_display( $product_id ) {

	// Get the Product object. We can then access it for the template.
	$product = wc_get_product( $product_id );

	$name        = $product->get_name();
	$price       = $product->get_price();
	$description = $product->get_short_description();
	$thumbnail   = woocommerce_get_product_thumbnail( $product->get_id() );
	$link        = get_permalink( $product->get_id() );
	// Create the add to cart button. Style stops a weird border tag from appearing.
	$shortcode   = "[add_to_cart style='' show_price='false' id='$product_id']";
  // Shortcode for add to cart button inherits your theme styling
	$button      = do_shortcode( $shortcode );


	// Let's make an html template. Data must be variable!
	$output = "<div class='aswb-custom-product-wrapper'>

					<div class='aswb-custom-product-left'>
						<a href='$link'>
						$thumbnail
						</a>
					</div>

					<div class='aswb-custom-product-right'>
					<a href='$link'>
						<h4> $name </h4>
						<span class='price'>
						Book from &#36;$price
						</span>
						</a>
						<p>
							$description
						</p>
					$button
					</div>
				</div>";

	return $output; // The html must be returned
}