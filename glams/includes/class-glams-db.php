<?php
defined( 'ABSPATH' ) || exit;

class GLAMS_DB {

    /* ── COMPANIES ── */
    public static function get_companies( $args = [] ) {
        global $wpdb;
        $defaults = [ 'status' => '', 'search' => '', 'limit' => 20, 'offset' => 0, 'orderby' => 'created_at', 'order' => 'DESC' ];
        $args = wp_parse_args( $args, $defaults );
        $where = '1=1';
        $values = [];
        if ( $args['status'] ) { $where .= ' AND status = %s'; $values[] = $args['status']; }
        if ( $args['search'] ) { $where .= ' AND (company_name LIKE %s OR license_number LIKE %s)'; $values[] = '%'.$args['search'].'%'; $values[] = '%'.$args['search'].'%'; }
        $sql = "SELECT * FROM {$wpdb->prefix}glams_companies WHERE $where ORDER BY {$args['orderby']} {$args['order']} LIMIT %d OFFSET %d";
        $values[] = (int) $args['limit'];
        $values[] = (int) $args['offset'];
        return $wpdb->get_results( $values ? $wpdb->prepare( $sql, $values ) : $sql );
    }

    public static function get_company( $id ) {
        global $wpdb;
        return $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}glams_companies WHERE id = %d", $id ) );
    }

    public static function save_company( $data, $id = 0 ) {
        global $wpdb;
        $table = $wpdb->prefix . 'glams_companies';
        $allowed = [ 'company_name','license_number','owner','issue_date','expiry_date','country','city','address','phone','email','website','status','logo' ];
        $insert = [];
        foreach ( $allowed as $k ) { if ( isset( $data[$k] ) ) $insert[$k] = sanitize_text_field( $data[$k] ); }
        if ( $id ) {
            $wpdb->update( $table, $insert, [ 'id' => $id ] );
            return $id;
        }
        $wpdb->insert( $table, $insert );
        return $wpdb->insert_id;
    }

    public static function delete_company( $id ) {
        global $wpdb;
        $wpdb->delete( $wpdb->prefix . 'glams_activities', [ 'company_id' => $id ], [ '%d' ] );
        return $wpdb->delete( $wpdb->prefix . 'glams_companies', [ 'id' => $id ], [ '%d' ] );
    }

    /* ── ACTIVITIES ── */
    public static function get_activities( $company_id = 0 ) {
        global $wpdb;
        $tbl = $wpdb->prefix . 'glams_activities';
        if ( $company_id ) {
            return $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $tbl WHERE company_id = %d ORDER BY sort_order, id", $company_id ) );
        }
        return $wpdb->get_results( "SELECT * FROM $tbl ORDER BY company_id, sort_order" );
    }

    public static function save_activity( $data, $id = 0 ) {
        global $wpdb;
        $tbl = $wpdb->prefix . 'glams_activities';
        $allowed = [ 'company_id','activity_name_en','activity_name_ar','status','sort_order' ];
        $insert = [];
        foreach ( $allowed as $k ) { if ( isset( $data[$k] ) ) $insert[$k] = sanitize_text_field( $data[$k] ); }
        if ( $id ) { $wpdb->update( $tbl, $insert, [ 'id' => $id ] ); return $id; }
        $wpdb->insert( $tbl, $insert );
        return $wpdb->insert_id;
    }

    public static function delete_activity( $id ) {
        global $wpdb;
        return $wpdb->delete( $wpdb->prefix . 'glams_activities', [ 'id' => $id ], [ '%d' ] );
    }

    /* ── SETTINGS ── */
    public static function get_setting( $key, $default = '' ) {
        global $wpdb;
        $row = $wpdb->get_var( $wpdb->prepare( "SELECT setting_val FROM {$wpdb->prefix}glams_settings WHERE setting_key = %s", $key ) );
        return $row !== null ? $row : $default;
    }

    public static function update_setting( $key, $value ) {
        global $wpdb;
        $tbl = $wpdb->prefix . 'glams_settings';
        return $wpdb->query( $wpdb->prepare(
            "INSERT INTO $tbl (setting_key, setting_val) VALUES (%s, %s) ON DUPLICATE KEY UPDATE setting_val = VALUES(setting_val)",
            $key, $value
        ) );
    }

    public static function get_all_settings() {
        global $wpdb;
        $rows = $wpdb->get_results( "SELECT setting_key, setting_val FROM {$wpdb->prefix}glams_settings" );
        $out = [];
        foreach ( $rows as $r ) $out[$r->setting_key] = $r->setting_val;
        return $out;
    }

    /* ── CERTIFICATES ── */
    public static function get_certificate_by_number( $number ) {
        global $wpdb;
        return $wpdb->get_row( $wpdb->prepare( "SELECT c.*, co.company_name, co.license_number FROM {$wpdb->prefix}glams_certificates c LEFT JOIN {$wpdb->prefix}glams_companies co ON co.id = c.company_id WHERE c.certificate_number = %s", $number ) );
    }

    /* ── LOGOS ── */
    public static function get_logos() {
        global $wpdb;
        return $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}glams_logos WHERE active = 1 ORDER BY sort_order" );
    }

    /* ── REPORTS ── */
    public static function get_stats() {
        global $wpdb;
        return [
            'total_companies'  => (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}glams_companies" ),
            'active_companies' => (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}glams_companies WHERE status = 'active'" ),
            'total_activities' => (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}glams_activities" ),
            'total_certs'      => (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}glams_certificates" ),
        ];
    }
}
