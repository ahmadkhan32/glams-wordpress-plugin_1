<?php
/**
 * Customizer Additions for Contact & Branding Info
 *
 * @package UAE_Technical_Services
 */

defined( 'ABSPATH' ) || exit;

function uae_technical_services_customize_register( $wp_customize ) {
    // Contact Info Section
    $wp_customize->add_section( 'uae_contact_section', [
        'title'    => __( 'MHK Contact Information', 'uae-technical-services' ),
        'priority' => 30,
    ] );

    // Phone
    $wp_customize->add_setting( 'uae_phone', [
        'default'           => '+971 58 216 6143',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'uae_phone', [
        'label'    => __( 'Phone Number', 'uae-technical-services' ),
        'section'  => 'uae_contact_section',
        'type'     => 'text',
    ] );

    // Email
    $wp_customize->add_setting( 'uae_email', [
        'default'           => 'Ummibangash@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ] );
    $wp_customize->add_control( 'uae_email', [
        'label'    => __( 'Email Address', 'uae-technical-services' ),
        'section'  => 'uae_contact_section',
        'type'     => 'email',
    ] );

    // Address
    $wp_customize->add_setting( 'uae_address', [
        'default'           => 'Al tawar near qusais metro station, Dubai, United Arab Emirates',
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );
    $wp_customize->add_control( 'uae_address', [
        'label'    => __( 'Physical Office Address', 'uae-technical-services' ),
        'section'  => 'uae_contact_section',
        'type'     => 'textarea',
    ] );
}
add_action( 'customize_register', 'uae_technical_services_customize_register' );
