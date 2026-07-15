<?php if(!defined('ABSPATH'))exit;
$keys=['company_name','primary_color','gold_color','navy_color','phone','email','address','hero_title','hero_subtitle','show_arabic','gov_logo_text_left','gov_logo_text_right'];
?>
<div class="wrap glams-admin-wrap">
<h1>GLAMS Settings</h1>
<div class="glams-admin-card">
<table class="form-table" id="glams-settings-table">
<?php foreach($keys as $k): $v=GLAMS_Database::get_setting($k,''); ?>
<tr>
  <th><label for="glams-<?php echo esc_attr($k); ?>"><?php echo esc_html(ucwords(str_replace('_',' ',$k))); ?></label></th>
  <td>
    <?php if(strpos($k,'color')!==false): ?>
    <input type="color" id="glams-<?php echo esc_attr($k); ?>" class="glams-setting" data-key="<?php echo esc_attr($k); ?>" value="<?php echo esc_attr($v); ?>"/>
    <?php elseif(strpos($k,'show_')===0): ?>
    <select id="glams-<?php echo esc_attr($k); ?>" class="glams-setting" data-key="<?php echo esc_attr($k); ?>"><option value="1" <?php selected($v,'1'); ?>>Yes</option><option value="0" <?php selected($v,'0'); ?>>No</option></select>
    <?php else: ?>
    <input type="text" id="glams-<?php echo esc_attr($k); ?>" class="regular-text glams-setting" data-key="<?php echo esc_attr($k); ?>" value="<?php echo esc_attr($v); ?>"/>
    <?php endif; ?>
  </td>
</tr>
<?php endforeach; ?>
</table>
<button class="button button-primary" id="glams-save-all-settings">Save All Settings</button>
<span id="glams-settings-msg" style="margin-left:10px;color:green;display:none">✓ All settings saved!</span>
</div>
</div>
