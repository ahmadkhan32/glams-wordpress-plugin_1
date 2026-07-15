<?php
defined( 'ABSPATH' ) || exit;
global $wpdb;
$companies   = GLAMS_DB::get_companies();
$activities  = GLAMS_DB::get_activities();
$company_map = [];
foreach ( $companies as $c ) $company_map[ $c->id ] = $c->company_name;
?>
<div class="wrap glams-admin">
  <h1>📋 License Activities <a href="#" class="page-title-action" id="add-activity-btn">+ Add New</a></h1>

  <div id="glams-activity-form" style="display:none;background:#fff;border:1px solid #ddd;border-radius:8px;padding:24px;margin-bottom:24px;">
    <h2 id="activity-form-title">Add Activity</h2>
    <input type="hidden" id="activity-id" value="0"/>
    <div class="glams-form-grid">
      <div class="form-field"><label>Company *</label>
        <select id="f-company_id">
          <?php foreach ( $companies as $c ) : ?><option value="<?php echo esc_attr($c->id); ?>"><?php echo esc_html($c->company_name); ?></option><?php endforeach; ?>
        </select>
      </div>
      <div class="form-field"><label>Status</label>
        <select id="f-act-status"><option value="active">Active / فعال</option><option value="inactive">Inactive</option></select>
      </div>
      <div class="form-field"><label>Sort Order</label><input type="number" id="f-sort_order" value="0"/></div>
      <div class="form-field full"><label>Activity Name (English) *</label><input type="text" id="f-activity_name_en" class="large-text"/></div>
      <div class="form-field full"><label>اسم النشاط (Arabic)</label><input type="text" id="f-activity_name_ar" class="large-text" dir="rtl"/></div>
    </div>
    <div style="margin-top:16px;display:flex;gap:10px;">
      <button class="button button-primary" id="save-activity-btn">💾 Save Activity</button>
      <button class="button" id="cancel-activity-btn">Cancel</button>
    </div>
  </div>

  <div class="tablenav top" style="display:flex;gap:12px;align-items:center;margin-bottom:12px;">
    <select id="filter-company">
      <option value="">All Companies</option>
      <?php foreach($companies as $c): ?><option value="<?php echo esc_attr($c->id); ?>"><?php echo esc_html($c->company_name); ?></option><?php endforeach; ?>
    </select>
  </div>

  <table class="wp-list-table widefat fixed striped">
    <thead><tr><th>Activity (English)</th><th>النشاط (Arabic)</th><th>Company</th><th>Status</th><th>Order</th><th>Actions</th></tr></thead>
    <tbody>
      <?php foreach ( $activities as $a ) : ?>
      <tr class="activity-row" data-company="<?php echo esc_attr($a->company_id); ?>" data-id="<?php echo esc_attr($a->id); ?>">
        <td><?php echo esc_html($a->activity_name_en); ?></td>
        <td dir="rtl" style="font-family:'Tajawal',sans-serif"><?php echo esc_html($a->activity_name_ar); ?></td>
        <td><?php echo esc_html( $company_map[$a->company_id] ?? '—' ); ?></td>
        <td><span class="glams-badge glams-badge-<?php echo esc_attr($a->status); ?>"><?php echo esc_html(ucfirst($a->status)); ?></span></td>
        <td><?php echo esc_html($a->sort_order); ?></td>
        <td>
          <a href="#" class="edit-activity button button-small" data-json="<?php echo esc_attr(json_encode($a)); ?>">Edit</a>
          <a href="#" class="delete-activity button button-small" style="color:#c0392b">Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<script>
jQuery(function($) {
  var api = GLAMSAdmin.apiUrl, nonce = GLAMSAdmin.nonce;
  $('#add-activity-btn').on('click', function(e) { e.preventDefault(); $('#activity-id').val(0); $('#activity-form-title').text('Add Activity'); $('#glams-activity-form').slideDown(); });
  $('#cancel-activity-btn').on('click', function() { $('#glams-activity-form').slideUp(); });
  $(document).on('click', '.edit-activity', function(e) {
    e.preventDefault();
    var d = $(this).data('json');
    $('#activity-id').val(d.id); $('#f-company_id').val(d.company_id); $('#f-activity_name_en').val(d.activity_name_en); $('#f-activity_name_ar').val(d.activity_name_ar); $('#f-act-status').val(d.status); $('#f-sort_order').val(d.sort_order);
    $('#glams-activity-form').slideDown();
  });
  $('#save-activity-btn').on('click', function() {
    var id = parseInt($('#activity-id').val());
    var payload = { company_id:$('#f-company_id').val(), activity_name_en:$('#f-activity_name_en').val(), activity_name_ar:$('#f-activity_name_ar').val(), status:$('#f-act-status').val(), sort_order:$('#f-sort_order').val() };
    var method = id ? 'PUT' : 'POST', url = id ? api+'activities/'+id : api+'activities';
    $.ajax({ url:url, method:method, data:JSON.stringify(payload), contentType:'application/json', headers:{'X-WP-Nonce':nonce}, success: function() { location.reload(); } });
  });
  $(document).on('click', '.delete-activity', function(e) {
    e.preventDefault();
    if(!confirm('Delete this activity?')) return;
    var id = $(this).closest('tr').data('id');
    $.ajax({ url:api+'activities/'+id, method:'DELETE', headers:{'X-WP-Nonce':nonce}, success: function() { location.reload(); } });
  });
  $('#filter-company').on('change', function() {
    var val = $(this).val();
    $('.activity-row').each(function() { $(this).toggle(!val || $(this).data('company') == val); });
  });
});
</script>
