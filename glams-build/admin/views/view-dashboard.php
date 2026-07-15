<?php if(!defined('ABSPATH'))exit; global $wpdb;
$total_activities = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}glams_activities");
$total_services   = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}glams_services");
$company          = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}glams_companies WHERE id=1");
?>
<div class="wrap glams-admin-wrap">
<div class="glams-admin-header">
  <div class="glams-admin-logo">GLAMS</div>
  <div><h1>GLAMS Dashboard</h1><p>Government License & Activities Management System</p></div>
</div>
<div class="glams-stats-row">
  <div class="glams-admin-stat"><span class="glams-stat-icon" style="background:#006A4E">⚡</span><div><strong><?php echo $total_activities; ?></strong><small>Activities</small></div></div>
  <div class="glams-admin-stat"><span class="glams-stat-icon" style="background:#C9A84C">🔧</span><div><strong><?php echo $total_services; ?></strong><small>Services</small></div></div>
  <div class="glams-admin-stat"><span class="glams-stat-icon" style="background:#0D2B55">🏢</span><div><strong>1</strong><small>Company</small></div></div>
  <div class="glams-admin-stat"><span class="glams-stat-icon" style="background:#7C3AED">✓</span><div><strong><?php echo $company ? ucfirst($company->status) : 'N/A'; ?></strong><small>License Status</small></div></div>
</div>
<div class="glams-admin-grid">
  <div class="glams-admin-card">
    <h3>Company Info</h3>
    <?php if($company): ?>
    <table class="widefat"><tbody>
      <tr><th>Company</th><td><?php echo esc_html($company->company_name); ?></td></tr>
      <tr><th>License No.</th><td><?php echo esc_html($company->license_no); ?></td></tr>
      <tr><th>Owner</th><td><?php echo esc_html($company->owner); ?></td></tr>
      <tr><th>Expiry</th><td><?php echo esc_html($company->expiry_date); ?></td></tr>
    </tbody></table>
    <?php endif; ?>
    <a href="<?php echo admin_url('admin.php?page=glams-company'); ?>" class="button button-primary" style="margin-top:12px">Edit Company</a>
  </div>
  <div class="glams-admin-card">
    <h3>Quick Links</h3>
    <ul class="glams-quick-links">
      <li><a href="<?php echo admin_url('admin.php?page=glams-activities'); ?>">📋 Manage Activities</a></li>
      <li><a href="<?php echo admin_url('admin.php?page=glams-services'); ?>">🔧 Manage Services</a></li>
      <li><a href="<?php echo admin_url('admin.php?page=glams-immigration'); ?>">🛂 Immigration Services</a></li>
      <li><a href="<?php echo admin_url('admin.php?page=glams-logos'); ?>">🖼 Manage Logos</a></li>
      <li><a href="<?php echo admin_url('admin.php?page=glams-settings-page'); ?>">⚙ Settings</a></li>
    </ul>
  </div>
</div>
<div class="glams-admin-card" style="margin-top:20px">
  <h3>Shortcodes</h3>
  <div class="glams-shortcodes-list">
    <code>[glams_license_activities]</code> – Full license activities table with government header<br>
    <code>[glams_services]</code> – Services grid<br>
    <code>[glams_immigration]</code> – Immigration services cards<br>
    <code>[glams_verification]</code> – License verification form<br>
    <code>[glams_contact_form]</code> – Contact / quote form<br>
    <code>[glams_hero]</code> – Hero banner section<br>
    <code>[glams_stats]</code> – Statistics bar<br>
  </div>
</div>
</div>
