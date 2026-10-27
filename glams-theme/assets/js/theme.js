/**
 * GLAMS – MHK Technical Services Theme JavaScript
 * Fully responsive interactions, mobile drawer, search filters, FAQ accordion, quote AJAX
 */

(function () {
  'use strict';

  // ── 1. DOM Ready Helper ──────────────────────────────────────────────
  function ready(fn) {
    if (document.readyState !== 'loading') {
      fn();
    } else {
      document.addEventListener('DOMContentLoaded', fn);
    }
  }

  ready(function () {
    initHeader();
    initMobileNav();
    initFaqAccordion();
    initLicenseSearch();
    initServiceModals();
    initContactForm();
    initBackToTop();
    initToast();
    initReactMountObserver();
    initLogoFallback();
  });

  // ── 2. Header & Sticky Nav ───────────────────────────────────────────
  function initHeader() {
    var header = document.querySelector('.glams-header');
    if (!header) return;

    window.addEventListener('scroll', function () {
      if (window.scrollY > 40) {
        header.classList.add('is-sticky');
      } else {
        header.classList.remove('is-sticky');
      }
    }, { passive: true });
  }

  // ── 3. Mobile Navigation Drawer ──────────────────────────────────────
  function initMobileNav() {
    var hamburger = document.querySelector('.glams-hamburger');
    var drawer = document.querySelector('.glams-mobile-drawer');
    var overlay = document.querySelector('.glams-mobile-overlay');
    var closeBtn = document.querySelector('.glams-drawer-close');

    if (!hamburger || !drawer) return;

    function openDrawer() {
      drawer.classList.add('is-open');
      if (overlay) overlay.classList.add('is-open');
      document.body.classList.add('glams-no-scroll');
      hamburger.setAttribute('aria-expanded', 'true');
    }

    function closeDrawer() {
      drawer.classList.remove('is-open');
      if (overlay) overlay.classList.remove('is-open');
      document.body.classList.remove('glams-no-scroll');
      hamburger.setAttribute('aria-expanded', 'false');
    }

    hamburger.addEventListener('click', function (e) {
      e.preventDefault();
      if (drawer.classList.contains('is-open')) {
        closeDrawer();
      } else {
        openDrawer();
      }
    });

    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (overlay) overlay.addEventListener('click', closeDrawer);

    // Close drawer when any anchor link is clicked
    var drawerLinks = drawer.querySelectorAll('a');
    drawerLinks.forEach(function (link) {
      link.addEventListener('click', function () {
        closeDrawer();
      });
    });
  }

  // ── 4. FAQ Accordion ─────────────────────────────────────────────────
  function initFaqAccordion() {
    var faqItems = document.querySelectorAll('.glams-faq-item');
    if (!faqItems.length) return;

    faqItems.forEach(function (item) {
      var btn = item.querySelector('.glams-faq-question');
      if (!btn) return;

      btn.addEventListener('click', function () {
        var isOpen = item.classList.contains('is-open');

        // Close other items
        faqItems.forEach(function (other) {
          other.classList.remove('is-open');
          var otherBtn = other.querySelector('.glams-faq-question');
          if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
        });

        // Toggle clicked item
        if (!isOpen) {
          item.classList.add('is-open');
          btn.setAttribute('aria-expanded', 'true');
        } else {
          item.classList.remove('is-open');
          btn.setAttribute('aria-expanded', 'false');
        }
      });
    });
  }

  // ── 5. License Activities & Certificate Filter ─────────────────────────
  function initLicenseSearch() {
    var searchInput = document.getElementById('glamsActivitySearch');
    var companySelect = document.getElementById('glamsCompanySelect');
    var table = document.getElementById('glamsActivitiesTable');
    var countBadge = document.getElementById('glamsActivityCount');
    var printBtn = document.getElementById('glamsPrintCertBtn');
    var copyBtn = document.getElementById('glamsCopyLicenseBtn');

    if (table && searchInput) {
      var rows = table.querySelectorAll('tbody tr');

      searchInput.addEventListener('input', function () {
        var query = searchInput.value.toLowerCase().trim();
        var visibleCount = 0;

        rows.forEach(function (row) {
          var text = row.textContent.toLowerCase();
          if (text.indexOf(query) !== -1) {
            row.style.display = '';
            visibleCount++;
          } else {
            row.style.display = 'none';
          }
        });

        if (countBadge) {
          countBadge.textContent = visibleCount + ' ' + (visibleCount === 1 ? 'Activity' : 'Activities');
        }
      });
    }

    if (printBtn) {
      printBtn.addEventListener('click', function (e) {
        e.preventDefault();
        window.print();
      });
    }

    if (copyBtn) {
      copyBtn.addEventListener('click', function (e) {
        e.preventDefault();
        var licText = copyBtn.getAttribute('data-license') || 'DET-2024-001234';
        if (navigator.clipboard && navigator.clipboard.writeText) {
          navigator.clipboard.writeText(licText).then(function () {
            showToast('License ' + licText + ' copied to clipboard!');
          });
        } else {
          showToast('License: ' + licText);
        }
      });
    }
  }

  // ── 6. Services Modal / Expansion ────────────────────────────────────
  function initServiceModals() {
    var serviceCards = document.querySelectorAll('.glams-service-card');
    serviceCards.forEach(function (card) {
      var trigger = card.querySelector('.glams-svc-more-btn');
      var modal = card.querySelector('.glams-svc-features');
      if (trigger && modal) {
        trigger.addEventListener('click', function (e) {
          e.preventDefault();
          var isExpanded = modal.classList.contains('is-visible');
          if (isExpanded) {
            modal.classList.remove('is-visible');
            trigger.innerHTML = 'View Specifications <i class="fa-solid fa-chevron-down"></i>';
          } else {
            modal.classList.add('is-visible');
            trigger.innerHTML = 'Hide Specifications <i class="fa-solid fa-chevron-up"></i>';
          }
        });
      }
    });
  }

  // ── 7. Quote / Contact Form AJAX ─────────────────────────────────────
  function initContactForm() {
    var form = document.getElementById('glamsQuoteForm');
    if (!form) return;

    var responseBox = form.querySelector('.glams-form-response');
    var submitBtn = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      var name = form.querySelector('[name="name"]');
      var phone = form.querySelector('[name="phone"]');
      var email = form.querySelector('[name="email"]');
      var service = form.querySelector('[name="service"]');
      var message = form.querySelector('[name="message"]');

      if (!name || !name.value.trim() || !phone || !phone.value.trim()) {
        showResponse('Please enter your full name and UAE phone number.', 'error');
        return;
      }

      var originalBtnText = submitBtn ? submitBtn.innerHTML : 'Submit Request';
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Submitting...';
      }

      var formData = new FormData(form);
      formData.append('action', 'glams_submit_quote');
      formData.append('nonce', (window.glamsData && window.glamsData.nonce) ? window.glamsData.nonce : '');

      var ajaxUrl = (window.glamsData && window.glamsData.ajaxUrl) ? window.glamsData.ajaxUrl : '/wp-admin/admin-ajax.php';

      fetch(ajaxUrl, {
        method: 'POST',
        body: formData,
      })
        .then(function (res) {
          return res.json();
        })
        .then(function (data) {
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
          }
          if (data && data.success) {
            showResponse(data.data.message || 'Quote request sent successfully! We will contact you shortly.', 'success');
            form.reset();
          } else {
            showResponse((data && data.data && data.data.message) ? data.data.message : 'An error occurred. Please call us directly.', 'error');
          }
        })
        .catch(function () {
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
          }
          showResponse('Request received! You can also chat directly on WhatsApp for instant assistance.', 'success');
          form.reset();
        });
    });

    function showResponse(msg, type) {
      if (!responseBox) return;
      responseBox.textContent = msg;
      responseBox.className = 'glams-form-response is-' + type;
      responseBox.style.display = 'block';
      setTimeout(function () {
        responseBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }, 100);
    }
  }

  // ── 8. Back to Top ───────────────────────────────────────────────────
  function initBackToTop() {
    var topBtn = document.querySelector('.glams-back-to-top');
    if (!topBtn) return;

    window.addEventListener('scroll', function () {
      if (window.scrollY > 400) {
        topBtn.classList.add('is-visible');
      } else {
        topBtn.classList.remove('is-visible');
      }
    }, { passive: true });

    topBtn.addEventListener('click', function (e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // ── 9. Toast Notification System ─────────────────────────────────────
  function initToast() {
    var toast = document.createElement('div');
    toast.className = 'glams-toast';
    toast.id = 'glamsGlobalToast';
    document.body.appendChild(toast);
  }

  function showToast(message) {
    var toast = document.getElementById('glamsGlobalToast');
    if (!toast) return;
    toast.textContent = message;
    toast.classList.add('is-active');
    setTimeout(function () {
      toast.classList.remove('is-active');
    }, 3200);
  }

  // ── 10. React Mount Observer ─────────────────────────────────────────
  function initReactMountObserver() {
    var root = document.getElementById('glams-root');
    if (!root) return;

    function checkActive() {
      if (root.querySelector('.top-bar, .navbar, .site-footer')) {
        document.body.classList.add('glams-react-active');
        return true;
      }
      return false;
    }

    if (!checkActive()) {
      var observer = new MutationObserver(function () {
        if (checkActive()) {
          observer.disconnect();
        }
      });
      observer.observe(root, { childList: true, subtree: true });
    }
  }

  // ── 11. Logo Image Fallback ──────────────────────────────────────────
  function initLogoFallback() {
    document.addEventListener('error', function (e) {
      if (e.target && e.target.tagName === 'IMG' && e.target.getAttribute('src') === '/mhk-technical-services-logo.png') {
        var fallback = (window.glamsData && window.glamsData.logoUrl) ? window.glamsData.logoUrl : '';
        if (fallback) {
          e.target.src = fallback;
        }
      }
    }, true);
  }

  window.glamsShowToast = showToast;
})();
