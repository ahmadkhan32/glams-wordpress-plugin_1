<?php
/**
 * Template Name: License Activities Certificate Page
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$license    = get_theme_mod( 'glams_license_no', 'DET-2024-001234' );
$activities = glams_get_activities_by_company( 1 );
?>

<div class="glams-page-hero">
  <div class="glams-container">
    <div class="glams-section-tag">
      <i class="fa-solid fa-stamp"></i>
      <span><?php esc_html_e( 'Official Attestation', 'glams-theme' ); ?></span>
    </div>
    <h1 class="glams-page-title"><?php esc_html_e( 'License Activities Certificate (GLAMS)', 'glams-theme' ); ?></h1>
    <p class="glams-page-desc">
      <?php esc_html_e( 'Digital verified certificate of approved commercial activities under the Dubai Department of Economy and Tourism (DET).', 'glams-theme' ); ?>
    </p>
  </div>
</div>

<div class="glams-container glams-content-area glams-section">
  <!-- Print-ready Official Certificate Container -->
  <div class="glams-license-card glams-official-certificate-view">
    <!-- Certificate Government Header -->
    <div class="glams-cert-header-bar">
      <div class="glams-cert-entity">
        <div class="glams-gov-crest">
          <i class="fa-solid fa-landmark"></i>
        </div>
        <div>
          <div class="glams-cert-state">United Arab Emirates • Government of Dubai</div>
          <div class="glams-cert-state-ar ar-text">دولة الإمارات العربية المتحدة • حكومة دبي</div>
          <h2 class="glams-cert-firm">Al Noor Technical Services LLC</h2>
          <p class="glams-cert-firm-ar ar-text">شركة النور للخدمات التقنية ذ.م.م</p>
        </div>
      </div>

      <div class="glams-cert-tools">
        <button type="button" class="glams-btn glams-btn-outline glams-btn-sm" id="glamsPrintCertBtn">
          <i class="fa-solid fa-print"></i>
          <span><?php esc_html_e( 'Print Official Certificate', 'glams-theme' ); ?></span>
        </button>
        <button type="button" class="glams-btn glams-btn-primary glams-btn-sm" id="glamsCopyLicenseBtn" data-license="<?php echo esc_attr( $license ); ?>">
          <i class="fa-regular fa-copy"></i>
          <span><?php esc_html_e( 'Copy License No', 'glams-theme' ); ?></span>
        </button>
      </div>
    </div>

    <!-- License Meta Table Grid -->
    <div class="glams-cert-meta-container">
      <div class="glams-cert-meta-row">
        <div class="glams-cert-field">
          <span class="label">License No / رقم الرخصة:</span>
          <span class="val highlight"><?php echo esc_html( $license ); ?></span>
        </div>
        <div class="glams-cert-field">
          <span class="label">Legal Status / الشكل القانوني:</span>
          <span class="val">Limited Liability Company (LLC)</span>
        </div>
        <div class="glams-cert-field">
          <span class="label">Register No / رقم السجل:</span>
          <span class="val">1198452</span>
        </div>
      </div>
      <div class="glams-cert-meta-row">
        <div class="glams-cert-field">
          <span class="label">Issue Date / تاريخ الإصدار:</span>
          <span class="val">15/01/2024</span>
        </div>
        <div class="glams-cert-field">
          <span class="label">Expiry Date / تاريخ الانتهاء:</span>
          <span class="val text-accent">14/01/2025</span>
        </div>
        <div class="glams-cert-field">
          <span class="label">D-U-N-S No:</span>
          <span class="val">850493821</span>
        </div>
      </div>
    </div>

    <!-- Search Box -->
    <div class="glams-cert-controls">
      <div class="glams-search-field">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text"
               id="glamsActivitySearch"
               placeholder="<?php esc_attr_e( 'Filter activities (e.g. Sanitary, Tiling, HVAC, التكييف)...', 'glams-theme' ); ?>"
               aria-label="Filter activities">
      </div>
      <div class="glams-cert-pills">
        <span class="glams-badge-pill" id="glamsActivityCount">
          <?php printf( esc_html__( '%d Activities Approved', 'glams-theme' ), count( $activities ) ); ?>
        </span>
        <span class="status-badge status-active">
          <span class="status-dot"></span> Active in DET Register
        </span>
      </div>
    </div>

    <!-- Bilingual Table -->
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
          <?php foreach ( $activities as $idx => $act ) : ?>
            <tr>
              <td class="glams-td-num"><?php echo esc_html( sprintf( '%02d', $idx + 1 ) ); ?></td>
              <td class="glams-td-en"><strong><?php echo esc_html( $act['name'] ); ?></strong></td>
              <td class="glams-td-ar ar-text" dir="rtl"><?php echo esc_html( $act['nameAr'] ); ?></td>
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

    <!-- Official Verification Seal Footer -->
    <div class="glams-cert-footer-bar">
      <div class="glams-cert-qr-block">
        <i class="fa-solid fa-qrcode"></i>
        <div>
          <strong><?php esc_html_e( 'Official Electronic Seal & Verification Hash', 'glams-theme' ); ?></strong>
          <p><?php esc_html_e( 'This document is electronically verified by the GLAMS portal against the central Dubai DET registry.', 'glams-theme' ); ?></p>
        </div>
      </div>

      <div class="glams-cert-security-seal">
        <i class="fa-solid fa-shield-halved"></i>
        <span><?php esc_html_e( 'Tamper-Proof Electronic Certificate', 'glams-theme' ); ?></span>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
