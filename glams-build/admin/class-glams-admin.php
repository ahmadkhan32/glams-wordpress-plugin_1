<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class GLAMS_Admin {
    private static $instance = null;
    public static function instance() {
        if(null===self::$instance) self::$instance=new self();
        return self::$instance;
    }
    public function init() {
        add_action('admin_menu', [$this,'register_menus']);
    }
    public function register_menus() {
        add_menu_page('GLAMS','GLAMS','manage_options','glams-dashboard',[$this,'page_dashboard'],'dashicons-id-alt',30);
        add_submenu_page('glams-dashboard','Companies','Companies','manage_options','glams-companies',[$this,'page_companies']);
        add_submenu_page('glams-dashboard','Activities','License Activities','manage_options','glams-activities',[$this,'page_activities']);
        add_submenu_page('glams-dashboard','Settings','Settings & Logos','manage_options','glams-settings',[$this,'page_settings']);
    }
    public function page_dashboard() {
        $companies = GLAMS_Database::instance()->get_all_companies();
        $activities = GLAMS_Database::instance()->get_all_activities();
        echo '<div class="wrap glams-admin"><h1>GLAMS Dashboard</h1>';
        echo '<div class="glams-stats-row">';
        echo '<div class="glams-stat-box"><span class="gsb-num">'.count($companies).'</span><span class="gsb-label">Companies</span></div>';
        echo '<div class="glams-stat-box"><span class="gsb-num">'.count($activities).'</span><span class="gsb-label">Activities</span></div>';
        echo '</div>';
        echo '<h2>Quick Links</h2><ul>';
        echo '<li><a href="'.admin_url('admin.php?page=glams-companies').'">Manage Companies</a></li>';
        echo '<li><a href="'.admin_url('admin.php?page=glams-activities').'">Manage License Activities</a></li>';
        echo '<li><a href="'.admin_url('admin.php?page=glams-settings').'">Settings & Logos</a></li>';
        echo '</ul>';
        echo '<h2>Shortcodes</h2>';
        echo '<table class="widefat"><tr><th>Shortcode</th><th>Description</th></tr>';
        echo '<tr><td><code>[glams_license_table company_id="1"]</code></td><td>Display license activities table (DET document style)</td></tr>';
        echo '<tr><td><code>[glams_verify_form]</code></td><td>License verification search form</td></tr>';
        echo '</table></div>';
    }
    public function page_companies() {
        $companies = GLAMS_Database::instance()->get_all_companies();
        echo '<div class="wrap glams-admin"><h1>Companies <a href="#" class="page-title-action glams-add-btn" data-type="company">Add New</a></h1>';
        echo '<table class="wp-list-table widefat fixed striped"><thead><tr><th>ID</th><th>Company Name</th><th>License No.</th><th>Status</th><th>Expiry</th><th>Actions</th></tr></thead><tbody>';
        foreach($companies as $c) {
            echo '<tr>';
            echo '<td>'.$c->id.'</td>';
            echo '<td><strong>'.esc_html($c->company_name).'</strong><br><small>'.esc_html($c->company_name_ar).'</small></td>';
            echo '<td>'.esc_html($c->license_number).'</td>';
            echo '<td><span class="glams-status-badge '.esc_attr($c->status).'">'.esc_html($c->status).'</span></td>';
            echo '<td>'.esc_html($c->expiry_date).'</td>';
            echo '<td><a href="#" class="glams-edit-btn" data-id="'.$c->id.'" data-type="company">Edit</a> | <a href="#" class="glams-delete-btn" data-id="'.$c->id.'" data-type="company">Delete</a></td>';
            echo '</tr>';
        }
        echo '</tbody></table></div>';
    }
    public function page_activities() {
        $activities = GLAMS_Database::instance()->get_all_activities();
        echo '<div class="wrap glams-admin"><h1>License Activities <a href="#" class="page-title-action glams-add-btn" data-type="activity">Add New</a></h1>';
        echo '<p>Shortcode to display: <code>[glams_license_table company_id="1"]</code></p>';
        echo '<table class="wp-list-table widefat fixed striped"><thead><tr><th>#</th><th>Activity (EN)</th><th>Activity (AR)</th><th>Status</th><th>Company</th><th>Actions</th></tr></thead><tbody>';
        foreach($activities as $a) {
            echo '<tr>';
            echo '<td>'.$a->sort_order.'</td>';
            echo '<td><strong>'.esc_html($a->activity_name).'</strong></td>';
            echo '<td dir="rtl" style="font-family:Arial;text-align:right">'.esc_html($a->activity_name_ar).'</td>';
            echo '<td><span class="glams-status-badge '.esc_attr($a->status).'">'.esc_html($a->status).'</span></td>';
            echo '<td>'.esc_html($a->company_name ?? '').'</td>';
            echo '<td><a href="#" class="glams-edit-btn" data-id="'.$a->id.'" data-type="activity">Edit</a> | <a href="#" class="glams-delete-btn" data-id="'.$a->id.'" data-type="activity">Delete</a></td>';
            echo '</tr>';
        }
        echo '</tbody></table></div>';
    }
    public function page_settings() {
        $settings = GLAMS_Database::instance()->get_all_settings();
        echo '<div class="wrap glams-admin"><h1>GLAMS Settings</h1>';
        echo '<form method="post" id="glams-settings-form">';
        echo '<h2>Branding & Logos</h2><table class="form-table">';
        $this->setting_field('gov_name_en', 'Government Name (English)', $settings);
        $this->setting_field('gov_name_ar', 'Government Name (Arabic)', $settings);
        $this->setting_field('company_name_en', 'Company Name (English)', $settings);
        $this->setting_field('company_name_ar', 'Company Name (Arabic)', $settings);
        $this->setting_field('det_name_en', 'Authority Name (English)', $settings);
        $this->setting_field('det_name_ar', 'Authority Name (Arabic)', $settings);
        echo '</table><h2>Colors</h2><table class="form-table">';
        $this->setting_field('primary_color', 'Primary Color', $settings, 'color');
        $this->setting_field('secondary_color', 'Secondary Color', $settings, 'color');
        $this->setting_field('accent_color', 'Accent / Gold Color', $settings, 'color');
        $this->setting_field('doc_divider_red', 'Document Divider Red', $settings, 'color');
        $this->setting_field('doc_divider_gold', 'Document Divider Gold', $settings, 'color');
        echo '</table><h2>Contact Information</h2><table class="form-table">';
        $this->setting_field('contact_phone', 'Phone', $settings);
        $this->setting_field('contact_email', 'Email', $settings);
        $this->setting_field('contact_address', 'Address', $settings);
        echo '</table>';
        echo '<p class="submit"><input type="submit" class="button button-primary" value="Save Settings" /></p>';
        echo '</form></div>';
    }
    private function setting_field($key, $label, $settings, $type='text') {
        $val = esc_attr($settings[$key] ?? '');
        echo '<tr><th scope="row"><label for="glams_'.$key.'">'.esc_html($label).'</label></th>';
        echo '<td><input type="'.$type.'" id="glams_'.$key.'" name="glams_settings['.$key.']" value="'.$val.'" class="regular-text" /></td></tr>';
    }
}
