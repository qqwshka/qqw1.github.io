<?php
/**
 * Theme Customizer.
 *
 * @package University_Hub
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/**
 * Customizer partials.
 *
 * @since 1.0.0
 */
function university_hub_customizer_partials( WP_Customize_Manager $wp_customize ) {

	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->get_setting( 'blogname' )->transport        = 'refresh';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';
		$wp_customize->get_setting( 'theme_options[copyright_text]' )->transport = 'refresh';
		return;

	}

	// Load customizer partials callback.
	include get_template_directory() . '/inc/customizer/partials.php';

	// Partial blogname.
	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
		'selector'            => '.site-title a',
		'container_inclusive' => false,
		'render_callback'     => 'university_hub_customize_partial_blogname',
		 )
	);

	// Partial blogdescription.
	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array(
		'selector'            => '.site-description',
		'container_inclusive' => false,
		'render_callback'     => 'university_hub_customize_partial_blogdescription',
		 )
	);

	// Partial copyright_text.
	$wp_customize->selective_refresh->add_partial(
		'copyright_text', array(
		'selector'            => '#colophon .copyright',
		'container_inclusive' => false,
		'settings'            => array( 'theme_options[copyright_text]' ),
		'render_callback'     => 'university_hub_render_partial_copyright_text',
		 )
	);

}

add_action( 'customize_register', 'university_hub_customizer_partials', 99 );

/**
 * Register customizer controls scripts.
 *
 * @since 1.0.0
 */
function university_hub_customize_controls_register_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_register_script( 'university-hub-customize-controls', get_template_directory_uri() . '/js/customize-controls' . $min . '.js', array( 'jquery', 'customize-controls' ), '1.0.1', true );
	wp_register_style( 'university-hub-customize-controls', get_template_directory_uri() . '/css/customize-controls' . $min . '.css' );

}

add_action( 'customize_controls_enqueue_scripts', 'university_hub_customize_controls_register_scripts', 0 );
