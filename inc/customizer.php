<?php
/**
 * Daniel Bernal Theme Customizer
 *
 * @package danielbernal_co
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function danielbernal_co_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'danielbernal_co_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'danielbernal-co' ),
		'priority' => 130,
	) );

    $wp_customize->add_setting( 'danielbernal_co_gravatar_email', array(
		'default'           => get_option( 'admin_email' ),
		'sanitize_callback' => 'danielbernal_co_sanitize_email',
    ) );

    $wp_customize->add_control( 'danielbernal_co_gravatar_email', array(
		'label'       => esc_html__( 'Header Gravatar', 'danielbernal-co' ),
		'description' => sprintf( esc_html_x( 'Enter the email address associated with your %1$s, or Globally Recognized Avatar, to be displayed in the header.', 'danielbernal-co' ),'<a href="https://gravatar.com" target="_blank">Gravatar</a>', 'Gravatar URL' ),
		'section'     => 'danielbernal_co_theme_options',
		'type'        => 'text',
    ) );

	$wp_customize->add_setting( 'danielbernal_co_display_reading_time', array(
		'default'           => 1,
		'sanitize_callback' => 'danielbernal_co_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'danielbernal_co_display_reading_time', array(
		'label'       => esc_html__( 'Display estimated reading time on posts', 'danielbernal-co' ),
		'section'     => 'danielbernal_co_theme_options',
		'type'        => 'checkbox',
    ) );
}
add_action( 'customize_register', 'danielbernal_co_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function danielbernal_co_customize_preview_js() {
	wp_enqueue_script( 'danielbernal-co-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'danielbernal_co_customize_preview_js' );

/**
 * Sanitizes customizer email inputs.
 *
 * @return bool
 */
function danielbernal_co_sanitize_email( $value ) {
	if ( '' != $value && is_email( $value ) )
		$value = sanitize_email( $value );
	else
		$value = '';

	return $value;
}

/**
 * Sanitize the checkbox.
 *
 * @param int $input.
 * @return boolean|string
 */
function danielbernal_co_sanitize_checkbox( $input ) {
	return ( 1 == $input ) ? 1 : '';
}
