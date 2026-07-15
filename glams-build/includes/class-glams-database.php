<?php
if(!defined('ABSPATH')) exit;
class GLAMS_Database {
    private static $instance = null;
    public static function instance(){ if(null===self::$instance) self::$instance=new self(); return self::$instance; }
    public function init(){}
    public function create_tables(){
        global $wpdb;
        $c=$wpdb->get_charset_collate();
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_companies(id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,company_name VARCHAR(255) NOT NULL,company_name_ar VARCHAR(255),license_number VARCHAR(100),owner VARCHAR(255),owner_ar VARCHAR(255),issue_date DATE,expiry_date DATE,country VARCHAR(100) DEFAULT 'UAE',city VARCHAR(100) DEFAULT 'Dubai',address TEXT,phone VARCHAR(50),email VARCHAR(150),website VARCHAR(255),status VARCHAR(30) DEFAULT 'active',logo VARCHAR(500),created_at DATETIME DEFAULT CURRENT_TIMESTAMP,updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,PRIMARY KEY(id)) $c");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_activities(id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,company_id BIGINT UNSIGNED NOT NULL,activity_name VARCHAR(255) NOT NULL,activity_name_ar VARCHAR(255),status VARCHAR(30) DEFAULT 'active',sort_order INT DEFAULT 0,visible TINYINT(1) DEFAULT 1,created_at DATETIME DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY(id),KEY company_id(company_id)) $c");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_certificates(id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,company_id BIGINT UNSIGNED NOT NULL,certificate_number VARCHAR(100),pdf_url VARCHAR(500),issue_date DATE,expiry_date DATE,status VARCHAR(30) DEFAULT 'active',created_at DATETIME DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY(id)) $c");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_images(id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,title VARCHAR(255),image_url VARCHAR(500),image_type VARCHAR(50),company_id BIGINT UNSIGNED DEFAULT 0,sort_order INT DEFAULT 0,created_at DATETIME DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY(id)) $c");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}glams_settings(id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,option_key VARCHAR(150) NOT NULL,option_val LONGTEXT,updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,PRIMARY KEY(id),UNIQUE KEY option_key(option_key)) $c");
    }
    public function insert_demo_data(){
        global $wpdb;
        if($wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}glams_companies")>0) return;
        $wpdb->insert("{$wpdb->prefix}glams_companies",['company_name'=>'MHT Technical Services LLC','company_name_ar'=>'شركة MHT للخدمات التقنية','license_number'=>'DET-2010-MHT-001','owner'=>'Mohammed Al Hamdan','owner_ar'=>'محمد الحمدان','issue_date'=>'2010-01-01','expiry_date'=>'2025-12-31','country'=>'UAE','city'=>'Dubai','address'=>'Office 1204, Deira Tower, Dubai','phone'=>'+971 4 000 0000','email'=>'info@mhttechnical.ae','website'=>'https://mhttechnical.ae','status'=>'active']);
        $id=$wpdb->insert_id;
        $acts=[['Sanitary Installation & Pipes Repairing','اصلاح التمديدات والتركيبات الصحية وتمديدات المياه',1],['Carpentry & wood Flooring Works','أعمال النجارة و تركيب الأرضيات الخشبية',2],['Engraving & Ornamentation Works','اعمال النقش والزخرفة',3],['Air-Conditioning, Ventilations & Air Filtration Systems Installation & Maintenance','تركيب انظمة التكييف والتهوية وتنقية الهواء وصيانتها',4],['Plaster Works','اعمال البلاستر',5],['Building Cleaning Services','خدمات تنظيف المباني والمساكن',6],['Floor & Wall Tiling Works','أعمال تبليط الأرضيات والجدران',7],['False Ceiling & Light Partitions Installation','تركيب الأسقف المعلقة والقواطع الخفيفة',8],['Wallpaper Fixing Works','أعمال تركيب ورق الجدران',9],['Electromechanical Equipment Installation and Maintenance','اعمال تركيب المعدات الكهروميكانيكية وصيانتها',10],['Electrical Fittings & Fixtures Repairing & Maintenance','إصلاح وصيانة التمديدات والتركيبات الكهربائية',11],['Systems Installation & Maintenance','تركيب وصيانة الأنظمة',12]];
        foreach($acts as $a) $wpdb->insert("{$wpdb->prefix}glams_activities",['company_id'=>$id,'activity_name'=>$a[0],'activity_name_ar'=>$a[1],'sort_order'=>$a[2],'status'=>'active']);
        $settings=['gov_name_en'=>'Government of Dubai','gov_name_ar'=>'حكومة دبـي','company_name_en'=>'MHT Technical Services','company_name_ar'=>'خدمات MHT التقنية','det_name_en'=>'Economy and Tourism','det_name_ar'=>'للاقتصاد والسياحة','primary_color'=>'#006B3F','secondary_color'=>'#1A2744','accent_color'=>'#C8A951','doc_divider_red'=>'#C0272D','doc_divider_gold'=>'#C8A951','contact_phone'=>'+971 4 000 0000','contact_email'=>'info@mhttechnical.ae','contact_address'=>'Office 1204, Deira Tower, Deira, Dubai, UAE','watermark_text'=>'MHT TECHNICAL SERVICES'];
        foreach($settings as $k=>$v) $wpdb->insert("{$wpdb->prefix}glams_settings",['option_key'=>$k,'option_val'=>$v]);
    }
    public function get_company($id){ global $wpdb; return $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}glams_companies WHERE id=%d",$id)); }
    public function get_all_companies(){ global $wpdb; return $wpdb->get_results("SELECT * FROM {$wpdb->prefix}glams_companies ORDER BY company_name ASC")?:[];}
    public function get_activities($company_id){ global $wpdb; return $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}glams_activities WHERE company_id=%d AND visible=1 ORDER BY sort_order ASC",$company_id))?:[];}
    public function get_all_activities(){ global $wpdb; return $wpdb->get_results("SELECT a.*,c.company_name FROM {$wpdb->prefix}glams_activities a LEFT JOIN {$wpdb->prefix}glams_companies c ON a.company_id=c.id ORDER BY a.company_id,a.sort_order")?:[];}
    public function search_license($term){ global $wpdb; return $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}glams_companies WHERE license_number LIKE %s OR company_name LIKE %s LIMIT 1","%{$term}%","%{$term}%")); }
    public function save_company($data,$id=0){ global $wpdb; if($id>0){$wpdb->update("{$wpdb->prefix}glams_companies",$data,['id'=>$id]);return $id;} $wpdb->insert("{$wpdb->prefix}glams_companies",$data); return $wpdb->insert_id; }
    public function delete_company($id){ global $wpdb; $wpdb->delete("{$wpdb->prefix}glams_companies",['id'=>$id]); $wpdb->delete("{$wpdb->prefix}glams_activities",['company_id'=>$id]); }
    public function save_activity($data,$id=0){ global $wpdb; if($id>0){$wpdb->update("{$wpdb->prefix}glams_activities",$data,['id'=>$id]);return $id;} $wpdb->insert("{$wpdb->prefix}glams_activities",$data); return $wpdb->insert_id; }
    public function delete_activity($id){ global $wpdb; $wpdb->delete("{$wpdb->prefix}glams_activities",['id'=>$id]); }
    public function get_setting($key,$default=''){ global $wpdb; $v=$wpdb->get_var($wpdb->prepare("SELECT option_val FROM {$wpdb->prefix}glams_settings WHERE option_key=%s",$key)); return $v??$default; }
    public function get_all_settings(){ global $wpdb; $rows=$wpdb->get_results("SELECT option_key,option_val FROM {$wpdb->prefix}glams_settings"); $out=[]; foreach($rows as $r) $out[$r->option_key]=$r->option_val; return $out; }
    public function update_setting($key,$val){ global $wpdb; $wpdb->replace("{$wpdb->prefix}glams_settings",['option_key'=>$key,'option_val'=>$val]); }
}
