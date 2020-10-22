<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package danielbernal_co
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'danielbernal-co' ); ?></a>

	<?php if ( function_exists( 'ip_woocommerce_header_cart' ) ) : ?>
	<div id="menu-with-cart">
	<?php endif; ?>

	<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" id="primary-menu-button">
			<?php esc_html_e( 'Menu', 'danielbernal-co' ); ?>
		</button><!-- .menu-toggle -->
	<?php endif; ?>

	<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
		<div class="menu-container">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="logo" src="<?php echo get_bloginfo('template_url') ?>/assets/logo.png"/>
			</a>
			<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- .main-navigation -->
		</div>
	<?php endif; ?>

	<?php if ( function_exists( 'ip_woocommerce_header_cart' ) ) : ?>
		<nav id="wc-navigation" class="main-navigation" role="navigation">
			<?php ip_woocommerce_header_cart(); ?>
		</nav>
	<?php endif; ?>

	<?php if ( function_exists( 'ip_woocommerce_header_cart' ) ) : ?>
	</div>
	<?php endif; ?>

	<div id="content-wrapper" class="content-wrapper">
		<div id="content" class="site-content">
