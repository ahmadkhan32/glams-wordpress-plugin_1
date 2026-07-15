<?php if(!defined('ABSPATH'))exit; global $wpdb;
$c = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}glams_companies WHERE id=1"); ?>
<div class="wrap glams-admin-wrap">
<h1>Company Information</h1>
<div class="glams-admin-card">
<form id="glams-company-form">
<table class="form-table">
  <tr><th>Company Name</th><td><input type="text" name="company_name" class="regular-text" value="<?php echo esc_attr($c->company_name??''); ?>"/></td></tr>
  <tr><th>License Number</th><td><input type="text" name="license_no" class="regular-text" value="<?php echo esc_attr($c->license_no??''); ?>"/></td></tr>
  <tr><th>Owner Name</th><td><input type="text" name="owner" class="regular-text" value="<?php echo esc_attr($c->owner??''); ?>"/></td></tr>
  <tr><th>Issue Date</th><td><input type="date" name="issue_date" value="<?php echo esc_attr($c->issue_date??''); ?>"/></td></tr>
  <tr><th>Expiry Date</th><td><input type="date" name="expiry_date" value="<?php echo esc_attr($c->expiry_date??''); ?>"/></td></tr>
  <tr><th>City</th><td><input type="text" name="city" class="regular-text" value="<?php echo esc_attr($c->city??'Dubai'); ?>"/></td></tr>
  <tr><th>Phone</th><td><input type="text" name="phone" class="regular-text" value="<?php echo esc_attr($c->phone??''); ?>"/></td></tr>
  <tr><th>Email</th><td><input type="email" name="email" class="regular-text" value="<?php echo esc_attr($c->email??''); ?>"/></td></tr>
  <tr><th>Status</th><td><select name="status"><option value="active" <?php selected($c->status??'','active'); ?>>Active</option><option value="inactive" <?php selected($c->status??'','inactive'); ?>>Inactive</option></select></td></tr>
</table>
<button type="button" class="button button-primary" id="glams-save-company">Save Company Info</button>
<span id="glams-company-msg" style="margin-left:10px;color:green;display:none">✓ Saved!</span>
</form>
</div>
</div>
