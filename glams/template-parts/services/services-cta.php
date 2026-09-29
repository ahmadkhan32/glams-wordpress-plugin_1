<?php
/**
 * Template Part: Services CTA
 * GLAMS – MOHAMMAD HAYAT TECHNICAL SERVICES L.L.C
 */
$contact_url = get_permalink( get_page_by_path( 'contact' ) ) ?: '#contact';
?>
<section class="svc-cta" aria-label="Service Call To Action">
    <div class="svc-container">
        <h2>Need Professional Technical Services?</h2>
        <p>Get in touch with our team to discuss your technical service requirements.</p>
        <div class="svc-cta-btns">
            <a href="<?php echo esc_url( $contact_url ); ?>" class="svc-btn svc-btn-primary" role="button">
                <i class="fas fa-tools" aria-hidden="true"></i> Request a Service
            </a>
            <a href="<?php echo esc_url( $contact_url ); ?>" class="svc-btn svc-btn-outline" role="button">
                <i class="fas fa-envelope" aria-hidden="true"></i> Contact Us
            </a>
        </div>
    </div>
</section>
