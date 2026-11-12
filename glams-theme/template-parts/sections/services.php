<?php
/**
 * Official Services & 2026 Rate List Section Template Part
 * Source: MHK Technical Services — Official Rate List 2026 Flyer & DET License
 * Order: 1. Our Technical Services, 2. Flyer Rates • AED Cleaning Services & Pricing
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$services = glams_get_official_services();
$pricing_cfg = function_exists( 'glams_get_pricing_config' ) ? glams_get_pricing_config() : [];
$cleaning_categories = isset( $pricing_cfg['categories'] ) ? $pricing_cfg['categories'] : [];
$highlights = isset( $pricing_cfg['highlights'] ) ? $pricing_cfg['highlights'] : [];
$phone = get_theme_mod( 'glams_phone', '+971 582166143' );
$whatsapp = get_theme_mod( 'glams_whatsapp', '971582166143' );
$clean_wa = preg_replace( '/[^0-9]/', '', $whatsapp );
?>

<section class="glams-section glams-services-section" id="services">
  <div class="glams-container">

    <!-- ── 1. OUR TECHNICAL SERVICES (11 DET LICENSED ACTIVITIES) ── -->
    <div class="glams-section-head text-center" id="our-technical-services">
      <div class="glams-section-tag">
        <i class="fa-solid fa-screwdriver-wrench"></i>
        <span><?php esc_html_e( 'Our Services', 'glams-theme' ); ?></span>
      </div>
      <h2 class="glams-section-title">
        <?php esc_html_e( 'Our Technical Services', 'glams-theme' ); ?>
      </h2>
      <p class="glams-section-sub">
        <?php esc_html_e( 'We provide a wide range of technical, maintenance, installation and building services for residential and commercial requirements.', 'glams-theme' ); ?>
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

    <!-- ── 2. FLYER RATES • AED — OUR CLEANING SERVICES & PRICING ── -->
    <div class="mhk-pricing-section-head text-center" style="margin-top: 64px; margin-bottom: 24px;">
      <div class="glams-section-tag">
        <i class="fa-solid fa-tags"></i>
        <span><?php esc_html_e( 'Flyer Rates • AED', 'glams-theme' ); ?></span>
      </div>
      <h2 class="glams-section-title">
        <?php esc_html_e( 'Our Cleaning Services & Pricing', 'glams-theme' ); ?>
      </h2>
      <p class="glams-section-sub">
        <?php esc_html_e( 'Selected service rates from our official 2026 Rate List for Dubai apartments, villas, and commercial offices.', 'glams-theme' ); ?>
      </p>
    </div>

    <!-- Flyer Rate List 2026 Hero Banner -->
    <div class="mhk-rate-hero-card" id="rate-list-2026">
      <div class="mhk-rate-hero-content">
        <div class="mhk-rate-badge">
          <i class="fa-solid fa-sparkles"></i>
          <span><?php esc_html_e( 'RATE LIST 2026 • DUBAI, UAE', 'glams-theme' ); ?></span>
        </div>
        <h2 class="mhk-rate-title">
          <?php esc_html_e( 'MHK Technical Services — Cleaning Division', 'glams-theme' ); ?>
        </h2>
        <p class="mhk-rate-tagline">
          <em>&ldquo;<?php esc_html_e( 'We Make Your Space Sparkling Clean', 'glams-theme' ); ?>&rdquo;</em>
          &mdash; <?php esc_html_e( 'Professional • Affordable • Trusted', 'glams-theme' ); ?>
        </p>

        <!-- Trust Badges from Flyer -->
        <div class="mhk-trust-badges-grid">
          <?php foreach ( $highlights as $h ) : ?>
            <div class="mhk-trust-badge-item">
              <div class="mhk-trust-icon"><i class="<?php echo esc_attr( $h['icon'] ); ?>"></i></div>
              <div class="mhk-trust-label"><strong><?php echo esc_html( $h['title'] ); ?></strong></div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="mhk-rate-contact-cta">
          <a href="https://wa.me/<?php echo esc_attr( $clean_wa ); ?>?text=Hello%20MHK%20Technical%20Services%2C%20I%20would%20like%20to%20inquire%20about%20cleaning%20services" target="_blank" rel="noopener noreferrer" class="glams-btn glams-btn-accent glams-btn-lg">
            <i class="fa-brands fa-whatsapp"></i>
            <span><?php esc_html_e( 'Call / WhatsApp Now: +971 582166143', 'glams-theme' ); ?></span>
          </a>
        </div>
      </div>
    </div>

    <!-- Cleaning Services Pricing Cards Grid -->
    <div class="mhk-pricing-cards-grid">
      <?php foreach ( $cleaning_categories as $key => $cat ) : 
        $wa_msg = rawurlencode( 'Hello MHK Technical Services, I would like to book: ' . $cat['title'] );
      ?>
        <article class="mhk-pricing-card" id="service-<?php echo esc_attr( $cat['id'] ); ?>">
          <div class="mhk-card-header">
            <div class="mhk-card-icon">
              <i class="<?php echo esc_attr( $cat['icon'] ); ?>"></i>
            </div>
            <div>
              <h3 class="mhk-card-title"><?php echo esc_html( $cat['title'] ); ?></h3>
              <p class="mhk-card-title-ar ar-text"><?php echo esc_html( $cat['title_ar'] ); ?></p>
            </div>
          </div>

          <p class="mhk-card-short"><?php echo esc_html( $cat['short'] ); ?></p>

          <div class="mhk-price-list">
            <?php foreach ( $cat['items'] as $item ) : ?>
              <div class="mhk-price-row">
                <span class="mhk-item-name"><?php echo esc_html( $item['name'] ); ?></span>
                <span class="mhk-item-price">
                  <?php if ( ! empty( $item['prefix'] ) ) : ?>
                    <small><?php echo esc_html( $item['prefix'] ); ?> </small>
                  <?php endif; ?>
                  <strong><?php echo esc_html( $item['price'] ); ?> AED</strong>
                  <?php if ( ! empty( $item['suffix'] ) ) : ?>
                    <span class="mhk-suffix"><?php echo esc_html( $item['suffix'] ); ?></span>
                  <?php endif; ?>
                  <?php if ( ! empty( $item['unit'] ) ) : ?>
                    <small class="mhk-unit"> / <?php echo esc_html( $item['unit'] ); ?></small>
                  <?php endif; ?>
                </span>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="mhk-card-footer">
            <a href="https://wa.me/<?php echo esc_attr( $clean_wa ); ?>?text=<?php echo esc_attr( $wa_msg ); ?>" target="_blank" rel="noopener noreferrer" class="glams-btn glams-btn-primary glams-btn-sm glams-btn-full">
              <i class="fa-brands fa-whatsapp"></i>
              <span><?php esc_html_e( 'Request Booking', 'glams-theme' ); ?></span>
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>
