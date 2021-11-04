<?php
/* 
* Template Name: Homepage Template
*/
get_header(); 
?>
<div class="container-fluid">
	<div class="row">
		<!-- Header Section -->
		<?php get_template_part( 'partials/fragment', 'header' ); ?>
		
	</div><!-- .row --> 
	
	<div class="row">
		
		<div class="col-md-10 mx-auto">
			<!-- Featured Links Section -->
			<?php get_template_part('partials/fragment', 'featured-links'); ?>
			
		</div><!--.col-md-10 .mx-auto -->
		
	</div><!--.row-->
	
	<div class="row">
		
		<div class="col-md-3 order-2 mx-auto">
			<!-- Homepage Sidebars -->
			<?php get_template_part('partials/fragment', 'sidebar'); ?>
			<?php dynamic_sidebar('home_right_sidebar');?>
			
		</div><!--.col-md-4 .order-2 .ml-auto -->
		
		<div class="col-md-9 order-1 mx-auto">	
			<?php 
			if(have_rows('content')): while(have_rows('content')): the_row();
			
				$background_color = get_sub_field('enable_background_color') ? " style='background-color:" . get_sub_field('background_color') . ";'" : null; 
				$text_color = get_sub_field('enable_background_color') ? " style='color:" . get_sub_field('text_color') . ";'" : null;
				$diagonal_topbottom = get_sub_field('diagonal_topbottom');
				
				if($diagonal_topbottom != "none"){
					
					$diagonal_class = " " . $diagonal_topbottom;
					
				}else{
					
					$diagonal_class = null;	
					
				}
			?>
			<div class="row">
				<div class="col mx-auto">
					<?php if(get_row_layout() == 'normal_content'): ?>
						<div class="content"<?php echo $text_color;?>><?php the_sub_field('content');?></div>
					<?php elseif(get_row_layout() == "columns"): 
						
						$columns =  get_sub_field('columns'); 
						$num_columns = count($columns);
						foreach($columns as $column):
							$column_width = 12/$num_columns;
					?>
						<div class="col-md-<?php echo $column_width;?> mx-auto">
							<div class="content"<?php echo $text_color;?>><?php echo $column['content'];?></div>
						</div> <!-- .col-md-* .mx-auto -->
					<?php 
					endforeach; // Columns
					endif; // get_row_layout()?>
				</div>
			</div><!-- .row -->
			<?php endwhile; endif;?>	
		</div>	<!-- .col-md-8 .order-1 .mr-auto -->
	</div><!-- .row -->
	<div class="row" style="background-color: <?php the_field('footer_background_color'); ?>">
		<div class="col mx-auto">
		<?php the_field('footer_content');?>
		</div><!-- .col .mx-auto -->
	</div><!-- .row -->
</div> <!-- .container-fluid -->
<?php get_footer();