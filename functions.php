<?php
/**
 * Andrea functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package andrea
 * @since 1.0
 */

if ( ! function_exists( 'andrea_theme_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function andrea_theme_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'woocommerce' );

	}

endif;

add_action( 'after_setup_theme', 'andrea_theme_support' );

add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );

if ( ! function_exists( 'andrea_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function andrea_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_enqueue_style(
			'andrea-style',
			get_template_directory_uri() . '/assets/css/style.css',
			array(),
			$version_string
		);
	}

endif;

add_action( 'wp_enqueue_scripts', 'andrea_styles' );

function andrea_block_editor_styles() {
	wp_enqueue_style( 'andrea-block-editor-style', get_theme_file_uri( '/css/block-editor.css' ), true, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'andrea_block_editor_styles' );

// // Add block patterns
// require get_template_directory() . '/inc/block-patterns.php';

// // Add block styles
// require get_template_directory() . '/inc/block-styles.php';

// // Block Filters
// require get_template_directory() . '/inc/block-filters.php';

// // webfont Loader
// require get_template_directory() . '/inc/wptt-webfont-loader.php';