<div class="homepage-header container-fluid">
<?php 

$header_type = get_field('header_type'); 
if($header_type == 'carousel'):
	$carousel_items = get_field('carousel_images');
	$show_controls = get_field('show_carousel_controls');
	$show_indicators = get_field('show_carousel_indicators');
	$item_count = count($carousel_items);
	
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<?php if($show_indicators): ?>
	<ol class="carousel-indicators">
		<?php 
		$indicator_number = 0;
		foreach($carousel_items as $item): 
		$indicator_class = $indicator_number == 0 ? 'class="active"' : null;
		?>
		<li data-target="#carouselExampleIndicators" data-slide-to="<?php $indicator_number; ?>" <?php echo $indicator_class; ?>></li>
		<?php $indicator_number++; endforeach;?>
	</ol>
	<?php endif;?>
	<div class="carousel-inner">
		<?php
		$item_number = 0; 
		foreach($carousel_items as $item):
			$item_class = $item_number == 0 ? 'carousel-item active' : 'carousel-item';
		?>
		<div class="<?php echo $item_class; ?>" >
			<img class="d-block w-100" src="<?php echo $item['image']['url']; ?>" alt="<?php echo $item['image']['alt'];?>"/>
		</div>	
		<?php  $item_number++; endforeach; ?>
	</div>
	<?php if($show_controls): ?>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
	<?php endif; ?>
</div>

<?php 
else: 
	$has_title = get_field('has_title');
	$title = $has_title ? get_field('title') : null;
	$title_color = $has_title ? get_field('title_color') : null;
	$header_image = get_field('image');
?>
	<div class="row hero h-100" style="background-image: url(<?php echo $header_image['url'];?>);">		
			<?php if($title): ?>
			<h1 class="hero-title my-auto mx-auto" style="color:<?php echo $title_color; ?>"><?php echo $title; ?></h1>
			<?php endif; ?>
			<!--<img class="hero-image" src="<?php echo $header_image['url'];?>" alt="<?php echo $header_image['alt']; ?>" />-->
	</div>
<?php endif; ?>
</div>