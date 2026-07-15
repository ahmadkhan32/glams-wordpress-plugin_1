<?php
defined( 'ABSPATH' ) || exit;

class GLAMS_Elementor {
    public static function init() {
        add_action( 'elementor/widgets/register', [ __CLASS__, 'register_widgets' ] );
        add_action( 'elementor/elements/categories_registered', [ __CLASS__, 'add_category' ] );
    }

    public static function add_category( $elements_manager ) {
        $elements_manager->add_category( 'glams-widgets', [
            'title' => '🏛 GLAMS Portal',
            'icon'  => 'fa fa-building',
        ] );
    }

    public static function register_widgets( $widgets_manager ) {
        $widget_files = [
            'widget-gov-header',
            'widget-activities-table',
            'widget-company-card',
            'widget-verify-form',
            'widget-stats',
            'widget-hero-banner',
        ];
        foreach ( $widget_files as $file ) {
            $path = GLAMS_DIR . 'includes/elementor/' . $file . '.php';
            if ( file_exists($path) ) {
                require_once $path;
                $class = 'GLAMS_Widget_' . str_replace(' ', '_', ucwords(str_replace(['-','widget_'], ' ', $file)));
                if ( class_exists($class) ) {
                    $widgets_manager->register( new $class() );
                }
            }
        }
    }
}

/* ─── INLINE WIDGET: Government Header ── */
class GLAMS_Widget_Gov_Header extends \Elementor\Widget_Base {
    public function get_name()       { return 'glams-gov-header'; }
    public function get_title()      { return '🏛 Gov Header'; }
    public function get_icon()       { return 'eicon-banner'; }
    public function get_categories() { return ['glams-widgets']; }

    protected function register_controls() {
        $this->start_controls_section('content', [ 'label' => 'Content' ]);
        $this->add_control('title',    [ 'label' => 'Title',    'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'License Activities' ]);
        $this->add_control('subtitle', [ 'label' => 'Subtitle', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '' ]);
        $this->add_control('left_logo',   [ 'label' => 'Left Logo',   'type' => \Elementor\Controls_Manager::MEDIA ]);
        $this->add_control('center_logo', [ 'label' => 'Center Logo', 'type' => \Elementor\Controls_Manager::MEDIA ]);
        $this->add_control('right_logo',  [ 'label' => 'Right Logo',  'type' => \Elementor\Controls_Manager::MEDIA ]);
        $this->end_controls_section();

        $this->start_controls_section('style', [ 'label' => 'Style', 'tab' => \Elementor\Controls_Manager::TAB_STYLE ]);
        $this->add_control('bg_color', [ 'label' => 'Background', 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .glams-gov-doc-header' => 'background-color:{{VALUE}}'] ]);
        $this->add_control('border_color', [ 'label' => 'Border Color', 'type' => \Elementor\Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .glams-gov-doc-header' => 'border-color:{{VALUE}}'] ]);
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $left   = !empty($s['left_logo']['url'])   ? '<img src="'.esc_url($s['left_logo']['url']).'" alt="Left Logo" style="max-height:50px;">'   : '<span class="glams-logo-ph">حكومة دبي<br/>GOVERNMENT OF DUBAI</span>';
        $center = !empty($s['center_logo']['url'])  ? '<img src="'.esc_url($s['center_logo']['url']).'" alt="Emblem" style="max-height:50px;">'     : '<span style="font-size:2rem">🏛</span>';
        $right  = !empty($s['right_logo']['url'])   ? '<img src="'.esc_url($s['right_logo']['url']).'" alt="Right Logo" style="max-height:50px;">'  : '<span class="glams-logo-ph">Dubai Economy<br/>&amp; Tourism</span>';
        echo '<div class="glams-gov-doc-header">';
        echo '<div class="glams-gov-logo-left">'   . $left   . '</div>';
        echo '<div class="glams-gov-logo-center">' . $center . '</div>';
        echo '<div class="glams-gov-logo-right">'  . $right  . '</div>';
        echo '</div>';
        if ( !empty($s['title']) ) {
            echo '<div class="glams-doc-title"><h2>' . esc_html($s['title']) . '</h2>';
            if ( !empty($s['subtitle']) ) echo '<p>' . esc_html($s['subtitle']) . '</p>';
            echo '</div>';
        }
    }
}

/* ─── INLINE WIDGET: Activities Table ── */
class GLAMS_Widget_Activities_Table extends \Elementor\Widget_Base {
    public function get_name()       { return 'glams-activities-table'; }
    public function get_title()      { return '📋 Activities Table'; }
    public function get_icon()       { return 'eicon-table'; }
    public function get_categories() { return ['glams-widgets']; }

    protected function register_controls() {
        $this->start_controls_section('content', [ 'label' => 'Content' ]);
        $this->add_control('company_id', [ 'label' => 'Company ID', 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 0, 'description' => 'Enter 0 to show all activities' ]);
        $this->add_control('show_arabic', [ 'label' => 'Show Arabic Column', 'type' => \Elementor\Controls_Manager::SWITCHER, 'default' => 'yes' ]);
        $this->end_controls_section();

        $this->start_controls_section('style', [ 'label' => 'Style', 'tab' => \Elementor\Controls_Manager::TAB_STYLE ]);
        $this->add_control('header_bg', [ 'label' => 'Header Background', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#006B75', 'selectors' => ['{{WRAPPER}} .glams-act-header' => 'background-color:{{VALUE}}'] ]);
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        echo do_shortcode( '[glams_activities company_id="' . intval($s['company_id']) . '"]' );
    }
}

/* ─── INLINE WIDGET: Stats ── */
class GLAMS_Widget_Stats extends \Elementor\Widget_Base {
    public function get_name()       { return 'glams-stats'; }
    public function get_title()      { return '📊 Statistics'; }
    public function get_icon()       { return 'eicon-counter'; }
    public function get_categories() { return ['glams-widgets']; }
    protected function register_controls() {}
    protected function render() { echo do_shortcode('[glams_stats]'); }
}

/* ─── INLINE WIDGET: Verify Form ── */
class GLAMS_Widget_Verify_Form extends \Elementor\Widget_Base {
    public function get_name()       { return 'glams-verify-form'; }
    public function get_title()      { return '🔍 License Verification'; }
    public function get_icon()       { return 'eicon-search'; }
    public function get_categories() { return ['glams-widgets']; }
    protected function register_controls() {
        $this->start_controls_section('content', [ 'label' => 'Content' ]);
        $this->add_control('placeholder', [ 'label' => 'Input Placeholder', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Enter license number...' ]);
        $this->add_control('btn_text',    [ 'label' => 'Button Text',       'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Verify' ]);
        $this->end_controls_section();
    }
    protected function render() { echo do_shortcode('[glams_verify]'); }
}

// Boot Elementor integration
GLAMS_Elementor::init();
