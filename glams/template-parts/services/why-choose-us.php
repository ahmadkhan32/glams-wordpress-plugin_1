<?php
/**
 * Template Part: Why Choose Our Technical Services
 * GLAMS – MOHAMMAD HAYAT TECHNICAL SERVICES L.L.C
 */
$why_items = [
    [ 'icon' => 'fa-medal',     'title' => 'Professional Service',         'desc' => 'Focused technical service delivery for residential and commercial requirements.' ],
    [ 'icon' => 'fa-headset',   'title' => 'Reliable Support',             'desc' => 'Maintenance and technical support for applicable service requirements.' ],
    [ 'icon' => 'fa-th',        'title' => 'Multiple Technical Services',   'desc' => 'A broad range of licensed technical activities under one service provider.' ],
    [ 'icon' => 'fa-handshake', 'title' => 'Customer-Focused Approach',    'desc' => 'Clear communication and service-focused customer support.' ],
];
?>
<section class="svc-section svc-why-bg" aria-label="Why Choose Our Technical Services">
    <div class="svc-container">
        <div class="svc-section-head">
            <div class="svc-section-tag">Why Choose Us</div>
            <h2 class="svc-section-title">Why Choose Our Technical Services?</h2>
            <div class="svc-divider"></div>
        </div>
        <div class="svc-why-grid">
            <?php foreach ( $why_items as $item ) : ?>
                <div class="svc-why-card">
                    <div class="svc-why-icon" aria-hidden="true">
                        <i class="fas <?php echo esc_attr( $item['icon'] ); ?>"></i>
                    </div>
                    <h3 class="svc-why-title"><?php echo esc_html( $item['title'] ); ?></h3>
                    <p class="svc-why-desc"><?php echo esc_html( $item['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
