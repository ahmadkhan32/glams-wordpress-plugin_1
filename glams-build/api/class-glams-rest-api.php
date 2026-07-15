<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class GLAMS_REST_API {
    private static $instance = null;
    public static function instance() {
        if ( null === self::$instance ) self::$instance = new self();
        return self::$instance;
    }
    public function init() {
        add_action( 'rest_api_init', [ $this, 'register_routes' ] );
    }
    public function register_routes() {
        $ns = 'glams/v1';
        register_rest_route($ns, '/companies', ['methods'=>'GET','callback'=>[$this,'get_companies'],'permission_callback'=>'__return_true']);
        register_rest_route($ns, '/companies/(?P<id>\d+)', ['methods'=>'GET','callback'=>[$this,'get_company'],'permission_callback'=>'__return_true']);
        register_rest_route($ns, '/activities', ['methods'=>'GET','callback'=>[$this,'get_activities'],'permission_callback'=>'__return_true']);
        register_rest_route($ns, '/verify', ['methods'=>'GET','callback'=>[$this,'verify_license'],'permission_callback'=>'__return_true']);
        register_rest_route($ns, '/settings', ['methods'=>'GET','callback'=>[$this,'get_settings'],'permission_callback'=>'__return_true']);
        register_rest_route($ns, '/settings', ['methods'=>'POST','callback'=>[$this,'save_settings'],'permission_callback'=>function(){ return current_user_can('manage_options'); }]);
        register_rest_route($ns, '/companies', ['methods'=>'POST','callback'=>[$this,'save_company'],'permission_callback'=>function(){ return current_user_can('manage_options'); }]);
        register_rest_route($ns, '/activities', ['methods'=>'POST','callback'=>[$this,'save_activity'],'permission_callback'=>function(){ return current_user_can('manage_options'); }]);
    }
    public function get_companies($req){ return rest_ensure_response(GLAMS_Database::instance()->get_all_companies()); }
    public function get_company($req){
        $company = GLAMS_Database::instance()->get_company((int)$req['id']);
        $activities = GLAMS_Database::instance()->get_activities((int)$req['id']);
        if(!$company) return new WP_Error('not_found','Company not found',['status'=>404]);
        return rest_ensure_response(['company'=>$company,'activities'=>$activities]);
    }
    public function get_activities($req){ return rest_ensure_response(GLAMS_Database::instance()->get_all_activities()); }
    public function verify_license($req){
        $term = sanitize_text_field($req->get_param('q'));
        if(!$term) return new WP_Error('missing','Search term required',['status'=>400]);
        $company = GLAMS_Database::instance()->search_license($term);
        if(!$company) return rest_ensure_response(['found'=>false]);
        return rest_ensure_response(['found'=>true,'company'=>$company,'activities'=>GLAMS_Database::instance()->get_activities((int)$company->id)]);
    }
    public function get_settings($req){ return rest_ensure_response(GLAMS_Database::instance()->get_all_settings()); }
    public function save_settings($req){
        foreach($req->get_json_params() as $k=>$v) GLAMS_Database::instance()->update_setting(sanitize_key($k),sanitize_textarea_field($v));
        return rest_ensure_response(['success'=>true]);
    }
    public function save_company($req){
        $data=$req->get_json_params(); $id=isset($data['id'])?(int)$data['id']:0; unset($data['id']);
        $new_id=GLAMS_Database::instance()->save_company(array_map('sanitize_text_field',$data),$id);
        return rest_ensure_response(['success'=>true,'id'=>$new_id]);
    }
    public function save_activity($req){
        $data=$req->get_json_params(); $id=isset($data['id'])?(int)$data['id']:0; unset($data['id']);
        $new_id=GLAMS_Database::instance()->save_activity(array_map('sanitize_text_field',$data),$id);
        return rest_ensure_response(['success'=>true,'id'=>$new_id]);
    }
}
