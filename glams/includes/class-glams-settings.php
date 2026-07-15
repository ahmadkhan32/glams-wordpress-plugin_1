<?php
defined( 'ABSPATH' ) || exit;
class GLAMS_Settings {
    public static function init() {
        // Settings are handled via REST API + DB — nothing additional needed here.
        // Hook for future settings page via WP Options API if preferred.
        add_filter( 'glams_get_setting', function( $value, $key ) {
            return GLAMS_DB::get_setting( $key, $value );
        }, 10, 2 );
    }
    public static function get( $key, $default = '' ) {
        return GLAMS_DB::get_setting( $key, $default );
    }
}
