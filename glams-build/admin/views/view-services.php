<?php if(!defined('ABSPATH'))exit; global $wpdb;
$services=$wpdb->get_results("SELECT * FROM {$wpdb->prefix}glams_services ORDER BY sort_order"); ?>
<div class="wrap glams-admin-wrap">
<h1>Services <button class="button button-primary" id="glams-add-svc">+ Add Service</button></h1>
<div id="glams-svc-form" style="display:none;background:#fff;padding:20px;margin:16px 0;border:1px solid #ddd;border-radius:8px">
  <input type="hidden" id="svc-id" value="0"/>
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
    <div><label>Title (English)<br><input type="text" id="svc-en" class="widefat"/></label></div>
    <div><label>عنوان (Arabic)<br><input type="text" id="svc-ar" class="widefat" style="direction:rtl"/></label></div>
    <div><label>Icon Class (FontAwesome)<br><input type="text" id="svc-icon" class="widefat" placeholder="fa-tools"/></label></div>
    <div><label>Sort Order<br><input type="number" id="svc-order" class="widefat" value="99"/></label></div>
    <div class="widefat"><label>Description<br><textarea id="svc-desc" class="widefat" rows="3"></textarea></label></div>
  </div>
  <div style="margin-top:14px"><button class="button button-primary" id="glams-save-svc">Save</button> <button class="button" id="glams-cancel-svc">Cancel</button></div>
</div>
<table class="wp-list-table widefat fixed striped">
<thead><tr><th>#</th><th>Icon</th><th>Title (EN)</th><th>Title (AR)</th><th>Actions</th></tr></thead>
<tbody>
<?php foreach($services as $s): ?>
<tr>
  <td><?php echo esc_html($s->sort_order); ?></td>
  <td><i class="fa <?php echo esc_attr($s->icon); ?>"></i> <?php echo esc_html($s->icon); ?></td>
  <td><?php echo esc_html($s->title_en); ?></td>
  <td style="direction:rtl"><?php echo esc_html($s->title_ar); ?></td>
  <td><button class="button glams-edit-svc" data-id="<?php echo $s->id;?>" data-en="<?php echo esc_attr($s->title_en);?>" data-ar="<?php echo esc_attr($s->title_ar);?>" data-icon="<?php echo esc_attr($s->icon);?>" data-order="<?php echo esc_attr($s->sort_order);?>" data-desc="<?php echo esc_attr($s->description);?>">Edit</button></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
