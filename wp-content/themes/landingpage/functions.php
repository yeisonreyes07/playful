<?php
/**
 * Landing Page Yeison Reyes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Landing_Page_Yeison_Reyes
 */
/*
Agregar CMB2
*/ 
require_once dirname (__FILE__) . '/cmb2.php';

/* Campos persolaizados */
 
require_once dirname (__FILE__) . '/inc/custom-fields.php';

add_action('init', 'edc_imagen_destacada' );
function edc_imagen_destacada($id){
     $imagen = get_the_post_thumbnail_url($id, 'full');

     $html = '';
     $clase = false;
     if($imagen) {
          $clase = true;
          $html .= '<div class="container">';
          $html .=       '<div class="row imagen-destacada"></div>';
          $html .= '</div>';

          // Agregar estilos linealmente
          wp_register_style('custom', false);
          wp_enqueue_style('custom');

          // creamos el css para el custom
          $imagen_destacada_css = "
               .imagen-destacada {
                    background-image: url( {$imagen});
               }
          ";
          wp_add_inline_style('custom', $imagen_destacada_css);
     }
     return array($html, $clase);
}

/**
 * Funciones que se cargan al activar el theme
 */
function lanp_setup() {

     // Definir tamaños de imagenes
     add_image_size('mediano', 510, 340, true);
     add_image_size('cuadrada_mediana', 350, 350, true);

     add_theme_support('post-thumbnails');
     add_theme_support('title-tag');

     // Menu de navegación
     register_nav_menus( array(
          'menu_principal' => esc_html__('Menu Principal', 'landingpage')
     ) );
}
add_action('after_setup_theme', 'edc_setup');

/* 
* Agrega la clase nav-link de bootstrap al menu principal
*/
function lanp_menu($atts, $item, $args){
     if($args->theme_location == 'menu_principal') {
          $atts['class'] = 'nav-link';
     }
     return $atts;
}
add_filter('nav_menu_link_attributes', 'landingpage', 10, 3 );


if ( ! function_exists( 'landingpage_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_the me hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function landingpage_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Landing Page Yeison Reyes, use a find and replace
		 * to change 'landingpage' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'landingpage', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'landingpage' ),
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
		add_theme_support( 'custom-background', apply_filters( 'landingpage_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 250,
		) );
	}
endif;
add_action( 'after_setup_theme', 'landingpage_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function landingpage_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'landingpage_content_width', 640 );
}
add_action( 'after_setup_theme', 'landingpage_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function landingpage_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'landingpage' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'landingpage' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'landingpage_widgets_init' );

/**
 * Enqueue scripts and styles. Añadir librerias de Bootstrap
 */
function landingpage_scripts() {
	wp_enqueue_style('style', get_stylesheet_uri(), array('bootstrap-css') );
	wp_enqueue_style( 'styles_css', get_template_directory_uri() . 'style.css' );
	wp_enqueue_style( 'poppins', 'https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:200,300,400', array(), 'all');
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.css' );
	wp_enqueue_style( 'font_css', get_template_directory_uri() . '/assets/fonts/ionicons/css/ionicons.min.css' );
	wp_enqueue_style( 'law_fonts_css', get_template_directory_uri() . '/assets/fonts/law-icons/font/flaticon.css' );
	wp_enqueue_style( 'awesome_css', get_template_directory_uri() . '/assets/fonts/fontawesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'slick_css', get_template_directory_uri() . '/assets/css/slick.css' );
	wp_enqueue_style( 'helpers_css', get_template_directory_uri() . '/assets/css/helpers.css' );
	wp_enqueue_style( 'landing_css', get_template_directory_uri() . '/assets/css/landing-2.css' );
	
	

/*Scripts para la plantilla  */ 


	
	wp_enqueue_script( 'jquery');
 	wp_enqueue_script( 'popper_js', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'slick_min', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '1.0', true );
	wp_enqueue_script( 'player_min', get_template_directory_uri() . '/assets/js/jquery.mb.YTPlayer.min.js', array(), '1.0', true );
	wp_enqueue_script( 'way_points', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array(), '1.0', true );
	wp_enqueue_script( 'main_js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0', true );
    wp_enqueue_script( 'landingpage-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	wp_enqueue_script( 'landingpage-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'landingpage_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

