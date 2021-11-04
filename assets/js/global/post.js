$(document).ready(function(){
	$('.next-post-link, .previous-post-link').hover(function(){
		$(this).popover('toggle');
	});
});