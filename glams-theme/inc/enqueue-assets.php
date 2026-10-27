<?php
/**
 * Enqueue scripts and styles
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

function glams_enqueue_scripts() {
    // Google Fonts (Inter + Noto Naskh Arabic for bilingual display)
    wp_enqueue_style(
        'glams-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Noto+Naskh+Arabic:wght@400;500;600;700&display=swap',
        [],
        null
    );

    // FontAwesome 6 Icons
    wp_enqueue_style(
        'glams-font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        [],
        '6.5.1'
    );

    // Main Theme Stylesheet
    wp_enqueue_style(
        'glams-style',
        get_stylesheet_uri(),
        [ 'glams-google-fonts', 'glams-font-awesome' ],
        GLAMS_THEME_VERSION
    );

    // Theme JavaScript
    wp_enqueue_script(
        'glams-theme-js',
        GLAMS_THEME_URI . '/assets/js/theme.js',
        [ 'jquery' ],
        GLAMS_THEME_VERSION,
        true
    );

    // Pass dynamic localized data to JS
    wp_localize_script( 'glams-theme-js', 'glamsData', [
        'ajaxUrl'     => admin_url( 'admin-ajax.php' ),
        'restUrl'     => esc_url_raw( rest_url( 'glams/v1/' ) ),
        'nonce'       => wp_create_nonce( 'glams_theme_nonce' ),
        'siteUrl'     => esc_url( home_url( '/' ) ),
        'themeUrl'    => esc_url( GLAMS_THEME_URI ),
        'phone'       => get_theme_mod( 'glams_phone', '+971 4 123 4567' ),
        'whatsapp'    => get_theme_mod( 'glams_whatsapp', '+971 50 123 4567' ),
        'email'       => get_theme_mod( 'glams_email', 'info@mhktechnicalservices.com' ),
        'licenseNo'   => get_theme_mod( 'glams_license_no', 'DET-2024-001234' ),
        'strings'     => [
            'copySuccess'   => __( 'License number copied to clipboard!', 'glams-theme' ),
            'formSuccess'   => __( 'Thank you! Your quote request has been sent successfully.', 'glams-theme' ),
            'formError'     => __( 'Please fill in all required fields.', 'glams-theme' ),
            'certVerified'  => __( 'License Verified & Valid — Official DET Record', 'glams-theme' ),
        ],
    ] );

    // Enable threaded comments on singular posts
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'glams_enqueue_scripts' );

/**
 * Add preconnect tags for performance optimization
 */
function glams_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = [
            'href'        => 'https://fonts.googleapis.com',
            'crossorigin' => 'anonymous',
        ];
        $urls[] = [
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        ];
        $urls[] = [
            'href'        => 'https://cdnjs.cloudflare.com',
            'crossorigin' => 'anonymous',
        ];
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'glams_resource_hints', 10, 2 );
