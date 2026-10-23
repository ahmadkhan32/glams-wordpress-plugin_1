/**
 * MHK Technical Services Theme JavaScript
 * Handles responsive navigation, mobile menu drawer, and smooth interactions.
 */

(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    var toggleBtn = document.getElementById('mhk-mobile-toggle');
    var navMenu   = document.getElementById('mhk-main-navigation');

    if (toggleBtn && navMenu) {
      toggleBtn.addEventListener('click', function (e) {
        e.preventDefault();
        var isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';

        toggleBtn.setAttribute('aria-expanded', !isExpanded);
        navMenu.classList.toggle('is-active', !isExpanded);
        document.body.classList.toggle('mhk-menu-open', !isExpanded);
      });

      // Close menu when clicking outside
      document.addEventListener('click', function (e) {
        if (
          navMenu.classList.contains('is-active') &&
          !navMenu.contains(e.target) &&
          !toggleBtn.contains(e.target)
        ) {
          toggleBtn.setAttribute('aria-expanded', 'false');
          navMenu.classList.remove('is-active');
          document.body.classList.remove('mhk-menu-open');
        }
      });

      // Close menu on ESC key
      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && navMenu.classList.contains('is-active')) {
          toggleBtn.setAttribute('aria-expanded', 'false');
          navMenu.classList.remove('is-active');
          document.body.classList.remove('mhk-menu-open');
          toggleBtn.focus();
        }
      });

      // Close mobile menu on anchor link click
      var navLinks = navMenu.querySelectorAll('a');
      navLinks.forEach(function (link) {
        link.addEventListener('click', function () {
          if (window.innerWidth <= 860) {
            toggleBtn.setAttribute('aria-expanded', 'false');
            navMenu.classList.remove('is-active');
            document.body.classList.remove('mhk-menu-open');
          }
        });
      });

      // Reset menu state on window resize
      window.addEventListener('resize', function () {
        if (window.innerWidth > 860 && navMenu.classList.contains('is-active')) {
          toggleBtn.setAttribute('aria-expanded', 'false');
          navMenu.classList.remove('is-active');
          document.body.classList.remove('mhk-menu-open');
        }
      });
    }
  });
})();
