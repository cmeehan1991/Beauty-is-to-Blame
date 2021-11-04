<?php
	
add_action('wp_enqueue_scripts', 'aphrodite_jquery');
function aphrodite_jquery(){
	wp_deregister_script('jquery');
	wp_register_script('jquery', BLOG_URI . '/assets/js/global/jquery/jquery-3.3.1.min.js', array(), '3.3.1', false);
	wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'aphrodite_scripts');
function aphrodite_scripts(){	
	wp_enqueue_script('Popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), '1.14.3', false);
	wp_enqueue_script('Bootstrap Javascript', BLOG_URI . '/assets/bootstrap/bootstrap-4.1.1/dist/js/bootstrap.min.js', array('jquery', 'Popper'), '4.1.1', false);
	wp_enqueue_script( 'Select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js', array('jquery'), '4.0.6', false );
	wp_enqueue_script('Navbar', BLOG_URI . '/assets/js/global/navbar.js', array('jquery'), BLOG_VERSION, false);
	wp_enqueue_script('Home', BLOG_URI . '/assets/js/global/homepage.js', array('jquery'), BLOG_VERSION, false);
	wp_enqueue_script('Post', BLOG_URI . '/assets/js/global/post.js', array('jquery', 'Popper.js'), BLOG_VERSION, false);
	wp_enqueue_script('Gallery', BLOG_URI . '/assets/js/global/gallery.js', array('jquery'), BLOG_VERSION, false);
}

add_action('wp_enqueue_scripts', 'aphrodite_styles');
function aphrodite_styles(){
	wp_enqueue_style('Bootstrap CSS', BLOG_URI . '/assets/bootstrap/bootstrap-4.1.1/dist/css/bootstrap.min.css', array(), '4.1.1', false);
	wp_enqueue_style('Font Awesome', BLOG_URI . '/assets/font-awesome-4.7.0/css/font-awesome.min.css', array(), '4.7.0', null);
	wp_enqueue_style('Select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.cs');
	wp_enqueue_style('Google Fonts', 'https://fonts.googleapis.com/css?family=Allura|Homemade+Apple|Parisienne|Sacramento|Satisfy', array(), '', null);
	wp_enqueue_style( 'Global', BLOG_URI . '/assets/styles/css/global.css', array(), BLOG_VERSION, null );
	wp_enqueue_style('Header', BLOG_URI . '/assets/styles/css/header.css', array(), BLOG_VERSION,null);
	wp_enqueue_style( 'Homepage', BLOG_URI . '/assets/styles/css/homepage.css', array(), BLOG_VERSION, null );
	wp_enqueue_style( 'Footer', BLOG_URI . '/assets/styles/css/footer.css', array(), BLOG_VERSION, null );
	wp_enqueue_style( 'Post', BLOG_URI . '/assets/styles/css/post.css', array(), BLOG_VERSION, null );
	wp_enqueue_style( 'Archive', BLOG_URI . '/assets/styles/css/archive.css', array(), BLOG_VERSION, null );
	wp_enqueue_style('Gallery', BLOG_URI . '/assets/styles/css/gallery.css', array(), BLOG_VERSION, null);
}

add_action('admin_enqueue_scripts', 'custom_admin_styles');
function custom_admin_styles(){
	wp_enqueue_style('Google Fonts', 'https://fonts.googleapis.com/css?family=Allura|Homemade+Apple|Parisienne|Raleway|Sacramento|Satisfy', array(), '');
}