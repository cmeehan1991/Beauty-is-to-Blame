<?php 
$meta_title = wp_title('|', false, '') ? wp_title('|', false, '') : get_bloginfo('title');

$meta_url = get_the_permalink() ? get_the_permalink() : get_bloginfo('url');

$meta_description = get_bloginfo('description');

if(get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true)){
	$meta_description = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
}elseif(get_the_excerpt() && !is_home()){
	$meta_description = get_the_excerpt();
}

$meta_image = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_header_image();

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index,follow">
<meta name="description" content="<?php echo $meta_description; ?>">


<!--Facebook OG tags-->	
<meta property="og:url" content="<?php echo $meta_url; ?>">
<meta property="og:description" content="<?php echo $meta_description; ?>">
<meta property="og:image" content="<?php echo $meta_image; ?>">
<meta property="gb:app_id" content="431068527368139">


