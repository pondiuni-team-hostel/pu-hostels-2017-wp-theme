<?php
/**
 * PU Hostels functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage PU_Hostels
 * @since 0.0
 */

/**
 * PU Hostels Theme only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}


@ini_set( 'upload_max_size' , '10M' );
@ini_set( 'post_max_size', '10M');
@ini_set( 'max_execution_time', '300' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pu_hostels_2017_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/pu_hostels_2017
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pu_hostels_2017' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'pu_hostels_2017-featured-image', 2000, 1200, true );

	add_image_size( 'pu_hostels_2017-thumbnail-avatar', 100, 100, true );

    add_image_size( 'pu_hostels_2017-accordion-image', 600, 400, array( 'center', 'center' ) );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main-menu'    => __( 'Main Menu', 'pu_hostels_2017' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 410,
		'height'      => 110,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', pu_hostels_2017_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		// 'widgets' => array(
		// 	// Place three core-defined widgets in the sidebar area.
		// 	'sidebar-1' => array(
		// 		'text_business_info',
		// 		'search',
		// 		'text_about',
		// 	),
        //
		// 	// Add the core-defined business info widget to the footer 1 area.
		// 	'sidebar-2' => array(
		// 		'text_business_info',
		// 	),
        //
		// 	// Put two core-defined widgets in the footer 2 area.
		// 	'sidebar-3' => array(
		// 		'text_about',
		// 		'search',
		// 	),
		// ),

		// // Specify the core-defined pages to create and add custom thumbnails to some of them.
		// 'posts' => array(
		// 	'home',
		// 	'about' => array(
		// 		'thumbnail' => '{{image-sandwich}}',
		// 	),
		// 	'contact' => array(
		// 		'thumbnail' => '{{image-espresso}}',
		// 	),
		// 	'blog' => array(
		// 		'thumbnail' => '{{image-coffee}}',
		// 	),
		// 	'homepage-section' => array(
		// 		'thumbnail' => '{{image-espresso}}',
		// 	),
		// ),

		// // Create the custom image attachments used as post thumbnails for pages.
		// 'attachments' => array(
		// 	'image-espresso' => array(
		// 		'post_title' => _x( 'Espresso', 'Theme starter content', 'pu_hostels_2017' ),
		// 		'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
		// 	),
		// 	'image-sandwich' => array(
		// 		'post_title' => _x( 'Sandwich', 'Theme starter content', 'pu_hostels_2017' ),
		// 		'file' => 'assets/images/sandwich.jpg',
		// 	),
		// 	'image-coffee' => array(
		// 		'post_title' => _x( 'Coffee', 'Theme starter content', 'pu_hostels_2017' ),
		// 		'file' => 'assets/images/coffee.jpg',
		// 	),
		// ),

		// // Default to a static front page and assign the front and posts pages.
		// 'options' => array(
		// 	'show_on_front' => 'page',
		// 	'page_on_front' => '{{home}}',
		// 	'page_for_posts' => '{{blog}}',
		// ),

		// // Set the front page section theme mods to the IDs of the core-registered pages.
		// 'theme_mods' => array(
		// 	'panel_1' => '{{homepage-section}}',
		// 	'panel_2' => '{{about}}',
		// 	'panel_3' => '{{blog}}',
		// 	'panel_4' => '{{contact}}',
		// ),

		// Set up nav menus for the areaa registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'pu_hostels_2017' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	);
}
add_action( 'after_setup_theme', 'pu_hostels_2017_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pu_hostels_2017_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( pu_hostels_2017_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'pu_hostels_2017_content_width', $content_width );
}
add_action( 'template_redirect', 'pu_hostels_2017_content_width', 0 );

/**
 * Register custom fonts.
 */
function pu_hostels_2017_fonts_url() {
	$fonts_url = '';

	// /**
	//  * Translators: If there are characters in your language that are not
	//  * supported by Libre Franklin, translate this to 'off'. Do not translate
	//  * into your own language.
	//  */
	// $libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'pu_hostels_2017' );
    //
	// if ( 'off' !== $libre_franklin ) {
	// 	$font_families = array();
    //
	// 	$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';
    //
	// 	$query_args = array(
	// 		'family' => urlencode( implode( '|', $font_families ) ),
	// 		'subset' => urlencode( 'latin,latin-ext' ),
	// 	);
    //
	// 	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	// }

	return esc_url_raw( $fonts_url );
}

// /**
//  * Add preconnect for Google Fonts.
//  *
//  * @since Twenty Seventeen 1.0
//  *
//  * @param array  $urls           URLs to print for resource hints.
//  * @param string $relation_type  The relation type the URLs are printed.
//  * @return array $urls           URLs to print for resource hints.
//  */
// function pu_hostels_2017_resource_hints( $urls, $relation_type ) {
// 	if ( wp_style_is( 'pu_hostels_2017-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
// 		$urls[] = array(
// 			'href' => 'https://fonts.gstatic.com',
// 			'crossorigin',
// 		);
// 	}
//
// 	return $urls;
// }
// add_filter( 'wp_resource_hints', 'pu_hostels_2017_resource_hints', 10, 2 );

// /**
//  * Register widget area.
//  *
//  * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
//  */
// function pu_hostels_2017_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => __( 'Sidebar', 'pu_hostels_2017' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => __( 'Add widgets here to appear in your sidebar.', 'pu_hostels_2017' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
//
// 	register_sidebar( array(
// 		'name'          => __( 'Footer 1', 'pu_hostels_2017' ),
// 		'id'            => 'sidebar-2',
// 		'description'   => __( 'Add widgets here to appear in your footer.', 'pu_hostels_2017' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
//
// 	register_sidebar( array(
// 		'name'          => __( 'Footer 2', 'pu_hostels_2017' ),
// 		'id'            => 'sidebar-3',
// 		'description'   => __( 'Add widgets here to appear in your footer.', 'pu_hostels_2017' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'pu_hostels_2017_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function pu_hostels_2017_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pu_hostels_2017' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'pu_hostels_2017_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function pu_hostels_2017_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'pu_hostels_2017_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pu_hostels_2017_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'pu_hostels_2017_pingback_header' );

/**
 * Display custom color CSS.
 */
function pu_hostels_2017_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo pu_hostels_2017_custom_colors_css(); ?>
	</style>
<?php }
// add_action( 'wp_head', 'pu_hostels_2017_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function pu_hostels_2017_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'pu_hostels_2017-fonts', pu_hostels_2017_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'pu_hostels_2017-style', get_stylesheet_uri() );

	// Load the dark colorscheme.
	// if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
	// 	wp_enqueue_style( 'pu_hostels_2017-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'pu_hostels_2017-style' ), '1.0' );
	// }

	// // Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	// if ( is_customize_preview() ) {
	// 	wp_enqueue_style( 'pu_hostels_2017-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'pu_hostels_2017-style' ), '1.0' );
	// 	wp_style_add_data( 'pu_hostels_2017-ie9', 'conditional', 'IE 9' );
	// }
    //
	// // Load the Internet Explorer 8 specific stylesheet.
	// wp_enqueue_style( 'pu_hostels_2017-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'pu_hostels_2017-style' ), '1.0' );
	// wp_style_add_data( 'pu_hostels_2017-ie8', 'conditional', 'lt IE 9' );

    wp_enqueue_style( 'pu_hostels_2017-main', get_theme_file_uri( '/assets/css/main.css' ), array( 'pu_hostels_2017-style' ), '1.0' );


    // wp_enqueue_style( 'pu_hostels_2017-petit-formal-script','https://fonts.googleapis.com/css?family=Petit+Formal+Script', '1.0' );
    wp_enqueue_style( 'pu_hostels_2017-damion','https://fonts.googleapis.com/css?family=Damion', '1.0' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	// wp_enqueue_script( 'pu_hostels_2017-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$pu_hostels_2017_l10n = array(
		'quote'          => pu_hostels_2017_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	// if ( has_nav_menu( 'top' ) ) {
	// 	wp_enqueue_script( 'pu_hostels_2017-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '1.0', true );
	// 	$pu_hostels_2017_l10n['expand']         = __( 'Expand child menu', 'pu_hostels_2017' );
	// 	$pu_hostels_2017_l10n['collapse']       = __( 'Collapse child menu', 'pu_hostels_2017' );
	// 	$pu_hostels_2017_l10n['icon']           = pu_hostels_2017_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	// }



	// wp_enqueue_script( 'pu_hostels_2017-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

    wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/vendors/bootstrap.min.js' ), array( 'jquery' ), '1.0', true );

    wp_enqueue_script( 'jquery-slimscroll', get_theme_file_uri( '/assets/js/vendors/jquery.slimscroll.min.js' ), array( 'jquery' ), '1.0', true );

    // wp_enqueue_script( 'pu_hostels_2017-limit', get_theme_file_uri( '/assets/js/vendors/limit.js' ), array( 'jquery' ), '1.0', true );
    //
    // wp_enqueue_script( 'pu_hostels_2017-zA7n', get_theme_file_uri( '/assets/js/vendors/zA7n-min_custom.js' ), array( 'jquery' ), '1.0', true );

    wp_enqueue_script( 'pu_hostels_2017-main', get_theme_file_uri( '/assets/js/main.js' ), array( 'jquery' ), '1.0', true );

	// wp_localize_script( 'pu_hostels_2017-skip-link-focus-fix', 'pu_hostels_2017ScreenReaderText', $pu_hostels_2017_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pu_hostels_2017_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function pu_hostels_2017_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'pu_hostels_2017_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function pu_hostels_2017_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'pu_hostels_2017_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function pu_hostels_2017_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'pu_hostels_2017_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function pu_hostels_2017_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'pu_hostels_2017_front_page_template' );



function pu_hostel_2017_widgets_init() {

    // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'First Footer Widget Area', 'pu_hostel_2017' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'pu_hostel_2017' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Second Footer Widget Area', 'pu_hostel_2017' ),
        'id' => 'second-footer-widget-area',
        'description' => __( 'The second footer widget area', 'pu_hostel_2017' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Third Footer Widget Area', 'pu_hostel_2017' ),
        'id' => 'third-footer-widget-area',
        'description' => __( 'The third footer widget area', 'pu_hostel_2017' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Fourth Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Fourth Footer Widget Area', 'pu_hostel_2017' ),
        'id' => 'fourth-footer-widget-area',
        'description' => __( 'The fourth footer widget area', 'pu_hostel_2017' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

}

// Register sidebars by running pu_hostel_2017_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'pu_hostel_2017_widgets_init' );

remove_filter( 'the_content', 'wpautop' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Wordpress Bootstrap Navwalker
 */
require_once get_parent_theme_file_path( '/inc/wp-bootstrap-navwalker-custom.php' );

/**
 * Custom Post Types
 */
require_once get_parent_theme_file_path( '/inc/custom-post-types.php' );

/**
 * Custom Shortcodes
 */
require_once get_parent_theme_file_path( '/inc/custom-shortcodes.php' );

function format_mobile($contact) {
    return "+91-" . substr($contact, 0, 5) . "-" . substr($contact, 5);
}
