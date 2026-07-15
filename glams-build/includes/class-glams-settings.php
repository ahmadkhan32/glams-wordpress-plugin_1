<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class GLAMS_Settings {
    private static $instance = null;
    public static function instance() {
        if ( null === self::$instance ) self::$instance = new self();
        return self::$instance;
    }
    public function init() {}
    public function get_all(): array {
        return GLAMS_Database::instance()->get_all_settings();
    }
    public function get( string $key, string $default = '' ): string {
        return GLAMS_Database::instance()->get_setting( $key, $default );
    }
}
