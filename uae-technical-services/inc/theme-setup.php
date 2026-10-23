<?php
/**
 * Theme Setup and Core Configuration
 *
 * @package UAE_Technical_Services
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'uae_technical_services_setup' ) ) :
    function uae_technical_services_setup() {
        // Translation support
        load_theme_textdomain( 'uae-technical-services', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title
        add_theme_support( 'title-tag' );

        // Featured image / post thumbnails
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 760, 440, true );
        add_image_size( 'uae-hero', 1920, 650, true );
        add_image_size( 'uae-card', 600, 380, true );

        // Navigation Menus
        register_nav_menus( [
            'primary' => __( 'Primary Navigation', 'uae-technical-services' ),
            'footer'  => __( 'Footer Navigation', 'uae-technical-services' ),
            'legal'   => __( 'Legal Links Menu', 'uae-technical-services' ),
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

        // Custom Logo support (Shared implementation rule)
        add_theme_support( 'custom-logo', [
            'height'      => 120,
            'width'       => 320,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => [ 'site-title', 'site-description' ],
        ] );

        // Selective Refresh for Widgets
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Responsive embedded content
        add_theme_support( 'responsive-embeds' );
    }
endif;
add_action( 'after_setup_theme', 'uae_technical_services_setup' );
