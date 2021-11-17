<?php
	

add_action('wp_enqueue_scripts', 'venezia_scripts');
function venezia_scripts(){	
	wp_enqueue_script('allscripts', BLOG_URI . '/assets/js/global/dist/allscripts.js', array(), BLOG_VERSION, true);
}

add_action('wp_enqueue_scripts', 'venezia_styles');
function venezia_styles(){
	wp_enqueue_style('allstyles', BLOG_URI . '/assets/styles/css/dist/allstyles.css', array(), BLOG_VERSION, false);
	wp_enqueue_style('Google Fonts', 'https://fonts.googleapis.com/css2?family=Allura&family=Homemade+Apple&family=Parisienne&family=Raleway&family=Raleway+Dots&family=Sacramento&family=Satisfy&display=swap', array(), '');
}


add_action('wp_enqueue_scripts', 'venezia_enqueue_comment_reply');
function venezia_enqueue_comment_reply(){
	if(is_singular() && comments_open() && get_option('thread_comments')){
		wp_enqueue_script('comment-reply');
	}
}