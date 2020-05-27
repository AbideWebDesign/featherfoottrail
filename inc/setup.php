<?php
/**
 * Theme basic setup
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'featherfoottrail_setup' );

if ( ! function_exists( 'featherfoottrail_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function featherfoottrail_setup() {


		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'featherfoottrail' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		
	}
}

add_image_size('Side Cover', 1067, 1600, true);

add_action( 'init', 'fft_register_cpts' );

function fft_register_cpts() {

	/**
	 * Post Type: Resources.
	 */

	$labels = [
		"name" => __( "Resources", "featherfoottrail" ),
		"singular_name" => __( "Resource", "featherfoottrail" ),
	];

	$args = [
		"label" => __( "Resources", "featherfoottrail" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "resources", "with_front" => false ],
		"query_var" => true,
		"menu_icon" => "dashicons-media-interactive",
		"supports" => [ "title" ],
		"taxonomies" => [ "resource_category" ],
	];

	register_post_type( "resource", $args );
}

add_action( 'init', 'fft_register_taxes' );

function fft_register_taxes() {

	/**
	 * Taxonomy: Resource Categories.
	 */

	$labels = [
		"name" => __( "Categories", "featherfoottrail" ),
		"singular_name" => __( "Category", "featherfoottrail" ),
	];

	$args = [
		"label" => __( "Categories", "featherfoottrail" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'categories', 'with_front' => false, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "resource_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "resource_category", [ "resource" ], $args );
}

if ( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Global Content',
		'menu_title'	=> 'Global Content',
		'menu_slug' 	=> 'global-content',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

add_filter( 'excerpt_more', 'featherfoottrail_custom_excerpt_more' );

if ( ! function_exists( 'featherfoottrail_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function featherfoottrail_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

add_filter( 'wp_trim_excerpt', 'featherfoottrail_all_excerpts_get_more_link' );

if ( ! function_exists( 'featherfoottrail_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function featherfoottrail_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
			$post_excerpt = $post_excerpt . ' [...]<p><a class="btn btn-secondary featherfoottrail-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More...',
			'featherfoottrail' ) . '</a></p>';
		}
		return $post_excerpt;
	}
}

/**
 * FacetWP: Preserve order of intuitive custom post order
 */
add_filter( 'get_terms_args', function( $args, $taxonomies ) {
    
	if ( isset( $args['term_order'] ) ) {
	
	    $args['orderby'] = 'term_order';
	
	}
	
	return $args;

}, 10, 2 );

add_filter( 'get_terms_orderby', function( $orderby, $query_vars ) {
	
	return 'term_order' === $query_vars['orderby'] ? 'term_order' : $orderby;

}, 10, 2 );

/**
 * FacetWP: Cache
 */
/*
add_filter( 'facetwp_cache_lifetime', 'facet_cache_lifetime' );

function facet_cache_lifetime( $seconds ) {
	
    return 86400; // one day
    
}
*/
