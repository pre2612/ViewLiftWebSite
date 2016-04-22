<?php
	
/*
	*
	*	Theme Functions
	*	------------------------------------------------
	*	Theme House Framework
	* 	Copyright http://www.themehouse.net
	*
	*	THEME DEFINITIONS
	*	ENQUEUE SCRIPTS
	*	ENQUEUE STYLES
	*	FUNCTION INCLUDES
	*   THEME SIDEBAR WIDGETS
	*	THUMBNAIL SIZES
	*   PAGINATION

*/

#-----------------------------------------------------------------#
# Define theme constants
#-----------------------------------------------------------------#
define('STARKY_THEME_DIRECTORY', get_template_directory_uri());
define('STARKY_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/framework/');
define("STARKY_STYLES", STARKY_THEME_DIRECTORY . '/css');
define("STARKY_IMAGES", STARKY_THEME_DIRECTORY . '/images');
define("STARKY_JS", STARKY_THEME_DIRECTORY . '/js');
define('STARKY_THEME_NAME', 'starky');
define('STARKY_THEME_VERSION', '1.2');





if ( ! function_exists( 'starky_theme_setup' ) ) :
/**
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
function starky_theme_setup() {

	/*
	 * Make Starky available for translation.
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain(STARKY_THEME_NAME, get_template_directory() . '/language');


	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	#-----------------------------------------------------------------#
	# THUMBNAIL SIZES
	#-----------------------------------------------------------------#
	add_image_size( 'portfolio-thumb', 550, 540, true );
	add_image_size( 'blog-thumb', 600, 400, true );
	add_image_size( 'blog-large', 800, 533, true );

	// Starky theme uses wp_nav_menu() in Primery locations.
	register_nav_menus( array(
		'main_nav'   => __( 'Primary Navigation Menu', 'STARKY_THEME_NAME' ),
	) );
	

}
endif; // starky_theme_setup
add_action( 'after_setup_theme', 'starky_theme_setup' );



#-----------------------------------------------------------------#
# Theme Framework Admin Options
#-----------------------------------------------------------------#
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/framework/options/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/options/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/framework/options/options/options-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/options/options/options-config.php' );
}



	
#-----------------------------------------------------------------#
# Register/Enqueue JS
#-----------------------------------------------------------------#
function starky_scripts_with_jquery()
{

	global $post;
	global $starky_options;

	$str_options = get_option('starky_options');
	if(!is_object($post)) $post = (object) array('post_content'=>' ', 'ID' => ' ');
    $template_name = get_post_meta( $post->ID, '_wp_page_template', true );

	if (!is_admin()) {
	wp_enqueue_script('jquery');

	wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ),'0.3', true );
	wp_enqueue_script( 'bootstrap' );
	

	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array( 'jquery' ),'2.8.2', false);
	wp_enqueue_script( 'modernizr' );

	wp_register_script( 'youtube-player', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.js', array( 'jquery' ), 1.0, true );
	
	
	wp_register_script( 'appear', get_template_directory_uri() . '/js/appear.js', array( 'jquery' ),'0.3.3', true );
	wp_enqueue_script( 'appear' );
	
	wp_register_script( 'fittext', get_template_directory_uri() . '/js/jquery.fittext.js', array( 'jquery' ),'1.2', true );
	wp_register_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ),'1.1', true );
	
	
	wp_register_script( 'juicyslider', get_template_directory_uri() . '/js/juicyslider-min.js', array( 'jquery' ), 1.0, true );
	wp_register_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery.ui.js', array( 'jquery' ), 1.9, true );
	
	$head_style = $str_options['header_style'];
	
	if ( is_page_template('homepage-template.php') || $template_name == 'starky/homepage-template.php' ) {
		if($head_style =="slider"){
		wp_enqueue_script( 'juicyslider' );
		wp_enqueue_script( 'jquery-ui' );
		}
		if(($head_style =="slider")|| ($head_style =="image") || ($head_style =="video")){
		wp_enqueue_script( 'fittext' );
		}
		if($head_style =="video"){
		wp_enqueue_script( 'youtube-player' );
		}
	}


	wp_register_script( 'nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.js', array( 'jquery' ),'3.5.0', true);
	if( !empty($str_options['nice_scroll']) && $str_options['nice_scroll'] == '1' ) wp_enqueue_script('nicescroll');
	
	
	wp_register_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', array( 'jquery' ),'1.1.3', true );
	

	wp_register_script( 'scrollIt', get_template_directory_uri() . '/js/scrollIt.min.js', array( 'jquery' ), 1.0, true );
	wp_enqueue_script( 'scrollIt' );
	
	wp_register_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ),'1.3.2', true );
	wp_enqueue_script( 'owl-carousel' );
	
	wp_register_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ),'2.0.2', true );
	wp_enqueue_script( 'waypoints' );
	wp_register_script( 'waypoints-sticky', get_template_directory_uri() . '/js/waypoints-sticky.min.js', array( 'jquery' ),'2.0.2', true );
	wp_enqueue_script( 'waypoints-sticky' );
	

	wp_register_script( 'classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery' ),'1.3.2', true );
	wp_enqueue_script( 'classie' );
	
	wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), 1.0, true );
	
	
    wp_register_script( 'piechart', get_template_directory_uri() . '/js/jquery.easypiechart.min.js', array( 'jquery' ),'2.1.5', true );
	
	//comments
	if ( is_singular() && comments_open() && get_option('thread_comments') )
	wp_enqueue_script('comment-reply');
	
	// init Scripts
	wp_register_script( 'init', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), STARKY_THEME_VERSION, true);
	wp_enqueue_script( 'init' );
	}  
	
}
add_action( 'wp_enqueue_scripts', 'starky_scripts_with_jquery' );



//post Metabox scripts
add_action('admin_enqueue_scripts', 'starky_metabox_scripts');
function starky_metabox_scripts() {
	wp_register_script('meta-script', get_template_directory_uri() . '/framework/assets/js/meta.js', 'jquery', '1.0', TRUE);
	wp_enqueue_script('meta-script');	
}



#-----------------------------------------------------------------#
# Register/ Enqueue CSS / ENQUEUE STYLES
#-----------------------------------------------------------------#
function starky_main_styles() {

		 // Register 
		
		wp_register_style('preloader-css', get_template_directory_uri() . '/css/preloader.css');
		wp_enqueue_style('preloader-css'); 
		 
		 wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
		 wp_enqueue_style('bootstrap');
		 
		 wp_register_style('font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');
		 wp_enqueue_style('font-awesome'); 
		 
		 wp_register_style('fxtransparent-css', get_template_directory_uri() . '/css/fxtransparent.css');
		 wp_enqueue_style('fxtransparent-css');
		 
		  wp_register_style('team-slider-css', get_template_directory_uri() . '/css/team-slider.css');
		 wp_enqueue_style('team-slider-css');
		 
		 wp_register_style('animate-css', get_template_directory_uri() . '/css/animate.css');
		 wp_enqueue_style('animate-css');
		 
		 wp_register_style('youtube-player', get_template_directory_uri() . '/css/YTPlayer.css');
		 wp_enqueue_style('youtube-player');
		  
		
		 wp_register_style('juicyslider-css', get_template_directory_uri() . '/css/juicyslider-min.css');
		 wp_enqueue_style('juicyslider-css');
		
		 
		 wp_register_style('morphin-css', get_template_directory_uri() . '/css/component.css');
		 wp_enqueue_style('morphin-css');
		 
		 wp_register_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css');
		 wp_enqueue_style('owl-carousel');
		 
		  wp_register_style('owl-transitions', get_template_directory_uri() . '/css/owl.transitions.css');
		 wp_enqueue_style('owl-transitions');
		 
		 /* Main CSS */
        wp_enqueue_style( 'starky-style' , get_stylesheet_uri(), array(), STARKY_THEME_VERSION );
		 
}

add_action('wp_enqueue_scripts', 'starky_main_styles');




global $starky_options;
$str_options = get_option('starky_options');
if($str_options['use-custom-fonts'] != 1){
function starky_fonts() {
$protocol = is_ssl() ? 'https' : 'http';
wp_enqueue_style( 'starky-roboto', "$protocol://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,400italic,400italic,700" );
wp_enqueue_style( 'starky-opensans', "$protocol://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic" );
wp_enqueue_style( 'starky-lato', "$protocol://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900,900italic" );
}
add_action( 'wp_enqueue_scripts', 'starky_fonts' );
} 

#-----------------------------------------------------------------#
# Functions Include
#-----------------------------------------------------------------#
#-----------------------------------------------------------------#
# Custom Post Type
#-----------------------------------------------------------------#
include_once("framework/post-types/portfolio_init.php");
include_once("framework/post-types/team_init.php");
include_once("framework/post-types/testimonial_init.php");
#-----------------------------------------------------------------#
# Meta Boxes
#-----------------------------------------------------------------#
include_once('framework/meta-box/meta-box.php');
// Metabox Creation
include_once('framework/meta-boxes.php');

#-----------------------------------------------------------------#
# Menu Walker
#-----------------------------------------------------------------#
include_once('framework/nav_walker.php');

#-----------------------------------------------------------------#
# Custom JS / CSS
#-----------------------------------------------------------------#
include_once('js/custom-js.php');
include_once('css/custom-css.php');


#-----------------------------------------------------------------#
# //Shortcode initiate
#-----------------------------------------------------------------# 
include_once('framework/shortcode/shortcodes.php'); // Load Shortcodes
	
/* Include TinyMce Shortcode Buttons */
include_once('framework/shortcode/tinymce/tinymce_buttons.php');

//Admin Shortcode Styles
add_action('admin_enqueue_scripts', 'starky_admin_css');
function starky_admin_css() {
		wp_enqueue_style('shortcode-css', STARKY_THEME_DIRECTORY.'/framework/assets/css/shortcodes.css');
		wp_enqueue_style('fontawesome-admin-css', STARKY_THEME_DIRECTORY.'/font-awesome/css/font-awesome.min.css');
}


// Check Menu Item Disabled
function starky_check_menu_item_disable($id) {
	if(has_nav_menu('main_nav')) {
	if ( ( $locations = get_nav_menu_locations() ) && $locations['main_nav'] ) {
    $menu = wp_get_nav_menu_object( $locations['main_nav'] );
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    foreach($menu_items as $item) {
	
        if(($item->object_id == $id)&&(in_array('disable', $item->classes)))
           return true;	
    }
	
	}
  }
}


#-----------------------------------------------------------------#
# Wp Staff
#-----------------------------------------------------------------#	
//Content Width
if ( ! isset( $content_width ) ) {
	$content_width = 1000;
}

//excerpt length
function starky_excerpt_length( $length ) {
	global $starky_options;
	$str_options = get_option('starky_options'); 
	$starky_excerpt_length = (!empty($str_options['blog_excerpt_length'])) ? intval($str_options['blog_excerpt_length']) : 30; 
    return $starky_excerpt_length;
}
add_filter( 'excerpt_length', 'starky_excerpt_length', 999 );

//custom excerpt ending
function starky_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'starky_excerpt_more');

//Excerpt Limit
function starky_excerpt_limit($limit) {

  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';

  } else {
    $excerpt = implode(" ",$excerpt);
  }            

  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;

}

//content Limit
function starky_content_limit($limit) {

  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';

  } else {

    $content = implode(" ",$content);

  }            

  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;

}


//Widget Shortcode
add_filter('widget_text', 'do_shortcode');

    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	

	

#-----------------------------------------------------------------#
# PAGINATION
#-----------------------------------------------------------------#

function starky_pagination($pages = '', $range = 2)
{  

	global $starky_options;
	$str_options = get_option('starky_options'); 
	//extra pagination
	if( !empty($str_options['extra_pagination']) && $str_options['extra_pagination'] == '1' ){
	
     $showitems = ($range * 2)+1;
     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<ul class='pagination centerclearfix'>";
		 
         if($paged > 1){
         	echo "<li><a class='pagination-prev' href='".get_pagenum_link($paged - 1)."'><span class='page-prev'></span><i class='fa fa-long-arrow-left'></i></a></li>";
         }
         for ($i=1; $i <= $pages; $i++)
         { 
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? " <li class='active'><a href='#'><b>".$i."</b></a></li>":" <li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
             }
			
         }

         if ($paged < $pages) echo "<li><a class='pagination-next' href='".get_pagenum_link($paged + 1)."'><i class='fa fa-long-arrow-right'></i><span class='page-next'></span></a></li>";  
         echo "</ul>\n";
     }
	 
	  	}
		//regular pagination
		else{
			
			if( get_next_posts_link() || get_previous_posts_link() ) { 
				echo '<div class="pagination" id="pagination" data-is-text="'.__("All items loaded", STARKY_THEME_NAME).'">
				      <div class="prev">'.get_previous_posts_link('&laquo; Previous Entries').'</div>
				      <div class="next">'.get_next_posts_link('Next Entries &raquo;','').'</div>
			          </div>';
			
	        }
		}
}


// Juicyslider Script
if ( !function_exists( 'starky_juicyslider_script' ) ) {
 function starky_juicyslider_script() {
 ?>
<script type="text/javascript">
    // start to run when document ready
    jQuery(function() {
    jQuery('#myslider').juicyslider({
      mask: 'square',
      autoplay: 5000,
      show: {effect: 'puff', duration: 2000},
      hide: {effect: 'puff', duration: 2000},
      width: null,
      height: null,
       });
      });
</script>
<?php
	}
}



#-----------------------------------------------------------------#
# Admin Menu Icons
#-----------------------------------------------------------------#
add_action( 'admin_enqueue_scripts', 'starky_add_menu_icons_styles' );
function starky_add_menu_icons_styles(){
?>
 
<style>
#adminmenu .menu-icon-portfolio div.wp-menu-image:before {
content: "\f322";
}
#adminmenu .menu-icon-testimonial div.wp-menu-image:before {
content: "\f122";
}
#adminmenu .menu-icon-team div.wp-menu-image:before {
content: "\f307";
}
#adminmenu .menu-icon-home_slider div.wp-menu-image:before {
content: "\f102";
}

</style>
 
<?php
}

?>