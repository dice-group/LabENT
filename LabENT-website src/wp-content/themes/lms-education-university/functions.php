<?php

if ( ! defined( 'PREMIUM_THEME_LINK' ) ) {
    define( 'PREMIUM_THEME_LINK', 'https://www.misbahwp.com/themes/education-university-wordpress-theme/' );
}

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('lms_education_university_enqueue_scripts')) {

	function lms_education_university_enqueue_scripts() {

	    $my_theme = wp_get_theme();
	    $version = $my_theme['Version'];

	    wp_enqueue_style(
			'bootstrap-css',
			esc_url( get_template_directory_uri() ) . '/css/bootstrap.css',
			array(),'4.5.0'
		);

	    wp_enqueue_style( 'lms-education-style', get_template_directory_uri() . '/style.css' );

	    wp_enqueue_style( 'lms-education-university-style', get_stylesheet_directory_uri() . '/style.css', array('lms-education-woocommerce-css'), $version );

	    wp_enqueue_style( 'lms-education-university-style', get_stylesheet_directory_uri() . '/style.css', array('lms-education-style'), $version );

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	}

	add_action( 'wp_enqueue_scripts', 'lms_education_university_enqueue_scripts' );

}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('lms_education_university_after_setup_theme')) {

	function lms_education_university_after_setup_theme() {

		if ( ! isset( $content_width ) ) $content_width = 900;

		add_theme_support( 'align-wide' );
		add_theme_support( 'woocommerce' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support( "responsive-embeds" );
		add_theme_support( 'custom-background', array(
		  'default-color' => 'ffffff'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
		) );

		add_theme_support( 'custom-header', array(
			'width' => 1920,
			'height' => 100
		));

		add_editor_style( array( '/css/editor-style.css' ) );
	}

	add_action( 'after_setup_theme', 'lms_education_university_after_setup_theme', 999 );

}

if (!function_exists('lms_education_university_widgets_init')) {

	function lms_education_university_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','lms-education-university'),
			'id'   => 'lms-education-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'lms-education-university'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','lms-education-university'),
			'id'   => 'lms-education-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'lms-education-university'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'lms_education_university_widgets_init' );

}

function lms_education_university_remove_custom($wp_customize) {
  $wp_customize->remove_setting('lms_education_slider_phone_heading');
  $wp_customize->remove_control('lms_education_slider_phone_text');
}
add_action( 'customize_register', 'lms_education_university_remove_custom', 1000 );

?>