<?php
/**
 * Template Name: UAE Companies Directory
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$companies = glams_get_companies();
?>

<div class="glams-page-hero">
  <div class="glams-container">
    <div class="glams-section-tag">
      <i class="fa-solid fa-city"></i>
      <span><?php esc_html_e( 'Corporate Directory', 'glams-theme' ); ?></span>
    </div>
    <h1 class="glams-page-title"><?php esc_html_e( 'UAE Registered Companies Directory', 'glams-theme' ); ?></h1>
    <p class="glams-page-desc">
      <?php esc_html_e( 'Browse verified UAE technical, contracting, and engineering establishments registered under GLAMS.', 'glams-theme' ); ?>
    </p>
  </div>
</div>

<div class="glams-container glams-content-area glams-section">
  <div class="glams-companies-grid">
    <?php foreach ( $companies as $comp ) : ?>
      <div class="glams-company-card">
        <div class="glams-comp-head">
          <div class="glams-comp-city-badge">
            <i class="fa-solid fa-location-dot"></i>
            <span><?php echo esc_html( $comp['city'] ); ?></span>
          </div>
          <span class="status-badge status-<?php echo esc_attr( $comp['status'] ); ?>">
            <span class="status-dot"></span>
            <?php echo $comp['status'] === 'active' ? esc_html__( 'Active', 'glams-theme' ) : esc_html__( 'Inactive', 'glams-theme' ); ?>
          </span>
        </div>

        <h3 class="glams-comp-name"><?php echo esc_html( $comp['name'] ); ?></h3>
        <p class="glams-comp-name-ar ar-text"><?php echo esc_html( $comp['nameAr'] ); ?></p>

        <div class="glams-comp-meta-list">
          <div class="glams-comp-meta-row">
            <span class="label"><?php esc_html_e( 'License No:', 'glams-theme' ); ?></span>
            <span class="val bold text-primary"><?php echo esc_html( $comp['license'] ); ?></span>
          </div>
          <div class="glams-comp-meta-row">
            <span class="label"><?php esc_html_e( 'Managing Owner:', 'glams-theme' ); ?></span>
            <span class="val"><?php echo esc_html( $comp['owner'] ); ?></span>
          </div>
          <div class="glams-comp-meta-row">
            <span class="label"><?php esc_html_e( 'Direct Phone:', 'glams-theme' ); ?></span>
            <span class="val"><?php echo esc_html( $comp['phone'] ); ?></span>
          </div>
          <div class="glams-comp-meta-row">
            <span class="label"><?php esc_html_e( 'License Expiry:', 'glams-theme' ); ?></span>
            <span class="val text-accent"><?php echo esc_html( $comp['expiry'] ); ?></span>
          </div>
        </div>

        <div class="glams-comp-foot">
          <a href="<?php echo esc_url( home_url( '/#license' ) ); ?>" class="glams-btn glams-btn-outline glams-btn-sm glams-btn-full">
            <i class="fa-solid fa-certificate"></i>
            <span><?php esc_html_e( 'View Approved Activities', 'glams-theme' ); ?></span>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php get_template_part( 'template-parts/sections/cta' ); ?>

<?php
get_footer();
