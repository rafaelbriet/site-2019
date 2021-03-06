<?php

require( get_template_directory(  ) . '/includes/function-theme-settings.php');
require( get_template_directory(  ) . '/includes/gutenberg.php');

if ( ! function_exists( 'rafaelbriet_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function rafaelbriet_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'rafaelbriet', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 395, 395, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'header-menu' => __( 'Menu Principal', 'rafaelbriet' ),
				'blog-menu' => __( 'Menu do Blog', 'rafaelbriet' ),
				'portfolio-menu' => __( 'Menu do Portfolio', 'rafaelbriet' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 80,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;

add_action( 'after_setup_theme', 'rafaelbriet_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function rafaelbriet_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'rafaelbriet_content_width', 640 );
}

add_action( 'after_setup_theme', 'rafaelbriet_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function rafaelbriet_scripts() {
	wp_enqueue_style( 'rafaelbriet-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_enqueue_script( 'rafaelbriet-menutoogle', get_template_directory_uri() . '/assets/js/menuToggle.js', null, null, true);
	wp_enqueue_script( 'rafaelbriet-fontawesome', 'https://kit.fontawesome.com/5a3e06cedb.js', null, null, false);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'rafaelbriet_scripts' );


function rafaelbriet_fontawesome_script_filter($tag, $handle, $src) {
	if ($handle == 'rafaelbriet-fontawesome') {
		return '<script async src="' . $src . '" crossorigin="anonymous"></script>';
	}

	return $tag;
}

add_filter( 'script_loader_tag', 'rafaelbriet_fontawesome_script_filter', 10, 3);

/**
 * 
 * Text highlight for search results
 * 
 * author: Vincent Decaux
 * link: https://wordpress.stackexchange.com/a/359840
 * 
 */
function highlight_results($text) {
    if (is_search() && !is_admin()) {
        $sr = get_query_var('s');
        $keys = explode(' ', $sr);
        $keys = array_filter($keys);
        $text = preg_replace('/('.implode('|', $keys) .')/i', '<mark class="search-highlight">\0</mark>', $text);
	}
	
    return $text;
}

add_filter('the_excerpt', 'highlight_results');
add_filter('the_title', 'highlight_results');