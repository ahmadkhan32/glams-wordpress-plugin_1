/**
 * Contact Form Interaction Handling
 */
(function () {
  'use strict';
  document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('uae-inquiry-form');
    if (form) {
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var submitBtn = form.querySelector('button[type="submit"]');
        var originalText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending Message...';

        setTimeout(function () {
          submitBtn.textContent = '✓ Message Sent Successfully!';
          submitBtn.style.backgroundColor = '#00843D';
          form.reset();
          setTimeout(function () {
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
          }, 4000);
        }, 1000);
      });
    }
  });
})();
