<div class="footer">
	<?php if(get_field('enable_social_accounts', 'options')): ?>
	<div class="footer__social-section">
		<ul class="footer__social-list">
			<?php foreach(get_field('social_accounts', 'options') as $account):?>
			<li>
			<a href="<?php echo $account['url'];?>" target="_blank">
				<i class="fa <?php echo $account['icon'];?> fa-2x"></i>
			</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="footer__title-section">
		<p class="footer__title">&copy; <?php echo date("Y") . ' ';  bloginfo('title');?></p>
	</div>
	<?php endif;?>
</div>
<?php wp_footer();?>
</body>
</html>