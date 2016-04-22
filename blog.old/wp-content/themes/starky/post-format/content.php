<div id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>

	<?php if ( has_post_thumbnail() ) { ?>

	<div class="post-media">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'STARKY_THEME_NAME'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
			<?php the_post_thumbnail('blog-large'); ?>
		</a>
	</div>
    
	<?php } if ( has_post_thumbnail() == '' ) { ?>
    
	<div class="post-media">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'STARKY_THEME_NAME'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><div class="no-post-image"></div></a>
	</div>
	<?php } ?>
	<div class="post-txt">
	<div class="post-title">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'STARKY_THEME_NAME'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><h4><?php the_title(); ?></h2></a>
	</div><!-- End of Title -->

	<div class="post-meta">
	 Posted at <?php the_time('d'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?> , <?php _e(' ', 'STARKY_THEME_NAME'); the_category(', '); ?> <span><?php if ( comments_open() ) { comments_popup_link(__('<i class="fa fa-comments-o"></i> 0', 'STARKY_THEME_NAME'), __('<i class="fa fa-comments-o"></i> 1', 'STARKY_THEME_NAME'), __('<i class="fa fa-comments-o"></i> %', 'STARKY_THEME_NAME'), 'comments-link', ''); } ?></span> 
	</div><!-- End of Meta Date -->

	<div class="post-content">
		
		
		 <?php
              //if no excerpt is set

               global $post;

              if(empty( $post->post_excerpt )) {

              the_content('<div class="clearfix"></div><span class="continue-reading">'. __("Read More", STARKY_THEME_NAME) . '</span>');

                                                                }

                                                               

                                                                //excerpt

                                                                else {

                                                                                echo '<div class="excerpt">';

                                                                                                the_excerpt();

                                                                                echo '</div>';

                                                                                echo '<div class="clearfix"></div><a class="continue-reading" href="' . get_permalink() . '"><span class="continue-reading">'. __("Read More", STARKY_THEME_NAME) .'</span></a>';

                                                                }

                                                               

                                                                ?>
        <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>   
	</div><!-- End of Content -->
	</div><!-- End of txt -->
    <!-- End of Tags -->

</div><!-- End of Post -->


