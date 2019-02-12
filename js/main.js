   $(document).ready(function () {
	$(".toggle-button").click(function() {

	// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
	$(this).toggleClass("is-active");
	$(".navbar-menu").toggleClass("is-active");

	});
});
