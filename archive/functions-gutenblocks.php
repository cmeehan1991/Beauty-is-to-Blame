<?php 

add_action('init', 'gutenberg_block');
function gutenberg_block(){
	wp_register_script('testblock.js', BLOG_URI . '/assets/js/gutenberg/testblock.js', array('wp-blocks', 'wp-element'));
	wp_register_style('gutenberg.css', BLOG_URI . '/assets/styles/css/gutenberg.css', array('wp-edit-blocks'), filemtime(BLOG_PATH . '/assets/styles/css/gutenberg.css'));
	register_block_type('gutenberg-boilerplate-es5/rich-text', array(
		'editor_script' => 'testblock.js',
		'editor_style' 	=> 'gutenberg.css',
		'style' 		=> 'gutenberg.css'
		)
	);
}