<?php get_header(); ?>


<!--single -->
	<div class="container">
    	<div class="row">
		
        	<section class="col-md-12  single leftcontent">
			
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="clearfix"></div>
			
			 <div class="top-title col-md-12">
                    <h1 data-animated="fadeIn" ><?php echo _e('Search Result' ,'STARKY_THEME_NAME');?> <span class="divider"></span> </h1>
                    <div class="breadcrumb"><a href=" <?php echo esc_url( home_url( '/' ) ); ?> "><?php echo _e('Home', 'STARKY_THEME_NAME'); ?></a> - <span><?php echo _e('Results' ,'STARKY_THEME_NAME');?></span></div>	
                    </div>
			
			 <div class="col-md-9 col-sm-12">
			 
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			
			
				<?php if( get_post_type($post->ID) == 'post' ){ ?>
					

				<article class="result col-md-6">
				<div id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
				<div class="post-title">
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'STARKY_THEME_NAME'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><h2><?php the_title(); ?></h2></a>
				</div><!-- End of Title -->

				<div class="post-meta">
				 Posted at <?php the_time('d'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?>  <span><?php echo __('Blog Post', STARKY_THEME_NAME); ?></span> 
				</div><!-- End of Meta Date -->
				<div class="clearfix"></div>
				</div><!-- End of Post -->	
				</article><!--/search-result-->	
				<?php }
							
				else if( get_post_type($post->ID) == 'page' ){ ?>
				<article class="result col-md-6">			
				<div id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
				<div class="post-title">
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'STARKY_THEME_NAME'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><h2><?php the_title(); ?></h2></a>
				</div><!-- End of Title -->

				<div class="post-meta">
				 Posted at <?php the_time('d'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?>  <span><?php echo __('Page', STARKY_THEME_NAME); ?></span> 
				</div><!-- End of Meta Date -->
				<div class="clearfix"></div>
			</div><!-- End of Post -->
			</article><!--/search-result-->	
							<?php }
							
				else if( get_post_type($post->ID) == 'portfolio' ){ ?>
						<article class="result col-md-6">
						<div id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
							<div class="post-title">
								<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'STARKY_THEME_NAME'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><h2><?php the_title(); ?></h2></a>
							</div><!-- End of Title -->

							<div class="post-meta">
							 Posted at <?php the_time('d'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?> <span><?php echo __('Portfolio Item', STARKY_THEME_NAME); ?></span> 
							</div><!-- End of Meta Date -->
							<div class="clearfix"></div>
							</div><!-- End of Post -->	
							
								</article><!--/search-result-->		
							<?php } else { ?>
								<article class="result col-md-6">
									<div id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
							<div class="post-title">
								<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'STARKY_THEME_NAME'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><h2><?php the_title(); ?></h2></a>
							</div><!-- End of Title -->

							<div class="post-meta">
							 Posted at <?php the_time('d'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?> 
							</div><!-- End of Meta Date -->
							<div class="clearfix"></div>
							</div><!-- End of Post -->	
								</article><!--/search-result-->	
							<?php } ?>

			
		
				<?php endwhile; 
					
				else: ?>
				<h3><?php _e('Search Result For' ,'STARKY_THEME_NAME');?> <?php the_search_query(); ?></h3><br/> 
				<p><?php _e("Oops! Couldn't find what you're looking for!", STARKY_THEME_NAME); ?> </p>
				<div class="clearfix"></div><h4><?php __("Try to search again", STARKY_THEME_NAME); ?> </h4>
				<?php get_search_form(); ?>
				<?php
				endif;
				
				
			if( get_next_posts_link() || get_previous_posts_link() ) { 
				echo '<div class="pagination" id="pagination" data-is-text="'.__("All items loaded", STARKY_THEME_NAME).'">
				      <div class="prev">'.get_previous_posts_link('&laquo; Previous Entries').'</div>
				      <div class="next">'.get_next_posts_link('Next Entries &raquo;','').'</div>
			          </div>';
			
	        }
				?>
                </div>  
              
				
			
				<div class="col-md-3 col-sm-12">
              	<p> <?php get_sidebar(); ?></p>
              	</div>
      
           </div>  
             
            </section>
       
    
			</div>
			</div>
<!--single -->


<?php get_footer(); ?>