<?php defined( 'ABSPATH' ) || exit; ?>
<div class="wrap glams-admin">
  <div class="glams-header">
    <div class="glams-logo-text">
      <h1>🏛 GLAMS Portal</h1>
      <p>Government License &amp; Activities Management System</p>
    </div>
    <div class="glams-header-actions">
      <a href="<?php echo esc_url( admin_url('admin.php?page=glams-companies&action=new') ); ?>" class="button button-primary glams-btn">+ Add Company</a>
    </div>
  </div>

  <!-- STATS -->
  <div class="glams-stats-grid">
    <div class="glams-stat">
      <div class="stat-icon">🏢</div>
      <div class="stat-body">
        <div class="stat-num"><?php echo esc_html( $stats['total_companies'] ); ?></div>
        <div class="stat-lbl">Total Companies</div>
      </div>
    </div>
    <div class="glams-stat">
      <div class="stat-icon">✅</div>
      <div class="stat-body">
        <div class="stat-num"><?php echo esc_html( $stats['active_companies'] ); ?></div>
        <div class="stat-lbl">Active Licenses</div>
      </div>
    </div>
    <div class="glams-stat">
      <div class="stat-icon">📋</div>
      <div class="stat-body">
        <div class="stat-num"><?php echo esc_html( $stats['total_activities'] ); ?></div>
        <div class="stat-lbl">Activities Registered</div>
      </div>
    </div>
    <div class="glams-stat">
      <div class="stat-icon">📄</div>
      <div class="stat-body">
        <div class="stat-num"><?php echo esc_html( $stats['total_certs'] ); ?></div>
        <div class="stat-lbl">Certificates Issued</div>
      </div>
    </div>
  </div>

  <!-- QUICK ACTIONS -->
  <div class="glams-quick-actions">
    <h2>Quick Actions</h2>
    <div class="qa-grid">
      <a href="<?php echo esc_url( admin_url('admin.php?page=glams-companies') ); ?>" class="qa-card">
        <span>🏢</span><strong>Manage Companies</strong><p>Add, edit, or delete registered companies</p>
      </a>
      <a href="<?php echo esc_url( admin_url('admin.php?page=glams-activities') ); ?>" class="qa-card">
        <span>📋</span><strong>License Activities</strong><p>Manage DET license activity entries</p>
      </a>
      <a href="<?php echo esc_url( admin_url('admin.php?page=glams-logos') ); ?>" class="qa-card">
        <span>🖼</span><strong>Logos &amp; Images</strong><p>Upload government and company logos</p>
      </a>
      <a href="<?php echo esc_url( admin_url('admin.php?page=glams-settings') ); ?>" class="qa-card">
        <span>⚙️</span><strong>Settings</strong><p>Configure site name, colors, and content</p>
      </a>
      <a href="<?php echo esc_url( admin_url('admin.php?page=glams-reports') ); ?>" class="qa-card">
        <span>📊</span><strong>Reports</strong><p>View analytics and export data</p>
      </a>
      <a href="<?php echo esc_url( admin_url('admin.php?page=glams-certificates') ); ?>" class="qa-card">
        <span>📜</span><strong>Certificates</strong><p>Issue and manage certificates</p>
      </a>
    </div>
  </div>

  <!-- SHORTCODES REFERENCE -->
  <div class="glams-shortcodes-ref">
    <h2>Available Shortcodes</h2>
    <table class="widefat striped">
      <thead><tr><th>Shortcode</th><th>Description</th></tr></thead>
      <tbody>
        <tr><td><code>[glams_portal]</code></td><td>Full React application (all pages)</td></tr>
        <tr><td><code>[glams_activities company_id="1"]</code></td><td>License activities table for a company</td></tr>
        <tr><td><code>[glams_verify]</code></td><td>License verification form</td></tr>
        <tr><td><code>[glams_companies]</code></td><td>Company directory grid</td></tr>
        <tr><td><code>[glams_gov_header]</code></td><td>Government header with logos</td></tr>
        <tr><td><code>[glams_stats]</code></td><td>Statistics counter block</td></tr>
      </tbody>
    </table>
  </div>
</div>
