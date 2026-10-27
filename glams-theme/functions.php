<?php
/**
 * GLAMS – MHK Technical Services Theme Functions
 *
 * @package GLAMS_Theme
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

define( 'GLAMS_THEME_VERSION', '2.1.0' );
define( 'GLAMS_THEME_DIR', get_template_directory() );
define( 'GLAMS_THEME_URI', get_template_directory_uri() );

// ── Core Includes ──────────────────────────────────────────────────────
require_once GLAMS_THEME_DIR . '/inc/theme-setup.php';
require_once GLAMS_THEME_DIR . '/inc/enqueue-assets.php';
require_once GLAMS_THEME_DIR . '/inc/template-functions.php';
require_once GLAMS_THEME_DIR . '/inc/customizer.php';
require_once GLAMS_THEME_DIR . '/inc/admin-options.php';
require_once GLAMS_THEME_DIR . '/inc/security.php';
require_once GLAMS_THEME_DIR . '/inc/widget-areas.php';

