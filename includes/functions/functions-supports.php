<?php 
	
add_theme_support('post-thumbnails');
add_theme_support('custom-logo', array(
	'height' => 200, 
	'width' => 600, 
	'flex-height' => true,
	'flex-width' => true,
));
add_theme_support('automatic-feed-links');
add_theme_support('html5', array('comment-list', 'comment-form','search-form','gallery','gallery', 'caption'));
add_theme_support('title-tag');
add_theme_support('custom-header');
add_filter('mce_buttons_2', 'fonts_mce_editor');
function fonts_mce_editor($buttons){
	array_unshift($buttons, 'fontselect');
	return $buttons;
}

add_filter('tiny_mce_before_init', 'load_custom_fonts');
function load_custom_fonts($init){
	$custom_fonts_url = 'https://fonts.googleapis.com/css?family=Allura|Homemade+Apple|Parisienne|Sacramento|Satisfy';
	if(empty($init['content_css'])){
		$init['content_css'] = $stylesheet_url;
	}else{
		$init['content_css'] = $init['content_css'] . ',' . $custom_fonts_url;
	}
	
	$font_formats = isset($init['font_formats']) ? $init['font_formats'] : 'Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';
	
	$custom_fonts = ';' . 'Allura=Allura;Homemade\ Apple=Homemade\ Apple;Parisienne=Parisienne;Raleway=Raleway;Sacramento=Sacramento;Satisfy=Satisfy';
	
	$init['font_formats'] = $font_formats . $custom_fonts;
	
	return $init;
}

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