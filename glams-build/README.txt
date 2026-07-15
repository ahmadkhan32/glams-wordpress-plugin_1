=== GLAMS — Government License & Activities Management System ===
Author: MHT Technical Services
Version: 1.0.0
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 8.0
License: GPLv2 or later

== Description ==
Enterprise license activity management system for UAE government-style websites.
Display Dubai DET-style license activities tables, company information, and verification forms.

== Installation ==
1. Upload the `glams` folder to `/wp-content/plugins/`
2. Activate the plugin via WordPress Admin → Plugins
3. Tables are auto-created on activation with demo data
4. Go to GLAMS → Settings to configure logos and branding
5. Add [glams_license_table] shortcode to any page

== Shortcodes ==
[glams_license_table company_id="1" show_header="yes"]
[glams_verify_form]
[glams_company_info company_id="1"]

== REST API ==
GET  /wp-json/glams/v1/companies
GET  /wp-json/glams/v1/companies/{id}
GET  /wp-json/glams/v1/activities
GET  /wp-json/glams/v1/verify?q=LICENSE_NUMBER
GET  /wp-json/glams/v1/settings

== Changelog ==
= 1.0.0 =
* Initial release
