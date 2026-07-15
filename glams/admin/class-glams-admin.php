<?php
defined( 'ABSPATH' ) || exit;

class GLAMS_Admin {

    public static function init() {
        add_action( 'admin_menu',            [ __CLASS__, 'register_menus' ] );
        add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueue_scripts' ] );
    }

    public static function register_menus() {
        add_menu_page(
            'GLAMS Dashboard', 'GLAMS Portal', 'manage_options',
            'glams-dashboard', [ __CLASS__, 'page_dashboard' ],
            'dashicons-building', 30
        );
        add_submenu_page( 'glams-dashboard', 'Companies',   'Companies',   'manage_options', 'glams-companies',   [ __CLASS__, 'page_companies' ] );
        add_submenu_page( 'glams-dashboard', 'Activities',  'Activities',  'manage_options', 'glams-activities',  [ __CLASS__, 'page_activities' ] );
        add_submenu_page( 'glams-dashboard', 'Certificates','Certificates','manage_options', 'glams-certificates',[ __CLASS__, 'page_certificates' ] );
        add_submenu_page( 'glams-dashboard', 'Logos',       'Logos',       'manage_options', 'glams-logos',       [ __CLASS__, 'page_logos' ] );
        add_submenu_page( 'glams-dashboard', 'Reports',     'Reports',     'manage_options', 'glams-reports',     [ __CLASS__, 'page_reports' ] );
        add_submenu_page( 'glams-dashboard', 'Settings',    'Settings',    'manage_options', 'glams-settings',    [ __CLASS__, 'page_settings' ] );
    }

    public static function enqueue_scripts( $hook ) {
        if ( strpos( $hook, 'glams' ) === false ) return;
        wp_enqueue_media();
        wp_enqueue_style(  'glams-admin', GLAMS_ASSETS . 'css/admin.css', [], GLAMS_VERSION );
        wp_enqueue_script( 'glams-admin', GLAMS_ASSETS . 'js/admin.js', [ 'jquery', 'wp-util' ], GLAMS_VERSION, true );
        wp_localize_script( 'glams-admin', 'GLAMSAdmin', [
            'apiUrl' => rest_url( 'glams/v1/' ),
            'nonce'  => wp_create_nonce( 'wp_rest' ),
        ] );
    }

    /* ── PAGE RENDERERS ── */
    public static function page_dashboard() { self::render( 'dashboard' ); }
    public static function page_companies()  { self::render( 'companies' ); }
    public static function page_activities() { self::render( 'activities' ); }
    public static function page_certificates(){ self::render( 'certificates' ); }
    public static function page_logos()      { self::render( 'logos' ); }
    public static function page_reports()    { self::render( 'reports' ); }
    public static function page_settings()   { self::render( 'settings' ); }

    private static function render( $page ) {
        $stats = GLAMS_DB::get_stats();
        include GLAMS_DIR . 'admin/views/' . $page . '.php';
    }
}
