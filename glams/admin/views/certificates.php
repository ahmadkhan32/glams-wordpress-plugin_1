<?php defined('ABSPATH') || exit; global $wpdb; $certs = $wpdb->get_results("SELECT cert.*, co.company_name FROM {$wpdb->prefix}glams_certificates cert LEFT JOIN {$wpdb->prefix}glams_companies co ON co.id = cert.company_id ORDER BY cert.id DESC LIMIT 50"); ?>
<div class="wrap glams-admin">
  <h1>📜 Certificates</h1>
  <table class="wp-list-table widefat fixed striped">
    <thead><tr><th>Certificate No.</th><th>Company</th><th>Issue Date</th><th>Expiry Date</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
      <?php if(empty($certs)): ?><tr><td colspan="6" style="text-align:center;padding:40px;color:#999">No certificates yet.</td></tr><?php endif; ?>
      <?php foreach($certs as $cert): ?>
      <tr>
        <td><code><?php echo esc_html($cert->certificate_number); ?></code></td>
        <td><?php echo esc_html($cert->company_name); ?></td>
        <td><?php echo esc_html($cert->issue_date); ?></td>
        <td><?php echo esc_html($cert->expiry_date); ?></td>
        <td><span class="glams-badge glams-badge-<?php echo esc_attr($cert->status); ?>"><?php echo esc_html(ucfirst($cert->status)); ?></span></td>
        <td><a href="#" class="button button-small">View PDF</a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
