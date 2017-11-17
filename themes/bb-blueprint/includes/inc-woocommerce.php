<?php

function bp_woo_show_products( $product_category = '', $number_of_results = 4 ) {

	$products = bp_woo_get_products( $product_category, $number_of_results );

	if ( empty( $products ) ) {
		return '';
	}

	?>

	<h2 class="has-text-centered"><?php echo __( $product_category, 'bb-blueprint' ); ?></h2>
	<div class="columns products is-fullwidth-on-mobile">
	<?php foreach ( $products['posts'] as $product ): ?>
		<div class="column is-fullwidth-on-mobile">
			<div class="product">
				<a href="<?php echo get_the_permalink( $product->ID ); ?>"><span class="image-wrapper" style="background-image: url('<?php echo get_the_post_thumbnail_url( $product->ID, 'post-thumbnail' ); ?>');"></span></a>
				<span class="product-title"><?php echo $product->post_title; ?></span>
				<span class="button-wrapper product-link"><a href="<?php echo get_the_permalink( $product->ID ); ?>">View Now</a></span>
			</div>
		</div>
	<? endforeach; ?>
	</div>

	<? if ( count( $products['posts'] ) < $products['post_count'] ): ?>
	<a href="#" class="button view-more is-medium">View <?php echo $product_category; ?></a>
	<?php endif;

}

function bp_woo_get_products( $product_category = '', $number_of_results = 4 ) {

	$args = array(
		'post_type'			=> 'product',
		'posts_per_page'	=> $number_of_results,
	);

	if ( $product_category ) {

		$args['tax_query'] = array(
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'name',
				'terms'    => $product_category,
			),
		);

	}

	$product_query = new WP_Query( $args );

	if ( ! $product_query->have_posts() ) {
		return array();
	}

	return array(
		'posts' 		=> $product_query->get_posts(),
		'post_count'	=> $product_query->found_posts
	);

}

function bp_woo_add_store_wrapper_tag() {
	echo '<div id="store-wrapper">';
}

add_action( 'woocommerce_before_main_content', 'bp_woo_add_store_wrapper_tag', 4 );

function bp_woo_add_store_wrapper_close_tag() {
	echo '</div>';
}

add_action( 'woocommerce_sidebar', 'bp_woo_add_store_wrapper_close_tag', 15 );

function bp_woo_enable_shop_sidebar() {

	register_sidebar( array(
        'name' => __( 'Store Sidebar', 'bb-blueprint' ),
        'id' => 'store',
        'description' => __( 'Widgets in this area will be shown on all store pages', 'bb-blueprint' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
    ) );

}

add_action( 'widgets_init', 'bp_woo_enable_shop_sidebar' );

function bp_woo_show_store_sidebar() {
	?>
		<div id="sidebar">
			<?php dynamic_sidebar( 'store' ); ?>
		</div>
	<?php
}

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
add_action( 'woocommerce_after_main_content', 'bp_woo_show_store_sidebar', 15 );

// Dsiable the woocommerce stylesheets
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


function bp_woo_add_continue_shopping_button_to_cart() {
	?>
		<p>
			<a class="button is-outlined" href="<?php echo home_url('shop'); ?>">Continue Shopping</a>
		</p>
	<?php
}

add_action( 'woocommerce_before_cart_table', 'bp_woo_add_continue_shopping_button_to_cart' );

function bp_woo_modify_product_title( $product_name, $cart_item, $cart_item_key = '' ) {

	$product_variation 	= $cart_item['data'];
	$post_type 			= $product_variation->post_type;

	if ( 'product_variation' != $post_type ) {
		return $product_name;
	}

	$attributes = $product_variation->get_variation_attributes();
	$attribute_title = implode( ' ', $attributes );

	return sprintf( '<a href="%s">%s</a>', esc_url( $product_variation->get_permalink() ), $product_variation->get_title() . ' - ' . $attribute_title );


}

// add_filter( 'woocommerce_cart_item_name', 'bp_woo_modify_product_title', 10, 3 );
// add_filter( 'woocommerce_order_item_name', 'bp_woo_modify_product_title', 10, 2 );


function bp_woo_modify_product_title_in_cart( $session_data, $values, $key ) {

	$product 	= $session_data['data'];
	$post_type 	= $product->post_type;

	if ( 'product_variation' != $post_type ) {
		return $session_data;
	}

	$attributes = $product->get_variation_attributes();
	$attribute_title = implode( ' ', $attributes );

	$args = wp_parse_args( array(
		'title'	=> $product->get_title() . ' - ' . $attribute_title,
	), $product->get_parent_data() );

	$product->set_parent_data( $args );

	$session_data['data'] = $product;

	return $session_data;
}

// add_filter( 'woocommerce_get_cart_item_from_session', 'bp_woo_modify_product_title_in_cart', 10, 3 );

function update_product_variation_titles() {

	$query_args = array(
		'post_type'	=> 'product_variation',
		'posts_per_page'	=> -1,
	);

	$product_variations = new WP_Query( $query_args );

	foreach ( $product_variations->posts as $post ) {

		$product_variation = new WC_Product_Variation( $post->ID );
		$attributes = $product_variation->get_variation_attributes();

		global $wpdb;

		$attribute_names = array();

		foreach ( $attributes as $key => $attribute ) {

			$sql = "SELECT name FROM $wpdb->terms WHERE slug = '$attribute'";
			$attribute_names[] = $wpdb->get_var( $sql );

		}

		$variation_title = get_the_title( $post->post_parent ) . ' - ' . implode( ', ', $attribute_names );

		wp_update_post( array(
			'ID'	=> $post->ID,
			'post_title'	=> $variation_title
		) );

	}

}

// update_product_variation_titles();
