<?php 
	
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
add_theme_support('automatic-feed-links');
add_theme_support('html5', array('comment-list', 'comment-form','search-form','gallery','gallery', 'caption'));
add_theme_support('title-tag');
add_theme_support('custom-header');
add_theme_support('woocommerce');

function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

add_filter('excerpt_more', 'excerpt_read_more');
function excerpt_read_more($more){
	return '';
}

add_filter('comment_form_default_fields', 'remove_website_field');
function remove_website_field($fields){
	unset($fields['url']);
	return $fields;
}