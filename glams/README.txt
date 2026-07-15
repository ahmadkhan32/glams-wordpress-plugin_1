=== GLAMS – Government License & Activities Management System ===
Contributors: TechServ UAE
Tags: license management, immigration, activities table, elementor, government
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 8.0
Stable tag: 1.0.0
License: GPLv2 or later

== Description ==

GLAMS is an enterprise-grade WordPress plugin for managing government trade licenses,
license activities, immigration services, and certificates. Inspired by Dubai DET
(Department of Economy & Tourism) document format.

= Key Features =

* Government-style license activities table (bilingual: English + Arabic)
* Full company CRUD management via admin dashboard
* Activities management with drag-and-drop sort order
* Certificate issuance and tracking
* Logos manager (left / center / right logos — upload your own)
* License verification form (REST API powered)
* Elementor custom widgets (6 widgets: Gov Header, Activities Table, Stats, Verify Form, etc.)
* Shortcodes for every component
* REST API (full CRUD) at /wp-json/glams/v1/
* ReactJS frontend SPA (build with `npm run build` in react-app/)
* PDF export & Print-friendly layout
* Arabic / RTL support
* Multi-emirate coverage

= Shortcodes =

[glams_portal]                         — Full React SPA
[glams_activities company_id="1"]      — Activities table
[glams_verify]                         — License verification
[glams_companies limit="6"]            — Company grid
[glams_gov_header]                     — Government document header
[glams_stats]                          — Statistics counters

= REST API =

GET  /wp-json/glams/v1/companies
POST /wp-json/glams/v1/companies
GET  /wp-json/glams/v1/companies/{id}
PUT  /wp-json/glams/v1/companies/{id}
DEL  /wp-json/glams/v1/companies/{id}
GET  /wp-json/glams/v1/activities?company_id=1
GET  /wp-json/glams/v1/stats
GET  /wp-json/glams/v1/verify/{license_number}
GET  /wp-json/glams/v1/settings
POST /wp-json/glams/v1/settings

= Elementor Widgets =

After activation, find the GLAMS Portal category in Elementor:
- 🏛 Gov Header
- 📋 Activities Table
- 📊 Statistics
- 🔍 License Verification
(more in /includes/class-glams-elementor.php)

== Database Tables ==

- wp_glams_companies
- wp_glams_activities
- wp_glams_certificates
- wp_glams_logos
- wp_glams_images
- wp_glams_settings
- wp_glams_users
- wp_glams_languages

== Installation ==

1. Upload the `glams` folder to /wp-content/plugins/
2. Activate the plugin through 'Plugins' in WordPress
3. Navigate to GLAMS Portal in the WordPress admin
4. Configure settings, upload logos, and add companies
5. Add [glams_portal] shortcode to any page

= Build React App (Optional) =

   cd wp-content/plugins/glams/react-app
   npm install
   npm run build

This compiles the React SPA to /assets/react/ and is auto-loaded by the plugin.

== Changelog ==

= 1.0.0 =
* Initial release
* Full company & activity management
* Government header with logo uploader
* Elementor widget integration
* REST API
* Bilingual EN/AR support
* PDF & Print layout
