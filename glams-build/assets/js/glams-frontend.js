/* GLAMS Frontend JS */
(function($){
  $(document).ready(function(){
    // Verify button
    $('#glams-verify-btn').on('click', function(){
      var term = $('#glams-verify-input').val().trim();
      if(!term){ alert('Please enter a license number or company name'); return; }
      var btn = $(this);
      btn.text('Verifying...').prop('disabled',true);
      $.get(glamsConfig.apiUrl + 'verify', { q: term, _wpnonce: glamsConfig.nonce }, function(res){
        btn.text('Verify').prop('disabled',false);
        var resultDiv = $('#glams-verify-result');
        if(res.found){
          var c = res.company;
          var html = '<div style="color:#006B3F;font-weight:700;margin-bottom:12px;">✅ License Verified</div>';
          html += '<div class="glams-verify-row"><span class="glams-verify-label">Company</span><span class="glams-verify-val">'+c.company_name+'</span></div>';
          html += '<div class="glams-verify-row"><span class="glams-verify-label">License No.</span><span class="glams-verify-val">'+c.license_number+'</span></div>';
          html += '<div class="glams-verify-row"><span class="glams-verify-label">Status</span><span class="glams-verify-val" style="color:#006B3F">'+c.status+'</span></div>';
          html += '<div class="glams-verify-row"><span class="glams-verify-label">Expiry</span><span class="glams-verify-val">'+c.expiry_date+'</span></div>';
          html += '<div class="glams-verify-row"><span class="glams-verify-label">Activities</span><span class="glams-verify-val">'+res.activities.length+' Active</span></div>';
          resultDiv.html(html).show();
        } else {
          resultDiv.html('<div style="color:#C0272D">❌ No license found matching "'+term+'"</div>').show();
        }
      }).fail(function(){
        btn.text('Verify').prop('disabled',false);
        $('#glams-verify-result').html('<div style="color:#C0272D">Error connecting to server.</div>').show();
      });
    });
    // PDF export placeholder
    window.glamsPDF = function(){
      alert('PDF export: Integrate jsPDF or server-side PDF generation here.');
    };
  });
})(jQuery);
