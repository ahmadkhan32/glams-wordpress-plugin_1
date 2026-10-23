<?php
/**
 * Template Part: Services Section
 *
 * @package UAE_Technical_Services
 */

defined( 'ABSPATH' ) || exit;

$services = [
    [
        'icon'  => 'fa-passport',
        'title' => 'Visa Assistance',
        'desc'  => 'End-to-end guidance for UAE residence visas, investor golden visas, family sponsorship, and corporate workforce processing.',
        'link'  => home_url( '/visa-assistance' ),
    ],
    [
        'icon'  => 'fa-file-invoice',
        'title' => 'Document Clearing',
        'desc'  => 'Official government PRO representation for Dubai DET, MOHRE, civil defense, municipal approvals, and attestation.',
        'link'  => home_url( '/document-clearing' ),
    ],
    [
        'icon'  => 'fa-building-columns',
        'title' => 'Business Setup',
        'desc'  => 'Mainland and Free Zone company formation, commercial license registration, trade name reservations, and office solutions.',
        'link'  => home_url( '/business-setup' ),
    ],
    [
        'icon'  => 'fa-wind',
        'title' => 'Air Conditioning & HVAC',
        'desc'  => 'Precision central AC installation, duct cleaning, chiller unit servicing, thermostat balancing, and preventive maintenance.',
        'link'  => home_url( '/services' ),
    ],
    [
        'icon'  => 'fa-cogs',
        'title' => 'Electromechanical Works',
        'desc'  => 'Industrial and commercial electromechanical equipment servicing, power distribution boards, and facility maintenance.',
        'link'  => home_url( '/services' ),
    ],
    [
        'icon'  => 'fa-th-large',
        'title' => 'Floor & Wall Tiling',
        'desc'  => 'High-precision porcelain, marble, and ceramic tile installation with full waterproofing and surface leveling.',
        'link'  => home_url( '/services' ),
    ],
];
?>

<section id="services" class="services-section" aria-label="Our Services">
    <div class="container">
        <div class="section-header">
            <span class="badge-green">Core Capabilities</span>
            <h2>Our Specialized Technical Services</h2>
            <p>Tailored solutions delivered by licensed UAE engineers and certified technical specialists.</p>
            <div class="section-divider"></div>
        </div>

        <div class="services-grid">
            <?php foreach ( $services as $s ) : ?>
                <div class="card service-card">
                    <div class="service-icon-box">
                        <i class="fas <?php echo esc_attr( $s['icon'] ); ?>"></i>
                    </div>
                    <h3 class="service-title"><?php echo esc_html( $s['title'] ); ?></h3>
                    <p class="service-desc"><?php echo esc_html( $s['desc'] ); ?></p>
                    <div>
                        <a href="<?php echo esc_url( $s['link'] ); ?>" class="btn btn-outline" style="color: var(--color-accent) !important; border-color: var(--color-border); padding: 8px 16px; font-size: 0.875rem;">
                            Learn More &rarr;
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
