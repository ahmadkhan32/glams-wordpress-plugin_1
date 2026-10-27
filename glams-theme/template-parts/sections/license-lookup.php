<?php
/**
 * License Activities Lookup & Verification Section
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$license    = get_theme_mod( 'glams_license_no', 'DET-2024-001234' );
$activities = glams_get_activities_by_company( 1 );
?>

<section class="glams-section glams-license-section" id="license">
  <div class="glams-container">
    <div class="glams-section-head text-center">
      <div class="glams-section-tag">
        <i class="fa-solid fa-stamp"></i>
        <span><?php esc_html_e( 'Official Attestation', 'glams-theme' ); ?></span>
      </div>
      <h2 class="glams-section-title">
        <?php esc_html_e( 'License Activities & Certificate Verification', 'glams-theme' ); ?>
      </h2>
      <p class="glams-section-sub">
        <?php esc_html_e( 'Search and verify approved commercial activities under the Dubai Economic Department (DET) registry in real-time.', 'glams-theme' ); ?>
      </p>
    </div>

    <!-- License Lookup Container -->
    <div class="glams-license-card">
      <!-- Card Header -->
      <div class="glams-cert-header-bar">
        <div class="glams-cert-entity">
          <div class="glams-gov-crest">
            <i class="fa-solid fa-landmark"></i>
          </div>
          <div>
            <div class="glams-cert-state">United Arab Emirates • Government of Dubai</div>
            <h3 class="glams-cert-firm">Al Noor Technical Services LLC</h3>
            <p class="glams-cert-firm-ar ar-text">شركة النور للخدمات التقنية ذ.م.م</p>
          </div>
        </div>

        <div class="glams-cert-tools">
          <button type="button" class="glams-btn glams-btn-outline glams-btn-sm" id="glamsPrintCertBtn">
            <i class="fa-solid fa-print"></i>
            <span><?php esc_html_e( 'Print Certificate', 'glams-theme' ); ?></span>
          </button>
          <a href="#contact" class="glams-btn glams-btn-primary glams-btn-sm">
            <i class="fa-solid fa-shield-check"></i>
            <span><?php esc_html_e( 'Verify Authenticity', 'glams-theme' ); ?></span>
          </a>
        </div>
      </div>

      <!-- Search & Meta Filter Row -->
      <div class="glams-cert-controls">
        <div class="glams-search-field">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text"
                 id="glamsActivitySearch"
                 placeholder="<?php esc_attr_e( 'Search activities in English or Arabic (e.g. Sanitary, Tiling, التكييف)...', 'glams-theme' ); ?>"
                 aria-label="Search activities">
        </div>

        <div class="glams-cert-pills">
          <span class="glams-badge-pill">
            <strong><?php esc_html_e( 'License:', 'glams-theme' ); ?></strong> <?php echo esc_html( $license ); ?>
          </span>
          <span class="glams-badge-pill" id="glamsActivityCount">
            <?php printf( esc_html__( '%d Activities Listed', 'glams-theme' ), count( $activities ) ); ?>
          </span>
          <span class="status-badge status-active">
            <span class="status-dot"></span> <?php esc_html_e( 'Government Validated', 'glams-theme' ); ?>
          </span>
        </div>
      </div>

      <!-- Activities Table -->
      <div class="glams-table-responsive">
        <table class="glams-activities-table" id="glamsActivitiesTable">
          <thead>
            <tr>
              <th style="width: 60px;">#</th>
              <th><?php esc_html_e( 'Activity Name (English)', 'glams-theme' ); ?></th>
              <th class="ar-header"><?php esc_html_e( 'اسم النشاط (باللغة العربية)', 'glams-theme' ); ?></th>
              <th style="width: 140px; text-align: center;"><?php esc_html_e( 'Status', 'glams-theme' ); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ( $activities as $index => $act ) : ?>
              <tr>
                <td class="glams-td-num"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></td>
                <td class="glams-td-en">
                  <strong><?php echo esc_html( $act['name'] ); ?></strong>
                </td>
                <td class="glams-td-ar ar-text" dir="rtl">
                  <?php echo esc_html( $act['nameAr'] ); ?>
                </td>
                <td class="glams-td-status" style="text-align: center;">
                  <span class="status-badge status-<?php echo esc_attr( $act['status'] ); ?>">
                    <span class="status-dot"></span>
                    <?php echo $act['status'] === 'active' ? esc_html__( 'Active', 'glams-theme' ) : esc_html__( 'Inactive', 'glams-theme' ); ?>
                  </span>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Table Footer with Security Seal -->
      <div class="glams-cert-footer-bar">
        <div class="glams-cert-qr-block">
          <i class="fa-solid fa-qrcode"></i>
          <div>
            <strong><?php esc_html_e( 'Encrypted Verification Hash', 'glams-theme' ); ?></strong>
            <p><?php esc_html_e( 'Scan QR code with smartphone to verify live government registry standing.', 'glams-theme' ); ?></p>
          </div>
        </div>

        <div class="glams-cert-security-seal">
          <i class="fa-solid fa-award"></i>
          <span><?php esc_html_e( 'Certified Official Document — Electronic Signature Validated', 'glams-theme' ); ?></span>
        </div>
      </div>
    </div>
  </div>
</section>
