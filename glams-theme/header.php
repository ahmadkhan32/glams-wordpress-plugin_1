<?php
/**
 * The Header template for GLAMS Theme
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>

<div id="page" class="glams-site-wrapper">
  <a class="skip-link screen-reader-text" href="#primary-content">
    <?php esc_html_e( 'Skip to content', 'glams-theme' ); ?>
  </a>

  <?php get_template_part( 'template-parts/header/site-header' ); ?>

  <main id="primary-content" class="glams-main-content">
