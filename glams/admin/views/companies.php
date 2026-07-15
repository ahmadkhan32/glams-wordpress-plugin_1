<?php defined( 'ABSPATH' ) || exit; $companies = GLAMS_DB::get_companies(); ?>
<div class="wrap glams-admin">
  <h1>🏢 Companies <a href="#" class="page-title-action" id="add-company-btn">+ Add New</a></h1>

  <!-- ADD / EDIT FORM (hidden by default) -->
  <div id="glams-company-form" style="display:none;background:#fff;border:1px solid #ddd;border-radius:8px;padding:24px;margin-bottom:24px;">
    <h2 id="form-title">Add Company</h2>
    <input type="hidden" id="company-id" value="0"/>
    <div class="glams-form-grid">
      <div class="form-field"><label>Company Name *</label><input type="text" id="f-company_name" class="regular-text"/></div>
      <div class="form-field"><label>License Number *</label><input type="text" id="f-license_number" class="regular-text"/></div>
      <div class="form-field"><label>Owner Name</label><input type="text" id="f-owner" class="regular-text"/></div>
      <div class="form-field"><label>Phone</label><input type="text" id="f-phone" class="regular-text"/></div>
      <div class="form-field"><label>Email</label><input type="email" id="f-email" class="regular-text"/></div>
      <div class="form-field"><label>City</label><input type="text" id="f-city" class="regular-text"/></div>
      <div class="form-field"><label>Issue Date</label><input type="date" id="f-issue_date"/></div>
      <div class="form-field"><label>Expiry Date</label><input type="date" id="f-expiry_date"/></div>
      <div class="form-field"><label>Status</label>
        <select id="f-status">
          <option value="active">Active</option>
          <option value="pending">Pending</option>
          <option value="expired">Expired</option>
          <option value="suspended">Suspended</option>
        </select>
      </div>
      <div class="form-field full"><label>Address</label><textarea id="f-address" class="large-text" rows="2"></textarea></div>
    </div>
    <div style="margin-top:16px;display:flex;gap:10px;">
      <button class="button button-primary" id="save-company-btn">💾 Save Company</button>
      <button class="button" id="cancel-company-btn">Cancel</button>
    </div>
  </div>

  <!-- TABLE -->
  <table class="wp-list-table widefat fixed striped">
    <thead>
      <tr>
        <th>Company Name</th>
        <th>License No.</th>
        <th>Owner</th>
        <th>City</th>
        <th>Expiry</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="companies-tbody">
      <?php foreach ( $companies as $c ) : ?>
      <tr data-id="<?php echo esc_attr($c->id); ?>">
        <td><strong><?php echo esc_html($c->company_name); ?></strong></td>
        <td><code><?php echo esc_html($c->license_number); ?></code></td>
        <td><?php echo esc_html($c->owner); ?></td>
        <td><?php echo esc_html($c->city); ?></td>
        <td><?php echo esc_html($c->expiry_date); ?></td>
        <td><span class="glams-badge glams-badge-<?php echo esc_attr($c->status); ?>"><?php echo esc_html(ucfirst($c->status)); ?></span></td>
        <td>
          <a href="#" class="edit-company button button-small" data-json="<?php echo esc_attr(json_encode($c)); ?>">Edit</a>
          <a href="#" class="delete-company button button-small" style="color:#c0392b">Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php if ( empty($companies) ) : ?>
      <tr><td colspan="7" style="text-align:center;padding:40px;color:#999">No companies yet. Click <strong>+ Add New</strong> to get started.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<script>
jQuery(function($) {
  var api = GLAMSAdmin.apiUrl, nonce = GLAMSAdmin.nonce;
  var fields = ['company_name','license_number','owner','phone','email','city','issue_date','expiry_date','status','address'];

  $('#add-company-btn').on('click', function(e) {
    e.preventDefault();
    $('#company-id').val(0);
    $('#form-title').text('Add Company');
    fields.forEach(function(f) { $('#f-'+f).val(''); });
    $('#f-status').val('active');
    $('#glams-company-form').slideDown();
  });

  $('#cancel-company-btn').on('click', function() { $('#glams-company-form').slideUp(); });

  $(document).on('click', '.edit-company', function(e) {
    e.preventDefault();
    var data = $(this).data('json');
    $('#company-id').val(data.id);
    $('#form-title').text('Edit Company');
    fields.forEach(function(f) { $('#f-'+f).val(data[f] || ''); });
    $('#glams-company-form').slideDown();
    $('html,body').animate({scrollTop: $('#glams-company-form').offset().top - 50});
  });

  $('#save-company-btn').on('click', function() {
    var id = parseInt($('#company-id').val());
    var payload = {};
    fields.forEach(function(f) { payload[f] = $('#f-'+f).val(); });
    var method = id ? 'PUT' : 'POST';
    var url    = id ? api + 'companies/' + id : api + 'companies';
    $.ajax({ url: url, method: method, data: JSON.stringify(payload), contentType: 'application/json', headers: {'X-WP-Nonce': nonce},
      success: function() { location.reload(); }
    });
  });

  $(document).on('click', '.delete-company', function(e) {
    e.preventDefault();
    if (!confirm('Delete this company and all its activities?')) return;
    var id = $(this).closest('tr').data('id');
    $.ajax({ url: api + 'companies/' + id, method: 'DELETE', headers: {'X-WP-Nonce': nonce},
      success: function() { location.reload(); }
    });
  });
});
</script>
