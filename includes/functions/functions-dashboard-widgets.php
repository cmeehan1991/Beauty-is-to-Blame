<?php 

$current_user = wp_get_current_user();

if(is_super_admin($current_user->ID)){ // Check if the current user is a super admin - Chris, Rebecca, Connor
	add_action('wp_dashboard_setup', 'eu_redirect_urls_widget', 'eu_redirect_urls_callback','eu_submit_redirect_urls');
}

function eu_redirect_urls_callback(){
	
}
function eu_submit_redirect_urls(){
	
}