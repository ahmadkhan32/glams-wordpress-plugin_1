<?php
if (!defined('ABSPATH')) exit;
class GLAMS_REST_API {
    public function __construct() {
        add_action('rest_api_init', [$this, 'register_routes']);
    }
    public function register_routes() {
        $ns = 'glams/v1';
        register_rest_route($ns, '/activities', ['methods'=>'GET','callback'=>[$this,'get_activities'],'permission_callback'=>'__return_true']);
        register_rest_route($ns, '/activities/(?P<id>\d+)', ['methods'=>['GET','PUT','DELETE'],'callback'=>[$this,'activity_single'],'permission_callback'=>[$this,'auth_check']]);
        register_rest_route($ns, '/activities', ['methods'=>'POST','callback'=>[$this,'create_activity'],'permission_callback'=>[$this,'auth_check']]);
        register_rest_route($ns, '/services', ['methods'=>'GET','callback'=>[$this,'get_services'],'permission_callback'=>'__return_true']);
        register_rest_route($ns, '/immigration', ['methods'=>'GET','callback'=>[$this,'get_immigration'],'permission_callback'=>'__return_true']);
        register_rest_route($ns, '/company', ['methods'=>'GET','callback'=>[$this,'get_company'],'permission_callback'=>'__return_true']);
        register_rest_route($ns, '/settings', ['methods'=>'GET','callback'=>[$this,'get_settings'],'permission_callback'=>'__return_true']);
        register_rest_route($ns, '/verify/(?P<license>[a-zA-Z0-9\-]+)', ['methods'=>'GET','callback'=>[$this,'verify_license'],'permission_callback'=>'__return_true']);
    }
    public function auth_check() { return current_user_can('manage_options'); }

    public function get_activities() {
        global $wpdb;
        $rows = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}glams_activities ORDER BY sort_order ASC");
        return rest_ensure_response($rows);
    }
    public function create_activity($req) {
        global $wpdb;
        $wpdb->insert($wpdb->prefix . 'glams_activities', [
            'company_id'  => 1,
            'activity_en' => sanitize_text_field($req['activity_en']),
            'activity_ar' => sanitize_text_field($req['activity_ar'] ?? ''),
            'status'      => 'active',
            'sort_order'  => intval($req['sort_order'] ?? 99),
        ]);
        return rest_ensure_response(['id'=>$wpdb->insert_id,'success'=>true]);
    }
    public function activity_single($req) {
        global $wpdb;
        $id = intval($req['id']);
        $t = $wpdb->prefix . 'glams_activities';
        if ($req->get_method() === 'GET') {
            return rest_ensure_response($wpdb->get_row($wpdb->prepare("SELECT * FROM $t WHERE id=%d",$id)));
        } elseif ($req->get_method() === 'PUT') {
            $wpdb->update($t, ['activity_en'=>sanitize_text_field($req['activity_en']),'activity_ar'=>sanitize_text_field($req['activity_ar']??''),'status'=>sanitize_text_field($req['status']??'active')], ['id'=>$id]);
            return rest_ensure_response(['success'=>true]);
        } elseif ($req->get_method() === 'DELETE') {
            $wpdb->delete($t, ['id'=>$id]);
            return rest_ensure_response(['deleted'=>true]);
        }
    }
    public function get_services() {
        global $wpdb;
        return rest_ensure_response($wpdb->get_results("SELECT * FROM {$wpdb->prefix}glams_services WHERE status='active' ORDER BY sort_order"));
    }
    public function get_immigration() {
        global $wpdb;
        return rest_ensure_response($wpdb->get_results("SELECT * FROM {$wpdb->prefix}glams_immigration WHERE status='active' ORDER BY sort_order"));
    }
    public function get_company() {
        global $wpdb;
        $c = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}glams_companies WHERE id=1");
        return rest_ensure_response($c);
    }
    public function get_settings() {
        global $wpdb;
        $rows = $wpdb->get_results("SELECT setting_key, setting_val FROM {$wpdb->prefix}glams_settings");
        $s = [];
        foreach ($rows as $r) $s[$r->setting_key] = $r->setting_val;
        return rest_ensure_response($s);
    }
    public function verify_license($req) {
        global $wpdb;
        $lic = sanitize_text_field($req['license']);
        $c = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}glams_companies WHERE license_no=%s", $lic));
        if (!$c) return new WP_Error('not_found','License not found',['status'=>404]);
        return rest_ensure_response(['verified'=>true,'company'=>$c]);
    }
}
