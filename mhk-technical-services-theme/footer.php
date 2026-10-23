    </div><!-- #content -->

    <!-- Main Footer -->
    <footer id="colophon" class="mhk-site-footer" role="contentinfo">
        <div class="mhk-container">
            <div class="mhk-footer-grid">
                
                <!-- Column 1: Logo, Description & Certification -->
                <div class="mhk-footer-col mhk-footer-branding">
                    <?php mhk_the_theme_logo( 'footer' ); ?>
                    <p class="mhk-footer-description">
                        MHK Technical Services is a premier provider of comprehensive electro-mechanical, HVAC, plumbing, tiling, carpentry, and facility maintenance solutions across Dubai and the United Arab Emirates.
                    </p>
                    <div style="margin-top: 10px;">
                        <span class="mhk-topbar-badge">✓ ISO & UAE Certified Standards</span>
                    </div>
                </div>

                <!-- Column 2: Navigation Links -->
                <div class="mhk-footer-col">
                    <h4 class="mhk-footer-title">Quick Links</h4>
                    <?php
                    wp_nav_menu( [
                        'theme_location' => 'footer',
                        'menu_class'     => 'mhk-footer-links',
                        'container'      => false,
                        'fallback_cb'    => 'mhk_fallback_footer_menu',
                        'depth'          => 1,
                    ] );
                    ?>
                </div>

                <!-- Column 3: Specialized Services -->
                <div class="mhk-footer-col">
                    <h4 class="mhk-footer-title">Our Services</h4>
                    <ul class="mhk-footer-links">
                        <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">AC &amp; Air Filtration Systems</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Electromechanical Maintenance</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Floor &amp; Wall Tiling Works</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Carpentry &amp; Wood Flooring</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">False Ceilings &amp; Partitions</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Plumbing &amp; Sanitary Repairs</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact Information -->
                <div class="mhk-footer-col">
                    <h4 class="mhk-footer-title">Contact Us</h4>
                    <div class="mhk-footer-contact-item">
                        <span>📍</span>
                        <span><strong>Address:</strong> Prime Business Center, Dubai, United Arab Emirates</span>
                    </div>
                    <div class="mhk-footer-contact-item">
                        <span>📞</span>
                        <span><strong>Phone:</strong> <a href="tel:+97141234567">+971 4 123 4567</a></span>
                    </div>
                    <div class="mhk-footer-contact-item">
                        <span>✉️</span>
                        <span><strong>Email:</strong> <a href="mailto:info@mhktechnicalservices.com">info@mhktechnicalservices.com</a></span>
                    </div>
                    <div class="mhk-footer-contact-item">
                        <span>🕒</span>
                        <span><strong>Working Hours:</strong> Sat – Thu: 8:00 AM – 7:00 PM</span>
                    </div>
                </div>

            </div>

            <!-- Bottom Bar: Copyright & Policy -->
            <div class="mhk-footer-bottom">
                <div>
                    &copy; <?php echo esc_html( date( 'Y' ) ); ?> <strong>MHK Technical Services</strong>. All rights reserved.
                </div>
                <div>
                    Built with excellence for commercial and residential technical services.
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
