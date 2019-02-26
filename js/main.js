$(document).ready(function () {
	$(".toggle-button").click(function() {

		// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
		$(this).toggleClass("is-active");
		$(".mobile-menu").toggleClass("is-active");

	});

	$(".toggle-search").click(function() {

		// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
		$(this).toggleClass("is-active");
		$(".search-overlay").toggleClass("search-overlay-open");

	});

	$(".close-search").click(function() {

		// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
		$(".toggle-search").removeClass("is-active");
		$(".search-overlay").removeClass("search-overlay-open");

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


	var authorswiper = new Swiper('#swiper-author', {
	loop:false,
    slidesPerView: 5,
    spaceBetween: 10,
     breakpoints: {
        1024: {
          slidesPerView: 'auto',
          spaceBetween: 10,
        },
    },

	  navigation: {
	    nextEl: '.swiper-button-next',
	    prevEl: '.swiper-button-prev',
	  },

	});

   
	$(".author-slide").hover(function(){
		var dataid = $(this).data("id");	
		$('.text-default').removeClass("active");
		$('#author-'+ dataid).addClass("active");
		console.log(dataid);
		},function(){
		$('.author-content_text').removeClass("active");
		$('.text-default').addClass("active");
	});

$('.home-slider').imagesLoaded( function() {
  $('.home-slider').addClass('images-loaded');

});


  $('.tab_content').hide();
  $('.tab_content:first').show();
  $('.pdb-tabs button:first').addClass('current');

  $('.pdb-tabs button').click(function(event) {
    $('.pdb-tabs button').removeClass('current');
    $(this).addClass('current');
    $('.tab_content').hide();

    var selectTab = $(this).data("id");

    $("#"+selectTab).fadeIn();
  });

});

