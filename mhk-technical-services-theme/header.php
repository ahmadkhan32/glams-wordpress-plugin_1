<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>

<div id="page" class="mhk-site-wrapper">

    <!-- Topbar Information Row -->
    <div class="mhk-topbar">
        <div class="mhk-container mhk-topbar-inner">
            <div class="mhk-topbar-left">
                <span class="mhk-topbar-badge">UAE Licensed</span>
                <span class="mhk-topbar-item">
                    📍 Dubai • Abu Dhabi • Sharjah • All UAE
                </span>
                <span class="mhk-topbar-item">
                    🕒 Sat – Thu: 8:00 AM – 7:00 PM
                </span>
            </div>
            <div class="mhk-topbar-right">
                <span class="mhk-topbar-item">
                    📞 <a href="tel:+97141234567">+971 4 123 4567</a>
                </span>
                <span class="mhk-topbar-item">
                    ✉️ <a href="mailto:info@mhktechnicalservices.com">info@mhktechnicalservices.com</a>
                </span>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header id="masthead" class="mhk-site-header" role="banner">
        <div class="mhk-container mhk-header-inner">
            <!-- Logo on the left (centralized theme logo) -->
            <div class="mhk-site-branding">
                <?php mhk_the_theme_logo( 'header' ); ?>
            </div>

            <!-- Mobile Hamburger Toggle -->
            <button class="mhk-mobile-toggle" id="mhk-mobile-toggle" aria-expanded="false" aria-controls="mhk-main-navigation" aria-label="<?php esc_attr_e( 'Toggle navigation', 'mhk-technical-services' ); ?>">
                <span class="mhk-hamburger-icon"></span>
            </button>

            <!-- Responsive Navigation Menu -->
            <nav id="mhk-main-navigation" class="mhk-main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'mhk-technical-services' ); ?>">
                <?php
                wp_nav_menu( [
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'mhk-nav-menu',
                    'container'      => false,
                    'fallback_cb'    => 'mhk_fallback_primary_menu',
                    'depth'          => 2,
                ] );
                ?>
            </nav>

            <!-- Action Button -->
            <div class="mhk-header-actions">
                <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="mhk-btn mhk-btn-primary">
                    Get a Quote
                </a>
            </div>
        </div>
    </header>

    <div id="content" class="mhk-site-content">
