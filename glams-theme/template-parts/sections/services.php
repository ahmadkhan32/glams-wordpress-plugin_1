<?php
/**
 * Official Services Section Template Part
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$services = glams_get_official_services();
?>

<section class="glams-section glams-services-section" id="services">
  <div class="glams-container">
    <div class="glams-section-head text-center">
      <div class="glams-section-tag">
        <i class="fa-solid fa-screwdriver-wrench"></i>
        <span><?php esc_html_e( 'Our Capabilities', 'glams-theme' ); ?></span>
      </div>
      <h2 class="glams-section-title">
        <?php esc_html_e( 'Official UAE Technical Services', 'glams-theme' ); ?>
      </h2>
      <p class="glams-section-sub">
        <?php esc_html_e( 'All 11 licensed activities approved under the Dubai Department of Economy and Tourism (DET) commercial register.', 'glams-theme' ); ?>
      </p>
    </div>

    <div class="glams-services-grid">
      <?php foreach ( $services as $svc ) : ?>
        <article class="glams-service-card" id="service-<?php echo esc_attr( $svc['id'] ); ?>">
          <div class="glams-svc-head">
            <div class="glams-svc-icon">
              <i class="fa-solid <?php echo esc_attr( $svc['icon'] ); ?>"></i>
            </div>
            <span class="status-badge status-active">
              <span class="status-dot"></span> Active
            </span>
          </div>

          <h3 class="glams-svc-title">
            <?php echo esc_html( $svc['title'] ); ?>
          </h3>
          <p class="glams-svc-title-ar ar-text">
            <?php echo esc_html( $svc['title_ar'] ); ?>
          </p>

          <p class="glams-svc-desc">
            <?php echo esc_html( $svc['short_desc'] ); ?>
          </p>

          <div class="glams-svc-features">
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
            <button type="button" class="glams-svc-more-btn">
              <span><?php esc_html_e( 'View Specifications', 'glams-theme' ); ?></span>
              <i class="fa-solid fa-chevron-down"></i>
            </button>
            <a href="#contact" class="glams-btn glams-btn-outline glams-btn-sm glams-svc-quote-btn" data-service="<?php echo esc_attr( $svc['title'] ); ?>">
              <span><?php esc_html_e( 'Book Service', 'glams-theme' ); ?></span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
