<?php
/**
 * Plugin Name: GLAMS — Government License & Activities Management System
 * Description: Enterprise license activity management for UAE government-style websites. Bilingual EN/AR, PDF export, QR verification, Elementor widgets.
 * Version:     1.0.0
 * Author:      MHT Technical Services
 * License:     GPL v2 or later
 * Requires at least: 6.0
 * Requires PHP: 8.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;
define( 'GLAMS_VERSION', '1.0.0' );
define( 'GLAMS_PATH', plugin_dir_path( __FILE__ ) );
define( 'GLAMS_URL', plugin_dir_url( __FILE__ ) );
require_once GLAMS_PATH . 'includes/class-glams-database.php';
require_once GLAMS_PATH . 'includes/class-glams-settings.php';
require_once GLAMS_PATH . 'api/class-glams-rest-api.php';
require_once GLAMS_PATH . 'admin/class-glams-admin.php';

final class GLAMS {
    private static $instance = null;
    public static function instance() {
        if ( null === self::$instance ) self::$instance = new self();
        return self::$instance;
    }
    private function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
        register_activation_hook( __FILE__, [ $this, 'activate' ] );
    }
    public function init() {
        load_plugin_textdomain( 'glams', false, 'glams/languages' );
        GLAMS_Database::instance()->init();
        GLAMS_Settings::instance()->init();
        GLAMS_REST_API::instance()->init();
        GLAMS_Admin::instance()->init();
        add_action( 'wp_enqueue_scripts', [ $this, 'frontend_assets' ] );
        add_shortcode( 'glams_license_table', [ $this, 'shortcode_license_table' ] );
        add_shortcode( 'glams_verify_form', [ $this, 'shortcode_verify_form' ] );
    }
    public function activate() {
        GLAMS_Database::instance()->create_tables();
        GLAMS_Database::instance()->insert_demo_data();
        flush_rewrite_rules();
    }
    public function frontend_assets() {
        wp_enqueue_style( 'glams-frontend', GLAMS_URL . 'assets/css/glams-frontend.css', [], GLAMS_VERSION );
        wp_enqueue_script( 'glams-frontend', GLAMS_URL . 'assets/js/glams-frontend.js', ['jquery'], GLAMS_VERSION, true );
        wp_localize_script( 'glams-frontend', 'glamsConfig', [
            'apiUrl'  => rest_url( 'glams/v1/' ),
            'nonce'   => wp_create_nonce( 'wp_rest' ),
            'siteUrl' => get_site_url(),
        ]);
    }
    public function shortcode_license_table( $atts ) {
        $atts = shortcode_atts([ 'company_id' => 1, 'show_header' => 'yes' ], $atts );
        $company    = GLAMS_Database::instance()->get_company( (int)$atts['company_id'] );
        $activities = GLAMS_Database::instance()->get_activities( (int)$atts['company_id'] );
        if ( ! $company ) return '<p>Company not found.</p>';
        ob_start(); include GLAMS_PATH . 'templates/license-table.php'; return ob_get_clean();
    }
    public function shortcode_verify_form( $atts ) {
        ob_start(); include GLAMS_PATH . 'templates/verify-form.php'; return ob_get_clean();
    }
}
GLAMS::instance();
