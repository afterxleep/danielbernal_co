<?php
/**
 * Daniel Bernal functions and definitions
 *
 * @package danielbernal_co
 */

if ( ! function_exists( 'danielbernal_co_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function danielbernal_co_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Daniel Bernal, use a find and replace
	 * to change 'danielbernal-co' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'danielbernal-co', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );


	add_theme_support( 'customize_selective_refresh_widgets' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 740, 500, true );
	add_image_size( 'danielbernal-co-banner', 1480, 500, true );
	add_image_size( 'danielbernal-co-full-width', 1480, 9999 );
	add_image_size( 'danielbernal-co-home-banner', 740, 250, array( 'center', 'center' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Header', 'danielbernal-co' ),
	) );

	/**
	 * Add custom logo support
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 300,
		'width'       => 1500,
		'flex-width'  => true,
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'danielbernal_co_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );

	// Load regular editor styles into the new block-based editor.
	add_theme_support( 'editor-styles' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for custom color scheme.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Medium Blue', 'danielbernal-co' ),
			'slug'  => 'medium-blue',
			'color' => '#0087be',
		),
		array(
			'name'  => __( 'Bright Blue', 'danielbernal-co' ),
			'slug'  => 'bright-blue',
			'color' => '#00aadc',
		),
		array(
			'name'  => __( 'Dark Gray', 'danielbernal-co' ),
			'slug'  => 'dark-gray',
			'color' => '#4d4d4b',
		),
		array(
			'name'  => __( 'Light Gray', 'danielbernal-co' ),
			'slug'  => 'light-gray',
			'color' => '#b3b3b1',
		),
		array(
			'name'  => __( 'White', 'danielbernal-co' ),
			'slug'  => 'white',
			'color' => '#fff',
		),
	) );
}
endif; // danielbernal_co_setup
add_action( 'after_setup_theme', 'danielbernal_co_setup' );

if ( ! function_exists( 'danielbernal_co_word_count' ) ) :
/**
 * Gets the number of words in the post content.
 *
 * @link http://php.net/str_word_count
 * @link http://php.net/number_format
 */
function danielbernal_co_word_count() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$count   = str_word_count( strip_tags( $content ) );
	$time    = $count / 250; //Roughly 250 wpm reading time
	return number_format( $time );
}
endif; // danielbernal_co_word_count

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function danielbernal_co_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'danielbernal_co_content_width', 1100 );
}
add_action( 'after_setup_theme', 'danielbernal_co_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function danielbernal_co_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'danielbernal-co' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'danielbernal-co' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'danielbernal-co' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'danielbernal-co' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'danielbernal_co_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function danielbernal_co_scripts() {

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.3.1' );

	wp_enqueue_style( 'danielbernal-co-style', get_stylesheet_uri() );

	// Gist stylesheet
	wp_enqueue_style( 'gist.css', get_template_directory_uri() . '/css/gist.css',false,'1.1','all');

	// Theme block stylesheet.
	wp_enqueue_style( 'danielbernal-co-block-style', get_theme_file_uri( '/css/blocks.css' ), array( 'danielbernal-co-style' ), '1.0' );

	wp_enqueue_script( 'danielbernal-co-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20170317', true );

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		wp_enqueue_script( 'danielbernal-co-images', get_template_directory_uri() . '/js/danielbernal-co.js', array( 'jquery' ), '20170406', true );
	}

	// If there's an active Video widget, and it's (hopefully) in the footer widget area
	if ( is_active_widget( '','', 'media_video' ) && ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) ) {
		wp_enqueue_script( 'danielbernal-co-video-widget', get_template_directory_uri() . '/js/video-widget.js', array( 'jquery' ), '20170608', true );
	}

	wp_enqueue_script( 'danielbernal-co-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170315', true );

	if ( danielbernal_co_has_header_image() ) {
		wp_add_inline_style( 'danielbernal-co-style', sprintf(
			'#hero-header { background: url("%s") no-repeat center; background-size: cover; background-attachment: scroll; }',
			esc_url( get_header_image() )
		) );
	}

	if ( is_singular() ) {

		if ( comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		$is_wc_product_page = false;
		if ( class_exists( 'WooCommerce' ) && is_product() ) {
			$is_wc_product_page = true;
		}

		if ( danielbernal_co_has_cover_image() && danielbernal_co_jetpack_featured_image_display() && ! $is_wc_product_page ) {

			$banner_src = get_the_post_thumbnail( get_the_ID(), 'danielbernal-co-banner' );

			//Look for URLs in the image HTML
			preg_match_all( '#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $banner_src, $banner_matches );

			//Grab the first URL
			$banner = $banner_matches[0][0];

			wp_add_inline_style( 'danielbernal-co-style', sprintf(
				'#hero-header { background: url("%s") no-repeat center; background-size: cover; background-attachment: scroll; }',
				esc_url( $banner )
			) );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'danielbernal_co_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 */
function danielbernal_co_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'independent-pub-block-editor-style', get_theme_file_uri( '/css/editor-blocks.css' ) );
}
add_action( 'enqueue_block_editor_assets', 'danielbernal_co_block_editor_styles' );

/**
 * Returns true if a post Featured Image can be displayed.
 *
 * @return bool
 */
function danielbernal_co_has_cover_image() {

	if ( is_singular() && ! post_password_required() && ! is_attachment() && danielbernal_co_has_post_thumbnail() ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Returns true if there's a header image set.
 *
 * @return bool
 */
function danielbernal_co_has_header_image() {
	return (bool) get_header_image();
}

/**
 * Returns true if the word count can be displayed in posts.
 *
 * @return bool
 */
function danielbernal_co_show_word_count() {
	$content = get_post_field( 'post_content', get_the_ID() );
	return in_array( get_post_type(), array( 'post' ) ) && ! empty( $content ) && (bool) 1 === (bool) get_theme_mod( 'danielbernal_co_display_reading_time', 1 );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


// updater for WordPress.com themes
if ( is_admin() )
	include dirname( __FILE__ ) . '/inc/updater.php';
