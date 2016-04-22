<?php 

#-----------------------------------------------------------------#
# Create admin testimonial section
#-----------------------------------------------------------------# 
function starky_testimonial_register() {  
    	 
	 $testimonial_labels = array(
	 	'name' => __( 'Testimonial', 'taxonomy general name', STARKY_THEME_NAME),
		'singular_name' => __( 'Testimonial Item', STARKY_THEME_NAME),
		'search_items' =>  __( 'Search Testimonial Items', STARKY_THEME_NAME),
		'all_items' => __( 'Testimonial', STARKY_THEME_NAME),
		'parent_item' => __( 'Parent Testimonial Item', STARKY_THEME_NAME),
		'edit_item' => __( 'Edit Testimonial Item', STARKY_THEME_NAME),
		'update_item' => __( 'Update Testimonial Item', STARKY_THEME_NAME),
		'add_new_item' => __( 'Add New Testimonial Item', STARKY_THEME_NAME)
	 );
	 
	 $options = get_option('starky_options'); 
     $custom_slug = null;		
	 
	 if(!empty($options['testimonial_rewrite_slug'])) $custom_slug = $options['testimonial_rewrite_slug'];
	
	 $args = array(
			'labels' => $testimonial_labels,
			'rewrite' => array('slug' => $custom_slug,'with_front' => false),
			'singular_label' => __('Client', STARKY_THEME_NAME),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'hierarchical' => false,
			'menu_position' => 7,
			'menu_icon' => '',
			'supports' => array('title', 'editor', 'thumbnail')  
       );  
  
    register_post_type( 'testimonial' , $args );  
}  
add_action('init', 'starky_testimonial_register');


?>