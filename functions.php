<?php 
	
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once( get_template_directory() . '/config.php' );
require_once( get_template_directory() . '/framework/classes/class.loader.php' );

function zone_load_scripts()
{
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/css/slick.css' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/css/slick-theme.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'popup', get_template_directory_uri() . '/css/popup.css');
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style( 'media-css', get_template_directory_uri() . '/css/mediaelementplayer.css' );	
	wp_enqueue_style( 'fullpage-css', get_template_directory_uri() . '/css/jquery.fullPage.css' );	
	wp_enqueue_style( 'black-tie', get_template_directory_uri() . '/css/black-tie/css/black-tie.min.css');
	wp_enqueue_style( 'black-tie-bold', get_template_directory_uri() . '/css/black-tie-bold/css/black-tie.min.css');
	wp_enqueue_style( 'stylesheet', get_stylesheet_uri() );
	wp_enqueue_script( 'charts', get_template_directory_uri() . '/js/chart.min.js' );	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );	
	wp_enqueue_script( 'jquery-ui-tabs' );	
	wp_enqueue_script( 'jquery-ui-accordion' );			
	wp_enqueue_script( 'jquery-ui' );	
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', 1.0, true );			
	wp_enqueue_script( 'pinterest', get_template_directory_uri() . '/js/pinit.js', 1.0, true );			
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js' );			
	wp_enqueue_script( 'popup', get_template_directory_uri() . '/js/popup.js' );			
	wp_enqueue_script( 'iosslider', get_template_directory_uri() . '/js/jquery.iosslider.min.js' );			
	wp_enqueue_script( 'soundcloud', get_template_directory_uri() . '/js/soundcloud.js', 1.0, true );			
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js' );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js' );
	wp_enqueue_script( 'jquery-color', get_template_directory_uri() . '/js/jquery.color.js' );
	wp_enqueue_script( 'vimeo-api', get_template_directory_uri() . '/js/froogaloop.min.js' );	
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.min.js' );	
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.min.js' );	
	wp_enqueue_script( 'scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.min.js' );	
	wp_enqueue_script( 'images-loaded', get_template_directory_uri() . '/js/imagesloaded.min.js' );	
	wp_enqueue_script( 'popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js' );	
	wp_enqueue_style( 'fullpage-js', get_template_directory_uri() . '/js/jquery.fullPage.min.js' );	
	wp_enqueue_script( 'media-js', get_template_directory_uri() . '/js/mediaelement-and-player.min.js' );	
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/jquery.custom.js' );
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );	
}

add_action( 'wp_enqueue_scripts', 'zone_load_scripts' );

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() 
{
  echo '<section class="zone-page-section">';
}

function my_theme_wrapper_end() 
{
  echo '</section>';
}

add_filter( 'woocommerce_show_page_title', '__return_false' );

?>