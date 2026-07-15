<?php
if (!defined('ABSPATH')) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class GLAMS_Widget_License_Table extends Widget_Base {
    public function get_name()  { return 'glams_license_table'; }
    public function get_title() { return 'GLAMS: License Activities'; }
    public function get_icon()  { return 'eicon-table'; }
    public function get_categories() { return ['glams-widgets']; }
    public function get_keywords() { return ['license','activities','government','dubai']; }

    protected function register_controls() {
        $this->start_controls_section('content_section',['label'=>'Content','tab'=>Controls_Manager::TAB_CONTENT]);
        $this->add_control('show_arabic',['label'=>'Show Arabic Column','type'=>Controls_Manager::SWITCHER,'default'=>'yes']);
        $this->add_control('show_company_info',['label'=>'Show Company Info Bar','type'=>Controls_Manager::SWITCHER,'default'=>'yes']);
        $this->add_control('header_title',['label'=>'Header Title','type'=>Controls_Manager::TEXT,'default'=>'License Activities']);
        $this->end_controls_section();

        $this->start_controls_section('style_section',['label'=>'Style','tab'=>Controls_Manager::TAB_STYLE]);
        $this->add_control('primary_color',['label'=>'Primary Color','type'=>Controls_Manager::COLOR,'default'=>'#006A4E','selectors'=>['{{WRAPPER}} .glams-activity-table thead'=>'background-color:{{VALUE}}']]);
        $this->end_controls_section();
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        $show_ar   = $settings['show_arabic'] === 'yes';
        $show_info = $settings['show_company_info'] === 'yes';
        add_filter('glams_sc_show_arabic',  function() use($show_ar)  { return $show_ar; });
        add_filter('glams_sc_show_info',    function() use($show_info){ return $show_info; });
        echo do_shortcode('[glams_license_activities]');
    }
}
