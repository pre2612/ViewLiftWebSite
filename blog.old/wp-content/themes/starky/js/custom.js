// JavaScript Document
jQuery(document).ready(function($) {
   'use strict';		 

/* parallax
================================================== */
   
   	if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	

	$('.parallax-background').each(function(){
	   $(this).parallax("50%",.1);
	});
		
	
		$('.navbar .dropdown').hover(function() {
	  $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
	}, function() {
	  $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp()
	});
		
	
	}

	/* animated
================================================== */
	
	 $('*[data-animated]').addClass('animated');
            function animated_contents() {
                $(".animated:appeared").each(function (i) {
                    var $this    = $(this),
                        animated = $(this).data('animated');

                    setTimeout(function () {
                        $this.addClass(animated);
                    }, 50 * i);

                });
            }

            animated_contents();
            $(window).scroll(function () {
                animated_contents();
            });
	

	

   
/* Nav Bar
================================================== */
		
		var $header = $( '#header-menu' );
		$( '.ha-waypoint' ).each( function(i) {
			var $this = $( this ),
				animClassDown = $this.data( 'animateDown' ),
				animClassUp = $this.data( 'animateUp' );
			
			$this.waypoint(function(direction) {
				
				if( direction === 'down' && animClassDown ) {
					$header.attr('class', 'ha-header ' + animClassDown );
					 setTimeout(function(){$.waypoints('refresh');},1000);
				}
				else if( direction === 'up' && animClassUp ){
					$header.attr('class', 'ha-header ' + animClassUp );
					 setTimeout(function(){$.waypoints('refresh');},1000);
				}			
			
			}, { offset: '0' } );
			
		});



/* scrollIt
================================================== */	
	
$(function(){
	$.scrollIt({
	  upKey: 38,             // key code to navigate to the next section
	  downKey: 40,           // key code to navigate to the previous section
	  easing: 'linear',      // the easing function for animation
	  scrollTime: 900,       // how long (in ms) the animation takes
	  activeClass: 'active', // class given to the active nav element
	  onPageChange: null,    // function(pageIndex) that is called when page is changed
	 // topOffset: -2           // offste (in px) for fixed top navigation
	});
});



			
/* nicescroll
================================================== */		
var $smoothActive = $('body').attr('data-smooth-scrolling'); 
if( $smoothActive == 1){ niceScrollInit(); }
  function niceScrollInit() { 
    $("html").niceScroll();
  }


	
/* owlCarousel
================================================== */	

   $("#owl-demo-1").owlCarousel({
    items : 4,
    lazyLoad : true,
    navigation : true,
	navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
  }); 
  
  $("#owl-demo-2").owlCarousel({
    items : 4,
    lazyLoad : true,
    navigation : true,
	autoPlay : 6000,
	navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
  });
  
   $("#owl-demo").owlCarousel({
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
	  pagination:true,
	  autoPlay : 5000,
	  navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
  });
  
  
   $("#owl-demo-5").owlCarousel({
      navigation : false, // Show next and prev buttons
      slideSpeed : 400,
      paginationSpeed : 500,
      singleItem:true,
	  pagination:false,
	  autoPlay : 5000,
	  transitionStyle : "fade"
  }); 
  



/* Ajax work
================================================== */ 

    $('.hoveritem').click(function (event) {
        event.preventDefault();

        if ($('.ajax-box').hasClass('open-box')) {
            $('.ajax-box').addClass('closed-box');
            $('.ajax-box').removeClass('open-box');
        }

        var fileID = $(this).attr('data-project');

        if (fileID != null) {
            $('html,body').animate({
                scrollTop: $('.ajax-box').offset().top - 70
            }, 500);

        }

        $.ajax({
            url: fileID
        }).success(function (data) {
            $('.ajax-box').addClass('open-box');
            $('.ajax-box').html(data);
            $('.ajax-box').removeClass('closed-box');

            $('.close-work').click(function () {
                $('.ajax-box').addClass('closed-box');
                $('.ajax-box').removeClass('open-box');
                $('html,body').animate({
                    scrollTop: $('.work').offset().top - 70
                }, 500);
                setTimeout(function () {
                    $('.ajax-box').html('');
                }, 1000);
            });
        });

    });
	

/* fittext
================================================== */ 	


	//$(".fittext2").fitText(1.1, { minFontSize: '15px', maxFontSize: '22px' });
	
	$('.fittext1').each(function(){
	   $(this).fitText(1.1, { minFontSize: '30px', maxFontSize: '75px' });
	});
	

/* fitvid
================================================== */ 		
$('.fitvid').each(function(){
	$(this).fitVids();
	});	

	
/* chart
================================================== */ 
 function initPieCharts() {

        var chart = $('.chart');
        chart.appear();

 

        chart.each(function() {

            $(this).on('appear', function() {

 

                var $this = $(this),
				chartBarColor = ($this.data('barcolor')) ? $this.data('barcolor') : "#FC4B50";
    

                if( !$this.hasClass('pie-chart-loaded') ) {

                    $this.easyPieChart({
                    animate: 2000,
					barColor: chartBarColor,
					trackColor: '#1b1f24',
					scaleColor: '',
					scaleLength: 5,
					lineCap: 'square',
					lineWidth: 10,
					size: 120,
					rotate: 10,
					
					onStep: function(from, to, percent) {
					$(this.el).find('.percent').text(Math.round(percent));
					}
					
                    }).addClass('pie-chart-loaded');

                }

               

            });

        });

       

    }

  initPieCharts();
	
/* placeholder
================================================== */ 	
	
$('[placeholder]').focus(function() {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
            input.val('');
            input.removeClass('placeholder');
        }
    }).blur(function() {
        var input = $(this);
        if (input.val() == '' || input.val() == input.attr('placeholder')) {
            input.addClass('placeholder');
            input.val(input.attr('placeholder'));
        }
    }).blur();
    $('[placeholder]').parents('form').submit(function() {
        $(this).find('[placeholder]').each(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
            }
        })
    });
	
/* YTPlayer
================================================== */ 	
	$('.player').each(function(){
	   $(this).mb_YTPlayer();
	});

	
		
});
//End Document.ready   

/* preloader
================================================== */ 
jQuery(window).load(function() { // makes sure the whole site is loaded
	'use strict';
	jQuery('#status').fadeOut(); // will first fade out the loading animation
	jQuery('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
	jQuery('body').delay(350).css({'overflow':'visible'});
})

