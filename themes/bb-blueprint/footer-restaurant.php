<footer>
	<div class="section-body">
		<div class="wrapper">
			<div class="columns is-fullwidth-on-mobile">
				<div class="column is-fullwidth-on-mobile">
					<?php if ( get_theme_mod( 'branding_logo_footer' ) ) : ?>
						<h1 class="is-logo is-floating-left"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'branding_logo_footer' ) ); ?>' alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" height="50px"></a></h1>
					<?php else : ?>
					    <h1 class="is-logo is-floating-left"><?php echo get_bloginfo(); ?></h1>
					<?php endif; ?>
				</div>
				<div class="column is-fullwidth-on-mobile">
					<p><?php echo get_theme_mod( 'address' ); ?><br />
						<?php echo get_theme_mod( 'phone_number' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php get_footer(); ?>
