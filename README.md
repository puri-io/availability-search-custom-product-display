# Custom product Display Addon for ASWB 

Display a customized product loop with the Availability Search for WooCommerce Bookings.

This is a simple plugin which serves as an example template. It utilizes a filter `aswb_display_products` which passes the current product ID as a variable.


### Only Supports ASWB version 1.6+!

Check the latest version here https://puri.io/plugin/availablilty-search-woocommerce-bookings/

## Example Snippets.

You can use the filter anywhere you'd like. We recommend to use a custom plugin like this repo. Otherwise you can start using a snippet in your child theme's functions.php.

### Quick Snippet
```
function aswb_custom_filter_product_display( $product_id ) {
  $output = "Outputs each product id: $product_id";

	return $output; // The html must be returned
}
add_filter( 'aswb_display_products', 'aswb_custom_filter_product_display', 10, 1 );
```

### Using an Elementor Template.

If you are using an Elementor template you can call it programatically for reach available booking results. **Remember to replace the id with your own Elementor Template ID**

```
/**
 * Availability Search using an Elementor Template to display products.
 *
 * Tested With: Elementor 2.9.13, Elementor Pro 2.10.3, Ele Custom Skin 2.2.2
 *
 * @param [type] $product_id Proudct id.
 * @return mixed HTML to display product or false for default.
 */
function aswb_custom_filter_product_display( $product_id ) {

	if ( did_action( 'elementor/loaded' ) ) {

		$elementor = \Elementor\Plugin::$instance;

		$elementor->frontend->register_styles();
		$elementor->frontend->enqueue_styles();

		$template_id = 2080; // REPLACE WITH YOUR TEMPLATE ID.

		return $elementor->frontend->get_builder_content( $template_id, true );
	}

	return false;
}
add_filter( 'aswb_display_products', 'aswb_custom_filter_product_display', 10, 1 );

```

