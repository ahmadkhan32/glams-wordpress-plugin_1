<?php
/**
 * Template Part: Services Grid — All 11 Official Activities
 * GLAMS – MOHAMMAD HAYAT TECHNICAL SERVICES L.L.C
 */
$services    = require GLAMS_DIR . 'template-parts/services/services-data.php';
$contact_url = get_permalink( get_page_by_path( 'contact' ) ) ?: '#contact';
?>
<section class="svc-section svc-grid-bg" id="our-technical-services" aria-label="Our Technical Services">
    <div class="svc-container">
        <div class="svc-section-head">
            <div class="svc-section-tag">Our Services</div>
            <h2 class="svc-section-title">Our Technical Services</h2>
            <p class="svc-section-desc">
                We provide a wide range of technical, maintenance, installation and building services for residential and commercial requirements.
            </p>
            <div class="svc-divider"></div>
        </div>

        <div class="svc-cards-grid" role="list">
            <?php foreach ( $services as $svc ) : ?>
                <article id="service-<?php echo esc_attr( $svc['id'] ); ?>"
                         class="svc-card"
                         role="listitem">

                    <div class="svc-card-top">
                        <div class="svc-card-icon" aria-hidden="true">
                            <i class="fas <?php echo esc_attr( $svc['icon'] ); ?>"></i>
                        </div>
                        <h3 class="svc-card-title"><?php echo esc_html( $svc['title'] ); ?></h3>
                        <p class="svc-card-desc"><?php echo esc_html( $svc['short_description'] ); ?></p>
                    </div>

                    <button class="svc-view-btn"
                            aria-expanded="false"
                            aria-controls="svc-details-<?php echo esc_attr( $svc['id'] ); ?>"
                            data-target="svc-details-<?php echo esc_attr( $svc['id'] ); ?>">
                        View Details <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>

                    <div class="svc-details"
                         id="svc-details-<?php echo esc_attr( $svc['id'] ); ?>"
                         role="region"
                         aria-label="<?php echo esc_attr( $svc['title'] ); ?> details"
                         hidden>
                        <ul class="svc-features-list">
                            <?php foreach ( $svc['features'] as $feature ) : ?>
                                <li>
                                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    <?php echo esc_html( $feature ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo esc_url( $contact_url ); ?>"
                           class="svc-btn svc-btn-primary svc-btn-sm svc-enquire-btn">
                            <i class="fas fa-envelope" aria-hidden="true"></i> Enquire About This Service
                        </a>
                    </div>

                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
