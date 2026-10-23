/**
 * FAQ Accordion Script
 */
(function () {
  'use strict';
  document.addEventListener('DOMContentLoaded', function () {
    var faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(function (button) {
      button.addEventListener('click', function () {
        var item = this.parentElement;
        var isActive = item.classList.contains('is-active');

        // Close other items
        document.querySelectorAll('.faq-item').forEach(function (el) {
          el.classList.remove('is-active');
          var btn = el.querySelector('.faq-question');
          if (btn) btn.setAttribute('aria-expanded', 'false');
        });

        if (!isActive) {
          item.classList.add('is-active');
          this.setAttribute('aria-expanded', 'true');
        }
      });
    });
  });
})();
