<?php
/**
 * Site Footer Template Part
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$phone     = get_theme_mod( 'glams_phone', '+971 4 123 4567' );
$email     = get_theme_mod( 'glams_email', 'info@mhktechnicalservices.com' );
$license   = get_theme_mod( 'glams_license_no', 'DET-2024-001234' );
$address   = get_theme_mod( 'glams_address', 'Al Tawar Center, Near Al Qusais Metro Station, Dubai, UAE' );
$hours     = get_theme_mod( 'glams_hours', 'Mon – Sat: 8:00 AM – 8:00 PM' );
$clean_tel = preg_replace( '/[^0-9+]/', '', $phone );
$home_url  = esc_url( home_url( '/' ) );
?>

<footer class="glams-footer" role="contentinfo">
  <div class="glams-container">
    <div class="glams-footer-grid">
      <!-- Col 1: Brand & Licensing -->
      <div class="glams-footer-col glams-footer-brand">
        <div class="glams-footer-logo">
          <?php glams_the_theme_logo( 'footer', 'white' ); ?>
        </div>
        <p class="glams-footer-desc">
          <?php esc_html_e( 'MHK Technical Services is a premier UAE government-licensed contracting firm delivering electromechanical, HVAC, civil, and regulatory compliance services with excellence.', 'glams-theme' ); ?>
        </p>
        <div class="glams-footer-lic">
          <i class="fa-solid fa-shield-halved"></i>
          <span><?php printf( esc_html__( 'Licensed by DET: %s', 'glams-theme' ), esc_html( $license ) ); ?></span>
        </div>
        <div class="glams-footer-social">
          <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
          <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" aria-label="X (Twitter)"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
      </div>

      <!-- Col 2: Core Technical Services -->
      <div class="glams-footer-col">
        <h4 class="glams-footer-heading"><?php esc_html_e( 'Technical Services', 'glams-theme' ); ?></h4>
        <ul class="glams-footer-links">
          <li><a href="<?php echo $home_url; ?>#services"><?php esc_html_e( 'HVAC & Air Filtration', 'glams-theme' ); ?></a></li>
          <li><a href="<?php echo $home_url; ?>#services"><?php esc_html_e( 'Electromechanical Works', 'glams-theme' ); ?></a></li>
          <li><a href="<?php echo $home_url; ?>#services"><?php esc_html_e( 'Floor & Wall Tiling', 'glams-theme' ); ?></a></li>
          <li><a href="<?php echo $home_url; ?>#services"><?php esc_html_e( 'Carpentry & Wood Flooring', 'glams-theme' ); ?></a></li>
          <li><a href="<?php echo $home_url; ?>#services"><?php esc_html_e( 'False Ceilings & Partitions', 'glams-theme' ); ?></a></li>
          <li><a href="<?php echo $home_url; ?>#services"><?php esc_html_e( 'Electrical Repairs & Maintenance', 'glams-theme' ); ?></a></li>
          <li><a href="<?php echo $home_url; ?>#services"><?php esc_html_e( 'Sanitary & Pipe Repairs', 'glams-theme' ); ?></a></li>
        </ul>
      </div>

      <!-- Col 3: Portal & Compliance -->
      <div class="glams-footer-col">
        <h4 class="glams-footer-heading"><?php esc_html_e( 'GLAMS Portal', 'glams-theme' ); ?></h4>
        <ul class="glams-footer-links">
          <li><a href="<?php echo $home_url; ?>#license"><?php esc_html_e( 'License Activities Lookup', 'glams-theme' ); ?></a></li>
          <li><a href="<?php echo $home_url; ?>#immigration"><?php esc_html_e( 'UAE Visa & Immigration', 'glams-theme' ); ?></a></li>
          <li><a href="<?php echo $home_url; ?>#process"><?php esc_html_e( 'Compliance Roadmap', 'glams-theme' ); ?></a></li>
          <li><a href="<?php echo $home_url; ?>#why-us"><?php esc_html_e( 'Why Choose MHK', 'glams-theme' ); ?></a></li>
          <li><a href="<?php echo $home_url; ?>#testimonials"><?php esc_html_e( 'Client Testimonials', 'glams-theme' ); ?></a></li>
          <li><a href="<?php echo $home_url; ?>#faq"><?php esc_html_e( 'Frequently Asked Questions', 'glams-theme' ); ?></a></li>
        </ul>
      </div>

      <!-- Col 4: Contact & Office -->
      <div class="glams-footer-col">
        <h4 class="glams-footer-heading"><?php esc_html_e( 'UAE Headquarters', 'glams-theme' ); ?></h4>
        <ul class="glams-footer-contact">
          <li>
            <i class="fa-solid fa-location-dot"></i>
            <span><?php echo esc_html( $address ); ?></span>
          </li>
          <li>
            <i class="fa-solid fa-phone"></i>
            <a href="tel:<?php echo esc_attr( $clean_tel ); ?>"><?php echo esc_html( $phone ); ?></a>
          </li>
          <li>
            <i class="fa-solid fa-envelope"></i>
            <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
          </li>
          <li>
            <i class="fa-solid fa-clock"></i>
            <span><?php echo esc_html( $hours ); ?></span>
          </li>
        </ul>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="glams-footer-bottom">
      <div class="glams-copy">
        <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'glams-theme' ); ?></p>
      </div>

      <div class="glams-footer-badges">
        <span class="glams-uae-tag">
          <i class="fa-solid fa-circle-check"></i>
          <?php esc_html_e( 'DED Certified Contractor • Serving All 7 Emirates', 'glams-theme' ); ?>
        </span>
      </div>
    </div>
  </div>
</footer>
