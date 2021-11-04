<div class="row">
	<div class="col-md-8 mx-auto">
		<ul class="post-gallery">
			<?php 
			$gallery = get_field('gallery'); 
			$i = 1;
			foreach($gallery as $image): 	
			?>
			<li class="post-gallery__thumbnail"><img class="post-gallery__thumbnail-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" data-id="<?php echo $image['id']; ?>" onclick="openModal(); currentSlide(<?php echo $i?>);" caption="<?php echo $image['caption'];?>"></li>
			<?php $i++;?>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
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
