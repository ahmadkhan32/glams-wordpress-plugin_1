<?php
/**
 * Template Name: UAE Visa & Immigration Portal
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="glams-page-hero">
  <div class="glams-container">
    <div class="glams-section-tag">
      <i class="fa-solid fa-passport"></i>
      <span><?php esc_html_e( 'Residency & PRO Support', 'glams-theme' ); ?></span>
    </div>
    <h1 class="glams-page-title"><?php esc_html_e( 'UAE Visa & Immigration Solutions', 'glams-theme' ); ?></h1>
    <p class="glams-page-desc">
      <?php esc_html_e( 'Official facilitation for Golden Visas, corporate employment permits, investor residencies, and family sponsorship.', 'glams-theme' ); ?>
    </p>
  </div>
</div>

<?php get_template_part( 'template-parts/sections/immigration' ); ?>

<?php get_template_part( 'template-parts/sections/process' ); ?>

<?php get_template_part( 'template-parts/sections/cta' ); ?>

<?php
get_footer();
