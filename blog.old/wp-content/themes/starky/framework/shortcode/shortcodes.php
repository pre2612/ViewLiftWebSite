<?php
// Remove Extra Paragraphs in ShortCodes (explicit usage)
function starky_shortcode_empty_paragraph_fix($content) {
	$block = join("|",array(
						"button",
						"column",
						"title",
						"divider",
						"piechart",
						"section",
						"iconbox",
						"portfolio",
						"testimonial",
						"recent_posts", 
						"team",
						"contact_box",
						"contact_form"
						));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)/","[/$2]",$rep);

	return $rep;
}

add_filter('the_content', 'starky_shortcode_empty_paragraph_fix');
add_filter('widget_text', 'starky_shortcode_empty_paragraph_fix');




/* ------------------------------------------------------------------------ */
/* Columns
/* ------------------------------------------------------------------------ */
// Columns
add_shortcode('column', 'starky_shortcode_column');
function starky_shortcode_column( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
        'width' => 'col-md-12',
		'padding' => '',
		'class' => '',
        ), $atts);
        
    switch ($atts['width']){
        	
    	case '1/1':	
    		$width = "col-md-12";
    		break;
    	
        case "3/4" :
        	$width = "col-md-9";
        	break; 
        	
    	case "1/2":
    		$width = "col-md-6 col-sm-6";
    		break;

        case "1/3" :
        	$width = "col-md-4";
        	break;

        case "2/3" :
        	$width = "col-md-8";
       		break;

        case "1/4" :
        	$width = "col-md-3 col-sm-6";
        	break;   	
        		    	
      	case "1/6" :
        	$width = "col-md-2 col-sm-4 col-xs-6";
        	break;   	
        	
        	
    	default :
        	$width = "col-md-12";
    }   
	
	$style = '';
	$style ='style="';
	 if($atts['padding'] != '' ) {
            $style .= 'padding-top: '.(preg_match('/(px|em|\%|pt|cm)$/', $atts['padding']) ? $atts['padding'] : $atts['padding'].'px').';';
			$style .= 'padding-bottom: '.(preg_match('/(px|em|\%|pt|cm)$/', $atts['padding']) ? $atts['padding'] : $atts['padding'].'px').';';
        }
     $style .= '"';	

        
    $content ='<div class="'.$width.' '.$atts["class"].' col-padding" '.$style.'>'. do_shortcode( $content ).'<div class="clearfix"></div></div>';
    
 
    
    return $content;
}




/*-----------------------------------------------------------------------------------*/
/*	Title
/*-----------------------------------------------------------------------------------*/
add_shortcode('title', 'starky_shortcode_title');
function starky_shortcode_title( $atts, $content = null ) {
	
	return '<div class="innertitle"><h3>'.do_shortcode($content).'<span class="divider"></span></h3></div>';
	
}


/* ------------------------------------------------------------------------ */
/* Dividers
/* ------------------------------------------------------------------------ */
add_shortcode('divider', 'starky_shortcode_divider');
function starky_shortcode_divider( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type'    => 'space',
		'icon'	  =>'',
		'margintop'    => '20',
		'marginbottom'    => '20'
	    ), $atts));
	
	$content = '';
	$content = '<div style="padding-bottom: ' . $marginbottom . 'px; margin-top: ' . $margintop . 'px;" class="space-divider"></div>';

	return $content;
}


/*-----------------------------------------------------------------------------------*/
/*	charts : Pie Chart
/*-----------------------------------------------------------------------------------*/
add_shortcode('piechart', 'starky_shortcode_piechart');
function starky_shortcode_piechart( $atts, $content = null ) {
	extract( shortcode_atts( array(
                    'title'      => '',
					'percent'      =>'',
                ), $atts ) );
				
				$options = get_option('starky_options');
				$color= $options['theme_color'];
				wp_enqueue_script( 'piechart' );
				
				$return = '<div class="charts"> <span class="chart" data-barcolor="'.$color.'" data-percent="'.$percent.'"> <span class="percent"></span> </span>
				  <div class="clearfix"></div>
				  <h3>'.$title.'</h3>
				</div>';
	
					   
					   return $return;
					
	
}


/*-----------------------------------------------------------------------------------*/
/*	Section
/*-----------------------------------------------------------------------------------*/
add_shortcode('section', 'starky_shortcode_section');
function starky_shortcode_section( $atts, $content = null ) {
 extract( shortcode_atts( array(
                    'text_align'      => 'left',
					'margin_top'      =>'',
					'margin_bottom'      => '',
                ), $atts ) );
				
			
				
				 switch ($atts['text_align']){
					case 'left' :
						$text_align = 'alignleft';
						break;
					case 'center' :
						$text_align = 'aligncenter';
						break;
					case 'right' :
						$text_align = 'alignright';
						break;
				}

			$return = '<div class="clearfix"></div><section class="col-md-12 col-sm-12 '.$text_align .'" style="margin-top:'. $margin_top .'px; margin-bottom:'.$margin_bottom.'px; float:left; width:100%!important;">
			
				'.do_shortcode($content).'</section><div class="clearfix"></div>';	

			return $return;
	
}








/*-----------------------------------------------------------------------------------*/
/* Buttons
/*-----------------------------------------------------------------------------------*/
add_shortcode('button', 'starky_colored_buttons');
function starky_colored_buttons($atts){
	extract(shortcode_atts(array(
		'link'	=> '#',
		'title'	=> '',
		'target'	=> '',
		'color'	=> '',
		'border_x'	=> '104',
	), $atts));



	
	$target = $atts['target'];
	$button_target = 'target="'.$target.'"';
	
	if($border_x ==""){$border_x='104';}
	
	//$link = $atts['link'];

	global $options;
	$themecolor= $options['theme_color']; 
	
	 switch ($atts['color']){
        	
    	case 'theme_color':	
    		$button_color = $themecolor;
			$button_class = "";
    		break;
			
    	case 'white':	
    		$button_color = "#FFFFFF";
			$button_class = "white";
    		break;
			
    	default :
        	$button_color = "#333333";
			$button_class = "";
    }   
	

	$return =' <a ' . $button_target .' href="'.$atts['link'].'" class="svg-wrapper"> <svg height="60" width="320">
          <rect class="shape '.$button_class.'" height="60" width="320" />
          <text font-size="22" fill="'. $button_color .'" y="37" x="'. $border_x .'">'.$title.'</text>
          </svg> </a>';
	
																							
    return $return;
}




/*-----------------------------------------------------------------------------------*/
/*	Icon Box
/*-----------------------------------------------------------------------------------*/
add_shortcode('iconbox', 'starky_shortcode_iconbox');
function starky_shortcode_iconbox( $atts, $content = null ) {
		extract( shortcode_atts( array(
							'icon'      => '',
							'title'      => '',
							'position' => 'left',
							'title'     => '',
							'content'      => '',
						), $atts ) );
						
						
						 
	
						
	if($position == "right"){ $return = ' <div  data-animated="fadeInLeft" class="left-box">
          <div class="col-md-2 hidden-lg hidden-md"> <i class="fa fa-'.$icon.' fa-4x m-t60"></i> </div>
          <!-- end col-md-2 -->
          <div class="col-md-10">
            <h4>'.$title.'</h4>
            <p>'.$content.'</p>
          </div>
          <!-- end col-md-10 -->
          
          <div class="col-md-2 hidden-sm hidden-xs"> <i class="fa fa-'.$icon.' fa-4x m-t60"></i> </div>
          <!-- end col-md-2 -->
          <div class="clearfix"></div>
        </div>
        <!-- end left-box-->';
	}
		
	else if($position == "left") {
		
		$return = ' <div  data-animated="fadeInRight" class="right-box second ">
          <div class="col-md-2"> <i class="fa fa-'.$icon.' fa-4x m-t60"></i> </div>
          <!-- end col-md-2 -->
          
          <div class="col-md-10">
            <h4>'.$title.'</h4>
            <p>'.$content.'</p>
          </div>
          <!-- end col-md-10 -->
          <div class="clearfix"></div>
        </div>
        <!-- end right-box-->';
	
	

	}
						
    	return $return;
    
}






//Portfolio Gallery //////////////////////////////////////////
add_shortcode('portfolio', 'starky_portfolio_shortcode');
function starky_portfolio_shortcode($atts){

extract(shortcode_atts(array(
	  'items' => -1,
	  'style' => '',
   ), $atts));
   
   
		global $post;
		
		if($style =='grid'){
		
$return = '<div class="ajax-box"></div>
  <!--end of ajax container-->
  <div class="business-work work">
	<div class="container">
	<div class="row">';
	
		query_posts(array( 
				'post_type' => 'portfolio',
				'showposts' => $items 
			) ); 

	 while (have_posts()) : the_post(); 
			
			
			$item_categories = get_the_terms( $post->ID, 'portfolio-category' );

			
		 if ( has_post_thumbnail()) {
		  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "full" );
		
		 }
		  else { $imgsrc = " ";}
		
		$return .= '<div class="col-md-4">
		<div class="hoveritem" data-project="'. get_the_permalink().'?ajaxfolio=true"> <a class="link">
      <div class="hovercontent">
        <h3>'. get_the_title() .'</h3>
       	<h1 class="portfolio-categories">';
				
				$i=0;
				 if($item_categories){
							 foreach ($item_categories as $cat){
							if($i!=0){ $return .='/';}
							$return .= $cat->name .' ';
							$i++;
							}
							}
							
						    $return .='</h1>	
      </div>
      </a> <img class="lazyOwl img-responsive" src="'. $imgsrc[0] .'" alt="" /> 
	</div>
	</div>';
	endwhile;
	wp_reset_query();
	 $return .= '
  </div>
  </div>
  </div>';
		
		}else{
		 $return = '<div class="ajax-box"></div><!--end of ajax container--><div id="owl-demo-1" class="owl-carousel work grid">';
			
			query_posts(array( 
				'post_type' => 'portfolio',
				'showposts' => $items 
			) ); 

		
		
		 while (have_posts()) : the_post(); 
			
			
			$item_categories = get_the_terms( $post->ID, 'portfolio-category' );

			
		 if ( has_post_thumbnail()) {
		  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "full" );
		
		 }
		  else { $imgsrc = " ";}
		
			$return .= '<div class="item hoveritem" data-project="'. get_the_permalink().'?ajaxfolio=true"> <a class="link">
			  <div class="hovercontent">
				<h3>'. get_the_title() .'</h3>
				<h1 class="portfolio-categories">';
				
				$i=0;
				 if($item_categories){
							 foreach ($item_categories as $cat){
							if($i!=0){ $return .='/';}
							$return .= $cat->name .' ';
							$i++;
							}
							}
							
						    $return .='</h1>	
			  </div>
			  </a> <img class="lazyOwl" src="'. $imgsrc[0] .'" alt="" /> </div>';
			 endwhile;
			 wp_reset_query();
		  $return .= '</div>';
		}

	return $return; 
	

}




// testimonial //////////////////////////////////////////
add_shortcode('testimonial', 'starky_testimonial_shortcode');
function starky_testimonial_shortcode($atts){

extract(shortcode_atts(array(
      'items' => -1,
   ), $atts));
	
	
	 global $post;
  
	
	 $return = ' <div class="testimonial">
   
      <div class="container">
        <div class="row">
          <div id="owl-demo" class="owl-carousel owl-theme" data-animated="bounceIn">';
            
    query_posts(array( 
        'post_type' => 'testimonial',
        'showposts' => $items 
    ) );  

           while (have_posts()) : the_post(); 
             $return .= '<div class="item">
              <h3 class="quote"><i class="fa fa-quote-left"></i></h3>
              <div class="clearfix"></div>
              <p>'. get_the_content() .'</p>
              <div class="clearfix"></div>
              <h4 class="person"><span> -
                '. get_the_title().'
                -</span> </h4>
            </div>';
            endwhile;
			wp_reset_query();
          $return .= '</div>
        </div>
      </div>
  </div>
  <!-- testimonial  -->';


	return $return; 
}

//recent Posts //////////////////////////////////////////	
add_shortcode('recent_posts', 'starky_posts_shortcode');
function starky_posts_shortcode($atts){

extract(shortcode_atts(array(
      'items' => 3,
   ), $atts));
   
   
	global $post;
	
	
	
	
	 $return = '<div class="posts recent-posts">';
              
     
$queryObject = new  Wp_Query( array(
    'showposts' => 3,
    'post_type' => array('post'),
    'orderby' => 1,
    ));

// The Loop
if ( $queryObject->have_posts() ) :

    $i = 0;
    while ( $queryObject->have_posts() ) :
	
        $queryObject->the_post();
		
		 if ( has_post_thumbnail()) {
				$large_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "blog-large" );
				$thumb_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "blog-thumb" );
				} else { $large_img = " "; $thumb_img = " ";} 
	
        if ( $i == 0 ) : 
          $return .='  <div class="col-md-6 second" data-animated="fadeInLeft">';
		  if ( has_post_thumbnail()) { 
				  $return .='<div class="thumb">   <img src="'.$large_img[0].'" class="img-responsive" alt="" />';
				   }else{ 
				     $return .='<div> ';
				 } 
            $return .='<a class="overlay" href="'. get_permalink() .'">
             <h3 class="fittext2">'. get_the_title().'</h3>
            <br />
            <br />
            <br />
            <p>'.starky_excerpt_limit(35).'</p>
            </a> </div>
        </div>';
            
        endif;
        if ( $i != 0 ) : 
         $return .= ' <div class="col-md-3 left-align third" data-animated="fadeInRight">';
			  if ( has_post_thumbnail()) { 
				  $return .='<a href="'. get_permalink() .'"><img src="'.$thumb_img[0].'" class="img-responsive fade" alt="" /></a>';
				  }
          $return .='<a href="'. get_permalink() .'"><h5>'. get_the_title().'</h5>
          </a>
          <p> '. starky_excerpt_limit(28).' </p>';
        
          
$return .= '</div>';
          
        
         endif; 
       
        $i++;
    endwhile;
	wp_reset_query();
endif;
      
        $return .= ' <div class="clearfix"></div>
      </div>
      <!-- posts  -->';
	  
	  return $return;
}



//Team Shortcode //////////////////////////////////////////
add_shortcode('team', 'starky_team_shortcode');
function starky_team_shortcode($atts){

extract(shortcode_atts(array(
      'items' => -1, 
	  'style' => '', 
   ), $atts));
   
   global $post;
   if($style =='horizontal'){
   
   $return = '<!--  team  -->
<section class="team-business" >

    <div class="container">
		<div class="row">
		 		  
		  <div id="owl-demo-2" class="owl-carousel">';
		  
		query_posts(array( 
        'post_type' => 'team',
        'showposts' => $items 
		) );  
	
       while (have_posts()) : the_post();
       
	   
	  if ( has_post_thumbnail()) {
	  $imgteam = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "full" );
	  $position = rwmb_meta( 'starky_person_position' );
	  $facebook = rwmb_meta( 'starky_person_facebook' );
	  $twitter = rwmb_meta( 'starky_person_twitter' );
	  $linkedin = rwmb_meta( 'starky_person_linkedin' );
	  $google = rwmb_meta( 'starky_person_google' );
	  
	  $return .= '<div class="item">
            	   <div class="link thumb">
					<img class="lazyOwl" src="'. $imgteam[0] .'" alt="" />
                    <div class="overlay"><div class="socail"> ';
					 if ($facebook) {
                  $return .= '<span><a href="'. $facebook .'" target="_blank"><img src="'. STARKY_IMAGES .'/face.png" alt="" /></a></span>';
                  }
			   
				  if ($twitter) {
					   $return .= '<span><a href="'.$twitter .'" target="_blank"><img src="'. STARKY_IMAGES.'/twitter.png" alt="" /></a></span>';
					 }
				   
					 
				  if ($linkedin) {
					   $return .= '<span><a href="'.$linkedin .'" target="_blank"><img src="'.STARKY_IMAGES.'/linkedin.png" alt="" /></a></span>';
					   }
				 
					
				  if ($google) {
					   $return .= '<span><a href="'.$google .'"target="_blank"><img src="'. STARKY_IMAGES.'/google.png" alt="" /></a></span>';
					  }
					$return .= '</div></div>
                    </div> 
					<div class="team-info">
						<h4>'. get_the_title() .'</h4>';
						  if ($position) {
						  $return .= '<p>'. $position .'</p>';
						  }
						
					 $return .= '</div>
			  	 
            </div>';
			}
			 endwhile; 
			wp_reset_query();
           $return .= '</div> 
		</div>
    </div> <!-- container  -->
</section>';
   
   }else{
 $return = '<section class="team-slider">
        <div class="custom-select" style="display:none;">
          <select id="fxselect" name="fxselect">
            <option value="-1">Choose an effect...</option>
            <option value="fxSlideForward">Slide forward</option>
            <option value="fxTableDrop" selected>Table Drop</option>
            <option value="fxSlideIt">Slide it</option>
            <option value="fxBottleKick">Bottle kick</option>
            <option value="fxShelf">Off the Shelf</option>
          </select>
        </div>
        <div id="component" class="component component-transparent">
          <ul class="itemwrap">';
           
    query_posts(array( 
        'post_type' => 'team',
        'showposts' => $items 
    ) );  
		$i=0;
       while (have_posts()) : the_post();
           
 if ( has_post_thumbnail()) {
  $imgteam = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "full" );
  $position = rwmb_meta( 'starky_person_position' );
  $facebook = rwmb_meta( 'starky_person_facebook' );
  $twitter = rwmb_meta( 'starky_person_twitter' );
  $linkedin = rwmb_meta( 'starky_person_linkedin' );
  $google = rwmb_meta( 'starky_person_google' );
  
  if($i==0){ $list_class = 'current'; }else{ $list_class = '';}
   $return .= '<li class="'.$list_class.'"> <img src="'. $imgteam[0] .'" alt=""/>
              <div class="ca">';
               
                 
			  if ($position) {
			  $return .= '<p>'. $position .'</p>';
			  }
			  
               
                  $return .= '<div class="socail">';
                 
			  if ($facebook) {
                  $return .= '<span><a href="'. $facebook .'" target="_blank"><img src="'. STARKY_IMAGES .'/face.png" alt="" /></a></span>';
                  }
			   
			  if ($twitter) {
                   $return .= '<span><a href="'.$twitter .'" target="_blank"><img src="'. STARKY_IMAGES.'/twitter.png" alt="" /></a></span>';
                 }
			   
                 
			  if ($linkedin) {
                   $return .= '<span><a href="'.$linkedin .'" target="_blank"><img src="'.STARKY_IMAGES.'/linkedin.png" alt="" /></a></span>';
                   }
			 
                
			  if ($google) {
                   $return .= '<span><a href="'.$google .'" target="_blank"><img src="'. STARKY_IMAGES.'/google.png" alt="" /></a></span>';
                  }
			  
                $return .= '</div>
              </div>
              <h3 class="name">
                '. get_the_title() .'
              </h3>
            </li>';
 }
 
			$i++;
            endwhile; 
			wp_reset_query();
           $return .= '</ul>
          <nav> <a class="prev" href="#"><i class="fa fa-angle-left"></i></a> <a class="next" href="#"><i class="fa fa-angle-right"></i></a> </nav>
        </div>
      </section>';
	  
	   wp_enqueue_script( 'main' );
	  
	  }

	return $return; 
}


/*-----------------------------------------------------------------------------------*/
/*	Contact Icon Box
/*-----------------------------------------------------------------------------------*/
add_shortcode('contact_box', 'starky_shortcode_contact_box');
function starky_shortcode_contact_box( $atts, $content = null ) {
 extract( shortcode_atts( array(
                 'icon' => '',   
				 'content' => -1,  
                ), $atts ) );
				

			$return = '<div class="col-md-3 fourth" data-animated="fadeInRight">
                  <div class="contact-info"> <i class="fa fa-'.$icon.' fa-4x"></i>
                    <div class="clearfix"></div>
                    <p>'.$content.'</p>
                  </div>
                </div>';

			return $return;
	
}


/*-----------------------------------------------------------------------------------*/
/*	Contact Form
/*-----------------------------------------------------------------------------------*/
add_shortcode('contact_form', 'starky_shortcode_contact_form');
function starky_shortcode_contact_form( $atts, $content = null ) {
 extract( shortcode_atts( array(
                   
                ), $atts ) );
				

			$return = '<div class="row">
			<div class="clearfix"></div>
            <div class="form-body">
			<div class="col-md-12"><div id="result"></div></div>
              <div class="sixth" data-animated="fadeInDown">
                <div class="row">
                  <div class="col-md-6">
                    <input class="form-control" type="text" name="name" id="name" placeholder="'. __('Name', STARKY_THEME_NAME).'" />
                    <br />
                    <input class="form-control"  type="email" name="email" id="email" placeholder="'. __('E-mail', STARKY_THEME_NAME).'" />
                    <br />
                    <input class="form-control"  type="text" name="phone" id="phone" placeholder="'. __('Phone', STARKY_THEME_NAME).'" />
                    <br />
                  </div>
                  <div class="col-md-6">
                    <textarea class="form-control"  name="message" id="message" placeholder="'. __('Message', STARKY_THEME_NAME).'"></textarea>
                    <br />
					<button class="btn btn-custom btn-lg pull-right" id="submit_btn">Submit</button>
                  </div>
                </div>
               
                <div class="clearfix"></div>
              </div>
            </div>
          </div><!--row-->';
			
			starky_contact_us_javascript();
			return $return;
	
}







?>