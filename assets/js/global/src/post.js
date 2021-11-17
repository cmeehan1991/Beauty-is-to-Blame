var $ = require('jquery');

$(document).ready(function(){
	console.log('hello, world');
	
	$('.comment-reply-login').on('click', function(e){
		e.preventDefault();
		window.location.href = './my-account'
	})
});

