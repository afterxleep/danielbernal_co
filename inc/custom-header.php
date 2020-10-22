<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package danielbernal_co
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses danielbernal_co_header_style()
 * @uses danielbernal_co_admin_header_style()
 * @uses danielbernal_co_admin_header_image()
 */
function danielbernal_co_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'danielbernal_co_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '333332',
		'width'                  => 1440,
		'height'                 => 600,
		'flex-height'            => true,
		'wp-head-callback'       => 'danielbernal_co_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'danielbernal_co_custom_header_setup' );

if ( ! function_exists( 'danielbernal_co_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see danielbernal_co_custom_header_setup().
 */
function danielbernal_co_header_style() {
	$header_text_color = get_header_textcolor();
	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
	 */
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style id="danielbernal-co-custom-header-css" type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description,
		#hero-header #hero-social-navigation {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description,
		.social-navigation li a,
		.site-header .menu-toggle {
			color: #<?php echo esc_attr( $header_text_color ); ?> !important;
		}
		.site-description {
			opacity: 0.8 !important;
		}
		.site-header .menu-toggle {
			border-color: #<?php echo esc_attr( $header_text_color ); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // danielbernal_co_header_style
