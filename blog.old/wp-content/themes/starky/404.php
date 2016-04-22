<?php get_header(); ?>


<!--single -->
	<div class="container">
    	<div class="row">
		
        	<section class="col-md-12  single leftcontent">
			
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="clearfix"></div>
			
			 <div class="top-title col-md-12">
                    <h3 data-animated="fadeIn" ><?php echo _e('Page Not Found' ,'STARKY_THEME_NAME');?> <span class="divider"></span> </h3>
                    <div class="breadcrumb"><a href=" <?php echo esc_url( home_url( '/' ) ); ?> "><?php echo _e('Home', 'STARKY_THEME_NAME'); ?></a> - <span><?php echo _e('404' ,'STARKY_THEME_NAME');?></span></div>	
                    </div>
			
			 <div class="col-md-8">
			 
        	

				
				
                <div class="post">
				<h2 class="single-title"><?php echo _e('Sorry, the page you are looking for does not exist.','STARKY_THEME_NAME'); ?></h2>
				
				
				
				<p><?php echo _e('It Seems you lost your way, Please check your target within the sidebar Links or Try to searh our site','STARKY_THEME_NAME'); ?></p>
				
				 </div>
                </br></br>
		
			
                </div>  
              
				
			
				<div class="col-md-4">
              	<p> <?php get_sidebar(); ?></p>
              	</div>
      
           </div>  
             
            </section>
       
    
			</div>
			</div>
<!--single -->


<?php get_footer(); ?>