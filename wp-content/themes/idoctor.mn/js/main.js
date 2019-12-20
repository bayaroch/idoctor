

var $ = jQuery.noConflict();
$(function() {



  
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

  var $all_oembed_videos = $("iframe[src*='youtube']");
  
  $all_oembed_videos.each(function() {
    
    $(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
    
  });

  $(window).on('resize', function(){
   $all_oembed_videos.each(function() {
    
    $(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
    
  });
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
   slidesPerView: 'auto',
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


  $('.img-parallax').each(function(){
    var img = $(this);
    var imgParent = $(this).parent();
    function parallaxImg () {
      var speed = img.data('speed');
      var imgY = imgParent.offset().top;
      var winY = $(this).scrollTop();
      var winH = $(this).height();
      var parentH = imgParent.innerHeight();


    // The next pixel to show on screen      
    var winBottom = winY + winH;

    // If block is shown on screen
    if (winBottom > imgY && winY < imgY + parentH) {
      // Number of pixels shown after block appear
      var imgBottom = ((winBottom - imgY) * speed);
      // Max number of pixels until block disappear
      var imgTop = winH + parentH;
      // Porcentage between start showing until disappearing
      var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
    }
    img.css({
      top: imgPercent + '%',
      transform: 'translate(-50%, -' + imgPercent + '%)'
    });
  }
  $(document).on({
    scroll: function () {
      parallaxImg();
    }, ready: function () {
      parallaxImg();
    }
  });
});

});

$('.post-image').imagesLoaded( function() {
  $('.image-wrapper').addClass('loaded');




});

