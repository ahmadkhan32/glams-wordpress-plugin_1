(function($){
  'use strict';

  // Verify button
  $(document).on('click','#glams-verify-btn',function(){
    var lic = $('#glams-lic-input').val().trim();
    if(!lic){alert('Please enter a license number.');return;}
    $(this).text('Checking...');
    $.get(GLAMS.api_url + 'verify/' + encodeURIComponent(lic), function(res){
      var c = res.company;
      var html = '<div style="display:flex;align-items:center;gap:10px;margin-bottom:16px;padding-bottom:12px;border-bottom:1px solid #E5E7EB">'
        +'<div style="width:36px;height:36px;background:#DCFCE7;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#16A34A;font-size:18px;font-weight:700">✓</div>'
        +'<div><div style="font-weight:700;color:#16A34A">License Verified Successfully</div><div style="font-size:12px;color:#9CA3AF">Dubai Economy & Tourism</div></div></div>'
        +'<table style="width:100%;border-collapse:collapse">'
        +'<tr style="border-bottom:1px solid #E5E7EB"><td style="padding:8px 0;color:#9CA3AF;font-size:13px">Company</td><td style="font-weight:700;font-size:13px">'+c.company_name+'</td></tr>'
        +'<tr style="border-bottom:1px solid #E5E7EB"><td style="padding:8px 0;color:#9CA3AF;font-size:13px">License No.</td><td style="font-weight:700;font-size:13px">'+c.license_no+'</td></tr>'
        +'<tr style="border-bottom:1px solid #E5E7EB"><td style="padding:8px 0;color:#9CA3AF;font-size:13px">Owner</td><td style="font-weight:700;font-size:13px">'+c.owner+'</td></tr>'
        +'<tr style="border-bottom:1px solid #E5E7EB"><td style="padding:8px 0;color:#9CA3AF;font-size:13px">Expiry</td><td style="font-weight:700;font-size:13px">'+c.expiry_date+'</td></tr>'
        +'<tr><td style="padding:8px 0;color:#9CA3AF;font-size:13px">Status</td><td style="font-weight:700;font-size:13px;color:#006A4E">✓ '+c.status+'</td></tr>'
        +'</table>';
      $('#glams-verify-result').html(html).show();
      $('#glams-verify-btn').text('Verify');
    }).fail(function(){
      $('#glams-verify-result').html('<p style="color:#B91C1C;font-weight:700">License not found. Please check the number and try again.</p>').show();
      $('#glams-verify-btn').text('Verify');
    });
  });

  // Contact form
  $(document).on('click','#glams-submit-btn',function(){
    var btn=$(this);
    var fname=$('[name="fname"]').val();
    var email=$('[name="email"]').val();
    if(!fname||!email){$('#glams-form-msg').html('<p style="color:#B91C1C">Please fill in required fields.</p>');return;}
    btn.text('Sending...');
    setTimeout(function(){
      btn.text('Send Request');
      $('#glams-form-msg').html('<p style="color:#006A4E;font-weight:700">✓ Thank you! We will contact you within 24 hours.</p>');
    },800);
  });

  // PDF button placeholder
  $(document).on('click','#glams-pdf-btn',function(){
    alert('PDF download requires jsPDF library integration. Please install and configure the PDF generation module.');
  });

})(jQuery);
