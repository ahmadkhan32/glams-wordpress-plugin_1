<?php
defined( 'ABSPATH' ) || exit;

class GLAMS_Activator {
    public static function activate() {
        self::create_tables();
        self::seed_defaults();
        update_option( 'glams_db_version', GLAMS_DB_VER );
        flush_rewrite_rules();
    }

    private static function create_tables() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        /* COMPANIES */
        dbDelta( "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_companies (
            id             BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            company_name   VARCHAR(255)    NOT NULL,
            license_number VARCHAR(100)    NOT NULL UNIQUE,
            owner          VARCHAR(255),
            issue_date     DATE,
            expiry_date    DATE,
            country        VARCHAR(100)    DEFAULT 'UAE',
            city           VARCHAR(100),
            address        TEXT,
            phone          VARCHAR(50),
            email          VARCHAR(255),
            website        VARCHAR(255),
            status         ENUM('active','pending','expired','suspended') DEFAULT 'active',
            logo           BIGINT UNSIGNED DEFAULT 0,
            created_at     DATETIME        DEFAULT CURRENT_TIMESTAMP,
            updated_at     DATETIME        DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;" );

        /* ACTIVITIES */
        dbDelta( "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_activities (
            id               BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            company_id       BIGINT UNSIGNED NOT NULL,
            activity_name_en VARCHAR(500)    NOT NULL,
            activity_name_ar VARCHAR(500),
            status           ENUM('active','inactive','suspended') DEFAULT 'active',
            sort_order       INT             DEFAULT 0,
            created_at       DATETIME        DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            KEY company_id (company_id)
        ) $charset_collate;" );

        /* CERTIFICATES */
        dbDelta( "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_certificates (
            id                 BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            company_id         BIGINT UNSIGNED NOT NULL,
            certificate_number VARCHAR(100)    NOT NULL UNIQUE,
            pdf_attachment_id  BIGINT UNSIGNED DEFAULT 0,
            issue_date         DATE,
            expiry_date        DATE,
            status             ENUM('active','expired','revoked') DEFAULT 'active',
            qr_code            TEXT,
            created_at         DATETIME        DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            KEY company_id (company_id)
        ) $charset_collate;" );

        /* LOGOS */
        dbDelta( "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_logos (
            id         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            logo_name  VARCHAR(255)    NOT NULL,
            image_id   BIGINT UNSIGNED NOT NULL,
            position   ENUM('left','center','right','watermark','stamp','footer','header') DEFAULT 'left',
            width      INT             DEFAULT 120,
            height     INT             DEFAULT 60,
            sort_order INT             DEFAULT 0,
            active     TINYINT(1)      DEFAULT 1,
            PRIMARY KEY (id)
        ) $charset_collate;" );

        /* IMAGES */
        dbDelta( "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_images (
            id         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            title      VARCHAR(255),
            image_id   BIGINT UNSIGNED NOT NULL,
            alt_text   VARCHAR(255),
            category   VARCHAR(100),
            sort_order INT            DEFAULT 0,
            active     TINYINT(1)     DEFAULT 1,
            PRIMARY KEY (id)
        ) $charset_collate;" );

        /* SETTINGS */
        dbDelta( "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_settings (
            id           BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            setting_key  VARCHAR(255)    NOT NULL UNIQUE,
            setting_val  LONGTEXT,
            setting_type VARCHAR(50)     DEFAULT 'text',
            PRIMARY KEY (id)
        ) $charset_collate;" );

        /* USERS (plugin-level roles) */
        dbDelta( "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_users (
            id         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            wp_user_id BIGINT UNSIGNED NOT NULL,
            role       ENUM('administrator','manager','editor','viewer') DEFAULT 'viewer',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            KEY wp_user_id (wp_user_id)
        ) $charset_collate;" );

        /* LANGUAGES */
        dbDelta( "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_languages (
            id       BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            lang_key VARCHAR(10)     NOT NULL UNIQUE,
            strings  LONGTEXT,
            active   TINYINT(1)     DEFAULT 1,
            PRIMARY KEY (id)
        ) $charset_collate;" );
    }

    private static function seed_defaults() {
        global $wpdb;
        $tbl = $wpdb->prefix . 'glams_settings';
        $defaults = [
            [ 'site_name',      'TechServ UAE',                    'text'  ],
            [ 'site_tagline',   'Technical Services & Immigration', 'text'  ],
            [ 'primary_color',  '#006B75',                         'color' ],
            [ 'accent_color',   '#B8860B',                         'color' ],
            [ 'currency',       'AED',                             'text'  ],
            [ 'phone',          '+971 4 XXX XXXX',                 'text'  ],
            [ 'email',          'info@techservuae.com',             'text'  ],
            [ 'address',        'Business Bay, Dubai, UAE',         'text'  ],
            [ 'det_license',    'DET-XXXXXXXX',                    'text'  ],
            [ 'logo_left_id',   '0',                               'image' ],
            [ 'logo_center_id', '0',                               'image' ],
            [ 'logo_right_id',  '0',                               'image' ],
            [ 'watermark_id',   '0',                               'image' ],
        ];
        foreach ( $defaults as $row ) {
            $wpdb->query( $wpdb->prepare(
                "INSERT IGNORE INTO $tbl (setting_key, setting_val, setting_type) VALUES (%s, %s, %s)",
                $row[0], $row[1], $row[2]
            ) );
        }
    }
}
