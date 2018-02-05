<?php
/**
 * Template Name: Homepage - Restaurants
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
	<div class="overlay">
		<span class="caption">Sweet &amp; Spicy Salmon &amp; Shrimp</span>
	</div>
</header>

<section class="restaurant" style="background-color: #fff; color: #fff;">
	<div class="section-body has-text-centered">
		<div class="wrapper">
			<h2>New Orleans Inspired Cuisine for Everyone.</h2>
			<hr class="is-small" />
			<p>Nola Seafood &amp; Steakhouse is conveniently located in the heart of Northern Greensboro. Preparing New Orleans inspired dishes in a scratch made kitchen, NOLA has a variety of flavorful, fresh, seafood and steaks. Nola is proud to offer the highest quality Cajun cuisine in a casually upscale, beautiful and comfortable environment with one fully stocked bar. Passionate to consistently deliver attentive and friendly service, there is something on the menu for everyone.</p>
		</div>
	</div>
</section>

<section class="restaurant has-no-padding">
	<div class="section-body has-text-centered" style="background-color: #333;">
		<!-- <div class="wrapper has-no-padding"> -->
			<div class="columns">
				<div class="column is-one-third" style="height: 600px; background-image: url('http://198.199.64.126/nola/wp-content/uploads/sites/2/2017/09/nola-bar.jpg'); background-repeat: no-repeat; background-size: cover;"></div>
				<div class="column is-two-thirds">
					<div class="row" style="height: 300px; background-image: url('http://198.199.64.126/nola/wp-content/uploads/sites/2/2017/09/lobster-oysters-shrimp.jpg'); background-repeat: no-repeat; background-size: cover;"></div>
					<div class="row">
						<div class="columns">
							<div class="column is-half" style="height: 300px; background-image: url('http://198.199.64.126/nola/wp-content/uploads/sites/2/2017/09/crawfish-nachos.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
							<div class="column is-half" style="height: 300px; background-image: url('http://198.199.64.126/nola/wp-content/uploads/sites/2/2017/09/nola-inside-dining.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
						</div>
					</div>
				</div>
			</div>
		<!-- </div> -->
	</div>
</section>

<section class="restaurant">
	<div class="section-body has-text-centered">
		<div class="wrapper">
			<h2>Open Monday - Sunday, 11:00 AM - 10:00 PM</h2>
			<hr class="is-small" />
			<p>Lunch is served Monday - Friday, 11:00 AM - 3:00 PM</p>
			<a class="button is-outlined" href="<?php echo home_url('menu'); ?>">View Menu</a>
		</div>
	</div>
</section>

<section class="dark">
	<div class="section-body has-text-centered">
		<div class="wrapper">
			<div class="columns is-fullwidth-on-mobile">
				<h2>Daily Lunch Specials, Monday - Friday<br />$9 Lunch Menu</h2>
			</div>
			<hr class="is-small" />
			<div class="columns is-fullwidth-on-mobile">
				<div class="column is-one-fourth is-fullwidth-on-mobile">
					<h3>Monday</h3>
					<p>1/2 off Appetizers</p>
				</div>
				<div class="column is-one-fourth is-fullwidth-on-mobile">
					<h3>Tuesday</h3>
					<p>Prime Rib $15</p>
				</div>
				<div class="column is-one-fourth is-fullwidth-on-mobile">
					<h3>Wednesday</h3>
					<p>Select Seafood Entrees $12</p>
				</div>
				<div class="column is-one-fourth is-fullwidth-on-mobile">
					<h3>Thursday</h3>
					<p>1/2 off Wine &amp; 50¢ oysters</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="restaurant has-overlay" style="background-color: #ded9cb; color: #fff; background-image: url('http://198.199.64.126/nola/wp-content/uploads/sites/2/2017/09/nola-private-dining.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
	<div class="section-body has-space-on-top has-space-on-bottom">
		<div class="wrapper">
			<div class="columns is-fullwidth-on-mobile">
				<div class="column is-fullwidth-on-mobile has-text-centered">
					<img src="http://198.199.64.126/nola/wp-content/uploads/sites/2/2017/09/NOLA-alternative-logo.png" width="300px" />
				</div>
				<div class="column is-fullwidth-on-mobile">
					<h2 style="color: #fff;">Private Dining for You and Twenty-One Friends.</h2>
					<p style="color: #fff;">Perfect for business lunches, large groups and birthday parties, our noise-cancelling private room is the perfect pairing to our excellent menu.</p>
					<a class="button is-outlined" href="<?php echo home_url('private-dining'); ?>">Reserve Today</a>
				</div>
			</div>
		</div>
	</div>
	<div class="overlay"></div>
</section>

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

<section class="restaurant has-no-padding">
	<div class="section-body has-text-centered" style="background-color: #333;">
		<!-- <div class="wrapper has-no-padding"> -->
			<div class="columns is-fullwidth-on-mobile">
				<div class="column is-one-fourth is-fullwidth-on-mobile" style="height: 300px; background-image: url('http://198.199.64.126/nola/wp-content/uploads/sites/2/2017/09/beef-potato.jpg'); background-repeat: no-repeat; background-size: cover;"></div>
				<div class="column is-one-fourth is-fullwidth-on-mobile" style="height: 300px; background-image: url('http://198.199.64.126/nola/wp-content/uploads/sites/2/2017/09/benniets.jpg'); background-repeat: no-repeat; background-size: cover;"></div>
				<div class="column is-one-fourth is-fullwidth-on-mobile" style="height: 300px; background-image: url('http://198.199.64.126/nola/wp-content/uploads/sites/2/2017/09/hamburger-fries.jpg'); background-repeat: no-repeat; background-size: cover;"></div>
				<div class="column is-one-fourth is-fullwidth-on-mobile" style="height: 300px; background-image: url('http://198.199.64.126/nola/wp-content/uploads/sites/2/2017/09/crab-cakes-rice.jpg'); background-repeat: no-repeat; background-size: cover;"></div>
				</div>
			</div>
		<!-- </div> -->
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
