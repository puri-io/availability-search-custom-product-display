# Custom product Display Addon for ASWB 

Display a customized product loop with the Availability Search for WooCommerce Bookings.

This is a simple plugin which serves as an example template. It utilizes a filter `aswb_display_products` which passes the current product ID as a variable.


## Only Supports ASWB version 1.6, which is still in development!

Check the latest version here https://puri.io/plugin/availablilty-search-woocommerce-bookings/

## Short example

You can use the filter anywhere you'd like. We recommend to use a custom plugin like this repo.

```
add_filter( 'aswb_display_products', 'aswb_custom_filter_product_display' );

function aswb_custom_filter_product_display( $product_id ) {
  $output = "Outputs each product id: $product_id";

	return $output; // The html must be returned
}
```
