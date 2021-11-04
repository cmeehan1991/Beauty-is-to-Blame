<?php
	
$enable_featured_links = get_field('enable_featured_links');
$featured_links = get_field('featured_links');

if($enable_featured_links): ?>
	<div class="row featured-link-section mx-auto">
	<?php 
	$num_links = round(12/count($featured_links), '0');	
	foreach($featured_links as $link):?>
	<div class="col-md-auto justify-content-center align-items-center mx-auto" align="center" >
			<div class="featured-link-wrapper" style="background:url(<?php echo $link['background_image']?>);">
				<div class="featured-link-overlay justify-content-center align-items-center mx-auto" style="background-color: <?php echo $link['overlay'];?>"></div>
				<div class="featured-link-title "><a href="<?php echo $link['url'];?>" class="featured-link"><?php echo $link['link_title'];?></a></div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
<?php endif; ?>