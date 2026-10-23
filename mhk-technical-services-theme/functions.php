<?php
/**
 * MHK Technical Services Theme Functions and Definitions
 *
 * @package MHK_Technical_Services_Theme
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/* ─── THEME CONSTANTS ─── */
define( 'MHK_THEME_VERSION', '1.0.0' );
define( 'MHK_THEME_DIR', get_template_directory() );
define( 'MHK_THEME_URI', get_template_directory_uri() );

/* ─── THEME SETUP ─── */
if ( ! function_exists( 'mhk_technical_services_setup' ) ) :
    function mhk_technical_services_setup() {
        // Load text domain for translations
        load_theme_textdomain( 'mhk-technical-services', MHK_THEME_DIR . '/languages' );

        // Add default posts and comments RSS feed links to head
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage document title
        add_theme_support( 'title-tag' );

        // Enable featured images
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 720, 480, true );

        // Register Primary and Footer navigation menus
        register_nav_menus( [
            'primary' => __( 'Primary Menu', 'mhk-technical-services' ),
            'footer'  => __( 'Footer Menu', 'mhk-technical-services' ),
        ] );

        // Switch default core markup to output valid HTML5
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ] );

        // Custom logo support with fallback
        add_theme_support( 'custom-logo', [
            'height'      => 140,
            'width'       => 280,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => [ 'site-title', 'site-description' ],
        ] );

        // Responsive embeds support
        add_theme_support( 'responsive-embeds' );
    }
endif;
add_action( 'after_setup_theme', 'mhk_technical_services_setup' );

/* ─── ENQUEUE SCRIPTS AND STYLES ─── */
function mhk_technical_services_scripts() {
    // Google Fonts (Inter)
    wp_enqueue_style(
        'mhk-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap',
        [],
        null
    );

    // Main Theme Stylesheet
    wp_enqueue_style(
        'mhk-theme-style',
        get_stylesheet_uri(),
        [ 'mhk-google-fonts' ],
        MHK_THEME_VERSION
    );

    // Theme JavaScript
    wp_enqueue_script(
        'mhk-theme-js',
        MHK_THEME_URI . '/assets/js/theme.js',
        [],
        MHK_THEME_VERSION,
        true
    );

    // Localize Script for smooth interactions
    wp_localize_script( 'mhk-theme-js', 'mhkData', [
        'homeUrl' => esc_url( home_url( '/' ) ),
        'siteName'=> get_bloginfo( 'name' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'mhk_technical_services_scripts' );

/* ─── CENTRALIZED LOGO FUNCTION ─── */
/**
 * Returns or renders the central MHK Technical Services logo.
 * Stored locally inside the theme (/assets/images/mhk-technical-services-logo.png)
 * Supports WordPress Customizer custom-logo override.
 *
 * @param string $location 'header' | 'footer'
 * @return string HTML output
 */
function mhk_get_theme_logo( $location = 'header' ) {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo_url       = '';

    if ( $custom_logo_id ) {
        $custom_src = wp_get_attachment_image_src( $custom_logo_id, 'full' );
        if ( ! empty( $custom_src[0] ) ) {
            $logo_url = $custom_src[0];
        }
    }

    // Default to HD bundled local theme logo
    if ( empty( $logo_url ) ) {
        $logo_url = MHK_THEME_URI . '/assets/images/mhk-technical-services-logo.png';
    }

    $site_name = get_bloginfo( 'name' );
    if ( empty( $site_name ) ) {
        $site_name = 'MHK Technical Services';
    }

    $class_attr = 'mhk-site-logo mhk-logo-' . sanitize_html_class( $location );

    $output  = '<a href="' . esc_url( home_url( '/' ) ) . '" class="mhk-logo-link" rel="home" aria-label="' . esc_attr( $site_name ) . '">';
    $output .= '<img src="' . esc_url( $logo_url ) . '" alt="' . esc_attr( $site_name ) . ' Logo" class="' . esc_attr( $class_attr ) . '" width="220" height="70" loading="eager" decoding="async" />';
    $output .= '<span class="screen-reader-text">' . esc_html( $site_name ) . '</span>';
    $output .= '</a>';

    return apply_filters( 'mhk_theme_logo_html', $output, $location, $logo_url );
}

/**
 * Echo the centralized logo HTML.
 *
 * @param string $location 'header' | 'footer'
 */
function mhk_the_theme_logo( $location = 'header' ) {
    echo mhk_get_theme_logo( $location );
}

/* ─── FALLBACK PRIMARY MENU ─── */
function mhk_fallback_primary_menu() {
    $home_url = esc_url( home_url( '/' ) );
    echo '<ul id="primary-menu" class="mhk-nav-menu">';
    echo '<li class="menu-item"><a href="' . $home_url . '">Home</a></li>';
    echo '<li class="menu-item"><a href="' . $home_url . '#services">Services</a></li>';
    echo '<li class="menu-item"><a href="' . $home_url . '#about">About Us</a></li>';
    echo '<li class="menu-item"><a href="' . $home_url . '#contact">Contact</a></li>';
    echo '</ul>';
}

/* ─── FALLBACK FOOTER MENU ─── */
function mhk_fallback_footer_menu() {
    $home_url = esc_url( home_url( '/' ) );
    echo '<ul class="mhk-footer-links">';
    echo '<li><a href="' . $home_url . '">Home</a></li>';
    echo '<li><a href="' . $home_url . '#services">Services</a></li>';
    echo '<li><a href="' . $home_url . '#about">About Us</a></li>';
    echo '<li><a href="' . $home_url . '#contact">Contact</a></li>';
    echo '</ul>';
}

/* ─── REGISTER SIDEBAR WIDGETS ─── */
function mhk_technical_services_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Main Sidebar', 'mhk-technical-services' ),
        'id'            => 'sidebar-main',
        'description'   => __( 'Widgets in this area appear on blog and archive pages.', 'mhk-technical-services' ),
        'before_widget' => '<div id="%1$s" class="mhk-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="mhk-widget-title">',
        'after_title'   => '</h3>',
    ] );
}
add_action( 'widgets_init', 'mhk_technical_services_widgets_init' );
