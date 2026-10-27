<?php
/**
 * Theme Setup and Core Configuration
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'glams_theme_setup' ) ) :
    function glams_theme_setup() {
        // Translation support
        load_theme_textdomain( 'glams-theme', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title
        add_theme_support( 'title-tag' );

        // Featured image / post thumbnails
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 800, 500, true );
        add_image_size( 'glams-hero', 1920, 720, true );
        add_image_size( 'glams-card', 640, 420, true );
        add_image_size( 'glams-avatar', 120, 120, true );

        // Navigation Menus
        register_nav_menus( [
            'primary' => __( 'Primary Navigation', 'glams-theme' ),
            'footer'  => __( 'Footer Navigation', 'glams-theme' ),
            'legal'   => __( 'Legal Links Menu', 'glams-theme' ),
        ] );

        // Switch core markup to output valid HTML5
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ] );

        // Custom Logo support
        add_theme_support( 'custom-logo', [
            'height'      => 120,
            'width'       => 340,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => [ 'site-title', 'site-description' ],
        ] );

        // Selective Refresh for Widgets
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Responsive embedded content
        add_theme_support( 'responsive-embeds' );

        // Editor color palette matching GLAMS design system
        add_theme_support( 'editor-color-palette', [
            [
                'name'  => __( 'Deep Blue', 'glams-theme' ),
                'slug'  => 'primary',
                'color' => '#12304A',
            ],
            [
                'name'  => __( 'UAE Green', 'glams-theme' ),
                'slug'  => 'accent',
                'color' => '#00843D',
            ],
            [
                'name'  => __( 'UAE Red', 'glams-theme' ),
                'slug'  => 'red',
                'color' => '#C8102E',
            ],
            [
                'name'  => __( 'Gold Accent', 'glams-theme' ),
                'slug'  => 'gold',
                'color' => '#D4A64A',
            ],
            [
                'name'  => __( 'Dark Blue', 'glams-theme' ),
                'slug'  => 'dark',
                'color' => '#0a1c2c',
            ],
            [
                'name'  => __( 'Light Slate BG', 'glams-theme' ),
                'slug'  => 'bg',
                'color' => '#F8FAFC',
            ],
        ] );
    }
endif;
add_action( 'after_setup_theme', 'glams_theme_setup' );

/**
 * Set content width
 */
function glams_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'glams_content_width', 1240 );
}
add_action( 'after_setup_theme', 'glams_content_width', 0 );
