<?php
/**
 * The 404 Not Found template
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="glams-404-section glams-section text-center">
  <div class="glams-container glams-container-narrow">
    <div class="glams-404-badge">404</div>
    <h1 class="glams-404-title"><?php esc_html_e( 'Page Not Found', 'glams-theme' ); ?></h1>
    <p class="glams-404-ar ar-text">عذراً، الصفحة التي تبحث عنها غير متوفرة أو تم نقلها</p>
    <p class="glams-404-desc">
      <?php esc_html_e( 'The page or document you are trying to reach does not exist or may have been updated. Use the search bar below or return to the main portal.', 'glams-theme' ); ?>
    </p>

    <div class="glams-404-search">
      <?php get_search_form(); ?>
    </div>

    <div class="glams-404-actions">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="glams-btn glams-btn-primary glams-btn-lg">
        <i class="fa-solid fa-house"></i>
        <span><?php esc_html_e( 'Return to Home', 'glams-theme' ); ?></span>
      </a>
      <a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="glams-btn glams-btn-outline glams-btn-lg">
        <i class="fa-solid fa-screwdriver-wrench"></i>
        <span><?php esc_html_e( 'Browse Services', 'glams-theme' ); ?></span>
      </a>
      <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="glams-btn glams-btn-accent glams-btn-lg">
        <i class="fa-solid fa-phone"></i>
        <span><?php esc_html_e( 'Contact Support', 'glams-theme' ); ?></span>
      </a>
    </div>
  </div>
</div>

<?php
get_footer();
