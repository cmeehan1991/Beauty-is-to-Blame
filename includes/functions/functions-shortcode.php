<?php 
	
add_shortcode('blog_posts', 'posts_shortcode');
function posts_shortcode($atts){
	$a = shortcode_atts(array(
		'post_id' => array(),
		'num_posts' => 5
	), $atts);
	
	$content = "<ul class='blog-posts__list'>";
	$args = array(
		'num_posts' => $a['num_posts'],
		'include'	=> $a['post_id'],
		'orderby'	=> 'date', 
		'order'		=> 'DESC',
		'post_type'	=> 'post'
	);
	
	$posts = get_posts($args);
	
	if($posts){
		foreach($posts as $post){
			setup_postdata($post);
			$content .= "<li class='blog-posts__list-item'>";
			$content .= "<h2 class='blog-posts__list-item-title'><a href='" . get_permalink($post->ID) . "'>" . get_the_title($post->ID) . "</a></h2>";
			$content .= "<a class='blog-posts__list-item-image-wrapper' href='" . get_permalink($post->ID) . "'><img class='blog-posts__list-item-image' src='" . get_the_post_thumbnail_url($post->ID) . "''></a>";
			$content .= "<p class='blog-posts__list-item-excerpt'>" . get_the_excerpt($post->ID) . "<a class='excerpt__read-more-button btn btn-light' href='" . get_permalink($post->ID) . "'>Read More</a></p>";
			$content .= "</li></a>";
		}
	}
	
	$content .= "</ul>";
	return $content;
}