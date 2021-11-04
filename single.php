<?php get_header();
if(have_posts()): while(have_posts()): the_post(); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<h1 class="post-title"><?php the_title(); ?></h1>
		</div>
	</div>
	<?php if(has_post_thumbnail()): ?>
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="post-header">
				<img src="<?php the_post_thumbnail_url()?>" alt="<?php the_title(); ?>" class="post-header__featured-image"/>
			</div>
		</div>
	</div>
	<?php endif;?> 	
	<div class="row">
		<div class="col-md-8 mx-auto">
			<?php the_content(); ?>
		</div>
	</div>
	<?php if(get_field('gallery')): ?>
		<?php get_template_part('partials/fragment', 'gallery'); ?>
	<?php endif; ?>
	<div class="row">
		<div class="col mx-auto">
			<?php
				$next_post = get_next_post();
				if(!empty($next_post)):
				$next_popover_content = get_the_title($next_post->ID);
				?>
				<a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="next-post-link" data-toggle="popover" data-placement="right" data-content="<?php echo $next_popover_content; ?>"><i class="fa fa-long-arrow-left fa-3x"></i></a>

			<?php endif; ?>
			<?php 
			$prev_post = get_previous_post();
			if(!empty($prev_post)): 
			$prev_popover_content = get_the_title($prev_post->ID);
			?>
			<a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="previous-post-link" data-toggle="popover" data-placement="right" data-content="<?php echo $prev_popover_content; ?>"><i class="fa fa-long-arrow-right fa-3x"></i></a>
			<?php endif; ?>
		</div>
	</div>
	<?php if(comments_open()): ?>
	<div class="row">
		<div class="col-md-6 mx-auto">
			<ul class="post-comments">
			<?php 
				$comment_args = array(
					'post_id' 	=> get_the_ID(),
					'order'		=> 'ASC', 
					'parent' 	=> '0',
					
				);
				foreach(get_comments($comment_args) as $comment): ?>
			<li>
			<div class="row">
				<div class="col-md-1">
					<span class="comment-avatar"><?php echo get_avatar($comment->comment_author, 50);?></span>
				</div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-12">
							<span class="comment"><?php echo $comment->comment_content; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mr-auto">
							<span class="comment-author">From: <?php echo $comment->comment_author; ?></span>
						</div>
						<div class="col-md-6 ml-auto">
							<span class="comment-date"> &nbsp; <?php echo $comment->comment_date; ?></span>	
						</div>
					</div>
				</div>
			</div>
			<?php 
			$child_comment_args = array(
			'post_id' 	=> get_the_ID(),
			'parent' 	=> $comment->comment_ID,
			'order' 	=> 'ASC'
			); 
			$child_comments = get_comments($child_comment_args);
			if($child_comments): ?>
			<ul class="child-comments">
				<?php foreach($child_comments as $child_comment): ?>
				<li>
				<div class="row">
					<div class="col-md-1">
						<span class="comment-avatar"><?php echo get_avatar($child_comment->comment_author, 50);?></span>
					</div>
					<div class="col-md-6 ">
						<div class="row">
							<div class="col-md-12">
								<span class="comment"><?php echo $child_comment->comment_content; ?></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mr-auto">
								<span class="comment-author">From: <?php echo $child_comment->comment_author; ?></span>
							</div>
							<div class="col-md-6 ml-auto">
								<span class="comment-date"> &nbsp; <?php echo $child_comment->comment_date; ?></span>
							</div>
						</div>
					</div>
				</div>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif;?>
			</li>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 mx-auto">
			<?php 
				$args = array(
					'fields' 	=> array(
						'author'	=> '<p class="comment-form-author"><label for="author">Name</label><br/><input name="author" class="comment-input"></p>',	
						'email'		=> '<p class="comment-form-email"><label for="email">Email</label><br/><input name="email" class="comment-input"></p>'
					),
					'comment_notes_before' => '<p>Your email address will not be displayed</p>',
					'comment_field' => '<p class="comment-form-comment"><label for="comment">Comment</label><br/><textarea name="comment" rows="5" aria-required="true" required="requited" class="comment-text"></textarea></p>',
					'title_reply' 	=> 'Leave a Comment',
					'label_submit'	=> 'Post a comment',
					'submit_button'	=> '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-light" value="%4$s" />'
				);
				comment_form($args); 
			?>
		</div>
	</div>
</div>
			</div>
	<?php endif; ?>
</div>
<?php endwhile; else:?>
<h2> Oops...it looks like you found an empty page!</h2>
<?php endif;?>
<?php get_footer(); ?>