<?php

if(function_exists('acf_add_options_page')){

		$main_page = acf_add_options_page(array(
			'page_title' 	=> 'Social Media Settings',
			'menu_title' 	=> 'Site Settings',
			'menu_slug'		=> 'social-media-settings',
			'capability'	=> 'edit_posts',
			'icon_url'		=> 'dashicons-admin-settings',
			'position'		=> 5,
			'redirect'		=> false
		));
	}