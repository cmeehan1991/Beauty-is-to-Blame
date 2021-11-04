<?php 

//add_action('add_meta_boxes', 'add_test_meta_box');
//add_action('save_post', 'save_test_meta_box', 10, 1);

function add_test_meta_box(){
	add_meta_box('test-meta-box','Test Meta Box', 'test_meta_box_callback', null, 'side', 'default', array(
		'__block_editor_compatible_meta_box' => false,
	));
}

function test_meta_box_callback($post){
	?>
	<textarea name="post-excerpt" rows="5" style="width:100%"><?php the_excerpt(); ?></textarea>
	<?php 
}

function save_test_meta_box($post_id){
	
}