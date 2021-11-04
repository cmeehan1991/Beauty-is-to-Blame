<?php get_header(); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<?php dynamic_sidebar('internal_sidebar'); ?>
		</div>
		<div class="col-md-6 mr-auto">
			<?php the_content(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>