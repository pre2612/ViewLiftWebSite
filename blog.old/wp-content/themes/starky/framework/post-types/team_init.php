<?php 

#-----------------------------------------------------------------#
# Create admin staff section
#-----------------------------------------------------------------# 
function starky_team_register() {  
    	 
	 $team_labels = array(
	 	'name' => __( 'Team', 'taxonomy general name', STARKY_THEME_NAME),
		'singular_name' => __( 'Team Item', STARKY_THEME_NAME),
		'search_items' =>  __( 'Search Team Items', STARKY_THEME_NAME),
		'all_items' => __( 'Team', STARKY_THEME_NAME),
		'parent_item' => __( 'Parent Team Item', STARKY_THEME_NAME),
		'edit_item' => __( 'Edit Team Item', STARKY_THEME_NAME),
		'update_item' => __( 'Update Team Item', STARKY_THEME_NAME),
		'add_new_item' => __( 'Add New Team Item', STARKY_THEME_NAME)
	 );
	 
	 $options = get_option('starky_options'); 
     $custom_slug = null;		
	 
	 if(!empty($options['team_rewrite_slug'])) $custom_slug = $options['team_rewrite_slug'];
	
	 $args = array(
			'labels' => $team_labels,
			'rewrite' => array('slug' => $custom_slug,'with_front' => false),
			'singular_label' => __('Team', STARKY_THEME_NAME),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'hierarchical' => false,
			'menu_position' => 7,
			'menu_icon' => '',
			'supports' => array('title', 'editor', 'thumbnail')
       );  
  
    register_post_type( 'team' , $args );  
}  
add_action('init', 'starky_team_register');


?>