<?php
/**
 * Template Name: Business Setup
 * Description: Company formation, Mainland & Free Zone licensing.
 *
 * @package UAE_Technical_Services
 */

get_header();
?>

<div class="page-hero">
    <div class="container">
        <span class="badge-gold">Company Formation</span>
        <h1>UAE Business Setup &amp; Licensing Services</h1>
        <p>Launch your commercial enterprise in Dubai mainland or UAE free zones with 100% foreign ownership.</p>
    </div>
</div>

<main id="primary" class="site-main page-content-wrap">
    <div class="container">
        <div class="content-box">
            <h2 style="font-size: 1.75rem; margin-bottom: 16px; color: var(--color-primary);">Turn-Key Company Incorporation in Dubai &amp; Across the UAE</h2>
            <p>
                From initial trade name reservation to final corporate bank account opening, MHK Technical Services guides entrepreneurs and multinational firms through every step.
            </p>

            <div class="services-grid" style="margin: 32px 0;">
                <div class="card" style="padding: 24px;">
                    <div class="service-icon-box"><i class="fas fa-landmark"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 8px;">Dubai Mainland Setup</h3>
                    <p style="font-size: 0.9375rem; color: var(--color-secondary-text);">Trade directly across the local UAE market and participate in government projects with 100% ownership.</p>
                </div>
                <div class="card" style="padding: 24px;">
                    <div class="service-icon-box"><i class="fas fa-globe"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 8px;">Free Zone Company Formation</h3>
                    <p style="font-size: 0.9375rem; color: var(--color-secondary-text);">0% corporate tax exemptions, 100% capital repatriation, and simplified customs procedures.</p>
                </div>
                <div class="card" style="padding: 24px;">
                    <div class="service-icon-box"><i class="fas fa-university"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 8px;">Corporate Bank Accounts</h3>
                    <p style="font-size: 0.9375rem; color: var(--color-secondary-text);">Direct introduction to top-tier UAE financial institutions including Emirates NBD, ADCB, and Mashreq.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 24px;">
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary">
                    <i class="fas fa-briefcase"></i> Schedule Business Setup Consultation
                </a>
            </div>
        </div>

        <?php get_template_part( 'template-parts/sections/process' ); ?>
    </div>
</main>

<?php
get_footer();
