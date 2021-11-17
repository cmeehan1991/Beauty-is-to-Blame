<div class="row comments-section--title">
	<h2>Comments</h2>
</div>
<div class="row comments-section--comments">
	<?php comments_template(); ?>
	
	
	<?php 	
	$post_id = $args['post_id'];
	
	$comments_args = array(
		'post_id'	=> $post_id
	);
	
	$comments =  get_comments($comments_args); 
	
	
	if($comments){ ?>
		<ul class="post_comments">
		<?php
		
		foreach($comments as $comment){ ?>
			<?php if($comment->comment_parent == 0){ ?>
				<li class="post_comments--comment">
					<span class="post_comments--comment-content">
						<?php echo $comment->comment_content; ?>
					</span>
					<span class="post_comments--comment-author">
						<?php echo $comment->comment_author; ?>
					</span>
					<?php if(is_user_logged_in()){ ?>
						<span class="post_comments--comment-actions">
							<?php 							
							$comment_id = $comment->comment_ID;
							
							$max_depth = get_option('thread_comments_depth');
							
							$depth = $comment->comment_parent;
							
							echo $depth;
																				
							$reply_to_args = array(
								'add_below'		=> 'comment', 
								'respond_id'	=> 'respond', 
								'reply_text'	=> __('Reply', BLOG_TEXTDOMAIN),
								'login_text'	=> __('Log in to reply', BLOG_TEXTDOMAIN),
								'depth'			=> 2, 
								'before'		=> '',
								'after'			=> '', 
								'max_depth'		=> $max_depth
							);
							
							comment_reply_link( $reply_to_args, $comment_id, $post_id )
							
							?>
						</span>
					<?php } ?>
					<?php 
					
					$children = $comment->get_children();
					
					if($children){ 
					?>
						<ul class="post_comments--comment-children">
							<?php foreach($children as $child){ ?>
							<li class="post_comments--child-comment">
								<span class="post_comments--comment-content">
								<?php echo $child->comment_content; ?>
								</span>
								<span class="post_comments--comment-author">
									<?php echo $child->comment_author; ?>
								</span>
							</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</li>
			<?php }?>
		<?php }	?>
		</ul>
		<?php if(is_user_logged_in()){
			comment_form();
		} ?>
	
	<?php } ?>
	
</div>
	
	
	