/**
 * Blueprint JS
 */

window.BBBlueprint = {};

( function( window, document, $, app ) {
	var $c = {};

	app.init = function() {
		app.cache();
		app.bindEvents();
	};

	app.cache = function() {
		$c.window = $( window );
		$c.body = $( document.body );
		$c.actionOpenMobileNav = $c.body.find('.action-open-mobile-nav');
		$c.actionCloseMobileNav = $c.body.find('.action-close-mobile-nav');
		$c.MobileNavMenuItem = $c.body.find('.is-fullscreen-on-mobile .menu-item-has-children > a');
	};

	app.bindEvents = function() {
		$c.actionOpenMobileNav.on( 'click', app.openMobileNav );
		$c.actionCloseMobileNav.on( 'click', app.closeMobileNav );
		$c.MobileNavMenuItem.on( 'click', app.disableMobileNavLink );
	};

	app.openMobileNav = function( click_event ) {
		$c.body.find('.is-fullscreen-on-mobile').fadeIn('fast');
		$c.body.addClass('has-scroll-disabled');
	}

	app.closeMobileNav = function( click_event ) {
		$c.body.find('.is-fullscreen-on-mobile').fadeOut();
		$c.body.removeClass('has-scroll-disabled');
	}

	app.disableMobileNavLink = function( click_event ) {
		click_event.preventDefault();
	}

	$( app.init );

})( window, document, jQuery, window.BBBlueprint );

/**
 * WDS Wintellect DevCenter Gated Content
 * http://webdevstudios.com
 *
 * Licensed under the GPLv2+ license.
 */

window.WDSWGatedDevCenterContent = {};
( function( window, $, app ) {
	var $c = {};

	// Constructor.
	app.init = function() {
		app.cache();

		if ( app.meetsRequirements() ) {
			app.bindEvents();
		}
	};

	// Cache selectors.
	app.cache = function() {
		$c.window                = $( window );
		$c.body                  = $( document.body );
		$c.categoryWhitepapers   = $( '.site-content .category-whitepapers a' );
		$c.taggedWebinars        = $( '.tag-webinar a, .tag-webinars a' );
		$c.devCenterModalOverlay = $( '.devcenter-modal-overlay' );
		$c.devCenterModal        = $( '.devcenter-modal', $c.devCenterModalOverlay );
		$c.devCenterModalClose   = $( '.devcenter-close', $c.devCenterModal );
		$c.webinarSingleForm     = $( '.webinar-single-form' );
	};

	// Do we meet the requirements?
	app.meetsRequirements = function() {
		return ( $c.devCenterModal.length || $c.webinarSingleForm.length );
	};

	// Combine all events.
	app.bindEvents = function() {
		$c.categoryWhitepapers.on( 'click touchstart', app.whitePaperGate );
		$c.taggedWebinars.on( 'click touchstart', app.webinarDestinationUrl );
		$c.window.on( 'gform_confirmation_loaded', app.formSubmitted );
		$c.body.on( 'click touchstart', app.closeModal );
		$c.devCenterModal.on( 'click touchstart', app.maybeDontCloseModal );
		$c.devCenterModalClose.on( 'click touchstart', app.closeModal );
		$c.window.on( 'load', app.removeFormForAlreadyRegisteredUsers );
	};

	// Protect White Paper access.
	app.whitePaperGate = function() {

		// This exception is built in to link to the whitepaper archive directly.
		if ( $( event.target ).is( '.h3' ) ) {
			return;
		}


		// Don't open the link quite yet.
		event.stopImmediatePropagation();
		event.preventDefault();

		// Capture where we ought have gone.
		$c.redirectURL = this.href;

		// Check if the cookie is already set.
		if ( app.doesCookieExist( 'wds_wintellect_email_subscriber' ) ) {
			window.location.href = $c.redirectURL;
			return;
		}

		// Open modal.
		$c.devCenterModalOverlay.show();

		$( document.body ).addClass( 'noscroll' );

	};

	// Replaces the webinar URL as necessary.
	app.webinarDestinationUrl = function( event ) {

		// Don't open the link quite yet.
		event.preventDefault();

		var linkedWebinarURL = event.target.getAttribute( 'data-webinarurl' );

		// If the user has not yet subscribed to the email list and we have a linked single webinar URL, send them to it.
		if ( ! app.doesCookieExist( 'wds_wintellect_email_subscriber' ) && linkedWebinarURL ) {
			window.location.href = linkedWebinarURL;
			return;
		}

		// Else, send them to the blog post.
		window.location.href = this.href;
	};

	// Prevent clicks inside of the modal from bubbling up the DOM.
	app.maybeDontCloseModal = function() {
		if ( ! $( event.target ).is( '.devcenter-modal input[type="submit"], .webinar-single-form input[type="submit"]' ) ) {
			event.preventDefault();
			event.stopImmediatePropagation();
		}
	};

	// Handle when the form is submitted.
	app.formSubmitted = function() {

		if ( $c.redirectURL == null ) {
			$c.redirectURL = $c.webinarSingleForm.attr('data-blogurl');
		}

		// Set a cookie so we quit bothering them.
		app.setCookie( 'wds_wintellect_email_subscriber', 'true', 18250 );

		// And send them along.
		window.location.href = $c.redirectURL;
	};

	// Close the modal.
	app.closeModal = function() {

		if ( ! $( event.target ).is( '.devcenter-modal input[type="submit"]' ) ) {
			$c.devCenterModalOverlay.hide();

			// Remove the body class.
			$( document.body ).removeClass( 'noscroll' );
		}
	};

	/**
	 * Check whether a cookie exists.
	 *
	 * @param   {string} name The cookie name.
	 * @returns {boolean}     Whether the cookie exists.
	 */
	app.doesCookieExist = function( name ) {
		return null !== app.getCookie( name );
	};

	/**
	 * Get cookie value by name.
	 *
	 * @param   {string} name             The cookie name.
	 * @returns {string|null} cookieValue The cookie value or empty string if not found.
	 */
	app.getCookie = function( name ) {

		var value = '; ' + document.cookie,
			parts = value.split( '; ' + name + '=' );

		if ( 2 === parts.length ) {
			return parts.pop().split( ';' ).shift();
		}

		return null;
	};

	/*
	 * Set a cookie.
	 *
	 * @param   {string}  name  The name of the cookie.
	 * @param   {string}  value The value of the cookie.
	 * @param   {int}     days  Optional. The expiration of the cookie in days.
	 */
	app.setCookie = function( name, value, days ) {

		var expires = '';

		if ( days ) {
			var date = new Date();
			date.setTime( date.getTime() + ( days * 24 * 60 * 60 * 1000 ) );
			expires = '; expires=' + date.toUTCString();
		}

		document.cookie = name + '=' + value + expires + '; path=/';
	};

	// On the webinar single page, if the cookie is set...don't harass the customer.
	app.removeFormForAlreadyRegisteredUsers = function() {
		if ( app.doesCookieExist( 'wds_wintellect_email_subscriber' ) ) {
			$( '.webinar-single-form' ).html( $( '.webinar-single-form-cookie' ).html() );
			$( '.webinar-single-form-aired' ).html( $( '.webinar-single-form-aired-cookie' ).html());
		}
	};

	// Engage!
	app.init();

})( window, jQuery, window.WDSWGatedDevCenterContent );
