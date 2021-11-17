<?php 
/* Template Name: My Account Template */
get_header(); 
?>

<div class="container-fluid g-md-0 g-lg-0">
	<?php if(have_posts()){ 
		while(have_posts()){
			the_post();
			?>
			<div class="row g-md-0 g-lg-0 page-header">
				<div class="col-lg-10 col-md-10 col-sm-12 col-12 mx-auto breadcrumbs">
				<?php if(function_exists('yoast_breadcrumb')){
				yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
			}?>
				</div>
				
				<div class="col-lg-10 col-md-10 col-sm-12 col-12 mx-auto page-header--title">
					
					<h1 class="page-title"><?php the_title();?></h1>
				</div>
			</div>
			<div class="row g-md-0 my-account">
				<?php the_content(); ?>
			</div>
			<?php
		}
	} ?>
</div>

<?php get_footer(); 