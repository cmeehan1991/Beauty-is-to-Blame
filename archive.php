<?php get_header(); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<h1 class="archive-title"><?php echo get_the_archive_title(); ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 mx-auto">
		<?php if(have_posts()): ?> 
			<div class="row">
			<?php while(have_posts()): the_post(); ?>
			<div class="col-md-4 archive__post">
				<a href="<?php the_permalink(); ?>" class="archive__post-link">
					<img src="<?php the_post_thumbnail_url('thumbnail') ?>" alt="<?php the_title(); ?>" class="archive__post-image"/>
					<h2 class="archive__post-title"><?php the_title();?></h2>
				</a>
			</div>
			<?php endwhile;?>
			</div>
			<?php else: ?>
			
			<div class='col mx-auto'>
				<h1 style="text-align: center">Uh oh! There is no content yet, but check back soon!</h1>
			</div>
			<?php endif;?>
		</div>
	</div>
</div>
<?php get_footer(); ?>