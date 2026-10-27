<?php
/**
 * FAQ Section Template Part
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$faqs = glams_get_faqs();
?>

<section class="glams-section glams-faq-section" id="faq">
  <div class="glams-container glams-container-narrow">
    <div class="glams-section-head text-center">
      <div class="glams-section-tag">
        <i class="fa-solid fa-circle-question"></i>
        <span><?php esc_html_e( 'Got Questions?', 'glams-theme' ); ?></span>
      </div>
      <h2 class="glams-section-title">
        <?php esc_html_e( 'Frequently Asked Questions', 'glams-theme' ); ?>
      </h2>
      <p class="glams-section-sub">
        <?php esc_html_e( 'Everything you need to know about our licensing, technical procedures, and service terms.', 'glams-theme' ); ?>
      </p>
    </div>

    <div class="glams-faq-list">
      <?php foreach ( $faqs as $index => $faq ) : ?>
        <div class="glams-faq-item <?php echo $index === 0 ? 'is-open' : ''; ?>">
          <button type="button" class="glams-faq-question" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
            <span><?php echo esc_html( $faq['q'] ); ?></span>
            <span class="glams-faq-toggle">
              <i class="fa-solid fa-plus"></i>
            </span>
          </button>
          <div class="glams-faq-answer">
            <p><?php echo esc_html( $faq['a'] ); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
