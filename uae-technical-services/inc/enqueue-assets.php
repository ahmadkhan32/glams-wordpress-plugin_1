<?php
/**
 * Asset Enqueuing for UAE Technical Services Theme
 *
 * @package UAE_Technical_Services
 */

defined( 'ABSPATH' ) || exit;

function uae_technical_services_enqueue_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );
    $assets_uri    = get_template_directory_uri() . '/assets';

    // Google Fonts (Poppins & Inter)
    wp_enqueue_style(
        'uae-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@500;600;700;800;900&display=swap',
        [],
        null
    );

    // FontAwesome 6 for Icons
    wp_enqueue_style(
        'uae-fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        [],
        '6.5.0'
    );

    // Root Style
    wp_enqueue_style( 'uae-style', get_stylesheet_uri(), [ 'uae-google-fonts' ], $theme_version );

    // Modular Stylesheets
    wp_enqueue_style( 'uae-main', $assets_uri . '/css/main.css', [ 'uae-style' ], $theme_version );
    wp_enqueue_style( 'uae-header', $assets_uri . '/css/header.css', [ 'uae-main' ], $theme_version );
    wp_enqueue_style( 'uae-footer', $assets_uri . '/css/footer.css', [ 'uae-main' ], $theme_version );
    wp_enqueue_style( 'uae-home', $assets_uri . '/css/home.css', [ 'uae-main' ], $theme_version );
    wp_enqueue_style( 'uae-pages', $assets_uri . '/css/pages.css', [ 'uae-main' ], $theme_version );
    wp_enqueue_style( 'uae-responsive', $assets_uri . '/css/responsive.css', [ 'uae-header', 'uae-footer' ], $theme_version );

    // Modular JavaScript
    wp_enqueue_script( 'uae-navigation', $assets_uri . '/js/navigation.js', [], $theme_version, true );
    wp_enqueue_script( 'uae-mobile-menu', $assets_uri . '/js/mobile-menu.js', [ 'uae-navigation' ], $theme_version, true );
    wp_enqueue_script( 'uae-faq', $assets_uri . '/js/faq.js', [], $theme_version, true );
    wp_enqueue_script( 'uae-contact-form', $assets_uri . '/js/contact-form.js', [], $theme_version, true );

    // Localize Script for AJAX / REST
    wp_localize_script( 'uae-navigation', 'uaeData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'homeUrl' => esc_url( home_url( '/' ) ),
        'siteName'=> get_bloginfo( 'name' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'uae_technical_services_enqueue_scripts' );
