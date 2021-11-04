$(document).ready(function(){
	var height = $(window).height();
	var nav_height = $('.nav-logo').height() + $('.nav-bottom').height();
	var header_height = height - nav_height - 25;
	var width = $(window).width();
	if(width > 768){
		$('.header').css('height', header_height);
		$('.carousel').css('height', header_height);
		$('.carousel-inner').css('height', header_height);
		$('.hero').css('height', header_height);
	}
});