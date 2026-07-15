<?php
defined( 'ABSPATH' ) || exit;

class GLAMS_Shortcodes {
    public static function init() {
        add_shortcode( 'glams_portal',     [ __CLASS__, 'sc_portal' ] );
        add_shortcode( 'glams_activities', [ __CLASS__, 'sc_activities' ] );
        add_shortcode( 'glams_verify',     [ __CLASS__, 'sc_verify' ] );
        add_shortcode( 'glams_companies',  [ __CLASS__, 'sc_companies' ] );
        add_shortcode( 'glams_gov_header', [ __CLASS__, 'sc_gov_header' ] );
        add_shortcode( 'glams_stats',      [ __CLASS__, 'sc_stats' ] );
    }

    /* Full React SPA mount point */
    public static function sc_portal( $atts ) {
        return '<div id="glams-root" class="glams-portal-root" data-page="' . esc_attr($atts['page'] ?? 'home') . '"></div>';
    }

    /* License activities table */
    public static function sc_activities( $atts ) {
        $atts = shortcode_atts( [ 'company_id' => 0, 'status' => 'active' ], $atts );
        $company_id = (int) $atts['company_id'];
        $activities = GLAMS_DB::get_activities( $company_id );
        if ( empty($activities) ) return '<p class="glams-empty">No activities found.</p>';

        ob_start();
        ?>
        <div class="glams-activities-wrap">
          <div class="glams-act-header">
            <span>Activity</span><span>Status</span><span>الحالة</span><span class="ar">النشاط</span>
          </div>
          <?php foreach ( $activities as $a ) : ?>
          <div class="glams-act-row">
            <span><?php echo esc_html($a->activity_name_en); ?></span>
            <span><span class="glams-badge glams-badge-<?php echo esc_attr($a->status); ?>"><?php echo esc_html(ucfirst($a->status)); ?></span></span>
            <span><?php echo $a->status === 'active' ? 'فعال' : 'غير فعال'; ?></span>
            <span class="ar" dir="rtl"><?php echo esc_html($a->activity_name_ar); ?></span>
          </div>
          <?php endforeach; ?>
        </div>
        <?php
        return ob_get_clean();
    }

    /* Verification form */
    public static function sc_verify( $atts ) {
        ob_start();
        ?>
        <div class="glams-verify-wrap">
          <input type="text" id="glams-verify-input" placeholder="Enter license number..." class="glams-input"/>
          <button onclick="glamsVerify()" class="glams-btn">Verify</button>
          <div id="glams-verify-result" class="glams-result" style="display:none"></div>
        </div>
        <script>
        function glamsVerify() {
          var num = document.getElementById('glams-verify-input').value.trim();
          var result = document.getElementById('glams-verify-result');
          if (!num) return;
          fetch('<?php echo rest_url('glams/v1/verify/'); ?>' + encodeURIComponent(num), {
            headers: { 'X-WP-Nonce': '<?php echo wp_create_nonce('wp_rest'); ?>' }
          }).then(r => r.json()).then(data => {
            if (data.code === 'not_found') {
              result.innerHTML = '<p style="color:#c0392b">❌ License not found.</p>';
            } else {
              result.innerHTML = '<p>✅ <strong>' + data.company_name + '</strong> — Status: ' + data.status + ' | License: ' + data.license_number + '</p>';
            }
            result.style.display = 'block';
          });
        }
        </script>
        <?php
        return ob_get_clean();
    }

    /* Company grid */
    public static function sc_companies( $atts ) {
        $atts = shortcode_atts( [ 'limit' => 6, 'status' => 'active' ], $atts );
        $companies = GLAMS_DB::get_companies( [ 'limit' => $atts['limit'], 'status' => $atts['status'] ] );
        ob_start();
        echo '<div class="glams-companies-grid">';
        foreach ( $companies as $c ) {
            printf(
                '<div class="glams-company-card"><h3>%s</h3><p class="lic">%s</p><p>%s</p><span class="glams-badge glams-badge-%s">%s</span></div>',
                esc_html($c->company_name), esc_html($c->license_number),
                esc_html($c->city), esc_attr($c->status), esc_html(ucfirst($c->status))
            );
        }
        echo '</div>';
        return ob_get_clean();
    }

    /* Government document header */
    public static function sc_gov_header( $atts ) {
        $settings = GLAMS_DB::get_all_settings();
        $left_id  = $settings['logo_left_id']   ?? 0;
        $right_id = $settings['logo_right_id']  ?? 0;
        $center_id= $settings['logo_center_id'] ?? 0;
        ob_start();
        ?>
        <div class="glams-gov-doc-header">
          <div class="glams-gov-logo-left">
            <?php echo $left_id ? wp_get_attachment_image($left_id,'medium') : '<span class="glams-logo-ph">حكومة دبي<br/>GOVERNMENT OF DUBAI</span>'; ?>
          </div>
          <div class="glams-gov-logo-center">
            <?php echo $center_id ? wp_get_attachment_image($center_id,'medium') : '<span class="glams-logo-ph glams-crest">🏛</span>'; ?>
          </div>
          <div class="glams-gov-logo-right">
            <?php echo $right_id ? wp_get_attachment_image($right_id,'medium') : '<span class="glams-logo-ph">Dubai Economy<br/>&amp; Tourism</span>'; ?>
          </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /* Stats counters */
    public static function sc_stats( $atts ) {
        $stats = GLAMS_DB::get_stats();
        ob_start();
        ?>
        <div class="glams-stats-row">
          <div class="glams-stat-item"><strong><?php echo esc_html($stats['total_companies']); ?>+</strong><span>Companies</span></div>
          <div class="glams-stat-item"><strong><?php echo esc_html($stats['active_companies']); ?></strong><span>Active Licenses</span></div>
          <div class="glams-stat-item"><strong><?php echo esc_html($stats['total_activities']); ?></strong><span>Activities</span></div>
          <div class="glams-stat-item"><strong><?php echo esc_html($stats['total_certs']); ?></strong><span>Certificates</span></div>
        </div>
        <?php
        return ob_get_clean();
    }
}
