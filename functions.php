<?php

DEFINE('BLOG_URI', get_template_directory_uri());
DEFINE('BLOG_PATH', get_template_directory());
DEFINE('BLOG_TEXTDOMAIN', 'aphrodite');
DEFINE('BLOG_VERSION', '0.0.1');

// Required
include(BLOG_PATH . '/includes/functions/functions-assets.php');
include(BLOG_PATH . '/includes/functions/functions-menus.php');
include(BLOG_PATH . '/includes/functions/functions-supports.php');
include(BLOG_PATH . '/includes/functions/functions-sidebars.php');

// Custom walkers
include(BLOG_PATH . '/includes/walkers/WPNavMenuWalker.php'); // Nav menu walker
