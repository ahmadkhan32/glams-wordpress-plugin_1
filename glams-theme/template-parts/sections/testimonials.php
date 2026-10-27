<?php
/**
 * Testimonials Section Template Part
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$testimonials = glams_get_testimonials();
?>

<section class="glams-section glams-testimonials-section" id="testimonials">
  <div class="glams-container">
    <div class="glams-section-head text-center">
      <div class="glams-section-tag">
        <i class="fa-solid fa-comments"></i>
        <span><?php esc_html_e( 'Client Endorsements', 'glams-theme' ); ?></span>
      </div>
      <h2 class="glams-section-title">
        <?php esc_html_e( 'Trusted by Leading UAE Businesses', 'glams-theme' ); ?>
      </h2>
      <p class="glams-section-sub">
        <?php esc_html_e( 'Read feedback from facility directors, property owners, and corporate partners across the Emirates.', 'glams-theme' ); ?>
      </p>
    </div>

    <div class="glams-testi-grid">
      <?php foreach ( $testimonials as $t ) : ?>
        <div class="glams-testi-card">
          <div class="glams-testi-stars">
            <?php for ( $i = 0; $i < $t['rating']; $i++ ) : ?>
              <i class="fa-solid fa-star"></i>
            <?php endfor; ?>
          </div>

          <p class="glams-testi-quote">
            <?php echo esc_html( $t['comment'] ); ?>
          </p>

          <div class="glams-testi-author">
            <div class="glams-testi-avatar">
              <span><?php echo esc_html( $t['initial'] ); ?></span>
            </div>
            <div class="glams-testi-meta">
              <h4 class="glams-author-name"><?php echo esc_html( $t['name'] ); ?></h4>
              <p class="glams-author-role"><?php echo esc_html( $t['role'] ); ?></p>
            </div>
            <div class="glams-verified-icon" title="Verified Client">
              <i class="fa-solid fa-circle-check"></i>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
