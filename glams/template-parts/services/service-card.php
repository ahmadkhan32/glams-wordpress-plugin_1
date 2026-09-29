<?php
/**
 * Template Part: Single Service Card
 * GLAMS – MOHAMMAD HAYAT TECHNICAL SERVICES L.L.C
 *
 * Can be loaded via get_template_part( 'template-parts/services/service-card', null, [ 'service' => $svc, 'contact_url' => $contact_url ] );
 */

$svc         = isset( $args['service'] ) ? $args['service'] : ( isset( $GLOBALS['current_service'] ) ? $GLOBALS['current_service'] : null );
$contact_url = isset( $args['contact_url'] ) ? $args['contact_url'] : ( get_permalink( get_page_by_path( 'contact' ) ) ?: '#contact' );

if ( ! $svc ) {
    return;
}
?>
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
