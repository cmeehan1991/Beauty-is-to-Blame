<?php 

add_action('rest_api_init', function(){
	register_rest_route( 'wp/v2', '/mobile/single/(?P<id>\d+)', array(
		'methods'	=> 'GET', 
		'callback'	=> 'single_blog_post',
	 ) );
	 register_rest_route('wp/v2', '/mobile/posts/', array( //(?P<count>\d+)/(?P<offset>\d+)
		 'methods'	=> 'GET, POST', 
		 'callback'	=> 'mobile_blog_posts',
	 ) );
	 
	 register_rest_route('wp/v2', '/mobile/users/login/', array(
		'methods'	=> 'GET, POST', 
		'callback'	=> 'mobile_user_login' 
	 ) );
	 
	 register_rest_route('wp/v2', '/mobile/users/register', array(
		 'methods'	=> 'POST, GET', 
		 'callback'	=> 'mobile_user_register'
	 ) );
	 
	 register_rest_route('wp/v2', '/mobile/users/posts/save', array(
		 'methods'	=> 'POST, GET', 
		 'callback'	=> 'mobile_user_save_post'
	 ) );
	 
	 register_rest_route('wp/v2', '/mobile/users/posts/saved', array(
		 'methods'	=> 'POST, GET', 
		 'callback'	=> 'mobile_user_get_saved_post'
	 ) );
	 
	 register_rest_route('wp/v2', '/mobile/users/userdata', array(
		 'methods'	=> 'POST, GET', 
		 'callback'	=> 'mobile_user_get_data'
	 ) );
	 
	 register_rest_route('wp/v2', '/mobile/users/profile/update', array(
		 'methods'	=> 'POST, GET', 
		 'callback'	=> 'mobile_users_update_profile',
	 ) );
});

/*
* Update the user's profile information
*/
function mobile_users_update_profile($args){
		
	// Check to make sure there is a user id to update
	if($args['user_id']){
		
		// Set the user args
		$user_args = array(
			'ID'		=> $args['user_id'],
			'first_name'	=> $args['first_name'],
			'last_name'		=> $args['last_name'],
			'description'	=> $args['biography']
		);
		$upload_file = '';
		if($args['profile']){
			
			$upload_dir = wp_upload_dir();
			$upload_path = $upload_dir['path'];
			
						
			$file_name = md5(get_user_by( 'id', $args['user_id'] )->user_login) . '.png';
			
			
			$upload_file = wp_upload_bits( $file_name, null, $args['profile'], date('Y/m') );
			
			$ifp = fopen($upload_file['file'], 'wb');
			
			$data = explode(',', $args['profile']);
			
			fwrite($ifp, base64_decode($data[1]));
			
			fclose($ifp);
			
			//$path = realpath($upload_file['file']);
			
			//file_put_contents($path . '/' . $file_name, $args['profile']);
			
			update_user_meta( $args['user_id'], '_bb_profile_image_url', $upload_file['url'] );
		}
		
		// Update the user
		$success = wp_update_user( $user_args );
		
		
		// Check to make sure an error was not returned. 
		$success = !is_wp_error( $success );
		
	}else{
		
		// Return a false boolean if there is no user ID
		$success = false;
	}
	
	return json_decode(json_encode(array('success' => $success, 'upload_file'	=> $upload_file)));
}



function mobile_user_register($args){
	// These are required
	$username = $args['username'];
	$password = $args['password'];
	$email = $args['email'];
	
	// These are optional
	$nicename = $args['nicename'];
	$first_name = $args['first_name'];
	$last_name = $args['last_name'];
	$description = $args['description'];
	
	// Validate that the required data is present
	if(!isset($username) || !isset($password) || !isset($email)){
		return json_decode(json_encode(array('success'	=> false, 'reason' => 'empty')));
	}
	
	
	// Validate that the user does not already exist
	if(email_exists($email)){
		return json_decode(json_encode(array('success'	=> false, 'reason' => 'email')));
	}
	
	if(username_exists( $username )){
		return json_decode(json_encode(array('success'	=> false, 'reason'	=> 'username')));
	}
	
	$user_args = array(
		'user_pass'	=> $password,
		'user_login'	=> $username,
		'user_nicename'	=> 	$nicename,
		'user_email'	=> $email, 
		'first_name'	=> $first_name, 
		'last_name'		=> $last_name,
		'description'	=> $description, 
		'role'			=> 'subscriber',
	);
	
	$user_id = wp_insert_user( $user_args );
	
	
	
	if(!is_wp_error($user_id)){
		return json_decode(json_encode(array('success'	=> true, 'user_id'	=> $user_id)));		
	}else{
		return json_decode(json_encode(array('success'	=> false, 'reason' => $user_id)));
	}
	
}

/*
* Get the user data
*/
function mobile_user_get_data($args){
	$user_id = $args['user_id'];
	
	$user_info = new WP_User( $user_id );
	
	$user_info = array(
		'first_name' => $user_info->first_name,
		'last_name'	=> $user_info->last_name,
		'email'	=> $user_info->user_email,
		'display_name'	=> $user_info->display_name, 
		'role'		=> $user_info->roles[0],
		'user_registered'	=> $user_info->user_registered,
		'description'	=> get_the_author_meta( 'description', $user_id  ),
		'profile_image_url'	=> get_user_meta( $user_id, '_bb_profile_image_url', true ),
	);
	
	return json_decode(json_encode($user_info));
}

/*
* Add or remove bookmarked posts
*/
function mobile_user_save_post($args){
	$user_id = $args['user_id'];
	$post_id = $args['post_id'];
	$action = $args['action'];
	$user_meta = get_user_meta( $user_id, '_favorite_posts', false );
	
	if($action == 'remove'){
		if(in_array($post_id, $user_meta)){
			$meta_id = delete_user_meta( $user_id, '_favorite_posts', $post_id );
		}
	}
	
	if($action == 'add'){
		if(!in_array($post_id, $user_meta)){
			$meta_id = add_user_meta( $user_id, '_favorite_posts', $post_id );
		}
	}
	
	return json_decode(json_encode(array('action' => $action, 'response'	=> $meta_id)));
	
}

/*
* Get the user's bookemarked posts
*/
function mobile_user_get_saved_posts($args){
	$user_id = $args['user_id'];
	
	$user_meta = get_user_meta( $user_id, '_favoirte_posts', false );
	
	return json_decode(json_encode(array('response' => $user_meta)));
}

/**
* Get the user ID from the username and password
*/
function mobile_user_login($args){
	$username = $args['username'];
	$password = $args['password'];
	
	$user = get_user_by('email',  $username);
	
	if(!$user){
		$user = get_user_by('login', $username);
	}
	
	if(wp_check_password( $password, $user->data->user_pass, $user->data->ID )){
		$ret_val = json_decode(json_encode(array('user_id' => $user->data->ID)), true);
	}else{
		$ret_val = json_decode(json_encode(array('user_id'	=> 0)), true);
	}
	
	return $ret_val;
}

/**
* Get the blog posts
*/
function mobile_blog_posts($args){
	$num_posts = isset($args['count']) ? $args['count'] : 10;
	
	$offset = isset($args['offset']) ? $args['offset'] : 0;
	$posts = get_posts(array(
		'posts_per_page'	=> $num_posts,
		'offset'			=> $offset,	
		
	) );
	
	$ret_posts = array();
	if($posts){
		foreach($posts as $post){
			//var_dump($post);
			array_push($ret_posts, array(
				"post_id"=> $post->ID,
				"post_title"	=> $post->post_title,
				"post_thumbnail"	=> get_the_post_thumbnail_url( $post->ID ),
			) );
		}
	}
	return  json_decode(json_encode($ret_posts), true);
}

/**
* Get a single blog post
*/
function single_blog_post($args){
	
	$post_id = $args['id'];
	$post = get_post( $post_id);
	
	$ret_val = array(
		'post_id'	=> $post->ID,
		'title'	=> $post->post_title,
		'content'	=> wp_specialchars_decode(preg_replace("/[\r\n]+/", "\r\n\n", wp_strip_all_tags($post->post_content))),
		'permalink'	=> get_the_permalink( $post->ID ),
		'thumbnail'	=> get_the_post_thumbnail_url( $post->ID, 'large' ),
		'exclusive'	=> boolval(get_field('is_exclusive', $post->ID)),
	);
	
	
	return json_decode(json_encode($ret_val), true);
}