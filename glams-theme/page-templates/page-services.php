<?php
/**
 * Template Name: Technical Services Page
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$services = glams_get_official_services();
$whatsapp = get_theme_mod( 'glams_whatsapp', '+971 50 123 4567' );
$clean_wa = preg_replace( '/[^0-9]/', '', $whatsapp );
?>

<div class="glams-page-hero">
  <div class="glams-container">
    <div class="glams-section-tag">
      <i class="fa-solid fa-screwdriver-wrench"></i>
      <span><?php esc_html_e( 'Official Capabilities', 'glams-theme' ); ?></span>
    </div>
    <h1 class="glams-page-title"><?php esc_html_e( 'Technical Services in UAE | MHK Technical Services', 'glams-theme' ); ?></h1>
    <p class="glams-page-desc">
      <?php esc_html_e( 'Explore professional technical, installation, maintenance and building services available from MHK Technical Services in the UAE under DET License DET-2024-001234.', 'glams-theme' ); ?>
    </p>
  </div>
</div>

<div class="glams-container glams-content-area glams-section">
  <div class="glams-services-grid">
    <?php foreach ( $services as $svc ) : ?>
      <article class="glams-service-card" id="<?php echo esc_attr( $svc['id'] ); ?>">
        <div class="glams-svc-head">
          <div class="glams-svc-icon">
            <i class="fa-solid <?php echo esc_attr( $svc['icon'] ); ?>"></i>
          </div>
          <span class="status-badge status-active">
            <span class="status-dot"></span> Active
          </span>
        </div>

        <h2 class="glams-svc-title"><?php echo esc_html( $svc['title'] ); ?></h2>
        <p class="glams-svc-title-ar ar-text"><?php echo esc_html( $svc['title_ar'] ); ?></p>
        <p class="glams-svc-desc"><?php echo esc_html( $svc['short_desc'] ); ?></p>

        <div class="glams-svc-features is-visible">
          <div class="glams-features-title"><?php esc_html_e( 'Included Specifications:', 'glams-theme' ); ?></div>
          <ul class="glams-feature-list">
            <?php foreach ( $svc['features'] as $feat ) : ?>
              <li>
                <i class="fa-solid fa-circle-check"></i>
                <span><?php echo esc_html( $feat ); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="glams-svc-foot">
          <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="glams-btn glams-btn-primary glams-btn-sm glams-btn-full">
            <span><?php esc_html_e( 'Request Immediate Quote', 'glams-theme' ); ?></span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</div>

<?php get_template_part( 'template-parts/sections/cta' ); ?>

<?php
get_footer();
