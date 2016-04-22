

<?php 
if(isset($_GET['ajaxfolio']) == true){ 
?> <div class="close-work"></div> <?php } 
else{get_header();}

?>


<div class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
  <?php if ( has_post_thumbnail()) {
  $str_imgpost = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "full" );
 }
  else { $str_imgpost = " ";} 
  
  $str_type = rwmb_meta( 'starky_thumb_type' );
  $str_image = rwmb_meta( 'starky_thumb_image', 'type=image&size=full' );
  $str_gallery = rwmb_meta( 'starky_thumb_gallery', 'type=image&size=full' );
  $str_video_type = rwmb_meta( 'starky_thumb_video_type' );
  $str_video_id = rwmb_meta( 'starky_thumb_video_id' );
  
  ?> 
        <div class="row text-center">			
		</div><!-- row -->
			<div class="row">
			<div class="col-md-6">
			<?php
			if($str_type == 'image'){
			foreach ( $str_image as $str_first_image )
			{
			
			  $str_single_img = $str_first_image['url'];
			  break;
			}
			echo '<img src="'. $str_single_img .'" class="img-responsive" />';
			}
			elseif ($str_type == 'gallery'){ ?>
			  
			 <script>
			jQuery(document).ready(function($) {
				   jQuery("#owl-demo-3").owlCarousel({
					  navigation : true, // Show next and prev buttons
					  slideSpeed : 300,
					  paginationSpeed : 400,
					  singleItem:true,
					  pagination:true,
					  autoPlay : 5000,
					  navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
 					 });
			});
		</script>
		
			<?php
			echo'<div id="owl-demo-3" class="owl-carousel owl-theme gallery">';
			
			foreach($str_gallery as $str_img){
			echo' <div class="item"><img src="'. $str_img["url"] .'" class="" /></div>';
			}
            
			echo '</div>';
			
			}
			elseif ($str_type == 'video'){
			wp_enqueue_script( 'fitvids' );
			
			echo '<div class="fitvid">';
			if($str_video_type == 'vimeo'){
        	echo '<iframe src="https://player.vimeo.com/video/'.$str_video_id.'?badge=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'; 
			}
			if($str_video_type == 'youtube'){
        	echo '<iframe width="500px" height="250" src="https://www.youtube.com/embed/'.$str_video_id.'" frameborder="0" allowfullscreen></iframe>';
			}
			echo '</div>';
			
			}
			?>
				
			</div><!-- col-md-6 -->			
			<div class="col-md-6">
			
				<div id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
							<div class="post-title">
							<h2><?php the_title(); ?></h2>
							</div><!-- End of Title -->
							<p>
							 <?php the_content(); ?> 
							</p>	
						
							<?php
								$str_item_categories = get_the_terms( $post->ID, 'portfolio-category' );
									 if($str_item_categories){
									 $i=0;
									 $str_cats="";
									 foreach ($str_item_categories as $str_cat){
									if($i!=0){ $return .='/';}
									$str_cats .= $str_cat->name .' ';
									$i++;
									}
									}
							?>
							<?php if($str_item_categories){ ?>
							<div class="post-meta">
							 <h4>Category :</h4> <?php echo $str_cats; ?> 
							</div><!-- End of Meta Date -->
							<?php } ?>
							<div class="clearfix"></div>
							</div><!-- End of Post -->	
							
	
				
			</div><!-- col-md-6 --> 
			</div><!-- row -->
	</div> <!-- end container --> 

<?php endwhile; endif; ?>
</div>

<?php 
if(isset($_GET['ajaxfolio']) == true){} 
else{get_footer();}

?>