/**
 * Mobile Navigation Toggle Script
 */
(function () {
  'use strict';
  document.addEventListener('DOMContentLoaded', function () {
    var toggleBtn = document.getElementById('uae-mobile-toggle');
    var navMenu   = document.getElementById('uae-main-nav');

    if (toggleBtn && navMenu) {
      toggleBtn.addEventListener('click', function (e) {
        e.preventDefault();
        var isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
        toggleBtn.setAttribute('aria-expanded', !isExpanded);
        navMenu.classList.toggle('is-active', !isExpanded);
        document.body.classList.toggle('uae-nav-open', !isExpanded);
      });

      // Close on outside click
      document.addEventListener('click', function (e) {
        if (
          navMenu.classList.contains('is-active') &&
          !navMenu.contains(e.target) &&
          !toggleBtn.contains(e.target)
        ) {
          toggleBtn.setAttribute('aria-expanded', 'false');
          navMenu.classList.remove('is-active');
          document.body.classList.remove('uae-nav-open');
        }
      });

      // Close on ESC
      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && navMenu.classList.contains('is-active')) {
          toggleBtn.setAttribute('aria-expanded', 'false');
          navMenu.classList.remove('is-active');
          document.body.classList.remove('uae-nav-open');
          toggleBtn.focus();
        }
      });

      // Close on menu link click
      var navLinks = navMenu.querySelectorAll('a');
      navLinks.forEach(function (link) {
        link.addEventListener('click', function () {
          if (window.innerWidth <= 860) {
            toggleBtn.setAttribute('aria-expanded', 'false');
            navMenu.classList.remove('is-active');
            document.body.classList.remove('uae-nav-open');
          }
        });
      });
    }
  });
})();
