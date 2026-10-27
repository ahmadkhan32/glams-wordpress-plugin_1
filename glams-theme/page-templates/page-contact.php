<?php
/**
 * Template Name: Contact Page
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="glams-page-hero">
  <div class="glams-container">
    <div class="glams-section-tag">
      <i class="fa-solid fa-headset"></i>
      <span><?php esc_html_e( 'Direct Communications', 'glams-theme' ); ?></span>
    </div>
    <h1 class="glams-page-title"><?php esc_html_e( 'Contact MHK Technical Services', 'glams-theme' ); ?></h1>
    <p class="glams-page-desc">
      <?php esc_html_e( 'Connect with our Dubai headquarters for immediate technical dispatch, project tenders, and government license inquiries.', 'glams-theme' ); ?>
    </p>
  </div>
</div>

<?php get_template_part( 'template-parts/sections/contact' ); ?>

<?php get_template_part( 'template-parts/sections/faq' ); ?>

<?php
get_footer();
