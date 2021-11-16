<?php
	
add_action('widgets_init', 'vinezia_sidebar_widgets');
function vinezia_sidebar_widgets(){
	register_sidebar(array(
		'name' 			=> 'Home Right Sidebar',
		'id'			=> 'home_right_sidebar',
		'before_widget'	=> '<div class="sidebar__home-right col-md-12"><div class="sidebar-content-wrapper">',
		'after_widget'	=> '</div></div>',
		'before_title'	=> '<h2 class="sidebar__home-right-title">',
		'after_title'	=> '</h2>'
	));
	
	register_sidebar(array(
		'name'			=> 'Internal Sidebar', 
		'id'			=> 'internal_sidebar', 
		'before_widget'	=> '<div class="internal-sidebar">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="internal-sidebar__title">',
		'after_title'	=> '</h2>'
	));
}