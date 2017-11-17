<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700" rel="stylesheet">
		<title><?php echo bp_get_page_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	<body style="padding-top: 60px;">
		<section class="restaurant" style="background-color: #EA4137; color: #fff; position: fixed; z-index: 1000; width: 100%; top: 0;">
			<div class="section-body has-text-centered">
				<div class="wrapper" style="padding: 0;">
					<p style="margin-bottom: 0; color: #fff;">NOLA is temporarily closed due to a small fire. <a href="<?php echo home_url('nola-temporarily-closed'); ?>" style="font-weight: bold; color: #fff;">Click here</a> to read more.</p>
				</div>
			</div>
		</section>
		<header class="restaurant is-small has-overlay" style="<?php echo ( get_theme_mod( 'homepage_header_background' ) ) ? "background-image: url('" . get_theme_mod( 'homepage_header_background' ) . "'); background-position: center; background-repeat: no-repeat; background-size: cover;" : ''; ?>">
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
			<div class="overlay"></div>
		</header>
