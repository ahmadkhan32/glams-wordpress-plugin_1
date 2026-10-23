<?php
/**
 * Shared Template Helper Functions and Centralized Logo Handler
 *
 * @package UAE_Technical_Services
 */

defined( 'ABSPATH' ) || exit;

/**
 * Centralized Logo Renderer (Rule: Shared output, responsive, with dark/white variant support)
 *
 * @param string $location 'header' | 'footer'
 * @param string $variant  'auto' | 'standard' | 'white'
 * @return string HTML output
 */
function uae_get_theme_logo( $location = 'header', $variant = 'auto' ) {
    $site_name = get_bloginfo( 'name' );
    if ( empty( $site_name ) ) {
        $site_name = 'MHK Technical Services';
    }

    $theme_uri = get_template_directory_uri();
    $logo_url  = '';

    // If Custom Logo set in WordPress Customizer
    if ( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo_data      = wp_get_attachment_image_src( $custom_logo_id, 'full' );
        if ( ! empty( $logo_data[0] ) ) {
            $logo_url = $logo_data[0];
        }
    }

    // Default to bundled theme logos based on variant/location
    if ( empty( $logo_url ) ) {
        if ( $variant === 'white' ) {
            $logo_url = $theme_uri . '/assets/images/logo-white.svg';
        } else {
            $logo_url = $theme_uri . '/assets/images/logo.svg';
        }
    }

    $class_attr = 'uae-logo-img uae-logo-' . esc_attr( $location );
    if ( $variant === 'white' ) {
        $class_attr .= ' uae-logo-white';
    }

    $html  = '<a href="' . esc_url( home_url( '/' ) ) . '" class="uae-logo-link" rel="home" aria-label="' . esc_attr( $site_name ) . '">';
    $html .= '<img src="' . esc_url( $logo_url ) . '" alt="' . esc_attr( $site_name ) . ' Logo" class="' . esc_attr( $class_attr ) . '" width="240" height="65" loading="eager" decoding="async" />';
    $html .= '<span class="screen-reader-text">' . esc_html( $site_name ) . '</span>';
    $html .= '</a>';

    return apply_filters( 'uae_theme_logo_html', $html, $location, $variant, $logo_url );
}

/**
 * Echo the centralized logo HTML.
 */
function uae_the_theme_logo( $location = 'header', $variant = 'auto' ) {
    echo uae_get_theme_logo( $location, $variant );
}

/**
 * Fallback Primary Menu
 */
function uae_fallback_primary_menu() {
    $home = esc_url( home_url( '/' ) );
    echo '<ul id="primary-menu" class="uae-nav-list">';
    echo '<li class="nav-item"><a href="' . $home . '">Home</a></li>';
    echo '<li class="nav-item"><a href="' . $home . '#about">About Us</a></li>';
    echo '<li class="nav-item"><a href="' . $home . '#services">Services</a></li>';
    echo '<li class="nav-item"><a href="' . $home . '#process">Process</a></li>';
    echo '<li class="nav-item"><a href="' . $home . '#testimonials">Testimonials</a></li>';
    echo '<li class="nav-item"><a href="' . $home . '#faq">FAQ</a></li>';
    echo '<li class="nav-item"><a href="' . $home . '#contact">Contact</a></li>';
    echo '</ul>';
}

/**
 * Fallback Footer Menu
 */
function uae_fallback_footer_menu() {
    $home = esc_url( home_url( '/' ) );
    echo '<ul class="footer-links">';
    echo '<li><a href="' . $home . '">Home</a></li>';
    echo '<li><a href="' . $home . '#about">About Us</a></li>';
    echo '<li><a href="' . $home . '#services">Services</a></li>';
    echo '<li><a href="' . $home . '#contact">Contact</a></li>';
    echo '</ul>';
}
