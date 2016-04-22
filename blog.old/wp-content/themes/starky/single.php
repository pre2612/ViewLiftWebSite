<?php get_header(); ?>


<!--single -->
	<div class="container">
    	<div class="row">
        	<section class="col-md-12  single leftcontent">
        		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			 <?php if ( has_post_thumbnail()) {
  $str_imgpost = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "full" );
 }
  else { $str_imgpost = " ";} ?> 
  
  <?php
   global $post;
  $str_page_for_posts = get_option( 'page_for_posts' );
  ?>
  
  
                <div class="top-title col-md-12">
                    <h1 data-animated="fadeIn" ><?php the_title(); ?> <span class="divider"></span> </h1>
                    	<div class="breadcrumb"><a href="<?php echo get_permalink( $str_page_for_posts ); ?>"><?php echo _e('bolg', 'STARKY_THEME_NAME'); ?></a> - <span><?php the_title(); ?></span></div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="post">
     
                       
					
					 
					 <div class="col-md-9">
					 
					<div class="img-body">
                    		<img src="<?php echo $str_imgpost[0]; ?>" alt="" class="img-responsive" />
                          
                        </div>
					
						
					   <h2 class="single-title"><?php the_title(); ?></h2>
					   
					   	
						<div class="post-meta">
	<?php _e('Posted at ', 'STARKY_THEME_NAME');?>  <?php the_time('d');?>  <?php the_time('M'); ?>  <?php the_time('Y'); ?> , <?php _e('By ', 'STARKY_THEME_NAME');  the_author_posts_link(); _e(' Categories: ', 'STARKY_THEME_NAME');  the_category(', '); ?> <span><?php if ( comments_open() ) { comments_popup_link(__('<i class="fa fa-comments-o"></i> 0', 'STARKY_THEME_NAME'), __('<i class="fa fa-comments-o"></i> 1', 'STARKY_THEME_NAME'), __('<i class="fa fa-comments-o"></i> %', 'STARKY_THEME_NAME'), 'comments-link', ''); } ?></span>
	</div><!-- End of Meta Date -->
                   
					<p><?php the_content(); ?></p>
                    </br></br>      
					<p class="post-tags"><?php the_tags(); ?></p>
					<div class="clearfix"></div>
					<div class="posts-nav clearfix">
						<div class="right next"><?php next_post_link('%link',  '%title <i class="fa fa-long-arrow-right"></i>', FALSE); ?> </div>        
						<div class="left prev"><?php previous_post_link('%link',  '<i class="fa fa-long-arrow-left"></i> %title', FALSE); ?></div>
					 </div>   
					<?php comments_template(); ?>
					</div>
					
					 <div class="col-md-3">
              	<p> <?php get_sidebar(); ?></p>
              	</div>
              	<div class="clearfix"></div>
					 
					 
					
					 
					 <?php endwhile; endif; ?>
                    
                 
                    
              	<div class="clearfix"></div>
               
              
                <?php
//for use in the loop, list 5 post titles related to first tag on current post
$str_tags = wp_get_post_tags($post->ID);
if ($str_tags) {
  $str_first_tag = $str_tags[0]->term_id;
  $str_args=array(
    'tag__in' => array($str_first_tag),
    'post__not_in' => array($post->ID),
    'showposts'=>3,
    'ignore_sticky_posts'=>1
   );
  $str_my_query = new WP_Query($str_args);
  if( $str_my_query->have_posts() ) { ?>
    <div class="col-md-12"> 
     <div class="related"> 
	  <div class="col-md-12">
	 <h5><?php echo _e('Related Posts',STARKY_THEME_NAME);?></h5><div class="clearfix"></div></div>
	 <?php
    while ($str_my_query->have_posts()) : $str_my_query->the_post(); ?>
     <?php 
 if ( has_post_thumbnail()) {
  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "medium" );
  ?>
<div class="col-md-4">
                    	<a href="<?php the_permalink() ?>">
                        	<img src="<?php echo $imgsrc[0]; ?>" class="img-responsive fade" alt="" />
                            <br />
                           <p> <?php the_title(); ?></p> 
                        </a>
                    </div>
      <?php
 }

    endwhile;
  } ?>
    <div class="clearfix"></div>
     </div>  <div class="clearfix"></div></div> 
  <?php
}
?>
                
                
        
           </div>
                
                 
    
            </section>
        </div>
    </div>
<!--single -->


<?php get_footer(); ?>