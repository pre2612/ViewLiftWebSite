<?php 

#-----------------------------------------------------------------#
# Create admin portfolio section
#-----------------------------------------------------------------# 
function starky_portfolio_register() {  
    	 
	 $portfolio_labels = array(
	 	'name' => __( 'Portfolio', 'taxonomy general name', STARKY_THEME_NAME),
		'singular_name' => __( 'Portfolio Item', STARKY_THEME_NAME),
		'search_items' =>  __( 'Search Portfolio Items', STARKY_THEME_NAME),
		'all_items' => __( 'Portfolio', STARKY_THEME_NAME),
		'parent_item' => __( 'Parent Portfolio Item', STARKY_THEME_NAME),
		'edit_item' => __( 'Edit Portfolio Item', STARKY_THEME_NAME),
		'update_item' => __( 'Update Portfolio Item', STARKY_THEME_NAME),
		'add_new_item' => __( 'Add New Portfolio Item', STARKY_THEME_NAME)
	 );
	 
	 $options = get_option('starky_options'); 
     $custom_slug = null;		
	 
	// if(!empty($options['portfolio_rewrite_slug'])) $custom_slug = $options['portfolio_rewrite_slug'];
	 $custom_slug = 'projects';
	 $args = array(
			'labels' => $portfolio_labels,
			'rewrite' => array('slug' => $custom_slug),
			'singular_label' => __('Project', STARKY_THEME_NAME),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'hierarchical' => false,
			'menu_position' => 7,
			'menu_icon' => '',
			'supports' => array('title', 'editor', 'thumbnail')
       );  
  
    register_post_type( 'portfolio' , $args );  
}  
add_action('init', 'starky_portfolio_register');


#-----------------------------------------------------------------#
# Add taxonomys attached to portfolio 
#-----------------------------------------------------------------# 

$category_labels = array(
	'name' => __( 'Portfolio Categories', STARKY_THEME_NAME),
	'singular_name' => __( 'Portfolio Category', STARKY_THEME_NAME),
	'search_items' =>  __( 'Search Portfolio Categories', STARKY_THEME_NAME),
	'all_items' => __( 'All Portfolio Categories', STARKY_THEME_NAME),
	'parent_item' => __( 'Parent Portfolio Category', STARKY_THEME_NAME),
	'edit_item' => __( 'Edit Portfolio Category', STARKY_THEME_NAME),
	'update_item' => __( 'Update Portfolio Category', STARKY_THEME_NAME),
	'add_new_item' => __( 'Add New Portfolio Category', STARKY_THEME_NAME),
    'menu_name' => __( 'Portfolio Categories', STARKY_THEME_NAME)
); 	

register_taxonomy("portfolio-category", 
		array("portfolio"), 
		array("hierarchical" => true, 
				'labels' => $category_labels,
				'show_ui' => true,
    			'query_var' => true,
				'rewrite' => array( 'slug' => 'portfolio-category' )
));




?>