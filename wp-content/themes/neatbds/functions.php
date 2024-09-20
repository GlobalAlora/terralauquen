<?php
/**
 * neatbds functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package neatbds
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '..343');
}


function neatbds_setup()
{

	load_theme_textdomain('neatbds', get_template_directory() . '/languages');

	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('disable-custom-colors');
	add_theme_support('disable-custom-font-sizes');
	add_theme_support('post-thumbnails');

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action('after_setup_theme', 'neatbds_setup');

/**
 * Enqueue scripts and styles.
 */
function neatbds_scripts()
{
	wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	//wp_enqueue_style('neatbds-style', get_template_directory_uri() . '/css/main.css', array('theme-style'), _S_VERSION);
	wp_enqueue_script('swiper', get_template_directory_uri() . '/js/vendor/swiper.js', array('jquery-core'), '', true);
	wp_enqueue_script( 'fancybox', get_template_directory_uri().'/js/vendor/fancybox.js', array('jquery-core'), '', true );
	wp_enqueue_script('theme-functions', get_template_directory_uri() . '/js/theme.min.js', array('jquery-core', 'swiper'), _S_VERSION, true);
	wp_localize_script('theme-functions', 'WP', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'neatbds_scripts');

/**
 * WP Admin Enqueue scripts and styles.
 */
add_action('admin_enqueue_scripts', function () {
	wp_enqueue_script('swiper', get_template_directory_uri() . '/js/vendor/swiper.js', array('jquery-core'), '', true);
});

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/admin.php';
require get_template_directory() . '/inc/theme.php';
require get_template_directory() . '/inc/posttypes.php';
require get_template_directory() . '/inc/acf-fields.php';
require get_template_directory() . '/inc/blocks.php';
require get_template_directory() . '/inc/product.php';

$files = glob(get_template_directory() . '/inc/wp_functions/*.php');

foreach ($files as $file) {
	if ( basename($file)[0] != "_" )	require $file;
}


function add_custom_scripts() {
	wp_enqueue_script( 'ajax_term', get_stylesheet_directory_uri() . '/ajax/ajax-terms.js', array('jquery'), NULL, true );
	wp_localize_script( 'ajax_term', 'wpAjax', array('ajaxUrl' => admin_url('admin-ajax.php')));    
}
	add_action( 'wp_enqueue_scripts', 'add_custom_scripts' );