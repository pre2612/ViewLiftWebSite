<?php get_header(); 
/*
Template Name: Home Page template
*/
?>
<!-- home -->
<?php
global $starky_options;
$str_options = get_option('starky_options');
$str_head_style = $str_options['header_style'];
if($str_head_style =="image"){get_template_part('header/image'); }
if($str_head_style =="slider"){get_template_part('header/slider');}
if($str_head_style =="video"){get_template_part('header/video');}
?>

<!-- /home -->
<div class="clearfix"></div>
<?php
global $str_current_page_id;
$str_current_page_id = get_option('page_on_front');
if(has_nav_menu('main_nav')) {
if ( ( $str_locations = get_nav_menu_locations() ) && $str_locations['main_nav'] ) {
    $str_menu = wp_get_nav_menu_object( $str_locations['main_nav'] );
    $str_menu_items = wp_get_nav_menu_items($str_menu->term_id);
    $str_check_item_in = array();
    foreach($str_menu_items as $str_item) {

        if($str_item->object == 'page')
        $str_check_item_in[] = $str_item->object_id;
    }
	
	$str_args = array( 'post_type' => 'page', 'post__in' => $str_check_item_in, 'posts_per_page' => count($str_check_item_in), 'orderby' => 'post__in',  'suppress_filters'=> true );
	$str_home_query = new WP_Query($str_args);
}
}
else{
    $str_args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'posts_per_page' => '-1',
	'suppress_filters'=> true
  );
    $str_home_query = new WP_Query($str_args); 
}

	$i=0;
	$str_data_type = ' data-animate-up="ha-header-hide" data-animate-down="ha-header-small"';
    while ($str_home_query->have_posts()) : $str_home_query->the_post();
	
	global $post;

    $post_name = $post->post_name;
	$post_id = $post->ID;
    
    global $post_id;
	$post_id = get_the_ID();
	
	$str_page_check = rwmb_meta( 'starky_check_page' );
    if (($str_page_check!= 'separate' )&& ($post_id != $str_current_page_id ))
    { 
	
	$str_bg_type = rwmb_meta( 'starky_section_bg' );
	$str_disable_title = rwmb_meta( 'starky_disable_title' );
	$str_disable_container = rwmb_meta( 'starky_disable_container' );
	$str_parallax = rwmb_meta( 'starky_enable_parallax' );
	$str_overlay = rwmb_meta( 'starky_overlay_effect' );
	$str_video_id = rwmb_meta( 'starky_bg_video_id' );
	
	$str_text_color = rwmb_meta( 'starky_text_color' );
	$str_bg_color = rwmb_meta( 'starky_bg_color' );

	$str_style = 'style="';
	
	if(($str_bg_type == 'image') && (has_post_thumbnail()))
	{
	$str_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' ); 
	$str_style .= 'background: url('. $str_image[0] .');';
	}
	if($str_bg_color){
	$str_style .= ' background-color: '. $str_bg_color .';';
	}
	$str_style .='"';
	
	if(($str_bg_type == 'video') && ($str_video_id))
	{
	wp_enqueue_script( 'youtube-player' );
	?>

	<a class="player" id="bgndVideo" data-property="{
		videoURL: 'https://www.youtube.com/watch?v=<?php echo $str_video_id; ?>',
		containment:'.video-bg-<?php echo $str_video_id; ?>',
		 autoPlay:true,
		 mute:true,
		 startAt:0, 
		 autoPlay: true,
		 showControls: false,
		 opacity: 1,
		 ratio: '16/9', 
		 addRaster: false }">
	</a>
	
	<?php } 
	
	$str_section_clases = 'class="';
	$str_section_clases .= "page". $post_id ." section ";
	if($i==1){$str_section_clases .= "ha-waypoint ";}
	if($str_text_color=='light'){$str_section_clases .= "white-text ";}
	if($str_text_color=='dark'){$str_section_clases .= "dark-text ";}
	if(($str_bg_type == 'video') && ($str_video_id)){$str_section_clases .= " video-section video-bg-". $str_video_id." ";}
	if($str_parallax){$str_section_clases .= "parallax-background fixed "; wp_enqueue_script( 'parallax' );}
	$str_section_clases .='"';
	
	
	
	if($i==1){ $str_second_section = $post_id; }
	$str_disable_menu = starky_check_menu_item_disable($post_id);
	?>
	
	<section <?php if($str_disable_menu != true ){ echo 'data-scroll-index="'. $i.'"'; } ?> id="<?php echo $post_name; ?>" <?php echo $str_section_clases; ?> <?php echo $str_style;  if($i==1){echo $str_data_type;} ?> >
	

	<?php
	if($str_parallax){ echo '<div class="parallax">';}
	
	if($str_overlay){
	if($str_overlay =="color"){echo '<div class="color-overlay"></div>';}
	if($str_overlay =="pattern"){echo '<div class="pattern-overlay"></div>';}
	}
	
	if(!$str_disable_container){ ?>
	<div class="container">	
	<?php } ?>
	
    <div class="row">
	<?php 
	if(!$str_disable_title){?>
	<div class="title"><h3><?php the_title(); ?><span class="divider"></span></h3></div>
	<?php } ?>
	<?php the_content(); ?>	   
		   
		 </div><!--row-->
		<?php if(!$str_disable_container){ ?>	
		</div><!--container-->  
		<?php } 
		
		if($str_parallax){echo '</div>';}
		?> 

	</section>
	<?php
	}
	
	$str_disable_menu = starky_check_menu_item_disable($post_id);
	if($str_disable_menu != true ) { 
	if($str_page_check != 'separate' ) { $i++; } 
	}
	
	endwhile;
	wp_reset_postdata();
?>

<?php get_footer(); ?>