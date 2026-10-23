<?php
/**
 * Template Name: Visa Assistance
 * Description: Detailed visa processing, golden visa, and workforce immigration solutions.
 *
 * @package UAE_Technical_Services
 */

get_header();
?>

<div class="page-hero">
    <div class="container">
        <span class="badge-gold">Immigration &amp; Visas</span>
        <h1>UAE Visa Assistance &amp; Corporate Processing</h1>
        <p>Comprehensive assistance for employment visas, investor golden visas, and family residency permits.</p>
    </div>
</div>

<main id="primary" class="site-main page-content-wrap">
    <div class="container">
        <div class="content-box">
            <h2 style="font-size: 1.75rem; margin-bottom: 16px; color: var(--color-primary);">Fast-Track Visa Services in the UAE</h2>
            <p>
                Navigating the UAE immigration process requires accuracy, updated regulatory compliance, and proper liaison with GDRFA (General Directorate of Residency and Foreigners Affairs) and MOHRE.
            </p>
            <p>
                Our specialized PRO team assists companies and individuals with all phases of residency processing:
            </p>

            <div class="services-grid" style="margin: 32px 0;">
                <div class="card" style="padding: 24px;">
                    <div class="service-icon-box"><i class="fas fa-briefcase"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 8px;">Employment Visas</h3>
                    <p style="font-size: 0.9375rem; color: var(--color-secondary-text);">Quota approvals, labor cards, medical fitness scheduling, and Emirates ID fingerprinting.</p>
                </div>
                <div class="card" style="padding: 24px;">
                    <div class="service-icon-box" style="color: var(--color-gold);"><i class="fas fa-crown"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 8px;">10-Year Golden Visas</h3>
                    <p style="font-size: 0.9375rem; color: var(--color-secondary-text);">Dedicated support for property investors, entrepreneurs, executives, and specialized talent.</p>
                </div>
                <div class="card" style="padding: 24px;">
                    <div class="service-icon-box"><i class="fas fa-users"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 8px;">Family Sponsorship</h3>
                    <p style="font-size: 0.9375rem; color: var(--color-secondary-text);">Complete paperwork and residency permits for spouses, children, and parents in the UAE.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 24px;">
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary">
                    <i class="fas fa-passport"></i> Inquire About Visa Processing
                </a>
            </div>
        </div>

        <?php get_template_part( 'template-parts/sections/faq' ); ?>
    </div>
</main>

<?php
get_footer();
