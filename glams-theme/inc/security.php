<?php
/**
 * Security and Form Submission Handlers
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

// Enable SVG Uploads for Administrators
function glams_allow_svg_uploads( $mimes ) {
    if ( current_user_can( 'administrator' ) ) {
        $mimes['svg']  = 'image/svg+xml';
        $mimes['svgz'] = 'image/svg+xml';
    }
    return $mimes;
}
add_filter( 'upload_mimes', 'glams_allow_svg_uploads' );

// Remove WordPress Version Number for Security
add_filter( 'the_generator', '__return_empty_string' );

/**
 * Handle Quote Request Form via AJAX
 */
function glams_ajax_submit_quote() {
    check_ajax_referer( 'glams_theme_nonce', 'nonce' );

    $name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
    $phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
    $email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $service = isset( $_POST['service'] ) ? sanitize_text_field( wp_unslash( $_POST['service'] ) ) : '';
    $company = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
    $message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

    if ( empty( $name ) || empty( $phone ) ) {
        wp_send_json_error( [ 'message' => __( 'Name and Phone number are required.', 'glams-theme' ) ] );
    }

    $to      = get_theme_mod( 'glams_email', get_option( 'admin_email' ) );
    $subject = sprintf( '[GLAMS Lead] New Quote Request from %s', $name );
    $body    = "New Technical Services Quote Request:\n\n";
    $body   .= "Full Name: " . $name . "\n";
    $body   .= "Phone: " . $phone . "\n";
    $body   .= "Email: " . $email . "\n";
    $body   .= "Company: " . $company . "\n";
    $body   .= "Service Selected: " . $service . "\n";
    $body   .= "Message:\n" . $message . "\n\n";
    $body   .= "Date: " . current_time( 'mysql' ) . "\n";
    $body   .= "IP Address: " . sanitize_text_field( $_SERVER['REMOTE_ADDR'] ?? '' ) . "\n";

    $headers = [ 'Content-Type: text/plain; charset=UTF-8' ];
    if ( ! empty( $email ) ) {
        $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
    }

    @wp_mail( $to, $subject, $body, $headers );

    wp_send_json_success( [
        'message' => __( 'Thank you! Your inquiry has been received. Our engineering team will contact you shortly.', 'glams-theme' ),
    ] );
}
add_action( 'wp_ajax_glams_submit_quote', 'glams_ajax_submit_quote' );
add_action( 'wp_ajax_nopriv_glams_submit_quote', 'glams_ajax_submit_quote' );
