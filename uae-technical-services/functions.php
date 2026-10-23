<?php
/**
 * UAE Technical Services Theme Functions
 *
 * @package UAE_Technical_Services
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

define( 'UAE_THEME_VERSION', '1.0.0' );
define( 'UAE_THEME_DIR', get_template_directory() );
define( 'UAE_THEME_URI', get_template_directory_uri() );

// Load Modular Core Files
require_once UAE_THEME_DIR . '/inc/theme-setup.php';
require_once UAE_THEME_DIR . '/inc/enqueue-assets.php';
require_once UAE_THEME_DIR . '/inc/template-functions.php';
require_once UAE_THEME_DIR . '/inc/customizer.php';
require_once UAE_THEME_DIR . '/inc/security.php';
