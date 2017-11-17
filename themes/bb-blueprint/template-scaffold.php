<?php
/**
 * Template Name: Scaffold
 */
get_header(); ?>

<header class="is-large">
	<div class="section-header has-no-padding">
		<div class="wrapper">
			<h1 class="is-logo is-floating-left"><?php echo get_bloginfo(); ?></h1>
			<?php wp_nav_menu( array(
				'theme_location' 	=> 'primary',
				'container'			=> 'nav',
				'container_class'	=> 'is-floating-right',
				'menu_class'		=> 'is-main-nav is-horizontal',
			) ); ?>
		</div>
	</div>
	<div class="section-body has-space-on-top">
		<div class="wrapper">
			<h2><?php echo get_bloginfo( 'description' ); ?></h2>
			<h3>Fill this dynamically with something else</h3>
		</div>
	</div>
</header>

<header>
	<div class="section-header is-light">
		<div class="wrapper nav-bar-wrapper">
			<h1 class="is-logo is-floating-left"><?php echo get_bloginfo(); ?></h1>
			<?php wp_nav_menu( array(
				'theme_location' 	=> 'primary',
				'container'			=> 'nav',
				'container_class'	=> 'is-floating-right',
				'menu_class'		=> 'is-main-nav is-horizontal',
			) ); ?>
		</div>
	</div>
	<div class="section-body has-space-on-top">
		<div class="wrapper">
			<h2><?php echo get_bloginfo( 'description' ); ?><p>
			<p>We can put some awseome content in this box to elaborate on how dynamic this website is!</p>
		</div>
	</div>
</header>

<header class="is-large">
	<div class="section-header has-no-padding">
		<div class="wrapper">
			<h1 class="is-logo is-floating-left"><?php echo get_bloginfo(); ?></h1>
			<?php wp_nav_menu( array(
				'theme_location' 	=> 'primary',
				'container'			=> 'nav',
				'container_class'	=> 'is-floating-right',
				'menu_class'		=> 'is-main-nav is-horizontal',
			) ); ?>
		</div>
	</div>
	<div class="section-body has-space-on-top">
		<div class="wrapper has-text-centered">
			<h2><?php echo get_bloginfo( 'description' ); ?></h2>
			<a href="#" class="button">Learn More</a>
			<a href="#" class="button">Get Involved</a>
		</div>
	</div>
</header>
<section>
	<div class="section-body">
		<div class="wrapper">
			<h2>Blueprint Theme</h2>
			<p>Blueprint Theme is a custom theme by Battle Branding that endeavors to allow for quicker prototyping, dynamic content regions and overall quicker turn-arounds in the development of custom websites.</p>
			<div class="columns">
				<div class="column">
					<h3>Column One</h3>
					<p>We can record a note here highlighting what can go here.</p>
				</div>
				<div class="column">
					<h3>Column Two</h3>
					<p>We can record a note here highlighting what can go here.</p>
				</div>
				<div class="column">
					<h3>Column Three</h3>
					<p>We can record a note here highlighting what can go here.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="is-gallery">
	<div class="section-body">
		<div class="post"></div>
		<div class="post"></div>
		<div class="post"></div>
		<div class="post"></div>
		<div class="post"></div>
	</div>
</section>

<?php get_footer(); ?>
