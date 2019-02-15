$(document).ready(function () {
	$(".toggle-button").click(function() {

		// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
		$(this).toggleClass("is-active");
		$(".mobile-menu").toggleClass("is-active");

	});

	var homeswiper = new Swiper('#swiper-home', {
	loop:true,
	allowTouchMove:false,
	});
    
    swiperThumbs(homeswiper, {
        // Our default options
        element: 'c11',
        activeClass: 'swiper-pagination-bullet-active',
        scope: '.home-slider' // Parent selector that surrounds your Swiper html & Swiper thumbnail html to support multiple Swiper instances on one page.
    });

});

$('.home-slider').imagesLoaded( function() {
  $('.home-slider').addClass('images-loaded');
});

