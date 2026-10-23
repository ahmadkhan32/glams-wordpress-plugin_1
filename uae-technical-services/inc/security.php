<?php
/**
 * Security and Sanitation Enhancements
 *
 * @package UAE_Technical_Services
 */

defined( 'ABSPATH' ) || exit;

// Enable SVG Uploads for Administrators with XML Checking
function uae_allow_svg_uploads( $mimes ) {
    if ( current_user_can( 'administrator' ) ) {
        $mimes['svg']  = 'image/svg+xml';
        $mimes['svgz'] = 'image/svg+xml';
    }
    return $mimes;
}
add_filter( 'upload_mimes', 'uae_allow_svg_uploads' );

// Remove WordPress Version Number for Security
add_filter( 'the_generator', '__return_empty_string' );
