<?php if(!defined('ABSPATH')) exit; ?>
<div class="glams-verify-wrap">
  <h3><?php esc_html_e('Verify License / التحقق من الرخصة','glams'); ?></h3>
  <div class="glams-search-row">
    <input type="text" id="glams-verify-input" class="glams-search-input" placeholder="<?php esc_attr_e('Enter license number or company name...','glams'); ?>" />
    <button id="glams-verify-btn" class="glams-btn-verify"><?php esc_html_e('Verify','glams'); ?></button>
  </div>
  <div id="glams-verify-result" class="glams-verify-result" style="display:none;"></div>
</div>
