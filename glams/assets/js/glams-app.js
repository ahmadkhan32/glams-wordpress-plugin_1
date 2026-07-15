/**
 * GLAMS Frontend Application
 * Vanilla JS SPA — no build step required.
 * When you integrate the React app (react-app/ folder),
 * replace this file with the Vite build output (dist/assets/*.js).
 */
(function() {
  'use strict';

  var api   = (window.GLAMSData && GLAMSData.apiUrl)   || '/wp-json/glams/v1/';
  var nonce = (window.GLAMSData && GLAMSData.nonce)    || '';

  /* ── UTILS ── */
  function $$(sel, ctx) { return (ctx || document).querySelectorAll(sel); }
  function $(sel, ctx)  { return (ctx || document).querySelector(sel); }
  function fetchAPI(path, opts) {
    return fetch(api + path, Object.assign({
      headers: { 'Content-Type': 'application/json', 'X-WP-Nonce': nonce }
    }, opts)).then(function(r) { return r.json(); });
  }

  /* ── ACTIVITIES TABLE ── */
  function initActivitiesTable() {
    var roots = $$('[data-glams-activities]');
    roots.forEach(function(root) {
      var companyId = root.dataset.glamsActivities || 0;
      fetchAPI('activities' + (companyId ? '?company_id=' + companyId : '')).then(function(items) {
        if (!Array.isArray(items) || !items.length) {
          root.innerHTML = '<p class="glams-empty">No activities found.</p>';
          return;
        }
        var html = '<div class="glams-act-header"><span>Activity</span><span>Status</span><span>الحالة</span><span style="text-align:right">النشاط</span></div>';
        items.forEach(function(a) {
          html += '<div class="glams-act-row">' +
            '<span>' + esc(a.activity_name_en) + '</span>' +
            '<span><span class="glams-badge glams-badge-' + esc(a.status) + '">' + esc(a.status) + '</span></span>' +
            '<span style="font-family:Tajawal,sans-serif">' + (a.status === 'active' ? 'فعال' : 'غير فعال') + '</span>' +
            '<span class="ar" dir="rtl" style="text-align:right;font-family:Tajawal,sans-serif">' + esc(a.activity_name_ar) + '</span>' +
          '</div>';
        });
        root.innerHTML = '<div class="glams-activities-wrap">' + html + '</div>';
      });
    });
  }

  /* ── VERIFY FORM ── */
  function initVerify() {
    var forms = $$('[data-glams-verify]');
    forms.forEach(function(form) {
      var input  = form.querySelector('.glams-verify-input');
      var btn    = form.querySelector('.glams-verify-btn');
      var result = form.querySelector('.glams-verify-result');
      if (!btn || !input) return;
      btn.addEventListener('click', function() {
        var num = input.value.trim();
        if (!num) return;
        result.textContent = 'Verifying...';
        result.style.display = 'block';
        fetchAPI('verify/' + encodeURIComponent(num)).then(function(data) {
          if (data.code === 'not_found') {
            result.innerHTML = '<span style="color:#c0392b">❌ License not found in system.</span>';
          } else {
            result.innerHTML = '✅ <strong>' + esc(data.company_name) + '</strong> — License: ' + esc(data.license_number) + ' | Status: <span class="glams-badge glams-badge-' + esc(data.status) + '">' + esc(data.status) + '</span>';
          }
        }).catch(function() {
          result.textContent = '⚠️ Connection error. Please try again.';
        });
      });
    });
  }

  /* ── STATS ── */
  function initStats() {
    var roots = $$('[data-glams-stats]');
    if (!roots.length) return;
    fetchAPI('stats').then(function(data) {
      roots.forEach(function(root) {
        root.querySelector('.glams-stat-companies')  && (root.querySelector('.glams-stat-companies').textContent  = data.total_companies  || 0);
        root.querySelector('.glams-stat-active')     && (root.querySelector('.glams-stat-active').textContent     = data.active_companies || 0);
        root.querySelector('.glams-stat-activities') && (root.querySelector('.glams-stat-activities').textContent = data.total_activities || 0);
        root.querySelector('.glams-stat-certs')      && (root.querySelector('.glams-stat-certs').textContent      = data.total_certs      || 0);
      });
    });
  }

  /* ── COMPANIES GRID (dynamic) ── */
  function initCompaniesGrid() {
    var roots = $$('[data-glams-companies]');
    roots.forEach(function(root) {
      var limit = root.dataset.glamsCompanies || 6;
      fetchAPI('companies?limit=' + limit).then(function(items) {
        if (!Array.isArray(items)) return;
        root.innerHTML = items.map(function(c) {
          return '<div class="glams-company-card">' +
            '<h3>' + esc(c.company_name) + '</h3>' +
            '<p class="lic">' + esc(c.license_number) + '</p>' +
            '<p>' + esc(c.city) + '</p>' +
            '<span class="glams-badge glams-badge-' + esc(c.status) + '">' + esc(c.status) + '</span>' +
          '</div>';
        }).join('');
      });
    });
  }

  /* ── ESCAPE HTML ── */
  function esc(str) {
    if (str == null) return '';
    return String(str).replace(/[&<>"']/g, function(m) {
      return ({ '&':'&amp;', '<':'&lt;', '>':'&gt;', '"':'&quot;', "'":'&#39;' })[m];
    });
  }

  /* ── INIT ── */
  document.addEventListener('DOMContentLoaded', function() {
    initActivitiesTable();
    initVerify();
    initStats();
    initCompaniesGrid();
  });

})();
