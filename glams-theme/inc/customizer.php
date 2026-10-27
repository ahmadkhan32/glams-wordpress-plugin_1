<?php
/**
 * Customizer Additions for GLAMS Branding and Contact Info
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

function glams_customize_register( $wp_customize ) {
    // ── GLAMS Contact Information Section ───────────────────────────────
    $wp_customize->add_section( 'glams_contact_section', [
        'title'    => __( 'GLAMS – Contact & Business Info', 'glams-theme' ),
        'priority' => 30,
    ] );

    // Phone Number
    $wp_customize->add_setting( 'glams_phone', [
        'default'           => '+971 4 123 4567',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'glams_phone', [
        'label'    => __( 'Phone Number', 'glams-theme' ),
        'section'  => 'glams_contact_section',
        'type'     => 'text',
    ] );

    // WhatsApp Number
    $wp_customize->add_setting( 'glams_whatsapp', [
        'default'           => '+971 50 123 4567',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'glams_whatsapp', [
        'label'    => __( 'WhatsApp Number (with country code)', 'glams-theme' ),
        'section'  => 'glams_contact_section',
        'type'     => 'text',
    ] );

    // Email Address
    $wp_customize->add_setting( 'glams_email', [
        'default'           => 'info@mhktechnicalservices.com',
        'sanitize_callback' => 'sanitize_email',
    ] );
    $wp_customize->add_control( 'glams_email', [
        'label'    => __( 'Official Email', 'glams-theme' ),
        'section'  => 'glams_contact_section',
        'type'     => 'email',
    ] );

    // License Number
    $wp_customize->add_setting( 'glams_license_no', [
        'default'           => 'DET-2024-001234',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'glams_license_no', [
        'label'    => __( 'DET License Number', 'glams-theme' ),
        'section'  => 'glams_contact_section',
        'type'     => 'text',
    ] );

    // Physical Address
    $wp_customize->add_setting( 'glams_address', [
        'default'           => 'Al Tawar Center, Near Al Qusais Metro Station, Dubai, United Arab Emirates',
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );
    $wp_customize->add_control( 'glams_address', [
        'label'    => __( 'Physical Office Address', 'glams-theme' ),
        'section'  => 'glams_contact_section',
        'type'     => 'textarea',
    ] );

    // Working Hours
    $wp_customize->add_setting( 'glams_hours', [
        'default'           => 'Mon – Sat: 8:00 AM – 8:00 PM',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'glams_hours', [
        'label'    => __( 'Working Hours', 'glams-theme' ),
        'section'  => 'glams_contact_section',
        'type'     => 'text',
    ] );

    // ── Hero Section Settings ──────────────────────────────────────────
    $wp_customize->add_section( 'glams_hero_section', [
        'title'    => __( 'GLAMS – Hero Section', 'glams-theme' ),
        'priority' => 32,
    ] );

    $wp_customize->add_setting( 'glams_hero_badge', [
        'default'           => 'UAE Licensed Technical Contractor',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'glams_hero_badge', [
        'label'    => __( 'Hero Badge Text', 'glams-theme' ),
        'section'  => 'glams_hero_section',
        'type'     => 'text',
    ] );

    $wp_customize->add_setting( 'glams_hero_title', [
        'default'           => 'Premier Technical & Maintenance Solutions in UAE',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'glams_hero_title', [
        'label'    => __( 'Hero Main Headline', 'glams-theme' ),
        'section'  => 'glams_hero_section',
        'type'     => 'text',
    ] );

    $wp_customize->add_setting( 'glams_hero_subtitle', [
        'default'           => 'Comprehensive engineering, electromechanical, HVAC, and government compliance services backed by full regulatory licensing.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );
    $wp_customize->add_control( 'glams_hero_subtitle', [
        'label'    => __( 'Hero Subtitle', 'glams-theme' ),
        'section'  => 'glams_hero_section',
        'type'     => 'textarea',
    ] );
}
add_action( 'customize_register', 'glams_customize_register' );
