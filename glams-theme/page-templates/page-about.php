<?php
/**
 * Template Name: About Us Page
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$features = [
    'Full Trade License Management (New, Renewal, Amendment)',
    'Digital License Activities Certificate with Arabic & English',
    'QR Code Certificate Verification System',
    'Immigration & Visa Services for All Emirates',
    '24/7 Online Portal with Real-time Status Updates',
    'PDF Export with Official Government Layout',
    'Elementor & Gutenberg WordPress Integration for Easy Editing',
    'REST API for Third-party System Integration',
    'Bilingual Support (Arabic & English)',
    'Dedicated Account Manager for Every Client',
];
?>

<div class="glams-page-hero">
  <div class="glams-container">
    <div class="glams-section-tag">
      <i class="fa-solid fa-building-flag"></i>
      <span><?php esc_html_e( 'Corporate Profile', 'glams-theme' ); ?></span>
    </div>
    <h1 class="glams-page-title"><?php esc_html_e( 'About MHK Technical Services & GLAMS', 'glams-theme' ); ?></h1>
    <p class="glams-page-desc">
      <?php esc_html_e( 'A leading UAE technical contracting and compliance solutions provider delivering superior facility engineering and digital government licensing services.', 'glams-theme' ); ?>
    </p>
  </div>
</div>

<div class="glams-container glams-content-area glams-section">
  <!-- Story & Vision -->
  <div class="glams-about-grid">
    <div class="glams-about-text">
      <h2><?php esc_html_e( 'Empowering UAE Properties with Technical Precision', 'glams-theme' ); ?></h2>
      <p>
        <?php esc_html_e( 'MHK Technical Services was established with a clear mandate: to deliver superior engineering, facility maintenance, and electromechanical services that meet and exceed the stringent standards of the UAE.', 'glams-theme' ); ?>
      </p>
      <p>
        <?php esc_html_e( 'Over the past 15 years, we have expanded from a specialized civil engineering contractor into a comprehensive technical enterprise. Through our proprietary GLAMS (Government License & Activities Management System) platform, we offer unprecedented transparency, allowing clients to instantly verify approved activities, trade licenses, and regulatory compliance.', 'glams-theme' ); ?>
      </p>

      <div class="glams-about-features-box">
        <h3><?php esc_html_e( 'What Sets GLAMS Apart:', 'glams-theme' ); ?></h3>
        <ul class="glams-about-feat-list">
          <?php foreach ( $features as $feat ) : ?>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><?php echo esc_html( $feat ); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <!-- Values & Creds -->
    <div class="glams-about-sidebar">
      <div class="glams-value-card">
        <div class="glams-vc-icon"><i class="fa-solid fa-medal"></i></div>
        <h3><?php esc_html_e( 'Excellence', 'glams-theme' ); ?></h3>
        <p><?php esc_html_e( 'We set the highest standard in technical contracting and compliance technology, continuously refining our execution.', 'glams-theme' ); ?></p>
      </div>

      <div class="glams-value-card">
        <div class="glams-vc-icon"><i class="fa-solid fa-handshake"></i></div>
        <h3><?php esc_html_e( 'Integrity', 'glams-theme' ); ?></h3>
        <p><?php esc_html_e( 'Transparent processes, verified pricing, and honest communication with our clients and government partners.', 'glams-theme' ); ?></p>
      </div>

      <div class="glams-value-card">
        <div class="glams-vc-icon"><i class="fa-solid fa-rocket"></i></div>
        <h3><?php esc_html_e( 'Innovation', 'glams-theme' ); ?></h3>
        <p><?php esc_html_e( 'Pioneering digital license verification, QR attestation, and paperless maintenance workflows across the UAE.', 'glams-theme' ); ?></p>
      </div>
    </div>
  </div>
</div>

<?php get_template_part( 'template-parts/sections/cta' ); ?>

<?php
get_footer();
