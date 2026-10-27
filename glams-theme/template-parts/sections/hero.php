<?php
/**
 * Hero Section Template Part
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$badge    = get_theme_mod( 'glams_hero_badge', 'UAE Licensed Technical Contractor' );
$title    = get_theme_mod( 'glams_hero_title', 'Premier Technical & Maintenance Solutions in UAE' );
$subtitle = get_theme_mod( 'glams_hero_subtitle', 'Comprehensive engineering, electromechanical, HVAC, and government compliance services backed by full regulatory licensing.' );
$license  = get_theme_mod( 'glams_license_no', 'DET-2024-001234' );
$whatsapp = get_theme_mod( 'glams_whatsapp', '971582166143' );
$clean_wa = preg_replace( '/[^0-9]/', '', $whatsapp );
?>

<section class="glams-hero" id="home">
  <div class="glams-hero-overlay"></div>
  <div class="glams-container glams-hero-container">
    <div class="glams-hero-grid">
      <!-- Left Content -->
      <div class="glams-hero-content">
        <div class="glams-hero-badge">
          <span class="glams-hero-badge-dot"></span>
          <span><?php echo esc_html( $badge ); ?></span>
          <span class="glams-lic-tag"><?php echo esc_html( $license ); ?></span>
        </div>

        <h1 class="glams-hero-title">
          <?php echo esc_html( $title ); ?>
        </h1>

        <p class="glams-hero-sub">
          <?php echo esc_html( $subtitle ); ?>
        </p>

        <div class="glams-hero-actions">
          <a href="#services" class="glams-btn glams-btn-accent glams-btn-lg">
            <span><?php esc_html_e( 'Explore Services', 'glams-theme' ); ?></span>
            <i class="fa-solid fa-arrow-down"></i>
          </a>
          <a href="#license" class="glams-btn glams-btn-white glams-btn-lg">
            <i class="fa-solid fa-certificate"></i>
            <span><?php esc_html_e( 'Verify License', 'glams-theme' ); ?></span>
          </a>
          <a href="https://wa.me/<?php echo esc_attr( $clean_wa ); ?>" target="_blank" rel="noopener noreferrer" class="glams-btn glams-btn-outline-white glams-btn-lg">
            <i class="fa-brands fa-whatsapp"></i>
            <span><?php esc_html_e( 'WhatsApp Us', 'glams-theme' ); ?></span>
          </a>
        </div>
      </div>

      <!-- Right Visual Card (Interactive Certificate Preview) -->
      <div class="glams-hero-visual">
        <div class="glams-hero-card">
          <div class="glams-card-glow"></div>
          <div class="glams-hero-card-head">
            <div class="glams-card-emblem">
              <i class="fa-solid fa-building-columns"></i>
            </div>
            <div>
              <div class="glams-card-auth">Government of Dubai</div>
              <div class="glams-card-dep">Department of Economy and Tourism (DET)</div>
            </div>
            <span class="status-badge status-active">
              <span class="status-dot"></span> Active
            </span>
          </div>

          <div class="glams-hero-card-body">
            <div class="glams-cert-company">
              <h3>Al Noor Technical Services LLC</h3>
              <p class="ar-text">شركة النور للخدمات التقنية ذ.م.م</p>
            </div>

            <div class="glams-cert-meta-grid">
              <div class="glams-cert-meta-item">
                <span class="label">License No:</span>
                <span class="val bold"><?php echo esc_html( $license ); ?></span>
              </div>
              <div class="glams-cert-meta-item">
                <span class="label">Issue Date:</span>
                <span class="val">15-01-2024</span>
              </div>
              <div class="glams-cert-meta-item">
                <span class="label">Expiry Date:</span>
                <span class="val text-accent">14-01-2025</span>
              </div>
              <div class="glams-cert-meta-item">
                <span class="label">Register No:</span>
                <span class="val">1198452</span>
              </div>
            </div>

            <div class="glams-cert-activities-preview">
              <div class="preview-title">
                <span>Approved Technical Activities (11)</span>
                <a href="#license" class="view-all-link">View Full Certificate &rarr;</a>
              </div>
              <div class="preview-tags">
                <span class="preview-tag"><i class="fa-solid fa-wind"></i> Air-Conditioning & HVAC</span>
                <span class="preview-tag"><i class="fa-solid fa-cogs"></i> Electromechanical</span>
                <span class="preview-tag"><i class="fa-solid fa-bolt"></i> Electrical Maintenance</span>
                <span class="preview-tag"><i class="fa-solid fa-faucet"></i> Sanitary & Plumbing</span>
              </div>
            </div>
          </div>

          <div class="glams-hero-card-foot">
            <div class="glams-qr-box">
              <i class="fa-solid fa-qrcode"></i>
              <span>Official QR Verified</span>
            </div>
            <div class="glams-seal-box">
              <i class="fa-solid fa-stamp"></i>
              <span>Official Electronic Attestation</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Stats Bar -->
    <div class="glams-stats-bar">
      <div class="glams-stats-grid">
        <div class="glams-stat-item">
          <div class="glams-stat-num">15<span>+</span></div>
          <div class="glams-stat-label"><?php esc_html_e( 'Years UAE Experience', 'glams-theme' ); ?></div>
        </div>
        <div class="glams-stat-item">
          <div class="glams-stat-num">5,000<span>+</span></div>
          <div class="glams-stat-label"><?php esc_html_e( 'Completed Projects', 'glams-theme' ); ?></div>
        </div>
        <div class="glams-stat-item">
          <div class="glams-stat-num">100<span>%</span></div>
          <div class="glams-stat-label"><?php esc_html_e( 'Regulatory Compliance', 'glams-theme' ); ?></div>
        </div>
        <div class="glams-stat-item">
          <div class="glams-stat-num">24<span>/7</span></div>
          <div class="glams-stat-label"><?php esc_html_e( 'Emergency Response', 'glams-theme' ); ?></div>
        </div>
      </div>
    </div>
  </div>
</section>
