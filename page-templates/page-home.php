<?php
/* 
* Template Name: Homepage Template
*/
get_header(); 
?>
<div class="container-fluid g-0">
	<?php if(have_posts()){
		
		while(have_posts()){
		
			the_post();	?>
			
			<div class="row g-0">
				<div class="col-md-12 g-0">
					<?php the_content() ;?>
				</div>
			</div>


			<?php } ?>
		<?php }	?>
</div>
<?php get_footer(); 