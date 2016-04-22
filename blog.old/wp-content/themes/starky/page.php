<?php get_header(); ?>


<!--single -->
	<div class="container">
    	<div class="row">
        	<section class="col-md-12  single">
        		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			 <?php if ( has_post_thumbnail()) {
  $str_imgpost = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "full" );
 }
  else { $str_imgpost = " ";} ?> 
                <div class="top-title" style="padding-top:30px;">
                    <h1 data-animated="fadeIn" ><?php the_title(); ?> <span class="divider"></span> </h1>
                    
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="post">
					 <?php if ( has_post_thumbnail()) { ?>
                    	<div class="img-body">
                    		<img src="<?php echo $str_imgpost[0]; ?>" alt="" class="img-responsive" />
                            
                        </div>
						<?php } ?>
                       
				<p><?php the_content(); ?></p>
				 <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
					<?php comments_template(); ?>  
             
                	 <?php endwhile; endif; ?>
                    
    
          <div class="clearfix"></div>
                </div>      
                    
                </div>

            </section>
        </div>
    </div>
<!--single -->


<?php get_footer(); ?>