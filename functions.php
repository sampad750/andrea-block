<?php

if (!function_exists('andrea_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook.
	 */
	function andrea_setup()
	{
		// Add support for block styles.
		add_theme_support('wp-block-styles');

		// Enqueue editor styles.
		add_editor_style('editor-style.css');
		/*
		* Load additional block styles.
		*/
		$styled_blocks = ['latest-comments'];
		foreach ( $styled_blocks as $block_name ) {
			$args = array(
				'handle' => "myfirsttheme-$block_name",
				'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.css" ),
				$args['path'] = get_theme_file_path( "assets/css/blocks/$block_name.css" ),
			);
			wp_enqueue_block_style( "core/$block_name", $args );
		}

	}
endif; // andrea_setup
add_action('after_setup_theme', 'andrea_setup');


wp_enqueue_style( 'style', get_stylesheet_uri() );





