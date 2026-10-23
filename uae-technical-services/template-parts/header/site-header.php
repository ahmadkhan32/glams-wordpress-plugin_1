<?php
/**
 * Template Part: Site Header
 *
 * @package UAE_Technical_Services
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- Topbar -->
<div class="site-topbar">
    <div class="container topbar-inner">
        <div class="topbar-left">
            <span class="badge-gold">UAE Certified</span>
            <span class="topbar-item">
                <i class="fas fa-map-marker-alt" style="color: var(--color-gold);"></i>
                Dubai • Abu Dhabi • Sharjah • All UAE
            </span>
            <span class="topbar-item">
                <i class="fas fa-clock" style="color: var(--color-gold);"></i>
                Sat – Thu: 8:00 AM – 7:00 PM
            </span>
        </div>
        <div class="topbar-right">
            <span class="topbar-item">
                <i class="fas fa-phone-alt"></i>
                <a href="tel:+97141234567">+971 4 123 4567</a>
            </span>
            <span class="topbar-item">
                <i class="fas fa-envelope"></i>
                <a href="mailto:info@mhktechnicalservices.com">info@mhktechnicalservices.com</a>
            </span>
        </div>
    </div>
</div>

<!-- Main Sticky Header -->
<header id="masthead" class="site-header" role="banner">
    <div class="container header-inner">
        <!-- Logo on the Left -->
        <div class="header-branding">
            <?php uae_the_theme_logo( 'header', 'standard' ); ?>
        </div>

        <!-- Navigation in the Center -->
        <nav id="uae-main-nav" class="header-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'uae-technical-services' ); ?>">
            <?php
            wp_nav_menu( [
                'theme_location' => 'primary',
                'menu_class'     => 'uae-nav-list',
                'container'      => false,
                'fallback_cb'    => 'uae_fallback_primary_menu',
                'depth'          => 2,
            ] );
            ?>
        </nav>

        <!-- Green Contact Button on the Right -->
        <div class="header-cta">
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn btn-green">
                <i class="fas fa-paper-plane" style="margin-right: 6px;"></i> Contact Us
            </a>
            <!-- Mobile Toggle -->
            <button class="mobile-toggle-btn" id="uae-mobile-toggle" aria-expanded="false" aria-controls="uae-main-nav" aria-label="<?php esc_attr_e( 'Toggle Menu', 'uae-technical-services' ); ?>">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </div>
</header>
