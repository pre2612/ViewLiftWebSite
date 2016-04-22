jQuery(function(jQuery) {

	// VARIABLES
	var $thumb_type = jQuery('#starky_thumb_type'),
		$thumb_img = jQuery('.starky_thumb_image'),
		$thumb_galleryimages = jQuery('.starky_thumb_gallery'),
		$thumb_video_id = jQuery('.starky_thumb_video_id'),
		$thumb_video_type = jQuery('.starky_thumb_video_type');

		
		
		
	// with load Thumb Type
	if ($thumb_type.val() == "image") {
			
			$thumb_galleryimages.css('display', 'none');
	
			$thumb_video_id.css('display', 'none');
			$thumb_video_type.css('display', 'none');
	
		} else if($thumb_type.val() == "gallery") {
			$thumb_img.css('display', 'none');

			$thumb_video_id.css('display', 'none');
			$thumb_video_type.css('display', 'none');
	
		}  else if($thumb_type.val() == "video") {
			$thumb_img.css('display', 'none');
			$thumb_galleryimages.css('display', 'none');
	
		} 

		
	// SHOW/HIDE CONFIG
	// thumb Type Change
	$thumb_type.change(function() {
	  if (jQuery(this).val() == "image") {
			$thumb_img.css('display', 'block');

			$thumb_galleryimages.css('display', 'none');
			$thumb_video_id.css('display', 'none');
			$thumb_video_type.css('display', 'none');

			
	  } 
	  else if (jQuery(this).val() == "gallery") {
			$thumb_galleryimages.css('display', 'block');

			$thumb_img.css('display', 'none');
			$thumb_video_id.css('display', 'none');
			$thumb_video_type.css('display', 'none');

	  } 	 

		else if (jQuery(this).val() == "video") {
			$thumb_video_id.css('display', 'block');
			$thumb_video_type.css('display', 'block');

			$thumb_img.css('display', 'none');
			$thumb_galleryimages.css('display', 'none');
	  }
	  

	  
	});
	


	
	

	

});