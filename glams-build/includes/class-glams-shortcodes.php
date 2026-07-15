<?php
if (!defined('ABSPATH')) exit;
class GLAMS_Shortcodes {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this,'enqueue_assets']);
        add_shortcode('glams_license_activities', [$this,'sc_license']);
        add_shortcode('glams_services',           [$this,'sc_services']);
        add_shortcode('glams_immigration',        [$this,'sc_immigration']);
        add_shortcode('glams_verification',       [$this,'sc_verification']);
        add_shortcode('glams_contact_form',       [$this,'sc_contact']);
        add_shortcode('glams_hero',               [$this,'sc_hero']);
        add_shortcode('glams_stats',              [$this,'sc_stats']);
    }

    public function enqueue_assets() {
        wp_enqueue_style('glams-style', GLAMS_URL.'assets/css/glams-front.css', [], GLAMS_VERSION);
        wp_enqueue_script('glams-front', GLAMS_URL.'assets/js/glams-front.js', ['jquery'], GLAMS_VERSION, true);
        wp_localize_script('glams-front','GLAMS',['api_url'=>rest_url('glams/v1/'),'nonce'=>wp_create_nonce('wp_rest')]);
    }

    public function sc_license($atts) {
        global $wpdb;
        $company    = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}glams_companies WHERE id=1");
        $activities = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}glams_activities ORDER BY sort_order");
        $show_ar    = GLAMS_Database::get_setting('show_arabic','1');
        ob_start(); ?>
        <div class="glams-license-wrap">
          <div class="glams-gov-header">
            <div class="glams-gov-left">
              <div class="glams-gov-emblem">MHT</div>
              <div class="glams-gov-center-text">
                <strong><?php echo esc_html(GLAMS_Database::get_setting('gov_logo_text_left','حكومة دبـي / GOVERNMENT OF DUBAI')); ?></strong>
              </div>
            </div>
            <div class="glams-gov-title">
              <h2>License Activities</h2>
              <?php if($show_ar): ?><h3 class="glams-arabic">أنشطة الرخصة</h3><?php endif; ?>
              <p><?php echo esc_html(GLAMS_Database::get_setting('company_name','')); ?></p>
            </div>
            <div class="glams-gov-right">
              <div class="glams-dubai-logo">DU⚡AI</div>
              <span><?php echo esc_html(GLAMS_Database::get_setting('gov_logo_text_right','Economy and Tourism')); ?></span>
            </div>
          </div>

          <?php if($company): ?>
          <div class="glams-license-info">
            <div class="glams-info-item"><span class="glams-label">License No.</span><span class="glams-val glams-green"><?php echo esc_html($company->license_no); ?></span></div>
            <div class="glams-info-item"><span class="glams-label">Company</span><span class="glams-val"><?php echo esc_html($company->company_name); ?></span></div>
            <div class="glams-info-item"><span class="glams-label">Owner</span><span class="glams-val"><?php echo esc_html($company->owner); ?></span></div>
            <div class="glams-info-item"><span class="glams-label">Issue Date</span><span class="glams-val"><?php echo esc_html($company->issue_date); ?></span></div>
            <div class="glams-info-item"><span class="glams-label">Expiry Date</span><span class="glams-val"><?php echo esc_html($company->expiry_date); ?></span></div>
            <div class="glams-info-item"><span class="glams-label">Status</span><span class="glams-val glams-green">✓ <?php echo esc_html(ucfirst($company->status)); ?></span></div>
          </div>
          <?php endif; ?>

          <div class="glams-table-wrap">
            <table class="glams-activity-table">
              <thead>
                <tr>
                  <th>Activity</th>
                  <th style="text-align:center">Status</th>
                  <?php if($show_ar): ?><th style="text-align:center">الحالة</th><th style="text-align:right;font-family:inherit">النشاط</th><?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach($activities as $act): ?>
                <tr>
                  <td><?php echo esc_html($act->activity_en); ?></td>
                  <td style="text-align:center"><span class="glams-badge-active">Active</span></td>
                  <?php if($show_ar): ?>
                  <td style="text-align:center"><span class="glams-badge-active glams-arabic">فعال</span></td>
                  <td class="glams-ar-col"><?php echo esc_html($act->activity_ar); ?></td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="glams-table-actions">
            <button class="glams-btn glams-btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
            <button class="glams-btn glams-btn-outline" id="glams-pdf-btn"><i class="fa fa-file-pdf"></i> Download PDF</button>
          </div>
        </div>
        <?php return ob_get_clean();
    }

    public function sc_services($atts) {
        global $wpdb;
        $services = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}glams_services WHERE status='active' ORDER BY sort_order");
        ob_start(); ?>
        <div class="glams-services-grid">
          <?php foreach($services as $s): ?>
          <div class="glams-service-card">
            <div class="glams-service-icon"><i class="fa <?php echo esc_attr($s->icon); ?>"></i></div>
            <h3><?php echo esc_html($s->title_en); ?></h3>
            <p><?php echo esc_html($s->description); ?></p>
            <a href="#" class="glams-learn-more">Request Quote →</a>
          </div>
          <?php endforeach; ?>
        </div>
        <?php return ob_get_clean();
    }

    public function sc_immigration($atts) {
        global $wpdb;
        $items = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}glams_immigration WHERE status='active' ORDER BY sort_order");
        ob_start(); ?>
        <div class="glams-immigration-grid">
          <?php if($items): foreach($items as $item): ?>
          <div class="glams-immigration-card">
            <?php if($item->badge): ?><span class="glams-ic-badge"><?php echo esc_html($item->badge); ?></span><?php endif; ?>
            <h3><?php echo esc_html($item->title_en); ?></h3>
            <p><?php echo esc_html($item->description); ?></p>
          </div>
          <?php endforeach; else: ?>
          <p>Immigration services coming soon. <a href="<?php echo get_permalink(get_page_by_path('glams-contact')); ?>">Contact us</a>.</p>
          <?php endif; ?>
        </div>
        <?php return ob_get_clean();
    }

    public function sc_verification($atts) {
        ob_start(); ?>
        <div class="glams-verify-wrap">
          <div class="glams-verify-card">
            <div style="font-size:3rem;margin-bottom:1rem">🔍</div>
            <h2>License Verification</h2>
            <p>Enter a license number to verify its authenticity</p>
            <div class="glams-verify-row">
              <input type="text" id="glams-lic-input" placeholder="e.g. DET-2024-XXXXXX" class="glams-input"/>
              <button class="glams-btn glams-btn-primary" id="glams-verify-btn">Verify</button>
            </div>
            <div id="glams-verify-result" class="glams-verify-result" style="display:none"></div>
          </div>
        </div>
        <?php return ob_get_clean();
    }

    public function sc_contact($atts) {
        ob_start(); ?>
        <div class="glams-contact-form">
          <h3>Request a Free Quote</h3>
          <div class="glams-form-grid">
            <div class="glams-form-group">
              <label>First Name</label>
              <input type="text" name="fname" placeholder="Ahmed" class="glams-input"/>
            </div>
            <div class="glams-form-group">
              <label>Last Name</label>
              <input type="text" name="lname" placeholder="Al Rashidi" class="glams-input"/>
            </div>
            <div class="glams-form-group glams-full">
              <label>Email</label>
              <input type="email" name="email" placeholder="you@email.com" class="glams-input"/>
            </div>
            <div class="glams-form-group">
              <label>Phone</label>
              <input type="tel" name="phone" placeholder="+971 50 XXX XXXX" class="glams-input"/>
            </div>
            <div class="glams-form-group">
              <label>Service Required</label>
              <select name="service" class="glams-input">
                <option>Select Service</option>
                <option>Plumbing & Sanitary</option>
                <option>Carpentry</option>
                <option>Air Conditioning</option>
                <option>Electrical</option>
                <option>Building Cleaning</option>
                <option>Tiling Works</option>
                <option>Immigration / PRO</option>
                <option>Other</option>
              </select>
            </div>
            <div class="glams-form-group glams-full">
              <label>Message</label>
              <textarea name="message" rows="5" placeholder="Describe your requirement..." class="glams-input"></textarea>
            </div>
          </div>
          <button class="glams-btn glams-btn-primary glams-full-w" id="glams-submit-btn">
            <i class="fa fa-paper-plane"></i> Send Request
          </button>
          <div id="glams-form-msg"></div>
        </div>
        <?php return ob_get_clean();
    }

    public function sc_hero($atts) {
        $title    = GLAMS_Database::get_setting('hero_title',   'Professional Technical Services in the UAE');
        $subtitle = GLAMS_Database::get_setting('hero_subtitle','Government licensed technical and maintenance solutions');
        ob_start(); ?>
        <div class="glams-hero">
          <div class="glams-hero-inner">
            <div class="glams-hero-badge"><i class="fa fa-certificate"></i> Government Licensed · Dubai DET</div>
            <h1><?php echo esc_html($title); ?></h1>
            <p><?php echo esc_html($subtitle); ?></p>
          </div>
        </div>
        <?php return ob_get_clean();
    }

    public function sc_stats($atts) {
        ob_start(); ?>
        <div class="glams-stats">
          <div class="glams-stat"><div class="glams-num">15+</div><div class="glams-label">Years Experience</div></div>
          <div class="glams-stat"><div class="glams-num">500+</div><div class="glams-label">Happy Clients</div></div>
          <div class="glams-stat"><div class="glams-num">12</div><div class="glams-label">License Activities</div></div>
          <div class="glams-stat"><div class="glams-num">100%</div><div class="glams-label">DET Compliant</div></div>
        </div>
        <?php return ob_get_clean();
    }
}
