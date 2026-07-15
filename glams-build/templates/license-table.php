<?php if(!defined('ABSPATH')) exit; ?>
<?php $s = GLAMS_Database::instance()->get_all_settings(); ?>
<div class="glams-license-document">
  <?php if($atts['show_header'] === 'yes'): ?>
  <div class="glams-doc-header">
    <div class="glams-doc-left">
      <?php if(!empty($s['gov_logo_left'])): ?>
        <img src="<?php echo esc_url($s['gov_logo_left']); ?>" alt="Government Logo" class="glams-gov-logo" />
      <?php else: ?>
        <div class="glams-gov-emblem">🏛️</div>
      <?php endif; ?>
      <div class="glams-gov-names">
        <span class="glams-gov-ar"><?php echo esc_html($s['gov_name_ar'] ?? 'حكومة دبـي'); ?></span>
        <span class="glams-gov-en"><?php echo esc_html($s['gov_name_en'] ?? 'GOVERNMENT OF DUBAI'); ?></span>
      </div>
    </div>
    <div class="glams-doc-center">
      <?php if(!empty($s['gov_logo_center'])): ?>
        <img src="<?php echo esc_url($s['gov_logo_center']); ?>" alt="Center Logo" class="glams-center-logo" />
      <?php else: ?>
        <div class="glams-mht-logo"><span>MHT</span></div>
      <?php endif; ?>
    </div>
    <div class="glams-doc-right">
      <?php if(!empty($s['gov_logo_right'])): ?>
        <img src="<?php echo esc_url($s['gov_logo_right']); ?>" alt="Right Logo" class="glams-right-logo" />
      <?php else: ?>
        <div class="glams-det-badge">
          <span class="glams-det-text"><?php echo esc_html($s['det_name_en'] ?? 'Economy and Tourism'); ?></span>
          <span class="glams-det-ar"><?php echo esc_html($s['det_name_ar'] ?? 'للاقتصاد والسياحة'); ?></span>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="glams-doc-divider">
    <span class="glams-div-red"></span>
    <span class="glams-div-gold"></span>
  </div>
  <?php endif; ?>

  <div class="glams-license-meta">
    <div class="glams-meta-item"><span class="glams-meta-label"><?php esc_html_e('License No.','glams'); ?></span><span class="glams-meta-val"><?php echo esc_html($company->license_number); ?></span></div>
    <div class="glams-meta-item"><span class="glams-meta-label"><?php esc_html_e('Company','glams'); ?></span><span class="glams-meta-val"><?php echo esc_html($company->company_name); ?></span></div>
    <div class="glams-meta-item"><span class="glams-meta-label"><?php esc_html_e('Issue Date','glams'); ?></span><span class="glams-meta-val"><?php echo esc_html($company->issue_date); ?></span></div>
    <div class="glams-meta-item"><span class="glams-meta-label"><?php esc_html_e('Expiry','glams'); ?></span><span class="glams-meta-val"><?php echo esc_html($company->expiry_date); ?></span></div>
  </div>

  <div class="glams-table-wrap">
    <div class="glams-table-title">License Activities / أنشطة الرخصة</div>
    <table class="glams-activities-table">
      <thead>
        <tr>
          <th class="glams-th-ar">النشاط</th>
          <th class="glams-th-status">الحالة</th>
          <th class="glams-th-status">Status</th>
          <th class="glams-th-en">Activity</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($activities as $act): ?>
        <tr>
          <td class="glams-td-ar" dir="rtl"><?php echo esc_html($act->activity_name_ar); ?></td>
          <td class="glams-td-status"><span class="glams-badge-ar">فعال</span></td>
          <td class="glams-td-status"><span class="glams-badge-en"><?php echo esc_html(ucfirst($act->status)); ?></span></td>
          <td class="glams-td-en"><?php echo esc_html($act->activity_name); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="glams-doc-actions">
    <button class="glams-btn-print" onclick="window.print()">🖨️ <?php esc_html_e('Print','glams'); ?></button>
    <button class="glams-btn-pdf" onclick="glamsPDF()">📄 <?php esc_html_e('Export PDF','glams'); ?></button>
  </div>
</div>
