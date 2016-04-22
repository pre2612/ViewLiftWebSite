<?php
/**
 * Starky Footer
 *
 * Displays all of the <footer> section and everything up till the end of body>
 *
 */
?>
<footer>
  <div class="container">
    <div class="row">
	   <?php
                global $starky_options;
                $str_options = get_option('starky_options');
				
				if($str_options['footer-logo']){
				
				if($str_options['use-image-logo']){
               
                $str_logo = $str_options['logo'];
				if($str_logo['url']){ echo '<h3 class="nav-logo"><a data-scroll-goto="0" href="'. home_url() .'">
				<img  class="logo" alt="'. get_bloginfo('name') .'" src="' . $str_logo['url'] . '" /></a></h3>';}
					
				 } else { echo '<h3 class="nav-logo"><a data-scroll-goto="0" href="'. home_url() .'">'.get_bloginfo('name').'</a></h3>'; }
				}		

				  if (isset($str_options['footer_copyright']) && $str_options['footer_copyright'] != ""){?>
				<p><?php echo $str_options['footer_copyright'];?> </p>
			  <?php } else{ ?><p>copyright  &copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?>.</p><?php } ?>
      
    
      <ul>
     
      	<?php if (isset($str_options['facebook-url']) && $str_options['facebook-url'] != ""){ 
                ?> <li><a href="<?php echo $str_options['facebook-url']; ?>" target="_blank"><img src="<?php echo STARKY_IMAGES; ?>/face.png" alt="" /></a></li> <?php
                }      
				if (isset($str_options['twitter-url']) && $str_options['twitter-url'] != ""){    
                ?> <li> <a href="<?php echo $str_options['twitter-url']; ?>" target="_blank"><img src="<?php echo STARKY_IMAGES; ?>/twitter.png" alt="" /></a></li> <?php
                }
				if (isset($str_options['google-plus-url']) && $str_options['google-plus-url'] != ""){ 
				?><li> <a href="<?php echo $str_options['google-plus-url']; ?>" target="_blank"><img src="<?php echo STARKY_IMAGES; ?>/google.png" alt="" /></a></li> <?php
                }
				if (isset($str_options['linkedin-url']) && $str_options['linkedin-url'] != ""){ 
				?> <li> <a href="<?php echo $str_options['linkedin-url']; ?>" target="_blank"><img src="<?php echo STARKY_IMAGES; ?>/linkedin.png" alt="" /></a></li> <?php
                }
				
				if (isset($str_options['youtube-url']) && $str_options['youtube-url'] != ""){ 
				?>  <li> <a href="<?php echo $str_options['youtube-url']; ?>" target="_blank"><img src="<?php echo STARKY_IMAGES; ?>/youtube.png" alt="" /></a></li> <?php
                }
				?>
       
      </ul>
    </div>
    <!-- row  --> 
  </div>
  <!-- container  --> 
</footer><!-- /footer  -->
</div><!-- /Page Wrap  -->
<?php if (isset($str_options['google-analytics']) && $str_options['google-analytics'] != ""){ echo $str_options['google-analytics']; } ?> 
<?php wp_footer(); ?>
</body>
</html>