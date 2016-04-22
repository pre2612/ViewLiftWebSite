<?php get_header(); ?>
<!--Archive -->
<section class="blog-main">
	<div class="container">
    	<div class="row">
        	 <?php if (!is_front_page()) { ?>	
					<div class="top-title col-md-12 single">
                    <h1 data-animated="fadeIn" >

                  <?php if(is_author()){

							printf( __( 'All posts by %s', STARKY_THEME_NAME ), get_the_author() );

						} else if(is_category()) {

							printf( __( 'Category Archives: %s', STARKY_THEME_NAME ), single_cat_title( '', false ) );

						} else if(is_date()){

							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', STARKY_THEME_NAME ), get_the_date() );

							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', STARKY_THEME_NAME ), get_the_date( _x( 'F Y', 'monthly archives date format', STARKY_THEME_NAME ) ) );

							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', STARKY_THEME_NAME ), get_the_date( _x( 'Y', 'yearly archives date format', STARKY_THEME_NAME ) ) );

							else :
								_e( 'Archives', STARKY_THEME_NAME );

							endif;
						} else {
							wp_title("",true); 
						} ?>

					<?php
					  global $post;
					  $str_page_for_posts = get_option( 'page_for_posts' );
					  ?>
					<span class="divider"></span> </h1>
                    	<div class="breadcrumb"><a href="<?php echo get_permalink( $str_page_for_posts ); ?>"><?php echo _e('bolg', 'STARKY_THEME_NAME'); ?></a></div>
                    </div>
                    <div class="clearfix"></div>
			<?php } ?>
			
			<div class="col-md-9">
			
			
			  <?php
				global $starky_options;
				$str_items = get_option( 'posts_per_page'); 
				if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
				elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
				else { $paged = 1; }
	
					$str_args = array(
						'post_type' => 'post',
						'paged' => $paged,
						'posts_per_page' => $str_items,
					);
		
					$posts = new WP_Query($str_args);

			  if( $posts->have_posts() ) : while ($posts->have_posts()) : $posts->the_post(); 
                  get_template_part( 'post-format/content' ); 
				endwhile;  ?>
				 <div class="clearfix"></div>
				<?php
				starky_pagination($posts->max_num_pages, $range = 2);	
				else : ?>
                    <h2><?php _e('No Posts Found', STARKY_THEME_NAME) ?></h2>
                    <?php
                endif; 
                wp_reset_query();
				?>
											
                 <div class="clearfix"></div>
				 </div>
				  <div class="col-md-3">
				    <?php get_sidebar(); ?>
				  </div>

        </div>
    </div>
</section><!--END SECTION -->
<?php get_footer(); ?>