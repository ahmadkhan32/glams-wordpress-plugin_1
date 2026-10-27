<?php
/**
 * Call to Action Banner Section Template Part
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$whatsapp = get_theme_mod( 'glams_whatsapp', '971582166143' );
$clean_wa = preg_replace( '/[^0-9]/', '', $whatsapp );
?>

<section class="glams-cta">
  <div class="glams-container text-center">
    <div class="glams-cta-inner">
      <span class="glams-cta-pill">
        <i class="fa-solid fa-bolt"></i>
        <?php esc_html_e( 'Emergency & Scheduled Technical Contracting', 'glams-theme' ); ?>
      </span>
      <h2>
        <?php esc_html_e( 'Ready to Execute Your UAE Technical Project with Guaranteed Compliance?', 'glams-theme' ); ?>
      </h2>
      <p>
        <?php esc_html_e( 'Contact our certified project management team today for a transparent, itemized engineering proposal.', 'glams-theme' ); ?>
      </p>

      <div class="glams-cta-actions">
        <a href="#contact" class="glams-btn glams-btn-white glams-btn-lg">
          <span><?php esc_html_e( 'Schedule On-Site Inspection', 'glams-theme' ); ?></span>
          <i class="fa-solid fa-arrow-right"></i>
        </a>
        <a href="https://wa.me/<?php echo esc_attr( $clean_wa ); ?>" target="_blank" rel="noopener noreferrer" class="glams-btn glams-btn-accent glams-btn-lg">
          <i class="fa-brands fa-whatsapp"></i>
          <span><?php esc_html_e( 'WhatsApp Operations', 'glams-theme' ); ?></span>
        </a>
      </div>
    </div>
  </div>
</section>
