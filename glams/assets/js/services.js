/**
 * GLAMS Services Page – WordPress JavaScript
 * MOHAMMAD HAYAT TECHNICAL SERVICES L.L.C
 * Handles expand/collapse for service cards
 */
(function () {
  'use strict';

  function initServiceCards() {
    var buttons = document.querySelectorAll('.svc-view-btn');
    if (!buttons.length) return;

    buttons.forEach(function (btn) {
      var targetId = btn.getAttribute('data-target');
      var details  = targetId ? document.getElementById(targetId) : null;
      if (!details) return;

      // Ensure initially hidden
      details.hidden = true;

      btn.addEventListener('click', function () {
        var isOpen = !details.hidden;

        // Close all other open cards first
        document.querySelectorAll('.svc-details').forEach(function (d) {
          if (d !== details) {
            d.hidden = true;
            d.closest('.svc-card').classList.remove('is-open');
            var otherBtn = d.closest('.svc-card').querySelector('.svc-view-btn');
            if (otherBtn) {
              otherBtn.setAttribute('aria-expanded', 'false');
              otherBtn.innerHTML = 'View Details <i class="fas fa-chevron-down" aria-hidden="true"></i>';
            }
          }
        });

        // Toggle current
        details.hidden = isOpen;
        btn.setAttribute('aria-expanded', String(!isOpen));
        btn.closest('.svc-card').classList.toggle('is-open', !isOpen);

        if (!isOpen) {
          btn.innerHTML = 'Hide Details <i class="fas fa-chevron-up" aria-hidden="true"></i>';
          // Smooth scroll card into view
          details.closest('.svc-card').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } else {
          btn.innerHTML = 'View Details <i class="fas fa-chevron-down" aria-hidden="true"></i>';
        }
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initServiceCards);
  } else {
    initServiceCards();
  }
})();
