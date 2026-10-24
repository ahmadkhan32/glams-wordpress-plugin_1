<?php
/**
 * Template Part: FAQs Section
 *
 * @package UAE_Technical_Services
 */

defined( 'ABSPATH' ) || exit;

$faqs = [
    [
        'q' => 'Which areas in the UAE do you serve?',
        'a' => 'We operate extensively across all seven Emirates, including Dubai (Business Bay, Downtown, Al Quoz, Marina, JLT, Deira), Abu Dhabi, Sharjah, Ajman, Ras Al Khaimah, Umm Al Quwain, and Fujairah.',
    ],
    [
        'q' => 'Are your technicians licensed and certified?',
        'a' => 'Yes. All our engineers and technical staff are certified, thoroughly trained, and compliant with UAE Ministry of Human Resources & Emiratisation (MOHRE) and local civil defense and municipality codes.',
    ],
    [
        'q' => 'Do you provide emergency HVAC and electrical repairs?',
        'a' => 'Yes. We maintain emergency response teams 24 hours a day, 7 days a week for critical air-conditioning failures, plumbing leaks, and electrical breakdowns.',
    ],
    [
        'q' => 'How can I get an estimate for fit-out or maintenance works?',
        'a' => 'You can request an estimate online by filling out our quick contact form, messaging us on WhatsApp (+971 58 216 6143), or calling our helpline at +971 58 216 6143. We offer free initial consultations and site surveys.',
    ],
];
?>

<section id="faq" class="faq-section" aria-label="Frequently Asked Questions">
    <div class="container">
        <div class="section-header">
            <span class="badge-green">Common Questions</span>
            <h2>Frequently Asked Questions</h2>
            <p>Everything you need to know about our technical contracting, licensing, and service delivery.</p>
            <div class="section-divider"></div>
        </div>

        <div class="faq-container">
            <?php foreach ( $faqs as $index => $item ) : ?>
                <div class="faq-item <?php echo $index === 0 ? 'is-active' : ''; ?>">
                    <button class="faq-question" type="button" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                        <span><?php echo esc_html( $item['q'] ); ?></span>
                        <i class="fas fa-chevron-down" style="font-size: 0.875rem; color: var(--color-gold);"></i>
                    </button>
                    <div class="faq-answer">
                        <p><?php echo esc_html( $item['a'] ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
