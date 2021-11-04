<?php 

// Register nav menus
function nav_menus(){
	register_nav_menus(array(
		'top-navigation' => 'Header Menu',
		'right-top-navigation' => 'Right Header Menu',
		)
	);
}
add_action('init', 'nav_menus');