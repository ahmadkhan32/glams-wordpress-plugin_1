<?php if(!defined('ABSPATH'))exit; global $wpdb;
$logos=$wpdb->get_results("SELECT * FROM {$wpdb->prefix}glams_logos"); ?>
<div class="wrap glams-admin-wrap">
<h1>Logo Management</h1>
<p>Upload and manage government logos, company logos, and header/footer images. These images display in the license activities header exactly as shown in official Dubai DET documents.</p>
<div class="glams-admin-card">
<h3>Header Logos</h3>
<table class="form-table">
  <tr><th>Left Logo (Government/Company)</th><td><button class="button glams-upload-logo" data-target="logo-left">Upload Logo</button> <span id="logo-left-preview"></span></td></tr>
  <tr><th>Center Logo (Emblem/Seal)</th><td><button class="button glams-upload-logo" data-target="logo-center">Upload Logo</button> <span id="logo-center-preview"></span></td></tr>
  <tr><th>Right Logo (DET/Authority)</th><td><button class="button glams-upload-logo" data-target="logo-right">Upload Logo</button> <span id="logo-right-preview"></span></td></tr>
</table>
<p><em>Logos are stored in WordPress Media Library and referenced by attachment ID.</em></p>
</div>
</div>
