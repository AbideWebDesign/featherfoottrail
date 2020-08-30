<?php
/**
 * featherfoottrail enqueue scripts
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'featherfoottrail_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function featherfoottrail_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'featherfoottrail-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
		
// 		wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;800&family=Noto+Sans+JP:wght@400;700&display=swap' );
		
		wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css' );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'featherfoottrail-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
	}
} // endif function_exists( 'featherfoottrail_scripts' ).

add_action( 'wp_enqueue_scripts', 'featherfoottrail_scripts' );
