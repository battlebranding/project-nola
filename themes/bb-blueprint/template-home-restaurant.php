<?php
/**
 * Template Name: Homepage - Restaurant
 */
get_header(); ?>

<header class="restaurant is-large has-overlay" style="<?php echo ( get_theme_mod( 'homepage_header_background' ) ) ? "background-image: url('" . get_theme_mod( 'homepage_header_background' ) . "'); background-position: center; background-repeat: no-repeat; background-size: cover;" : ''; ?>">
	<div class="section-header has-no-padding">
		<div class="wrapper has-text-centered">
			<?php if ( get_theme_mod( 'branding_logo' ) ) : ?>
				<h1 class="is-logo"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'branding_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></h1>
			<?php else : ?>
			    <h1 class="is-logo"><?php echo get_bloginfo(); ?></h1>
			<?php endif; ?>
			<?php wp_nav_menu( array(
				'theme_location' 	=> 'primary',
				'container'			=> 'nav',
				'container_class'	=> '',
				'menu_class'		=> 'is-main-nav is-horizontal',
			) ); ?>
		</div>
	</div>
	<div class="section-body has-space-on-top">
		<div class="wrapper has-text-centered">
			<h2><?php echo html_entity_decode( get_bloginfo( 'description' ) ); ?></h2>
			<!-- <h3>Fill this dynamically with something else</h3> -->
			<a class="button is-outlined" href="<?php echo home_url('menu'); ?>">View The Menu</a>
		</div>
	</div>
	<div class="overlay"></div>
</header>

<section class="<?php echo get_theme_mod( 'site_type' ); ?>">
	<div class="section-header" style="height: 180px;">
		<div class="wrapper">
			<h1 class="has-text-centered"><?php the_title(); ?><h1>
			<hr class="is-small" />
		</div>
	</div>
	<div class="section-body has-text-centered">
		<div class="wrapper">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
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
