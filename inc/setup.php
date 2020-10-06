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
			'primary' => __( 'Primary Menu - Mobile', 'featherfoottrail' ),
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

add_filter( 'wp_lazy_loading_enabled', '__return_false' );

// Remove tags support from posts
add_action('init', 'fft_unregister_tags');

function fft_unregister_tags() {
	
    unregister_taxonomy_for_object_type('post_tag', 'post');
    
}

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

	function featherfoottrail_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

add_filter( 'wp_trim_excerpt', 'featherfoottrail_all_excerpts_get_more_link' );

if ( ! function_exists( 'featherfoottrail_all_excerpts_get_more_link' ) ) {

	function featherfoottrail_all_excerpts_get_more_link( $post_excerpt ) {
/*
		if ( ! is_admin() ) {
			$post_excerpt = $post_excerpt . '<p><a class="btn-alt" href="' . esc_url( get_permalink( get_the_ID() ) ) . '"><img src="https://featherfoot.local/wp-content/uploads/2020/07/bg-btn.png" width="60px;" /> ' . __( 'Read More',
			'featherfoottrail' ) . '</a></p>';
		}
*/
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

// Custom Login functions

function redirect_login_page() {
	
	global $page_id;
	
	$login_page = home_url();
	
	$page = basename($_SERVER['REQUEST_URI']);

	if ( $page == 'wp-login.php' && $_SERVER['REQUEST_METHOD'] == 'GET') {

		wp_redirect($login_page);
		
		exit;
	
	}
	
}
add_action('init', 'redirect_login_page');

function redirect_lostpassword_page() {
    
    if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
	    
        if ( is_user_logged_in() ) {
        
            $this->redirect_logged_in_user();
        
            exit;
        
        }
 
        wp_redirect( home_url() );
        
        exit;
        
    }
    
}
add_action( 'login_form_lostpassword', 'redirect_lostpassword_page');

function login_failed() {
	
    $login_page  = home_url();
    
    wp_redirect($login_page . "?login=failed");
    
    exit;

}
add_action( 'wp_login_failed', 'login_failed' );

function verify_username_password( $user, $username, $password ) {
    
    $login_page  = home_url();
    
    if ( $username == "" || $password == "" ) {
		
		wp_redirect( $login_page . "?login=empty" );
        
		exit;
    
    }
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);

function change_hr( $content ) {
	
	if ( ( is_singular() ) && ( is_main_query() ) ) {
	        
	        $string = $content;
 
 	        $replacement = '<div class="blog-divider"><div class="heading-divider text-center mb-5"><img src="' . get_field('feather_1', 'options') . '" width="75px"></div></div>';

	        $content = preg_replace('/<hr \/>/i', $replacement, $string);
	
	}       
	
	return $content;
}

add_filter('the_content', 'change_hr');