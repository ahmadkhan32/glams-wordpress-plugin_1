<?php
defined( 'ABSPATH' ) || exit;
$settings = GLAMS_DB::get_all_settings();
$get = fn($k, $d='') => esc_attr( $settings[$k] ?? $d );
?>
<div class="wrap glams-admin">
  <h1>⚙️ GLAMS Settings</h1>
  <div id="glams-settings-msg" class="notice" style="display:none"></div>

  <div class="glams-settings-tabs">
    <button class="tab-btn active" data-tab="general">General</button>
    <button class="tab-btn" data-tab="logos">Logos</button>
    <button class="tab-btn" data-tab="colors">Colors &amp; Fonts</button>
    <button class="tab-btn" data-tab="contact">Contact</button>
    <button class="tab-btn" data-tab="pdf">PDF Layout</button>
  </div>

  <!-- GENERAL -->
  <div class="glams-tab-pane active" id="tab-general">
    <table class="form-table">
      <tr><th>Site Name</th><td><input type="text" data-key="site_name" value="<?php echo $get('site_name','TechServ UAE'); ?>" class="regular-text glams-setting"/></td></tr>
      <tr><th>Tagline</th><td><input type="text" data-key="site_tagline" value="<?php echo $get('site_tagline','Technical Services & Immigration'); ?>" class="regular-text glams-setting"/></td></tr>
      <tr><th>DET License No.</th><td><input type="text" data-key="det_license" value="<?php echo $get('det_license'); ?>" class="regular-text glams-setting"/></td></tr>
      <tr><th>Currency</th><td><select data-key="currency" class="glams-setting"><option <?php selected($get('currency'),'AED'); ?>>AED</option><option <?php selected($get('currency'),'USD'); ?>>USD</option></select></td></tr>
      <tr><th>Default Language</th><td><select data-key="default_lang" class="glams-setting"><option value="en">English</option><option value="ar">Arabic</option></select></td></tr>
    </table>
  </div>

  <!-- LOGOS -->
  <div class="glams-tab-pane" id="tab-logos">
    <p>Upload logos that appear in the government document header. These replace the placeholder boxes in the frontend.</p>
    <table class="form-table">
      <?php
      $logo_positions = [
          'logo_left_id'   => 'Left Logo (e.g. Ministry / MHT)',
          'logo_center_id' => 'Center Logo (e.g. Emblem / Crest)',
          'logo_right_id'  => 'Right Logo (e.g. Dubai Economy & Tourism)',
          'watermark_id'   => 'Watermark (appears on PDF/Print)',
          'stamp_id'       => 'Official Stamp',
          'footer_logo_id' => 'Footer Logo',
      ];
      foreach ( $logo_positions as $key => $label ) :
          $img_id = (int) ($settings[$key] ?? 0);
          $img_url = $img_id ? wp_get_attachment_image_url( $img_id, 'thumbnail' ) : '';
      ?>
      <tr>
        <th><?php echo esc_html($label); ?></th>
        <td>
          <div class="glams-logo-uploader" data-key="<?php echo esc_attr($key); ?>">
            <div class="logo-preview" style="<?php echo $img_url ? '' : 'display:none'; ?>">
              <img src="<?php echo esc_url($img_url); ?>" style="max-height:60px;border:1px solid #ddd;border-radius:4px;padding:4px;">
            </div>
            <input type="hidden" class="logo-id-input glams-setting" data-key="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($img_id); ?>"/>
            <button type="button" class="button upload-logo-btn">Choose Image</button>
            <?php if ($img_url): ?><button type="button" class="button remove-logo-btn">Remove</button><?php endif; ?>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <!-- COLORS -->
  <div class="glams-tab-pane" id="tab-colors">
    <table class="form-table">
      <tr><th>Primary Color (Teal)</th><td><input type="color" data-key="primary_color" class="glams-setting" value="<?php echo $get('primary_color','#006B75'); ?>"/></td></tr>
      <tr><th>Accent Color (Gold)</th><td><input type="color" data-key="accent_color" class="glams-setting" value="<?php echo $get('accent_color','#B8860B'); ?>"/></td></tr>
      <tr><th>Navy/Dark Color</th><td><input type="color" data-key="dark_color" class="glams-setting" value="<?php echo $get('dark_color','#0D1B2A'); ?>"/></td></tr>
      <tr><th>Header Font</th><td><select data-key="font_heading" class="glams-setting"><option>Inter</option><option>Tajawal</option><option>Cairo</option><option>Poppins</option></select></td></tr>
      <tr><th>Body Font</th><td><select data-key="font_body" class="glams-setting"><option>Inter</option><option>Tajawal</option><option>Open Sans</option></select></td></tr>
    </table>
  </div>

  <!-- CONTACT -->
  <div class="glams-tab-pane" id="tab-contact">
    <table class="form-table">
      <tr><th>Phone</th><td><input type="text" data-key="phone" value="<?php echo $get('phone'); ?>" class="regular-text glams-setting"/></td></tr>
      <tr><th>WhatsApp</th><td><input type="text" data-key="whatsapp" value="<?php echo $get('whatsapp'); ?>" class="regular-text glams-setting"/></td></tr>
      <tr><th>Email</th><td><input type="email" data-key="email" value="<?php echo $get('email'); ?>" class="regular-text glams-setting"/></td></tr>
      <tr><th>Address</th><td><textarea data-key="address" class="large-text glams-setting"><?php echo esc_textarea($settings['address'] ?? ''); ?></textarea></td></tr>
      <tr><th>Working Hours</th><td><input type="text" data-key="working_hours" value="<?php echo $get('working_hours','Sat-Thu 8AM-6PM'); ?>" class="regular-text glams-setting"/></td></tr>
      <tr><th>LinkedIn URL</th><td><input type="url" data-key="social_linkedin" value="<?php echo $get('social_linkedin'); ?>" class="regular-text glams-setting"/></td></tr>
      <tr><th>Twitter/X URL</th><td><input type="url" data-key="social_twitter" value="<?php echo $get('social_twitter'); ?>" class="regular-text glams-setting"/></td></tr>
    </table>
  </div>

  <!-- PDF -->
  <div class="glams-tab-pane" id="tab-pdf">
    <table class="form-table">
      <tr><th>PDF Paper Size</th><td><select data-key="pdf_paper" class="glams-setting"><option>A4</option><option>Letter</option></select></td></tr>
      <tr><th>PDF Orientation</th><td><select data-key="pdf_orientation" class="glams-setting"><option>Portrait</option><option>Landscape</option></select></td></tr>
      <tr><th>Show Watermark</th><td><input type="checkbox" data-key="pdf_watermark" class="glams-setting" value="1" <?php checked($settings['pdf_watermark'] ?? '', '1'); ?>/></td></tr>
      <tr><th>Show QR Code</th><td><input type="checkbox" data-key="pdf_qr" class="glams-setting" value="1" <?php checked($settings['pdf_qr'] ?? '1', '1'); ?>/></td></tr>
      <tr><th>Footer Text</th><td><input type="text" data-key="pdf_footer_text" value="<?php echo $get('pdf_footer_text','This is an official document. Verify at: '); ?>" class="large-text glams-setting"/></td></tr>
    </table>
  </div>

  <p class="submit">
    <button type="button" class="button button-primary" id="glams-save-settings">💾 Save All Settings</button>
  </p>
</div>

<script>
jQuery(function($) {
  // Tabs
  $('.tab-btn').on('click', function() {
    $('.tab-btn').removeClass('active');
    $('.glams-tab-pane').removeClass('active');
    $(this).addClass('active');
    $('#tab-' + $(this).data('tab')).addClass('active');
  });

  // Save settings
  $('#glams-save-settings').on('click', function() {
    var data = {};
    $('.glams-setting').each(function() {
      var key = $(this).data('key');
      if ($(this).is(':checkbox')) {
        data[key] = $(this).is(':checked') ? '1' : '0';
      } else {
        data[key] = $(this).val();
      }
    });
    $.ajax({
      url: GLAMSAdmin.apiUrl + 'settings',
      method: 'POST',
      data: JSON.stringify(data),
      contentType: 'application/json',
      headers: { 'X-WP-Nonce': GLAMSAdmin.nonce },
      success: function() {
        var $msg = $('#glams-settings-msg');
        $msg.removeClass('notice-error').addClass('notice-success').html('<p>✅ Settings saved successfully!</p>').show();
        setTimeout(function() { $msg.fadeOut(); }, 3000);
      }
    });
  });

  // Media uploader for logos
  $('.upload-logo-btn').on('click', function() {
    var $wrap = $(this).closest('.glams-logo-uploader');
    var frame = wp.media({ title: 'Select Logo', multiple: false });
    frame.on('select', function() {
      var attachment = frame.state().get('selection').first().toJSON();
      $wrap.find('.logo-id-input').val(attachment.id);
      $wrap.find('.logo-preview').html('<img src="'+attachment.url+'" style="max-height:60px;border:1px solid #ddd;border-radius:4px;padding:4px;">').show();
    });
    frame.open();
  });
});
</script>
