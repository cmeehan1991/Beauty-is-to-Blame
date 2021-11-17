<?php 

// Register nav menus
function nav_menus(){
	register_nav_menu( 'primary-header-menu', __('Primary Header Menu', BLOG_TEXTDOMAIN) );
}
add_action('init', 'nav_menus');