<?php
/**
 * Template Part: Service Details Section
 * GLAMS – MOHAMMAD HAYAT TECHNICAL SERVICES L.L.C
 *
 * Dedicated section showing expanded technical activities scope & compliance standards
 */
$services    = require GLAMS_DIR . 'template-parts/services/services-data.php';
$contact_url = get_permalink( get_page_by_path( 'contact' ) ) ?: '#contact';
?>
<section class="svc-section svc-details-overview" id="service-details-scope" aria-label="Technical Activities Scope">
    <div class="svc-container">
        <div class="svc-section-head">
            <div class="svc-section-tag">Licensed Scope</div>
            <h2 class="svc-section-title">Official Technical Services Scope</h2>
            <p class="svc-section-desc">
                All 11 technical activities are carried out in full compliance with UAE commercial registration regulations and technical safety standards.
            </p>
            <div class="svc-divider"></div>
        </div>

        <div class="svc-scope-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
            <?php foreach ( $services as $index => $svc ) : ?>
                <div class="svc-scope-item" style="background: #fff; padding: 22px; border-radius: 12px; border: 1px solid #e2e8f0; display: flex; gap: 16px; align-items: flex-start;">
                    <div class="svc-scope-badge" style="background: rgba(0,107,94,0.1); color: #006B5E; font-weight: 700; width: 36px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 14px;">
                        <?php echo str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ); ?>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 6px; font-size: 15px; font-weight: 700; color: #0f172a; line-height: 1.3;">
                            <?php echo esc_html( $svc['title'] ); ?>
                        </h4>
                        <p style="margin: 0 0 10px; font-size: 13px; color: #64748b; line-height: 1.5;">
                            <?php echo esc_html( $svc['short_description'] ); ?>
                        </p>
                        <span style="display: inline-block; font-size: 12px; color: #006B5E; font-weight: 600;">
                            <?php echo count( $svc['features'] ); ?> Key Capabilities Included
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
