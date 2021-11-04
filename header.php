<!DOCTYPE html>
<html lang="en">
	<head>
		<?php get_template_part('partials/head', 'tag-manager');?>
		<?php get_template_part('partials/head', 'meta'); ?>
		<title><?php wp_title( '|', 'echo', 'right' ); bloginfo('title'); ?></title>
		<?php wp_head(); ?>
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-light bg-light nav-logo">
			<?php 	$custom_logo = get_theme_mod('custom_logo');
			$custom_logo_image = $custom_logo != null ? wp_get_attachment_image_src($custom_logo, 'full') : null;
			
			if($custom_logo != null):?>
			<a class="navbar-brand navbar-brand__has-logo" href="<?php bloginfo('url');?>"><img class="custom-logo" src="<?php echo $custom_logo_image[0]; ?>" alt="<?php bloginfo('title');?>"></a>
			<?php else: ?>
			<a class="navbar-brand" href="<?php bloginfo('url');?>"><?php bloginfo( 'title' ); ?></a>
			<?php endif; ?>
			
			<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</nav>
		<nav class="navbar sticky-top navbar-expand-md navbar-light bg-light nav-bottom">
			<?php 
			$menu_class = $custom_logo != null ? ' navbar__has-custom-logo': null;
			$nav_args = array(
				'menu' 				=> 2,
				'menu_class' 		=> 'navbar-nav justify-content-center',
				'container' 		=> 'div',
				'container_class' 	=> 'collapse navbar-collapse justify-content-center' .  $menu_class,
				'container_id'		=> 'navbarSupportedContent',
				'walker'			=> new WP_Nav_Menu_Walker()
				);
			wp_nav_menu($nav_args);
			?>
			<?php 
			$menu_class = $custom_logo != null ? ' navbar__has-custom-logo': null;
			$nav_args = array(
				'menu' 				=> 18,
				'menu_class' 		=> 'navbar-nav justify-content-end',
				'container' 		=> 'div',
				'container_class' 	=> $menu_class,
				'container_id'		=> 'navbarSupportedContent',
				'walker'			=> new WP_Nav_Menu_Walker()
				);
			if(has_nav_menu(18)){
				wp_nav_menu($nav_args);
			}
			?>

		</nav>