<?php
/**
 * Template Name: Document Clearing
 * Description: Official government liaison, PRO services, and document clearing.
 *
 * @package UAE_Technical_Services
 */

get_header();
?>

<div class="page-hero">
    <div class="container">
        <span class="badge-gold">PRO &amp; Government Liaison</span>
        <h1>UAE Document Clearing Services</h1>
        <p>Expert government liaison for trade license renewals, approvals, and legal translations.</p>
    </div>
</div>

<main id="primary" class="site-main page-content-wrap">
    <div class="container">
        <div class="content-box">
            <h2 style="font-size: 1.75rem; margin-bottom: 16px; color: var(--color-primary);">Fast &amp; Compliant Document Clearing Across All Emirates</h2>
            <p>
                Save time and avoid administrative delays. Our licensed PRO officers interface directly with Dubai DET, Ministry of Economy, Civil Defense, Dubai Municipality, and judicial notary offices.
            </p>

            <div class="services-grid" style="margin: 32px 0;">
                <div class="card" style="padding: 24px;">
                    <div class="service-icon-box"><i class="fas fa-sync-alt"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 8px;">License Amendments &amp; Renewals</h3>
                    <p style="font-size: 0.9375rem; color: var(--color-secondary-text);">Trade license annual renewals, adding/modifying commercial activities, and partner changes.</p>
                </div>
                <div class="card" style="padding: 24px;">
                    <div class="service-icon-box"><i class="fas fa-stamp"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 8px;">Document Attestation</h3>
                    <p style="font-size: 0.9375rem; color: var(--color-secondary-text);">Ministry of Foreign Affairs (MOFA) attestation, embassy stamps, and legal Arabic translations.</p>
                </div>
                <div class="card" style="padding: 24px;">
                    <div class="service-icon-box"><i class="fas fa-certificate"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 8px;">Municipal &amp; Defense Approvals</h3>
                    <p style="font-size: 0.9375rem; color: var(--color-secondary-text);">Civil defense safety certificates, municipality fit-out permits, and environmental clearances.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 24px;">
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary">
                    <i class="fas fa-file-invoice"></i> Request Document Clearing
                </a>
            </div>
        </div>

        <?php get_template_part( 'template-parts/sections/contact-cta' ); ?>
    </div>
</main>

<?php
get_footer();
