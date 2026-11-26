<?php
/**
 * Enqueue scripts and styles
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Build shared localized config array for theme & React app
 */
function glams_get_localized_data() {
    $logo_url = GLAMS_THEME_URI . '/assets/images/mhk-technical-services-logo.png';
    if ( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo_data      = wp_get_attachment_image_src( $custom_logo_id, 'full' );
        if ( ! empty( $logo_data[0] ) ) {
            $logo_url = $logo_data[0];
        }
    }

    return [
        'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
        'restUrl'   => esc_url_raw( rest_url( 'glams/v1/' ) ),
        'nonce'     => wp_create_nonce( 'glams_theme_nonce' ),
        'siteUrl'   => esc_url( home_url( '/' ) ),
        'themeUrl'  => esc_url( GLAMS_THEME_URI ),
        'logoUrl'   => esc_url( $logo_url ),
        'phone'     => get_theme_mod( 'glams_phone', '+971 58 216 6143' ),
        'whatsapp'  => get_theme_mod( 'glams_whatsapp', '971582166143' ),
        'email'     => get_theme_mod( 'glams_email', 'Ummibangash@gmail.com' ),
        'licenseNo' => get_theme_mod( 'glams_license_no', 'DET-2024-001234' ),
        'address'   => get_theme_mod( 'glams_address', 'Al tawar near qusais metro station, Dubai, United Arab Emirates' ),
        'strings'   => [
            'copySuccess'  => __( 'License number copied to clipboard!', 'glams-theme' ),
            'formSuccess'  => __( 'Thank you! Your quote request has been sent successfully.', 'glams-theme' ),
            'formError'    => __( 'Please fill in all required fields.', 'glams-theme' ),
            'certVerified' => __( 'License Verified & Valid — Official DET Record', 'glams-theme' ),
        ],
    ];
}

/**
 * Output window.glamsData in <head> before any deferred/delayed cache optimizer runs
 */
function glams_print_head_config() {
    echo '<script id="glams-head-config" data-no-optimize="1" data-no-defer="1" data-no-minify="1" data-cfasync="false" nowprocket>' . "\n";
    echo 'window.glamsData = window.glamsData || ' . wp_json_encode( glams_get_localized_data() ) . ';' . "\n";
    echo '</script>' . "\n";
}
add_action( 'wp_head', 'glams_print_head_config', 1 );

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

    // Keep standard localized data attached as well
    wp_localize_script( 'glams-theme-js', 'glamsData', glams_get_localized_data() );

    // Enqueue React SPA Bundle (matches https://react-app-nu-one-90.vercel.app/)
    if ( file_exists( GLAMS_THEME_DIR . '/assets/js/glams-react.js' ) ) {
        wp_enqueue_script(
            'glams-react',
            GLAMS_THEME_URI . '/assets/js/glams-react.js',
            [ 'glams-theme-js' ],
            GLAMS_THEME_VERSION,
            true
        );
    }

    // Enable threaded comments on singular posts
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'glams_enqueue_scripts' );

/**
 * Protect theme/React scripts from aggressive JS minifiers & LiteSpeed Delay/Defer mangling
 */
function glams_script_loader_tag( $tag, $handle, $src ) {
    if ( 'glams-react' === $handle ) {
        return '<script defer src="' . esc_url( $src ) . '" id="glams-react-js" data-no-optimize="1" data-no-defer="1" data-no-minify="1" data-cfasync="false" nowprocket></script>' . "\n";
    }
    if ( 'glams-theme-js' === $handle ) {
        return '<script defer src="' . esc_url( $src ) . '" id="glams-theme-js-js" data-no-optimize="1" data-no-defer="1" data-cfasync="false" nowprocket></script>' . "\n";
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'glams_script_loader_tag', 10, 3 );

/**
 * LiteSpeed Cache Compatibility Filters
 * Prevents UCSS stripping of dynamic React SPA classes and excludes brand logo from Lazy Load hiding
 */
function glams_litespeed_js_excludes( $excludes ) {
    if ( ! is_array( $excludes ) ) {
        $excludes = [];
    }
    $excludes[] = 'glams-react.js';
    $excludes[] = 'glams-theme/assets/js/theme.js';
    $excludes[] = 'glamsData';
    return array_unique( $excludes );
}
add_filter( 'litespeed_optimize_js_excludes', 'glams_litespeed_js_excludes' );
add_filter( 'litespeed_optm_js_defer_exc', 'glams_litespeed_js_excludes' );

function glams_litespeed_lazy_img_excludes( $excludes ) {
    if ( ! is_array( $excludes ) ) {
        $excludes = [];
    }
    $excludes[] = 'mhk-technical-services-logo.png';
    $excludes[] = 'logo.svg';
    $excludes[] = 'logo-white.svg';
    $excludes[] = 'glams-logo-img';
    $excludes[] = 'skip-lazy';
    return array_unique( $excludes );
}
add_filter( 'litespeed_media_lazy_img_excludes', 'glams_litespeed_lazy_img_excludes' );

function glams_litespeed_ucss_whitelist( $whitelist ) {
    if ( ! is_array( $whitelist ) ) {
        $whitelist = [];
    }
    $selectors = [
        '#glams-root', '.page', '.page.active', '.glams-react-active',
        '.navbar', '.top-bar', '.hero', '.site-footer',
        '.nav-dropdown', '.nav-dropdown-menu', '.mobile-menu', '.mobile-dropdown',
        '.glams-mobile-drawer', '.glams-mobile-overlay', '.is-open',
        '.mhk-pricing-card', '.svc-card', '.svc-card--open', '.glams-svc-features.is-visible',
    ];
    return array_unique( array_merge( $whitelist, $selectors ) );
}
add_filter( 'litespeed_ucss_whitelist', 'glams_litespeed_ucss_whitelist' );

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
