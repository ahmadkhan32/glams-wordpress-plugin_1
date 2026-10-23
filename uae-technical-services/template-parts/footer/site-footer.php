<?php
/**
 * Template Part: Site Footer
 *
 * @package UAE_Technical_Services
 */

defined( 'ABSPATH' ) || exit;
?>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-grid">
            <!-- Branding Column with Reused Logo -->
            <div class="footer-col footer-branding">
                <?php uae_the_theme_logo( 'footer', 'standard' ); ?>
                <p class="footer-description">
                    <strong>MHK Technical Services</strong> provides trusted, premier technical and facility contracting across Dubai and the United Arab Emirates. Delivering certified MEP, HVAC, interior fit-out, and corporate maintenance solutions.
                </p>
                <div>
                    <span class="badge-gold">★ ISO &amp; Dubai Certified Standard</span>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-col">
                <h4 class="footer-heading">Quick Links</h4>
                <?php
                wp_nav_menu( [
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-links',
                    'container'      => false,
                    'fallback_cb'    => 'uae_fallback_footer_menu',
                    'depth'          => 1,
                ] );
                ?>
            </div>

            <!-- Our Services Column -->
            <div class="footer-col">
                <h4 class="footer-heading">Our Services</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Visa Assistance</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Document Clearing</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Business Setup</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Air Conditioning &amp; HVAC</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Electromechanical Works</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Floor &amp; Wall Tiling</a></li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="footer-col">
                <h4 class="footer-heading">Contact Details</h4>
                <div class="footer-contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <strong>Office:</strong><br>
                        Al Quoz Industrial Area, Dubai, United Arab Emirates
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <strong>Phone:</strong><br>
                        <a href="tel:+97141234567" style="color: #cbd5e1;">+971 4 123 4567</a>
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <strong>Email:</strong><br>
                        <a href="mailto:info@mhktechnicalservices.com" style="color: var(--color-primary); font-weight: 500;">info@mhktechnicalservices.com</a>
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <strong>Hours:</strong><br>
                        Sat – Thu: 8:00 AM – 7:00 PM
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright Row -->
        <div class="footer-bottom">
            <div>
                &copy; <?php echo esc_html( date( 'Y' ) ); ?> <strong>MHK Technical Services</strong>. All rights reserved.
            </div>
            <div class="footer-links" style="flex-direction: row; gap: 16px;">
                <a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>">Privacy Policy</a>
                <span>•</span>
                <a href="<?php echo esc_url( home_url( '/terms-and-conditions' ) ); ?>">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
