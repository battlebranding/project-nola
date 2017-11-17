<?php
	/**
	 * Template Name: Page - Fullwidth
	 */
	get_header( get_theme_mod( 'site_type' ) );
?>

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

<?php get_footer( get_theme_mod( 'site_type' ) ); ?>
