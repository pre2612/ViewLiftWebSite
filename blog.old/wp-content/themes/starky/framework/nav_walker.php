<?php
/**
* Class Name: th_nav_walker
* Description: A custom Wordpress nav walker to implement custom navigation
* Version: 1.0
* Author: THEME-HOUSE
*/
class starky_walker extends Walker_Nav_Menu{
   static $count = 0;
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0 )
      {
           global $wp_query;
		   
		   $disable_menu ='';
		   $description = '';

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';
				 
          $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		   
       //   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
	   	$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		  
		 if (strpos($class_names, 'disable') !== false){
		   $disable_menu = true;
		}
		
		if ( $args->has_children ){
			$class_names .= ' dropdown';
			}	
		   
          $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  	. esc_attr( $item->attr_title 		) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' 	. esc_attr( $item->target     		) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    	. esc_attr( $item->xfn        		) .'"' : '';
           // $attributes .= ! empty( $item->url )        ? ' href="'   	. esc_attr( $item->url        		) .'"' : '';
		  
		  	if ( $args->has_children && $depth === 0 ) {
			//$attributes .= ' data-toggle="dropdown"';
			$attributes .= ' class=" dropdown-toggle "';
			} 
			
           $prepend = '';
           $append = '';

           if($depth != 0)
           {
                $append = $prepend = "";
           }
			
			if($disable_menu != true ){
			
			 if($item->object == 'page')
           {
			$pageitem = get_post($item->object_id);                
			$slug = $pageitem->post_name;
			$page_id = 	$pageitem->ID;	
			$page_check = rwmb_meta( 'starky_check_page','type=select', $page_id );
						
			if($page_check == 'separate')
	                	$attributes .= ! empty( $item->url ) ? ' href="'. esc_attr( $item->url ) .'"' : '';
	                else{
	                	if (is_front_page()) 
	                		$attributes .= ' href="#' . $slug . '"'; 
	                	else 
	                		$attributes .= ' href="' . home_url('/') . '#' . $slug . '"';
	                }	
		   
		    $item_output = $args->before;
			if ( (is_front_page()) && ($page_check != 'separate') ) {  $item_output .= '<a'. $attributes .' data-scroll-nav="'. self::$count .'">'; }
			else{ $item_output .= '<a'. $attributes .' >';}
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
			
		            

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			
			if($page_check != 'separate') {
			self::$count++;
			}
			
		   }else{
			$attributes .= ! empty( $item->url ) ? ' href="'. esc_attr( $item->url) .'"' : '';
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
			
			}//disable menu item
            }
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}
?>