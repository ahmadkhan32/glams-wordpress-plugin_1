<?php
/**
 * Template Name: Certificate & QR Verification
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$license = get_theme_mod( 'glams_license_no', 'DET-2024-001234' );
?>

<div class="glams-page-hero">
  <div class="glams-container">
    <div class="glams-section-tag">
      <i class="fa-solid fa-shield-check"></i>
      <span><?php esc_html_e( 'Tamper-Proof Verification', 'glams-theme' ); ?></span>
    </div>
    <h1 class="glams-page-title"><?php esc_html_e( 'Instant Certificate & License Verification', 'glams-theme' ); ?></h1>
    <p class="glams-page-desc">
      <?php esc_html_e( 'Verify authentic UAE trade licenses and electronic activity certificates issued under the GLAMS portal.', 'glams-theme' ); ?>
    </p>
  </div>
</div>

<div class="glams-container glams-content-area glams-section">
  <div class="glams-verify-box">
    <div class="glams-verify-form-card">
      <div class="glams-vf-icon">
        <i class="fa-solid fa-qrcode"></i>
      </div>
      <h2><?php esc_html_e( 'Enter License Number or Reference Code', 'glams-theme' ); ?></h2>
      <p><?php esc_html_e( 'Scan the QR code printed on the official certificate or input the DET license reference below:', 'glams-theme' ); ?></p>

      <div class="glams-verify-input-group">
        <input type="text"
               id="glamsVerifyInput"
               value="<?php echo esc_attr( $license ); ?>"
               placeholder="<?php esc_attr_e( 'e.g. DET-2024-001234', 'glams-theme' ); ?>"
               aria-label="License reference">
        <button type="button" class="glams-btn glams-btn-primary" id="glamsVerifyTriggerBtn">
          <i class="fa-solid fa-magnifying-glass"></i>
          <span><?php esc_html_e( 'Verify Document', 'glams-theme' ); ?></span>
        </button>
      </div>

      <!-- Verified Certificate Status Card -->
      <div class="glams-verified-status-card">
        <div class="glams-vsc-header">
          <div class="glams-vsc-badge">
            <i class="fa-solid fa-circle-check"></i>
            <span><?php esc_html_e( 'AUTHENTIC RECORD VERIFIED', 'glams-theme' ); ?></span>
          </div>
          <span class="status-badge status-active">
            <span class="status-dot"></span> Valid & Active
          </span>
        </div>

        <div class="glams-vsc-body">
          <div class="glams-vsc-grid">
            <div>
              <span class="label">Trade Name / الاسم التجاري:</span>
              <strong class="val">Al Noor Technical Services LLC</strong>
              <div class="ar-text">شركة النور للخدمات التقنية ذ.م.م</div>
            </div>
            <div>
              <span class="label">Licensing Authority:</span>
              <strong class="val">Dubai DET (Economy & Tourism)</strong>
            </div>
            <div>
              <span class="label">License Number:</span>
              <strong class="val highlight"><?php echo esc_html( $license ); ?></strong>
            </div>
            <div>
              <span class="label">Validity Status:</span>
              <strong class="val text-accent">Active through 14-Jan-2025</strong>
            </div>
          </div>

          <div class="glams-vsc-activities-list">
            <h4><?php esc_html_e( '11 Verified Commercial Activities Authorized:', 'glams-theme' ); ?></h4>
            <div class="preview-tags">
              <span class="preview-tag"><i class="fa-solid fa-circle-check"></i> Air-Conditioning & HVAC</span>
              <span class="preview-tag"><i class="fa-solid fa-circle-check"></i> Electromechanical Equipment</span>
              <span class="preview-tag"><i class="fa-solid fa-circle-check"></i> Floor & Wall Tiling Works</span>
              <span class="preview-tag"><i class="fa-solid fa-circle-check"></i> Carpentry & Wood Flooring</span>
              <span class="preview-tag"><i class="fa-solid fa-circle-check"></i> False Ceilings & Partitions</span>
              <span class="preview-tag"><i class="fa-solid fa-circle-check"></i> Electrical Repair & Maintenance</span>
              <span class="preview-tag"><i class="fa-solid fa-circle-check"></i> Sanitary & Pipe Repairing</span>
              <span class="preview-tag"><i class="fa-solid fa-circle-check"></i> Plaster Works</span>
              <span class="preview-tag"><i class="fa-solid fa-circle-check"></i> Building Cleaning Services</span>
              <span class="preview-tag"><i class="fa-solid fa-circle-check"></i> Wallpaper Fixing Works</span>
              <span class="preview-tag"><i class="fa-solid fa-circle-check"></i> Engraving & Ornamentation</span>
            </div>
          </div>
        </div>

        <div class="glams-vsc-footer">
          <a href="<?php echo esc_url( home_url( '/#license' ) ); ?>" class="glams-btn glams-btn-outline glams-btn-sm">
            <i class="fa-solid fa-file-contract"></i>
            <span><?php esc_html_e( 'View Full Activities Certificate', 'glams-theme' ); ?></span>
          </a>
          <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="glams-btn glams-btn-primary glams-btn-sm">
            <i class="fa-solid fa-phone"></i>
            <span><?php esc_html_e( 'Engage This Contractor', 'glams-theme' ); ?></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
