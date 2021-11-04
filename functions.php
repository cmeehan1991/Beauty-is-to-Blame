<?php

DEFINE('BLOG_URI', get_template_directory_uri());
DEFINE('BLOG_PATH', get_template_directory());
DEFINE('BLOG_TEXTOMDAIN', 'aphrodite');
DEFINE('BLOG_VERSION', '0.0.1');

// Required
include(BLOG_PATH . '/includes/functions/functions-assets.php');
include(BLOG_PATH . '/includes/functions/functions-menus.php');
include(BLOG_PATH . '/includes/functions/functions-metaboxes.php');
include(BLOG_PATH . '/includes/functions/functions-supports.php');
//include(BLOG_PATH . '/includes/functions/functions-gutenblocks.php');
include(BLOG_PATH . '/includes/functions/functions-admin.php');
include(BLOG_PATH . '/includes/functions/functions-shortcode.php');
include(BLOG_PATH . '/includes/functions/functions-widgets.php');
include(BLOG_PATH . '/includes/functions/functions-rest.php');


// Custom walkers
include(BLOG_PATH . '/includes/walkers/WPNavMenuWalker.php'); // Nav menu walker

// hide the admin bar
show_admin_bar( false );