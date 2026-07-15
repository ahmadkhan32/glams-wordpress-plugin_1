<?php
if (!defined('ABSPATH')) exit;
class GLAMS_Activator {
    public static function activate() {
        GLAMS_Database::create_tables();
        GLAMS_Database::seed_default_data();
        self::create_pages();
        flush_rewrite_rules();
    }
    private static function create_pages() {
        $pages = [
            'glams-license'      => ['License Activities',  '[glams_license_activities]'],
            'glams-services'     => ['Our Services',        '[glams_services]'],
            'glams-immigration'  => ['Immigration Services','[glams_immigration]'],
            'glams-verification' => ['Verify License',      '[glams_verification]'],
            'glams-contact'      => ['Contact Us',          '[glams_contact_form]'],
        ];
        foreach ($pages as $slug => $d) {
            if (!get_page_by_path($slug)) {
                wp_insert_post(['post_title'=>$d[0],'post_content'=>$d[1],'post_status'=>'publish','post_type'=>'page','post_name'=>$slug]);
            }
        }
    }
}
