<?php

		define( 'WP_USE_THEMES', false );
		$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
		require_once( $parse_uri[0] . 'wp-load.php' );

		
		global $wpdb; // this is how you get access to the database
		global $starky_options;
        $str_options = get_option('starky_options');
		$str_email = $str_options['contact-email'];
		$str_siteName = get_bloginfo( 'name' );
		
	
if($_POST)
{
	$str_to_Email   	= $str_email; //Replace with recipient email address
	$str_subject        =  $str_siteName.' Contact us'; //Subject line for emails
	
	
	//check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	
		//exit script outputting json data
		$str_output = json_encode(
		array(
			'type'=>'error', 
			'text' => __('Request must come from Ajax', STARKY_THEME_NAME)
		));
		
		die($str_output);
    } 
	
	//check $_POST vars are set, exit if any missing
	if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userPhone"]) || !isset($_POST["userMessage"]))
	{
		$str_output = json_encode(array('type'=>'error', 'text' => __('Input fields are empty!', STARKY_THEME_NAME) ));
		die($str_output);
	}

	//Sanitize input data using PHP filter_var().
	$str_user_Name        = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
	$str_user_Email       = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
	$str_user_Phone       = filter_var($_POST["userPhone"], FILTER_SANITIZE_STRING);
	$str_user_Message     = filter_var($_POST["userMessage"], FILTER_SANITIZE_STRING);
	
	//additional php validation
	if(strlen($str_user_Name)<4) // If length is less than 4 it will throw an HTTP error.
	{
		$str_output = json_encode(array('type'=>'error', 'text' => __('Name is too short or empty!', STARKY_THEME_NAME) ));
		die($str_output);
	}
	if(!filter_var($str_user_Email, FILTER_VALIDATE_EMAIL)) //email validation
	{
		$str_output = json_encode(array('type'=>'error', 'text' => __('Please enter a valid email!', STARKY_THEME_NAME)));
		die($str_output);
	}
	 if(!is_numeric($str_user_Phone)) //check entered data is numbers
	 {
	 	$str_output = json_encode(array('type'=>'error', 'text' => 'Only numbers allowed in phone field'));
	 	die($str_output);
	 }
	if(strlen($str_user_Message)<5) //check emtpy message
	{
		$str_output = json_encode(array('type'=>'error', 'text' => __('Too short message! Please enter something.', STARKY_THEME_NAME)));
		die($str_output);
	}
	
	//proceed with PHP email.
	$headers = 'From: '.$str_user_Email.'' . "\r\n" .
	'Reply-To: '.$str_user_Email.'' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	
	$str_fullmsg = "From: ".$str_user_Name."\r\nEmail:".$str_user_Email."\r\nPhone:".$str_user_Phone."\r\nMessage:".$str_user_Message;
	
	$sentMail = wp_mail($str_to_Email, $str_subject, $str_fullmsg, $headers);
	
	if(!$sentMail)
	{
		$str_output = json_encode(array('type'=>'error', 'text' => __('Could not send mail! Please check your PHP mail configuration.', STARKY_THEME_NAME) ));
		die($str_output);
	}else{
	
		$str_output = json_encode(array('type'=>'message', 'text' => __('Thank you ', STARKY_THEME_NAME) .' ' .$str_user_Name . ' ' . __('for your Message', STARKY_THEME_NAME) ));
		die($str_output);
	}
}
?>