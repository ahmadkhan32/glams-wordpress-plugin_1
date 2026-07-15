<?php
if (!defined('ABSPATH')) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
class GLAMS_Widget_Services extends Widget_Base {
    public function get_name()  { return 'glams_services'; }
    public function get_title() { return 'GLAMS: Services Grid'; }
    public function get_icon()  { return 'eicon-tools'; }
    public function get_categories(){ return ['glams-widgets']; }
    protected function register_controls() {
        $this->start_controls_section('content',['label'=>'Content','tab'=>Controls_Manager::TAB_CONTENT]);
        $this->add_control('columns',['label'=>'Columns','type'=>Controls_Manager::NUMBER,'default'=>3,'min'=>1,'max'=>4]);
        $this->end_controls_section();
    }
    protected function render() { echo do_shortcode('[glams_services]'); }
}
