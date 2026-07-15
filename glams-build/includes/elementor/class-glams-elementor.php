<?php
if (!defined('ABSPATH')) exit;
class GLAMS_Elementor {
    public function __construct() {
        add_action('elementor/widgets/register', [$this,'register_widgets']);
        add_action('elementor/elements/categories_registered', [$this,'add_category']);
    }
    public function add_category($mgr) {
        $mgr->add_category('glams-widgets',['title'=>'GLAMS Widgets','icon'=>'fa fa-id-card']);
    }
    public function register_widgets($mgr) {
        require_once GLAMS_DIR.'includes/elementor/widget-license-table.php';
        require_once GLAMS_DIR.'includes/elementor/widget-services.php';
        $mgr->register(new GLAMS_Widget_License_Table());
        $mgr->register(new GLAMS_Widget_Services());
    }
}
