<?php

class Blueprint_Theme {

	/**
	 * The unique instance of the class.
	 *
	 * @since 0.1.0
	 * @var Blueprint_Theme
	 */
	private static $instance;

	/**
	 * Get an instance of the class.
	 *
	 * @since 0.1.0
	 *
	 * @return Blueprint_Theme
	 */
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;

	}

	/**
	 * Load all hooks.
	 *
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'customize_register', array( $this, 'init_customizer' ), 10, 1 );
	}

	/**
	 * Initialize the theme customizer.
	 *
	 * @since 0.1.0
	 *
	 * @param WP_Customize_Manager $wp_customize
	 */
	public function init_customizer( $wp_customize ) {

		// echo "<pre>"; print_r( $wp_customize ); exit;

		$wp_customize->add_setting( 'branding_logo' );
		$wp_customize->add_setting( 'branding_logo_footer' );
		$wp_customize->add_setting( 'site_type' );
		$wp_customize->add_setting( 'address' );
		$wp_customize->add_setting( 'phone_number' );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'branding_logo', array(
			'label'        => 'Logo',
			'section'    => 'title_tagline',
			'settings'   => 'branding_logo',
		) ) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'branding_logo_footer', array(
			'label'        => 'Logo Footer',
			'section'    => 'title_tagline',
			'settings'   => 'branding_logo_footer',
		) ) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_type', array(
			'label'    => __( 'Site Type'  ),
			'section'  => 'title_tagline',
			'settings' => 'site_type',
			'type'     => 'select',
			'choices'  => array(
				'standard'  	=> 'Standard',
				'restaurant' 	=> 'Restaurant',
			)
		) ) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'address', array(
			'label'    => __( 'Address'  ),
			'section'  => 'title_tagline',
			'settings' => 'address',
			'type'     => 'text',
		) ) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone_number', array(
			'label'    => __( 'Phone'  ),
			'section'  => 'title_tagline',
			'settings' => 'phone_number',
			'type'     => 'text',
		) ) );

		// Homepage Customizations
		$wp_customize->add_section( 'homepage' , array(
		    'title'      => __( 'Home Page', 'bb-blueprint' ),
		    'priority'   => 30,
		) );

		$wp_customize->add_setting( 'homepage_header_background' );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'homepage_header_background', array(
			'label'        => 'Header Background',
			'section'    => 'homepage',
			'settings'   => 'homepage_header_background',
		) ) );

		return $wp_customize;

	}

}

add_action( 'after_setup_theme', array( Blueprint_Theme::get_instance(), 'hooks' ) );

add_theme_support( 'post-thumbnails' );

/**
 * Load all of the styles
 *
 * @since 0.1.0
 */
function blueprint_load_css() {
	wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'bb-blueprint', get_template_directory_uri() . '/assets/css/blueprint.css', false, null, 'all' );
}

add_action( 'wp_enqueue_scripts', 'blueprint_load_css' );

/**
 * Load all of the javascript
 *
 * @since 0.1.0
 */
function bb_blueprint_load_js() {
    wp_enqueue_script( 'bb-blueprint', get_template_directory_uri() . '/assets/js/blueprint.js', false, null, 'all' );
}

add_action( 'wp_enqueue_scripts', 'bb_blueprint_load_js', 20 );


function bp_image( $filename = '' ) {
	echo get_stylesheet_directory_uri() . '/assets/images/' . untrailingslashit( $filename );
}

function bp_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'bp_woocommerce_support' );

function bp_register_menus() {

	register_nav_menus( array(
	    'primary' => __( 'Primary Menu', 'bb-blueprint' ),
	) );

}

add_action( 'init', 'bp_register_menus', 10 );

function bp_get_page_title() {

	if ( is_home() ) {
		return get_bloginfo();
	} else {
		return the_title() . ' | ' . get_bloginfo();
	}

}

function bp_register_sidebar() {

	/* Register the primary sidebar. */
    register_sidebar(
        array(
            'id' => 'primary',
            'name' => __( 'Primary', 'bb-blueprint' ),
            'description' => __( 'Sidebar for the pages.', 'bb-blueprint' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

	/* Register the primary sidebar. */
    register_sidebar(
        array(
            'id' => 'blog',
            'name' => __( 'Blog', 'bb-blueprint' ),
            'description' => __( 'Sidebar for the blog.', 'bb-blueprint' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

}

add_action( 'widgets_init', 'bp_register_sidebar' );

include 'includes/inc-woocommerce.php';
