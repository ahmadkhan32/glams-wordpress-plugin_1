<?php
/**
 * 4-Step Process Section Template Part
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$steps = glams_get_process_steps();
?>

<section class="glams-section glams-process-section" id="process">
  <div class="glams-container">
    <div class="glams-section-head text-center">
      <div class="glams-section-tag">
        <i class="fa-solid fa-list-check"></i>
        <span><?php esc_html_e( 'How We Work', 'glams-theme' ); ?></span>
      </div>
      <h2 class="glams-section-title">
        <?php esc_html_e( 'Seamless 4-Step Project Delivery', 'glams-theme' ); ?>
      </h2>
      <p class="glams-section-sub">
        <?php esc_html_e( 'From initial requirement intake to official sign-off and warranty handover.', 'glams-theme' ); ?>
      </p>
    </div>

    <div class="glams-process-grid">
      <?php foreach ( $steps as $s ) : ?>
        <div class="glams-process-step">
          <div class="glams-step-number"><?php echo esc_html( $s['step'] ); ?></div>
          <div class="glams-step-content">
            <h3 class="glams-step-title"><?php echo esc_html( $s['title'] ); ?></h3>
            <p class="glams-step-desc"><?php echo esc_html( $s['desc'] ); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
