<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'starky_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function starky_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'starky_';
	
	// Page meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'starky_page_option_meta_box',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Page and Home Section Options', STARKY_THEME_NAME ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
		
			// Page Section
			array(
				'name' => __('Assign current page as', STARKY_THEME_NAME),
				'id'   => "{$prefix}check_page",
				'class'   => "{$prefix}check_page",
				'type' => 'select',
				'options' => array(
					'home'		=> __('Home Section', STARKY_THEME_NAME),
					'separate'		=> __('Separate Page', STARKY_THEME_NAME),
				),
				'multiple' => false,
				'std'  => 'none',
				'desc' => __('Assign Current Page as Home Section to display in the Home Page Otherwise it will Open as Separate Link.', STARKY_THEME_NAME),
			),
			
			// Disable Title
			array(
				'name' => __('Disable Page Tilte', STARKY_THEME_NAME),
				'id'        => "{$prefix}disable_title",
				'class'        => "{$prefix}disable_title",
				'desc' => __("Don't show Page Title .", STARKY_THEME_NAME),
				'clone' => false,
				'type'  => 'checkbox',
				'std' => '',
			),
			// Disable Title
			array(
				'name' => __('Disable Page Container', STARKY_THEME_NAME),
				'id'        => "{$prefix}disable_container",
				'class'        => "{$prefix}disable_container",
				'desc' => __("For wide Sections Layout Disable your Page container .", STARKY_THEME_NAME),
				'clone' => false,
				'type'  => 'checkbox',
				'std' => '',
			),
			// Background
			array(
				'name' => __('Section Background', STARKY_THEME_NAME),
				'id'   => "{$prefix}section_bg",
				'class'   => "{$prefix}section_bg",
				'type' => 'select',
				'options' => array(
					'default'		=> __('Default', STARKY_THEME_NAME),
					'image'		=> __('Image', STARKY_THEME_NAME),
					'video'		=> __('Video', STARKY_THEME_NAME),
				),
				'multiple' => false,
				'std'  => 'default',
				'desc' => __('Choose the section Background Type.', STARKY_THEME_NAME),
			),
			
			// Text Color
			array(
				'name' => __('Text Color', STARKY_THEME_NAME),
				'id'   => "{$prefix}text_color",
				'class'   => "{$prefix}text_color",
				'type' => 'select',
				'options' => array(
					'dark'		=> __('Dark', STARKY_THEME_NAME),
					'light'		=> __('Light', STARKY_THEME_NAME),
				),
				'multiple' => false,
				'std'  => 'dark',
				'desc' => __('Select Text Color.', STARKY_THEME_NAME),
			),
			
			// Parallax
			array(
				'name' => __('Enable Parallax', STARKY_THEME_NAME),
				'id'        => "{$prefix}enable_parallax",
				'class'        => "{$prefix}enable_parallax",
				'desc' => __("Use Parallax Effect on Background Image .", STARKY_THEME_NAME),
				'clone' => false,
				'type'  => 'checkbox',
				'std' => '',
			),
						
			// Overlay
			array(
				'name' => __('Overlay Effect', STARKY_THEME_NAME),
				'id'   => "{$prefix}overlay_effect",
				'class'   => "{$prefix}overlay_effect",
				'type' => 'select',
				'options' => array(
					'none'		=> __('None', STARKY_THEME_NAME),
					'color'		=> __('Color Overlay', STARKY_THEME_NAME),
					'pattern'		=> __('Pattern Overlay', STARKY_THEME_NAME),
				),
				'multiple' => false,
				'std'  => 'default',
				'desc' => __('Select Overlay Effect.', STARKY_THEME_NAME),
			),
			
			// Background Color
			array(
				'name' => __('Section Background Color', STARKY_THEME_NAME),
				'id'        => "{$prefix}bg_color",
				'class'        => "{$prefix}bg_color",
				'desc' => __("Select your section BG Color .", STARKY_THEME_NAME),
				'clone' => false,
				'type'  => 'color',
				'std' => '',
			),
						
			// Video ID
			array(
				'name' => __('Youtube Video ID', STARKY_THEME_NAME),
				'id'        => "{$prefix}bg_video_id",
				'class'        => "{$prefix}bg_video_id",
				'desc' => __("Enter your Youtube Video ID .", STARKY_THEME_NAME),
				'clone' => false,
				'type'  => 'text',
				'std' => '',
			),
			

		),

	);
	

	
	// Portfolio meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'starky_portfolio_thumb_meta_box',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Portfolio Option', STARKY_THEME_NAME ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'portfolio' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
		
			// thumb Type
			array(
				'name' => __('Thumb Type', STARKY_THEME_NAME),
				'id'   => "{$prefix}thumb_type",
				'class'   => "{$prefix}thumb_type",
				'type' => 'select',
				'options' => array(
					'image'		=> __('Image', STARKY_THEME_NAME),
					'gallery'		=> __('Gallery', STARKY_THEME_NAME),
					'video'		=> __('Video', STARKY_THEME_NAME),
				),
				'multiple' => false,
				'std'  => 'image',
				'desc' => __('Choose the thumbnial type to display in the portfolio.', STARKY_THEME_NAME),
			),
			
			// Image Upload
			array(
				'name'       => __( 'Thumb Image Upload', STARKY_THEME_NAME ),
				'id'        => "{$prefix}thumb_image",
				'class'    => "{$prefix}thumb_image",
				'desc'  => __( 'For Best Result The image should (1600px to 2000px)W & Min (300px)H.', STARKY_THEME_NAME ),
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			// Gallery Upload
			array(
				'name'      => __('Gallery Images Upload', STARKY_THEME_NAME ),
				'id'        => "{$prefix}thumb_gallery",
				'class'    => "{$prefix}thumb_gallery",
				'desc'  => __( 'For Best Result The image should (1600px to 2000px)W & Min (800px)H.', STARKY_THEME_NAME ),
				'type'             => 'image_advanced',
				'max_file_uploads' => 8,
			),
			
			// Video Type
			array(
				'name' => __('Video Type', STARKY_THEME_NAME),
				'id'   => "{$prefix}thumb_video_type",
				'class'   => "{$prefix}thumb_video_type",
				'type' => 'select',
				'options' => array(
					'youtube'		=> __('Youtube', STARKY_THEME_NAME),
					'vimeo'		=> __('Vimeo', STARKY_THEME_NAME),
				),
				'multiple' => false,
				'std'  => 'youtube',
				'desc' => __('Choose video type.', STARKY_THEME_NAME),
			),
						
			// Video ID
			array(
				'name' => __('Video ID', STARKY_THEME_NAME),
				'id'        => "{$prefix}thumb_video_id",
				'class'        => "{$prefix}thumb_video_id",
				'desc' => __("Enter your Video ID .", STARKY_THEME_NAME),
				'clone' => false,
				'type'  => 'text',
				'std' => '',
			),
			

		),

	);
	
	

	
	// Team meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'starky_team_meta_box',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Person Information', STARKY_THEME_NAME ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'team' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// Position
			array(
				// Field name - Will be used as label
				'name'  => __( 'Job Title', STARKY_THEME_NAME ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}person_position",
				// Field description (optional)
				'desc'  => __( '', STARKY_THEME_NAME ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', STARKY_THEME_NAME ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// Facebook URL
			array(
				'name'  => __( 'Facebook', STARKY_THEME_NAME ),
				'id'    => "{$prefix}person_facebook",
				'desc'  => __( 'ex : http://www.facebook.com', STARKY_THEME_NAME ),
				'type'  => 'url',
				'std'   => '',
			),
			// Twitter URL
			array(
				'name'  => __( 'Twitter', STARKY_THEME_NAME ),
				'id'    => "{$prefix}person_twitter",
				'desc'  => __( 'ex : http://www.twitter.com', STARKY_THEME_NAME ),
				'type'  => 'url',
				'std'   => '',
			),
			// Linkedin URL
			array(
				'name'  => __( 'Linkedin', STARKY_THEME_NAME ),
				'id'    => "{$prefix}person_linkedin",
				'desc'  => __( 'ex : http://www.linkedin.com', STARKY_THEME_NAME ),
				'type'  => 'url',
				'std'   => '',
			),
			// Google URL
			array(
				'name'  => __( 'Google+', STARKY_THEME_NAME ),
				'id'    => "{$prefix}person_google",
				'desc'  => __( 'ex : http://plus.google.com', STARKY_THEME_NAME ),
				'type'  => 'url',
				'std'   => '',
			),
			
		),
	);
	
	
	
	return $meta_boxes;
}


