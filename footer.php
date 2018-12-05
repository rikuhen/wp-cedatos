<!-- WIDGETS PREFOOTER -->
<?php if (is_active_sidebar( 'widgets_prefooter' )): ?>
	<div class="row justify-content-center">
		<?php dynamic_sidebar( 'widgets_prefooter' );  ?>
	</div>
<?php endif ?>
<!-- cierra main container -->
</main>
<footer id="footer" class="container-fluid">
		<div class="container  pt-2" id="container-footer">
			<div class="row">
				<div class="col-md-4 col-12">
					<img class="img-fluid" src="images/lg.png" alt="">
				</div>
				<div class="col-md-4 col-12">
					<ul class="d-flex justify-content-center list-unstyled list-inline" id="social-networks">
						<?php if (get_theme_mod('facebook_link')): ?>
							<li class="list-inline-item"><a href="<?php echo get_theme_mod( 'facebook_link' ); ?>" target="_blank"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/assets/images/icono-facebook-cedatos.png"></a></li>
						<?php endif ?>

						<?php if (get_theme_mod( 'twitter_link' )): ?>
							<li class="list-inline-item"><a target="_blank" href="<?php echo get_theme_mod( 'twitter_link' ) ?>"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/assets/images/icono-twitter-cedatos.png"></a> </li>
						<?php endif ?>

						<?php if (get_theme_mod( 'youtube_link' )): ?>
							<li class="list-inline-item"><a target="_blank" href="<?php echo get_theme_mod( 'youtube_link' ); ?>"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/assets/images/icono-youtuve-cedatos.png"></a> </li>
						<?php endif ?>
					</ul>
				</div>
				<div class="col-md-4 col-12">
					<?php if (get_theme_mod( 'contact_setting' )): ?>
						<h6 class="widget-header text-uppercase"><?php bloginfo('name'); ?></h6>
						<p class="widget-content"><?php echo get_theme_mod( 'contact_setting' ); ?></p>
					<?php endif ?>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>

</html>