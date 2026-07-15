<?php if(!defined('ABSPATH'))exit; global $wpdb;
$activities = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}glams_activities ORDER BY sort_order"); ?>
<div class="wrap glams-admin-wrap">
<h1>License Activities <button class="button button-primary" id="glams-add-act">+ Add Activity</button></h1>
<div id="glams-act-form" style="display:none;background:#fff;padding:20px;margin:16px 0;border:1px solid #ddd;border-radius:8px">
  <input type="hidden" id="act-id" value="0"/>
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
    <div><label><strong>Activity (English)</strong><br><input type="text" id="act-en" class="widefat" placeholder="Sanitary Installation..."/></label></div>
    <div><label><strong>النشاط (Arabic)</strong><br><input type="text" id="act-ar" class="widefat" style="direction:rtl" placeholder="اصلاح التمديدات..."/></label></div>
    <div><label><strong>Status</strong><br><select id="act-status" class="widefat"><option value="active">Active</option><option value="inactive">Inactive</option></select></label></div>
    <div><label><strong>Sort Order</strong><br><input type="number" id="act-order" class="widefat" value="99"/></label></div>
  </div>
  <div style="margin-top:14px"><button class="button button-primary" id="glams-save-act">Save Activity</button> <button class="button" id="glams-cancel-act">Cancel</button></div>
</div>
<table class="wp-list-table widefat fixed striped">
<thead><tr><th>#</th><th>English Activity</th><th>Arabic / النشاط</th><th>Status</th><th>Actions</th></tr></thead>
<tbody>
<?php foreach($activities as $a): ?>
<tr>
  <td><?php echo esc_html($a->sort_order); ?></td>
  <td><?php echo esc_html($a->activity_en); ?></td>
  <td style="direction:rtl;text-align:right"><?php echo esc_html($a->activity_ar); ?></td>
  <td><span style="background:<?php echo $a->status==='active'?'#DCFCE7':'#FEE2E2'; ?>;color:<?php echo $a->status==='active'?'#15803D':'#B91C1C'; ?>;padding:3px 10px;border-radius:12px;font-size:12px;font-weight:700"><?php echo esc_html(ucfirst($a->status)); ?></span></td>
  <td>
    <button class="button glams-edit-act" data-id="<?php echo $a->id; ?>" data-en="<?php echo esc_attr($a->activity_en); ?>" data-ar="<?php echo esc_attr($a->activity_ar); ?>" data-status="<?php echo esc_attr($a->status); ?>" data-order="<?php echo esc_attr($a->sort_order); ?>">Edit</button>
    <button class="button glams-del-act" data-id="<?php echo $a->id; ?>" style="color:#B91C1C">Delete</button>
  </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
