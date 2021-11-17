<!DOCTYPE html>
<html lang="en">
	<head>
		<?php get_template_part('partials/head', 'tag-manager');?>
		<?php get_template_part('partials/head', 'meta'); ?>
		<title><?php wp_title( '|', 'echo', 'right' ); bloginfo('title'); ?></title>
		<?php wp_head(); ?>
	</head>
	<body>
		<nav class="navbar navbar-expand-xs navbar--secondary">
			<div class="container-fluid justify-content-center">
				<ul class="secondary-header-sidebar">
				<?php dynamic_sidebar( 'secondary-header-sidebar' ); ?>
				</ul>
			</div>
		</nav>
		<nav class="navbar navbar-expand-md navbar-light bg-light navbar--primary">
			<div class="container-fluid flex-md-column">
				<?php 	
				$custom_logo = get_theme_mod('custom_logo');
				$custom_logo_image = $custom_logo != null ? wp_get_attachment_image_src($custom_logo, 'full') : null;
				
				if($custom_logo != null):
				?>
				
				<a class="navbar-brand navbar-brand__has-logo" href="<?php bloginfo('url');?>"><img class="custom-logo" src="<?php echo $custom_logo_image[0]; ?>" alt="<?php bloginfo('title');?>"></a>
				
				<?php else: ?>
				
				<a class="navbar-brand" href="<?php bloginfo('url');?>"><?php bloginfo( 'title' ); ?></a>
				
				<?php endif; ?>
				
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php 
				$nav_args = array(
					'location' 			=> 'primary-header-menu',
					'menu_class' 		=> 'navbar-nav',
					'container' 		=> 'div',
					'container_class' 	=> 'collapse navbar-collapse',
					'container_id'		=> 'navbarSupportedContent',
					'walker'			=> new bootstrap_5_wp_nav_menu_walker()
					);
				wp_nav_menu($nav_args);
				?>
			</div>
		</nav>