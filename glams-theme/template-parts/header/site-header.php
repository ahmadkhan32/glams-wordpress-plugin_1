<?php
/**
 * Site Header Template Part
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$phone     = get_theme_mod( 'glams_phone', '+971 58 216 6143' );
$whatsapp  = get_theme_mod( 'glams_whatsapp', '971582166143' );
$email     = get_theme_mod( 'glams_email', 'Ummibangash@gmail.com' );
$license   = get_theme_mod( 'glams_license_no', 'DET-2024-001234' );
$hours     = get_theme_mod( 'glams_hours', 'Mon – Sat: 8:00 AM – 8:00 PM | Sun: Emergency Support' );
$clean_tel = preg_replace( '/[^0-9+]/', '', $phone );
$clean_wa  = preg_replace( '/[^0-9]/', '', $whatsapp );
?>

<header class="glams-header-wrapper" role="banner">
  <!-- Topbar -->
  <div class="glams-topbar">
    <div class="glams-container glams-topbar-inner">
      <div class="glams-topbar-left">
        <a href="tel:<?php echo esc_attr( $clean_tel ); ?>" class="glams-topbar-item" aria-label="Call Us">
          <i class="fa-solid fa-phone-volume"></i>
          <span><?php echo esc_html( $phone ); ?></span>
        </a>
        <a href="mailto:<?php echo esc_attr( $email ); ?>" class="glams-topbar-item" aria-label="Send Email">
          <i class="fa-solid fa-envelope"></i>
          <span><?php echo esc_html( $email ); ?></span>
        </a>
        <span class="glams-topbar-item glams-hide-mobile">
          <i class="fa-solid fa-clock"></i>
          <span><?php echo esc_html( $hours ); ?></span>
        </span>
      </div>

      <div class="glams-topbar-right">
        <div class="glams-license-pill" id="glamsCopyLicenseBtn" data-license="<?php echo esc_attr( $license ); ?>" title="Click to copy license">
          <span class="glams-lic-icon"><i class="fa-solid fa-certificate"></i></span>
          <span class="glams-lic-text"><?php echo esc_html( $license ); ?></span>
          <span class="glams-lic-copy"><i class="fa-regular fa-copy"></i></span>
        </div>
        <span class="glams-uae-badge">
          <span class="glams-flag-dot"></span>
          UAE Official
        </span>
      </div>
    </div>
  </div>

  <!-- Main Navigation Bar -->
  <div class="glams-header">
    <div class="glams-container glams-header-inner">
      <div class="glams-logo-box">
        <?php glams_the_theme_logo( 'header', 'auto' ); ?>
      </div>

      <nav class="glams-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'glams-theme' ); ?>">
        <?php
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( [
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'glams-nav-list',
                'fallback_cb'    => 'glams_fallback_primary_menu',
                'depth'          => 2,
            ] );
        } else {
            glams_fallback_primary_menu();
        }
        ?>
      </nav>

      <div class="glams-header-actions">
        <a href="#contact" class="glams-btn glams-btn-primary glams-btn-sm">
          <span><?php esc_html_e( 'Get a Quote', 'glams-theme' ); ?></span>
          <i class="fa-solid fa-arrow-right"></i>
        </a>

        <button class="glams-hamburger" type="button" aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'glams-theme' ); ?>" aria-expanded="false">
          <span class="glams-hamburger-bar"></span>
          <span class="glams-hamburger-bar"></span>
          <span class="glams-hamburger-bar"></span>
        </button>
      </div>
    </div>
  </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="glams-mobile-overlay" aria-hidden="true"></div>
<aside class="glams-mobile-drawer" aria-label="<?php esc_attr_e( 'Mobile Menu', 'glams-theme' ); ?>">
  <div class="glams-drawer-head">
    <div class="glams-drawer-logo">
      <?php glams_the_theme_logo( 'mobile', 'auto' ); ?>
    </div>
    <button class="glams-drawer-close" type="button" aria-label="<?php esc_attr_e( 'Close menu', 'glams-theme' ); ?>">
      <i class="fa-solid fa-xmark"></i>
    </button>
  </div>

  <div class="glams-drawer-body">
    <nav class="glams-drawer-nav">
      <?php
      if ( has_nav_menu( 'primary' ) ) {
          wp_nav_menu( [
              'theme_location' => 'primary',
              'container'      => false,
              'menu_class'     => 'glams-drawer-menu-list',
              'fallback_cb'    => 'glams_fallback_primary_menu',
              'depth'          => 2,
          ] );
      } else {
          glams_fallback_primary_menu();
      }
      ?>
    </nav>

    <div class="glams-drawer-contact">
      <h4><?php esc_html_e( 'Direct Inquiries', 'glams-theme' ); ?></h4>
      <a href="tel:<?php echo esc_attr( $clean_tel ); ?>" class="glams-drawer-link">
        <i class="fa-solid fa-phone"></i>
        <span><?php echo esc_html( $phone ); ?></span>
      </a>
      <a href="https://wa.me/<?php echo esc_attr( $clean_wa ); ?>" target="_blank" rel="noopener noreferrer" class="glams-btn glams-btn-accent glams-btn-full">
        <i class="fa-brands fa-whatsapp"></i>
        <span><?php esc_html_e( 'Chat on WhatsApp', 'glams-theme' ); ?></span>
      </a>
    </div>
  </div>
</aside>
