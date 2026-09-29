<?php
/**
 * Template Part: Services Hero
 * GLAMS – MOHAMMAD HAYAT TECHNICAL SERVICES L.L.C
 */
$contact_url = get_permalink( get_page_by_path( 'contact' ) ) ?: '#contact';
?>
<section class="svc-hero" aria-label="Services Hero">
    <div class="svc-hero-overlay"></div>
    <div class="svc-container svc-hero-inner">
        <div class="svc-hero-content">
            <div class="svc-tag-gold">MOHAMMAD HAYAT TECHNICAL SERVICES L.L.C</div>
            <h1 class="svc-hero-h1">Professional Technical Services in the UAE</h1>
            <p class="svc-hero-sub">
                Reliable technical, maintenance and building services delivered with professional workmanship and a customer-focused approach.
            </p>
            <div class="svc-hero-btns">
                <a href="<?php echo esc_url( $contact_url ); ?>" class="svc-btn svc-btn-primary">
                    <i class="fas fa-tools" aria-hidden="true"></i> Request a Service
                </a>
                <a href="<?php echo esc_url( $contact_url ); ?>" class="svc-btn svc-btn-outline">
                    <i class="fas fa-envelope" aria-hidden="true"></i> Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
