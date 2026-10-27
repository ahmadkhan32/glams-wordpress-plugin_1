<?php
/**
 * UAE Visa & Immigration Section Template Part
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$visas    = glams_get_visa_types();
$whatsapp = get_theme_mod( 'glams_whatsapp', '+971 50 123 4567' );
$clean_wa = preg_replace( '/[^0-9]/', '', $whatsapp );
?>

<section class="glams-section glams-immigration-section" id="immigration">
  <div class="glams-container">
    <div class="glams-section-head text-center">
      <div class="glams-section-tag">
        <i class="fa-solid fa-passport"></i>
        <span><?php esc_html_e( 'PRO & Immigration', 'glams-theme' ); ?></span>
      </div>
      <h2 class="glams-section-title">
        <?php esc_html_e( 'UAE Visa & Residency Processing Services', 'glams-theme' ); ?>
      </h2>
      <p class="glams-section-sub">
        <?php esc_html_e( 'Full-service corporate and individual visa facilitation across GDRFA, ICP, and UAE Free Zone authorities.', 'glams-theme' ); ?>
      </p>
    </div>

    <div class="glams-visa-grid">
      <?php foreach ( $visas as $visa ) : ?>
        <div class="glams-visa-card <?php echo $visa['type'] === 'Premium' ? 'is-golden' : ''; ?>">
          <div class="glams-visa-head">
            <div class="glams-visa-icon">
              <i class="fa-solid <?php echo esc_attr( $visa['icon'] ); ?>"></i>
            </div>
            <span class="glams-duration-badge">
              <i class="fa-regular fa-clock"></i>
              <?php echo esc_html( $visa['duration'] ); ?>
            </span>
          </div>

          <div class="glams-visa-type"><?php echo esc_html( $visa['type'] ); ?></div>
          <h3 class="glams-visa-title"><?php echo esc_html( $visa['title'] ); ?></h3>
          <p class="glams-visa-desc"><?php echo esc_html( $visa['description'] ); ?></p>

          <div class="glams-visa-foot">
            <a href="https://wa.me/<?php echo esc_attr( $clean_wa ); ?>?text=Hello,%20I%20am%20interested%20in%20the%20UAE%20<?php echo urlencode( $visa['title'] ); ?>."
               target="_blank"
               rel="noopener noreferrer"
               class="glams-btn glams-btn-outline glams-btn-sm glams-btn-full">
              <span><?php esc_html_e( 'Start Application', 'glams-theme' ); ?></span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
