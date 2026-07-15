<?php if(!defined('ABSPATH'))exit; global $wpdb;
$items=$wpdb->get_results("SELECT * FROM {$wpdb->prefix}glams_immigration ORDER BY sort_order"); ?>
<div class="wrap glams-admin-wrap">
<h1>Immigration Services</h1>
<?php if(empty($items)): ?>
<div class="notice notice-info"><p>No immigration services added yet. Immigration items can be added via the database or REST API at <code><?php echo rest_url('glams/v1/immigration'); ?></code>.</p></div>
<?php endif; ?>
<p>To add immigration services, insert rows into <code><?php echo $wpdb->prefix; ?>glams_immigration</code> table with fields: title_en, title_ar, badge, description, features (JSON), sort_order, status.</p>
</div>
