jQuery(document).ready(function($){
	
	/* ------------------- Client Carousel --------------------- */

	$('.clients-carousel').flexslider({
	    animation: "slide",
		easing: "swing",
	    animationLoop: true,
	    itemWidth: 188,
	    itemMargin: 0,
	    minItems: 1,
	    maxItems: 5,
		controlNav: false,
		directionNav: false,
		move: 1
      });


	/* ------------------ Back To Top ------------------- */

	jQuery('#footer-menu-back-to-top a').click(function(){
		jQuery('html, body').animate({scrollTop:0}, 300); 
		return false; 
	});
	
	/* ------------------ Progress Bar ------------------- */	
	$(function() {
		$(".meter > span").each(function() {
			$(this)
			.data("origWidth", $(this).width())
			.width(0)
			.animate({
				width: $(this).data("origWidth")
			}, 1200);
		});
	});

	/* --------------------- Navbar ------------------------ */


        $('.navbar-nav li').removeClass('active');
        var url = window.location;
        $('ul.navbar-nav li a[href="'+ url +'"]').parent().addClass('active');
        //e.preventDefault();

		
			
});


/* ------------------- Parallax --------------------- */

jQuery(document).ready(function($){
	
	$('#da-slider').cslider({
		autoplay	: true,
		bgincrement	: 450
	});

});