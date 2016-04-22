<?php 

function starky_custom_css() {
	
	global $starky_options;
	$str_options = get_option('starky_options');
	
	//Color
	$str_color= $str_options['theme_color']; 
	echo '<style type="text/css">
	 a {color: '.$str_color.';}
	.active {color: '.$str_color.' !important;}
	.highlight {color: '.$str_color.';}
	.navbar-nav > li > a:hover, .navbar-nav > li > a:focus{color: '.$str_color.' !important;}
	ul ul li a:hover {color:'.$str_color.';}
	 h4 {color: '.$str_color.';}
	.divider {border-bottom: 5px solid '.$str_color.';}
	.color-overlay {background:'.$str_color.'; opacity:.9;}
	.top-logo {	background: none repeat scroll 0 0 '.$str_color.';}
	.shape {stroke: '.$str_color.';}
	.owl-theme .owl-controls .owl-buttons div{color: '.$str_color.';}
	.more-work {background: none repeat scroll 0 0 '.$str_color.';}
	.component nav a{color: '.$str_color.';}
	.ajax-box .divider {border-bottom: 5px solid '.$str_color.';}
	.ca p {	color: '.$str_color.';}
	.quote {background: none repeat scroll 0 0 '.$str_color.';}
	h4.person span{color: '.$str_color.';}
	#blog .text {color: '.$str_color.';}
	.form-control:focus {border-color: '.$str_color.';	box-shadow: 0 0 0 '.$str_color.';}
	.contact-info i {background: none repeat scroll 0 0 '.$str_color.';}
	.success{background:rgba(155,216,90,.4);border: 1px solid #9bd85a;}
	.error{	background:rgba(252,75,80,.4); border: 1px solid '.$str_color.';}
	.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
	background-color:'.$str_color.';border-color:'.$str_color.';}
	.img-body .date {background:'.$str_color.';opacity:.9; }
	.widget h2{color: '.$str_color.'!important;}
	.tags-list li a:hover {	color: '.$str_color.';}
	.widget a:hover{color:'.$str_color.';}
	.breadcrumb a{color: '.$str_color.'!important;}
	body.single .post-meta a{color: '.$str_color.';}
	.post-title a:hover{color: '.$str_color.';}
	blockquote { border-color: '.$str_color.';}
	.posts-nav a:hover{color: '.$str_color.';}
	.right.next a:hover,.left.prev a:hover{color:'.$str_color.';}
	.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
	background-color: '.$str_color.';	border-color: '.$str_color.';}
	#pagination span.current {background-color: '.$str_color.';border-color: '.$str_color.';}
	.pages li a.current {border: 1px solid '.$str_color.';	color: '.$str_color.';}
	.pages li a:hover {	color: '.$str_color.';}
	.comment-list .reply a{border: 1px solid '.$str_color.'!important; color:'.$str_color.'!important;}
	.comment-list .reply a:hover{background: '.$str_color.'!important; }
	.comment-list .comment-meta a:hover {color: '.$str_color.';}
	#respond input[type=submit]:hover, #respond button[type=submit]:hover {background-color: '.$str_color.';}
	#preloader .bokeh li:nth-child(1) , #preloader .bokeh li:nth-child(2),#preloader .bokeh li:nth-child(3) ,#preloader .bokeh li:nth-child(4){
	background: '.$str_color.'!important;
	}
	</style>';

	

	//Style
	$str_style= $str_options['layout_style']; 
	if($str_style == 'dark'){
		echo '<style type="text/css">
		body, html { background-color: #333; color: #fefefe;}
		a:hover{color:#efefef;}
		.ajax-box {  background: none repeat scroll 0 0 #333;}
		.ha-header {background: #fff!important;}
		 ul ul {background: #fff;}
		.navbar-nav > li > a, .nav-logo a{color:#333!important;}
		ul ul li a {color:#333;}
		.navbar-nav > li > a:hover, .navbar-nav > li > a:focus{color: '.$str_color.' !important;}
		.active {color: '.$str_color.' !important;}
		.breadcrumb,.related{background:#444;}
		footer .nav-logo a{color:#FFF!important;}			
		.collapse.navbar-collapse,.nav.navbar-nav.pull-right{ background: none repeat scroll 0 0 #fff;}
		.widget ul li{color:#EEE;border-bottom:#888;}
		.widget ul li a{color:#efefef;}
		.tagcloud a{color:#efefef;border:1px solid #888;}
		.post-meta{background:none;border:1px solid #DDD;}
		blockquote p{color:#efefef;}
		.comment-list li.comment > div, .comment-list li.pingback > div{ border: 1px solid #888;}
		#respond input[type="text"], #respond textarea, #respond input[type="email"], #respond input[type="password"], #respond input[type="tel"], #respond input[type="url"], #respond input[type="search"], #respond input[type="date"] {
		color:#EEE;
		}
		#respond input[type="submit"], #respond button[type="submit"]{color:#FFF!important;}
		.posts-nav a {border: 1px solid #dddddd;  color: #fff;background:none;}
		#wp-calendar tbody td{background:none;}
		.widget,#wp-calendar caption{color:#FFF;}
		#sidebar select { background: none; border: 1px solid #888; color: #eee;}
		body.search .result h2{color:#EFEFEF!important;}
		.post.sticky{background:#222;}
	</style>';
	} 
	
		
	//custom css
	if(!empty($str_options["custom-css"])){
		echo '<style type="text/css">' . $str_options["custom-css"] . '</style>';
	} 

}

add_action('wp_head', 'starky_custom_css');

?>