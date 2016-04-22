<?php 
		global $starky_options;
        $str_options = get_option('starky_options');
		$str_slider = $str_options['header-slides'];
		$str_slides = explode(',', $str_slider);

?>



<section class="ha-waypoint juicyslider" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide" data-scroll-index="0" id="myslider">
				
				
				<ul>
				 <?php
				  foreach($str_slides as $str_slide){
					$str_image = wp_get_attachment_url( $str_slide );
					if($str_image){
					
					echo'  <li><img src="'.$str_image .'" alt=""></li>';
					
					}
					}
					?>
				
            	</ul>
				
  <div class="home-overlay"></div>
  <div class="container">
    <div class="row">
      <div class="top-logo"><h3>
      	
   <?php
               
				if($str_options['use-image-logo']){
               
                $str_logo = $str_options['logo'];
				if($str_logo['url']){ echo '<img  class="logo" alt="'. get_bloginfo('name') .'" src="' . $str_logo['url'] . '" />';}
					
				 } else { echo get_bloginfo('name'); } 
				 ?>
               
     </h3>
       
      </div>
      <div class="home-content">
       
	   
		<?php
		global $starky_options;
        $str_options = get_option('starky_options');
		$str_titles = $str_options['header_titles'];
		?>
          <div id="owl-demo-5" class="owl-carousel text-slider">
		  
		  <?php
		  foreach($str_titles as $str_title){
			if($str_title){
            echo'<div class="item"><h1 class="fittext1">'. $str_title .'</h1></div>';
			}
			}
            ?>
          </div>
       
	   
        <div class="clearfix"></div>
		<?php
		if (isset($str_options['move-down']) && $str_options['move-down'] == "1"){ ?>
		<a href="#" data-scroll-nav="1" class="svg-wrapper"> <svg height="60" width="320">
        <rect class="shape" height="60" width="320" />
        <text font-size="22" fill="#fff" y="37" x="<?php if (isset($str_options['header_more_txt_border']) && $str_options['header_more_txt_border'] != ""){ echo $str_options['header_more_txt_border']; }else{ echo '100'; }?>"><?php if (isset($str_options['header_more_txt']) && $str_options['header_more_txt'] != ""){ echo $str_options['header_more_txt']; }else{ echo __('See More', STARKY_THEME_NAME); }  ?></text>
        </svg> </a>	
		<?php } ?>
	   </div>
      <!-- end home-content --> 
    </div>
    <!-- end row --> 
    
  </div>
  <!-- end container --> 
  <?php starky_juicyslider_script(); ?>
</section>