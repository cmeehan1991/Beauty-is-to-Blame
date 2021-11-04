<?php 
if(get_field('enable_left_sidebar')): 
	if(have_rows('left_sidebar_content')): while(have_rows('left_sidebar_content')): the_row(); ?>
		<div class="sidebar__home-right col-md-12">
			<div class="sidebar-content-wrapper">
				<?php if(get_row_layout() == 'post'): ?>
					<?php $sidebar_post = get_sub_field('post'); ?>
					<?php if(has_post_thumbnail($sidebar_post)): ?>
						<img src="<?php echo get_the_post_thumbnail_url($sidebar_post); ?>" class="sidebar-content__post-image" alt="<?php echo get_the_title( $sidebar_post );?>"/>
					<?php endif;?>
					
					<h2 class="sidebar-content__post-title"><?php echo get_the_title( $sidebar_post); ?></h2>
					
					<p class="sidebar-content__post-excerpt">
						<?php $sidebar_post_excerpt = get_the_excerpt( $sidebar_post ) == null ? wp_trim_words(get_post($sidebar_post)->post_content, 55, '...<br/><a href="' . get_the_permalink( $sidebar_post ) . '"> Read More</a>' )  : get_the_excerpt( $sidebar_post );?>
						<?php echo $sidebar_post_excerpt; ?>
					</p>
					
				<?php elseif(get_row_layout() == 'gallery_grid'): ?>
					<ul class="gallery-grid">
						<?php 
						$gallery = get_sub_field('gallery'); 
						$i = 1;
						foreach($gallery as $image): 	
						?>
						<li class="gallery-grid__item"><img class="gallery-grid__image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" data-id="<?php echo $image['id']; ?>" onclick="openModal(); currentSlide(<?php echo $i?>);" caption="<?php echo $image['caption'];?>"></li>
						<?php $i++;?>
						<?php endforeach; ?>
					</ul>
					<div class="row">
						<div id="lightbox-modal" class="lightbox-modal">
							<span class="close cursor" onclick="closeModal()">&times;</span>
							<div class="lightbox-modal__content">
								<?php $i = 1; $total = count($gallery); foreach($gallery as $image): ?>
								<div class="lightbox-modal__slides">
									<div class="numbertext"> <?php echo $i; ?> / <?php echo $total; ?></div>
									<img src="<?php echo $image['url'];?>" class="lightbox-modal__slides-image" alt="<?php echo $image['alt']; ?>" data-caption="<?php echo $image['caption'];?>">
								</div>
								<?php $i++; endforeach; ?>
								
								<!-- Next/Prev controls -->
								<a class="prev" onclick="plusSlides(-1);">&#10094;</a>
								<a class="next" onclick="plusSlides(1);">&#10095;</a>
								
								<!-- Caption Text --> 
								<div class="caption-container">
									<p id="caption"></p>
								</div>
								<div class="thumbnail-row">
								<?php $i = 1; foreach($gallery as $image): ?>
								<div class="column">
									<img class="lightbox-thumbnail" src="<?php echo $image['url'];?>" onclick="currentSlide(<?php echo $i; ?>);" alt="<?php echo $image['alt'];?>" caption="<?php echo $image['caption'];?>">
								</div>
								<?php $i++; endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif;?>
			</div>
		</div>
<?php endwhile; endif; endif;?>
