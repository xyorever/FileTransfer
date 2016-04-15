<?php
/**
 * Onion functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Onion
 */

if (! function_exists('onion_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function onion_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Onion, use a find and replace
	 * to change 'onion' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('onion', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(array(
		'primary' => esc_html__('Primary', 'onion'),
		'footer_products' => esc_html__('Products', 'onion'),
		'footer_company' => esc_html__('Company', 'onion'),
		'footer_resources' => esc_html__('Resources', 'onion')
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support('post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	));

	// Set up the WordPress core custom background feature.
	add_theme_support('custom-background', apply_filters('onion_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));
}
endif;
add_action('after_setup_theme', 'onion_setup');


// Remove Admin Bar
add_filter('show_admin_bar', '__return_false');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function onion_content_width() {
	$GLOBALS['content_width'] = apply_filters('onion_content_width', 640);
}
add_action('after_setup_theme', 'onion_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function onion_widgets_init() {
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'onion'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'onion'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'onion_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function onion_scripts() {
	wp_enqueue_style('onion-style', get_stylesheet_uri(), array('bootstrap-style'));
	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('onion-logo', get_template_directory_uri() . '/css/onion.css');
	wp_enqueue_style('glyphicons-social', get_template_directory_uri() . '/css/glyphicons-social.css');

	wp_enqueue_script('tether', get_template_directory_uri() . '/js/tether.js', array(), false, true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery', 'tether'), false, true);
	wp_enqueue_script('onion-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
	wp_enqueue_script('onion-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
	wp_enqueue_script('check-login', get_template_directory_uri() . '/js/check-login.js', array('jquery'), false, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'onion_scripts');

/**
 * Add nav-item to class of the links
 */
function add_bootstrap_nav_link_class($atts, $item, $args, $depth) {
    if ($args->menu->slug == 'primary') {
        $class = 'nav-link';
        // Make sure not to overwrite any existing classes
        $atts['class'] = (!empty($atts['class'])) ? $atts['class'] . ' ' . $class : $class; 
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_bootstrap_nav_link_class', 10, 4);

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
