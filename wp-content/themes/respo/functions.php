<?php


if ( ! isset( $content_width ) )
	$content_width = 628;
	
	
/*-----------------------------------------------------------------------------------*/
/* Start Themnific Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Set path to Themnific Framework and theme specific functions
$functions_path = TEMPLATEPATH . '/functions/';
$includes_path = TEMPLATEPATH . '/functions/';

// Framework
require_once ($functions_path . 'admin-init.php');			// Framework Init

// Theme specific functionality
require_once ($includes_path . 'theme-options.php'); 		// Options panel settings and custom settings
require_once ($includes_path . 'theme-actions.php');		// Theme actions & user defined hooks
require_once ($includes_path . 'theme-scripts.php'); 				// Load JavaScript via wp_enqueue_script


//Add Custom Post Types
require_once ($includes_path . 'posttypes/post-metabox.php'); 		// custom meta box

/*-----------------------------------------------------------------------------------

- Loads all the .php files found in /admin/widgets/ directory

----------------------------------------------------------------------------------- */

	$preview_template = _preview_theme_template_filter();

	if(!empty($preview_template)){
		$widgets_dir = WP_CONTENT_DIR . "/themes/".$preview_template."/functions/widgets/";
	} else {
    	$widgets_dir = WP_CONTENT_DIR . "/themes/".get_option('template')."/functions/widgets/";
    }
    
    if (@is_dir($widgets_dir)) {
		$widgets_dh = opendir($widgets_dir);
		while (($widgets_file = readdir($widgets_dh)) !== false) {
  	
			if(strpos($widgets_file,'.php') && $widgets_file != "widget-blank.php") {
				include_once($widgets_dir . $widgets_file);
			
			}
		}
		closedir($widgets_dh);
	}
	
	
/*---------------------------------------------------------------------------------*/
/* Deregister Default Widgets */
/*---------------------------------------------------------------------------------*/
function deregister_widgets(){
    unregister_widget('WP_Widget_Search');         
}
add_action('widgets_init', 'deregister_widgets'); 



// widgets
if ( function_exists('register_sidebar') ) 
{ 

// sidebar widget
register_sidebar(array('name' => 'Sidebar','before_widget' => '','after_widget' => '','before_title' => '<h2>','after_title' => '</h2>')); 

//footer widgets
register_sidebar(array('name' => 'Footer Left','before_widget' => '','after_widget' => '','before_title' => '<h3>','after_title' => '</h3>'));   
register_sidebar(array('name' => 'Footer Center Left','before_widget' => '','after_widget' => '','before_title' => '<h3>','after_title' => '</h3>')); 
register_sidebar(array('name' => 'Footer Center Right','before_widget' => '','after_widget' => '','before_title' => '<h3>','after_title' => '</h3>'));register_sidebar(array('name' => 'Footer Right','before_widget' => '','after_widget' => '','before_title' => '<h3>','after_title' => '</h3>')); 
}

// Make theme available for translation
	load_theme_textdomain( 'themnific', TEMPLATEPATH . '/lang' );




// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

// Shordcodes
require_once (TEMPLATEPATH.'/functions/admin-shortcodes.php' );				// Shortcodes
require_once (TEMPLATEPATH.'/functions/admin-shortcode-generator.php' ); 	// Shortcode generator 

// Use shortcodes in text widgets.
add_filter('widget_text', 'do_shortcode');

// navigation menu
function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu','themnific' )
		)
	);
};
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );


// Add Theme Support Functions
add_custom_background();
add_editor_style();

// Shorten post title
function short_title($after = '', $length) {
	$mytitle = explode(' ', get_the_title(), $length);
	if (count($mytitle)>=$length) {
		array_pop($mytitle);
		$mytitle = implode(" ",$mytitle). $after;
	} else {
		$mytitle = implode(" ",$mytitle);
	}
	return $mytitle;
}





// Shorten Excerpt text for use in theme
function pov_excerpt($text, $chars = 620) {
	$text = $text." ";
	$text = substr($text,0,$chars);
	$text = substr($text,0,strrpos($text,' '));
	$text = $text."...";
	return $text;
}

function trim_excerpt($text) {
  return rtrim($text,'[...]');
}
add_filter('get_the_excerpt', 'trim_excerpt');

// Post thumbnail support
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(640, 265, true); // Normal post thumbnails
	add_image_size('loopThumb', 640, 265, true);
}

function thumb_url(){
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 2100,2100 ));
return $src[0];
}


//First Image
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  return $first_img;
}


//Breadcrumbs
function the_breadcrumb() {
	if (!is_home()) {
		echo '';
		echo 'Home';
		echo " &raquo; ";
		if (is_category() || is_single()) {
		the_category(', ');
		if (is_single()) {
		echo " &raquo; ";
	the_title();
	}
	} elseif (is_page()) {
	echo the_title();}
	}
}

	
?>