<?php defined('ABSPATH') || exit; $s = GLAMS_DB::get_stats(); ?>
<div class="wrap glams-admin">
  <h1>📊 Reports &amp; Analytics</h1>
  <div class="glams-stats-grid">
    <div class="glams-stat"><div class="stat-icon">🏢</div><div class="stat-body"><div class="stat-num"><?php echo esc_html($s['total_companies']); ?></div><div class="stat-lbl">Companies</div></div></div>
    <div class="glams-stat"><div class="stat-icon">✅</div><div class="stat-body"><div class="stat-num"><?php echo esc_html($s['active_companies']); ?></div><div class="stat-lbl">Active</div></div></div>
    <div class="glams-stat"><div class="stat-icon">📋</div><div class="stat-body"><div class="stat-num"><?php echo esc_html($s['total_activities']); ?></div><div class="stat-lbl">Activities</div></div></div>
    <div class="glams-stat"><div class="stat-icon">📄</div><div class="stat-body"><div class="stat-num"><?php echo esc_html($s['total_certs']); ?></div><div class="stat-lbl">Certificates</div></div></div>
  </div>
  <p>For detailed CSV/Excel exports, use the REST API endpoint: <code><?php echo rest_url('glams/v1/companies?format=csv'); ?></code></p>
</div>
