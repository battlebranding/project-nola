<section class="restaurant" style="background-color: #ded9cb;">
	<div class="section-body has-text-centered">
		<div class="wrapper">
			<h2>Enjoyed your food? We would love to hear your feedback.</h2>
			<hr class="is-small" />
			<p>It would be our honor for you to share your positive experience with us on your favorite social network.</p>
			<ul class="menu is-horizontal">
				<li><a href="https://facebook.com/eatatnola"><i class="fa fa-facebook icon is-medium" aria-hidden="true"></i></a></li>
				<li><a href="https://instagram.com/eatatnola"><i class="fa fa-instagram icon is-medium" aria-hidden="true"></a></i></li>
				<li><a href="https://twitter.com/eatatnola"><i class="fa fa-twitter icon is-medium" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</section>
<footer style="background-color: #373435;">
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
