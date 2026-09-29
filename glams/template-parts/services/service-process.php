<?php
/**
 * Template Part: Service Process (4 Steps)
 * GLAMS – MOHAMMAD HAYAT TECHNICAL SERVICES L.L.C
 */
$steps = [
    [ 'icon' => 'fa-phone',            'num' => '01', 'title' => 'Contact Us',             'desc' => 'Tell us about your technical service requirement.' ],
    [ 'icon' => 'fa-clipboard-list',   'num' => '02', 'title' => 'Requirement Assessment', 'desc' => 'Understand the work required and relevant service details.' ],
    [ 'icon' => 'fa-drafting-compass', 'num' => '03', 'title' => 'Service Planning',       'desc' => 'Plan the required installation, maintenance or technical work.' ],
    [ 'icon' => 'fa-check-double',     'num' => '04', 'title' => 'Service Delivery',       'desc' => 'Complete the agreed technical service professionally.' ],
];
?>
<section class="svc-section svc-process-bg" aria-label="Our Technical Process">
    <div class="svc-container">
        <div class="svc-section-head">
            <div class="svc-section-tag">How We Work</div>
            <h2 class="svc-section-title">Our Technical Process</h2>
            <div class="svc-divider"></div>
        </div>
        <div class="svc-process-grid">
            <?php foreach ( $steps as $step ) : ?>
                <div class="svc-step">
                    <div class="svc-step-num" aria-hidden="true"><?php echo esc_html( $step['num'] ); ?></div>
                    <div class="svc-step-icon" aria-hidden="true">
                        <i class="fas <?php echo esc_attr( $step['icon'] ); ?>"></i>
                    </div>
                    <h3 class="svc-step-title"><?php echo esc_html( $step['title'] ); ?></h3>
                    <p class="svc-step-desc"><?php echo esc_html( $step['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
