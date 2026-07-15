<?php
/**
 * Plugin Name:       GLAMS – Government License & Activities Management System
 * Plugin URI:        https://yoursite.com/glams
 * Description:       Enterprise government license, activities management, immigration & technical services portal for UAE. ReactJS + WordPress + Elementor.
 * Version:           1.0.0
 * Author:            TechServ UAE
 * Author URI:        https://techservuae.com
 * License:           GPL v2 or later
 * Text Domain:       glams
 * Requires PHP:      8.0
 * Requires at least: 6.0
 */

defined( 'ABSPATH' ) || exit;

/* ─── CONSTANTS ─────────────────────────────────────── */
define( 'GLAMS_VERSION',   '1.0.0' );
define( 'GLAMS_DIR',       plugin_dir_path( __FILE__ ) );
define( 'GLAMS_URL',       plugin_dir_url( __FILE__ ) );
define( 'GLAMS_ASSETS',    GLAMS_URL . 'assets/' );
define( 'GLAMS_DB_VER',    '1.0' );

/* ─── LOAD INCLUDES ──────────────────────────────────── */
require_once GLAMS_DIR . 'includes/class-glams-activator.php';
require_once GLAMS_DIR . 'includes/class-glams-deactivator.php';
require_once GLAMS_DIR . 'includes/class-glams-db.php';
require_once GLAMS_DIR . 'includes/class-glams-cpt.php';
require_once GLAMS_DIR . 'includes/class-glams-settings.php';
require_once GLAMS_DIR . 'includes/class-glams-shortcodes.php';
require_once GLAMS_DIR . 'api/class-glams-api.php';
require_once GLAMS_DIR . 'admin/class-glams-admin.php';

/* ─── ELEMENTOR WIDGETS ──────────────────────────────── */
if ( did_action( 'elementor/loaded' ) ) {
    require_once GLAMS_DIR . 'includes/class-glams-elementor.php';
} else {
    add_action( 'elementor/loaded', function () {
        require_once GLAMS_DIR . 'includes/class-glams-elementor.php';
    } );
}

/* ─── ACTIVATION / DEACTIVATION ─────────────────────── */
register_activation_hook( __FILE__, [ 'GLAMS_Activator', 'activate' ] );
register_deactivation_hook( __FILE__, [ 'GLAMS_Deactivator', 'deactivate' ] );

/* ─── BOOT ───────────────────────────────────────────── */
add_action( 'plugins_loaded', function () {
    GLAMS_CPT::init();
    GLAMS_Settings::init();
    GLAMS_Shortcodes::init();
    GLAMS_API::init();

    if ( is_admin() ) {
        GLAMS_Admin::init();
    }
} );

/* ─── ENQUEUE FRONTEND ASSETS ────────────────────────── */
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'glams-frontend',
        GLAMS_ASSETS . 'css/frontend.css',
        [],
        GLAMS_VERSION
    );
    wp_enqueue_script(
        'glams-app',
        GLAMS_ASSETS . 'js/glams-app.js',
        [ 'wp-element' ],
        GLAMS_VERSION,
        true
    );
    wp_localize_script( 'glams-app', 'GLAMSData', [
        'apiUrl'   => rest_url( 'glams/v1/' ),
        'nonce'    => wp_create_nonce( 'wp_rest' ),
        'siteUrl'  => get_site_url(),
        'assetsUrl'=> GLAMS_ASSETS,
        'currency' => 'AED',
        'lang'     => get_locale(),
    ] );
} );
