(function($){
  $(document).ready(function(){
    // Settings form AJAX save
    $('#glams-settings-form').on('submit', function(e){
      e.preventDefault();
      var data = {};
      $(this).find('input[name^="glams_settings"]').each(function(){
        var key = $(this).attr('name').replace('glams_settings[','').replace(']','');
        data[key] = $(this).val();
      });
      $.ajax({
        url: wpApiSettings.root + 'glams/v1/settings',
        method: 'POST',
        beforeSend: function(xhr){ xhr.setRequestHeader('X-WP-Nonce', wpApiSettings.nonce); },
        contentType: 'application/json',
        data: JSON.stringify(data),
        success: function(){ alert('Settings saved successfully!'); },
        error: function(){ alert('Error saving settings.'); }
      });
    });
  });
})(jQuery);
