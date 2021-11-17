<?php get_header(); ?>

<div class="container-fluid g-0">
	<?php if(have_posts()){
		while(have_posts()){
			the_post(); 
			?>
			
			<div class="row g-0 title-section">
				<div class="col-12 col-sm-12 col-md-10 col-lg-8 mx-auto">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
			<?php if(has_post_thumbnail()){ ?>
				<div class="row g-0 featured_image_section">
					<div class="post_hero" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
				</div>
			<?php } ?>
			<div class="row g-0 g-sm-1">
				<div class="col-12 col-sm-12 col-md-10 col-lg-8 mx-auto">
					<?php the_content(); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-12 col-sm-12 col-md-10 col-lg-8 mx-auto">
					<?php comments_template(); ?>
				</div>
			</div>
			<?php 
		}// while
	}else{
		?>
		<?php 
	} // else ?>
</div>

<?php get_footer();