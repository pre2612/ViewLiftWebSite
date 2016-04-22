<?php 
/* ------------------------------------------------------------------------ */
/* TinyMce Editor Custom Shortcode Buttons
/* ------------------------------------------------------------------------ */


function starky_myplugin_addbuttons() {
   // Don't bother doing this stuff if the current user lacks permissions
   global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
   	return;
    }
 
   // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
		
	// check if WYSIWYG is enabled
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "starky_add_myplugin_tinymce_plugin");
		add_filter('mce_buttons', 'starky_register_myplugin_button');
	}
}
 
function starky_register_myplugin_button($buttons) {
   array_push($buttons, 'kb_button', 'fontAwesomeMoreGlyphSelect');
   return $buttons;
}


function starky_icons_path() {
	$starky_icons_path = '<script type="text/javascript">
	var iconsPath = "'.STARKY_THEME_DIRECTORY.'/framework/shortcode/tinymce/images/" ;
	</script>';
	echo $starky_icons_path;
}
 
add_filter('admin_head', 'starky_icons_path');
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function starky_add_myplugin_tinymce_plugin($str_plugin_array) {
	// this plugin file will work the magic of our button
   $str_plugin_array['kb_button'] = STARKY_THEME_DIRECTORY . '/framework/shortcode/tinymce/tinymce_codes.js';
   return $str_plugin_array;
}



 
// init process for button Appear and control
add_action('admin_head', 'starky_myplugin_addbuttons');


?>