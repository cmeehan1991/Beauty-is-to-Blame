<?php 
add_action('widgets_init', 'vinezia_register_sidebars');
function vinezia_register_sidebars(){
	register_sidebar( array(
		'name'	=> __('Left Footer Sidebar', BLOG_TEXTDOMAIN),
		'id'	=> 'left-footer-sidebar',
		'description'	=> __('', BLOG_TEXTDOMAIN),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',	
	) );
	register_sidebar( array(
		'name'	=> __('Middle Footer Sidebar', BLOG_TEXTDOMAIN),
		'id'	=> 'middle-footer-sidebar',
		'description'	=> __('', BLOG_TEXTDOMAIN),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',	
	) );
	register_sidebar( array(
		'name'	=> __('Right Footer Sidebar', BLOG_TEXTDOMAIN),
		'id'	=> 'right-footer-sidebar',
		'description'	=> __('', BLOG_TEXTDOMAIN),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',	
	) );
	
	register_sidebar( array(
		'name'	=> __('Secondary Header Sidebar', BLOG_TEXTDOMAIN),
		'id'	=> 'secondary-header-sidebar',
		'description'	=> __('', BLOG_TEXTDOMAIN),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',	
	) );
}