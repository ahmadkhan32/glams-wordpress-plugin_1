<?php
defined( 'ABSPATH' ) || exit;

class GLAMS_API {
    const NS = 'glams/v1';

    public static function init() {
        add_action( 'rest_api_init', [ __CLASS__, 'register_routes' ] );
    }

    public static function register_routes() {
        /* Companies */
        register_rest_route( self::NS, '/companies', [
            [ 'methods' => 'GET',  'callback' => [ __CLASS__, 'get_companies' ],  'permission_callback' => '__return_true' ],
            [ 'methods' => 'POST', 'callback' => [ __CLASS__, 'create_company' ], 'permission_callback' => [ __CLASS__, 'auth_check' ] ],
        ] );
        register_rest_route( self::NS, '/companies/(?P<id>\d+)', [
            [ 'methods' => 'GET',    'callback' => [ __CLASS__, 'get_company' ],    'permission_callback' => '__return_true' ],
            [ 'methods' => 'PUT',    'callback' => [ __CLASS__, 'update_company' ], 'permission_callback' => [ __CLASS__, 'auth_check' ] ],
            [ 'methods' => 'DELETE', 'callback' => [ __CLASS__, 'delete_company' ], 'permission_callback' => [ __CLASS__, 'auth_check' ] ],
        ] );

        /* Activities */
        register_rest_route( self::NS, '/activities', [
            [ 'methods' => 'GET',  'callback' => [ __CLASS__, 'get_activities' ],  'permission_callback' => '__return_true' ],
            [ 'methods' => 'POST', 'callback' => [ __CLASS__, 'create_activity' ], 'permission_callback' => [ __CLASS__, 'auth_check' ] ],
        ] );
        register_rest_route( self::NS, '/activities/(?P<id>\d+)', [
            [ 'methods' => 'PUT',    'callback' => [ __CLASS__, 'update_activity' ], 'permission_callback' => [ __CLASS__, 'auth_check' ] ],
            [ 'methods' => 'DELETE', 'callback' => [ __CLASS__, 'delete_activity' ], 'permission_callback' => [ __CLASS__, 'auth_check' ] ],
        ] );

        /* Settings */
        register_rest_route( self::NS, '/settings', [
            [ 'methods' => 'GET', 'callback' => [ __CLASS__, 'get_settings' ], 'permission_callback' => '__return_true' ],
            [ 'methods' => 'POST','callback' => [ __CLASS__, 'update_settings' ],'permission_callback' => [ __CLASS__, 'auth_check' ] ],
        ] );

        /* Reports / Stats */
        register_rest_route( self::NS, '/stats', [
            'methods' => 'GET', 'callback' => [ __CLASS__, 'get_stats' ], 'permission_callback' => '__return_true',
        ] );

        /* Verify */
        register_rest_route( self::NS, '/verify/(?P<number>[a-zA-Z0-9\-]+)', [
            'methods' => 'GET', 'callback' => [ __CLASS__, 'verify_license' ], 'permission_callback' => '__return_true',
        ] );

        /* Logos */
        register_rest_route( self::NS, '/logos', [
            'methods' => 'GET', 'callback' => [ __CLASS__, 'get_logos' ], 'permission_callback' => '__return_true',
        ] );
    }

    /* ── COMPANIES ── */
    public static function get_companies( WP_REST_Request $req ) {
        $args = [
            'status' => sanitize_text_field( $req->get_param('status') ?? '' ),
            'search' => sanitize_text_field( $req->get_param('search') ?? '' ),
            'limit'  => (int) ($req->get_param('limit')  ?? 20),
            'offset' => (int) ($req->get_param('offset') ?? 0),
        ];
        return rest_ensure_response( GLAMS_DB::get_companies( $args ) );
    }

    public static function get_company( WP_REST_Request $req ) {
        $company = GLAMS_DB::get_company( $req['id'] );
        if ( ! $company ) return new WP_Error( 'not_found', 'Company not found', [ 'status' => 404 ] );
        $company->activities = GLAMS_DB::get_activities( $company->id );
        return rest_ensure_response( $company );
    }

    public static function create_company( WP_REST_Request $req ) {
        $id = GLAMS_DB::save_company( $req->get_json_params() );
        return rest_ensure_response( [ 'id' => $id, 'message' => 'Company created' ] );
    }

    public static function update_company( WP_REST_Request $req ) {
        GLAMS_DB::save_company( $req->get_json_params(), $req['id'] );
        return rest_ensure_response( [ 'message' => 'Company updated' ] );
    }

    public static function delete_company( WP_REST_Request $req ) {
        GLAMS_DB::delete_company( $req['id'] );
        return rest_ensure_response( [ 'message' => 'Company deleted' ] );
    }

    /* ── ACTIVITIES ── */
    public static function get_activities( WP_REST_Request $req ) {
        $company_id = (int) ($req->get_param('company_id') ?? 0);
        return rest_ensure_response( GLAMS_DB::get_activities( $company_id ) );
    }

    public static function create_activity( WP_REST_Request $req ) {
        $id = GLAMS_DB::save_activity( $req->get_json_params() );
        return rest_ensure_response( [ 'id' => $id ] );
    }

    public static function update_activity( WP_REST_Request $req ) {
        GLAMS_DB::save_activity( $req->get_json_params(), $req['id'] );
        return rest_ensure_response( [ 'message' => 'Updated' ] );
    }

    public static function delete_activity( WP_REST_Request $req ) {
        GLAMS_DB::delete_activity( $req['id'] );
        return rest_ensure_response( [ 'message' => 'Deleted' ] );
    }

    /* ── SETTINGS ── */
    public static function get_settings( WP_REST_Request $req ) {
        return rest_ensure_response( GLAMS_DB::get_all_settings() );
    }

    public static function update_settings( WP_REST_Request $req ) {
        $data = $req->get_json_params();
        foreach ( $data as $key => $val ) {
            GLAMS_DB::update_setting( sanitize_key($key), sanitize_textarea_field($val) );
        }
        return rest_ensure_response( [ 'message' => 'Settings saved' ] );
    }

    /* ── STATS ── */
    public static function get_stats( WP_REST_Request $req ) {
        return rest_ensure_response( GLAMS_DB::get_stats() );
    }

    /* ── VERIFY ── */
    public static function verify_license( WP_REST_Request $req ) {
        global $wpdb;
        $num = sanitize_text_field( $req['number'] );
        $company = $wpdb->get_row( $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}glams_companies WHERE license_number = %s OR id = %d",
            $num, (int) $num
        ) );
        if ( ! $company ) return new WP_Error( 'not_found', 'License not found', [ 'status' => 404 ] );
        $company->activities = GLAMS_DB::get_activities( $company->id );
        return rest_ensure_response( $company );
    }

    /* ── LOGOS ── */
    public static function get_logos( WP_REST_Request $req ) {
        return rest_ensure_response( GLAMS_DB::get_logos() );
    }

    /* ── AUTH ── */
    public static function auth_check() {
        return current_user_can( 'manage_options' );
    }
}
