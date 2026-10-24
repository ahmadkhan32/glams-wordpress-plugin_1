<?php
/**
 * Template Part: Contact Form and Information Grid
 *
 * @package UAE_Technical_Services
 */

defined( 'ABSPATH' ) || exit;
?>

<section id="contact" style="padding: 80px 0 100px; background-color: var(--color-background);" aria-label="Contact Form">
    <div class="container">
        <div class="section-header">
            <span class="badge-gold">Get in Touch</span>
            <h2>Contact Our Engineering Team</h2>
            <p>We are available 24/7 across the UAE. Submit your query below and receive a detailed response within 2 hours.</p>
            <div class="section-divider"></div>
        </div>

        <div class="contact-grid">
            <!-- Contact Info Box -->
            <div class="card" style="padding: 36px 30px;">
                <h3 style="font-size: 1.35rem; margin-bottom: 24px; color: var(--color-primary);">Direct Office Information</h3>

                <div class="footer-contact-item" style="color: var(--color-secondary-text); margin-bottom: 20px;">
                    <i class="fas fa-map-marker-alt" style="font-size: 1.25rem; color: var(--color-accent);"></i>
                    <div>
                        <strong style="color: var(--color-primary); font-size: 1rem;">Main Headquarters:</strong><br>
                        Al tawar near qusais metro station, Dubai, UAE
                    </div>
                </div>

                <div class="footer-contact-item" style="color: var(--color-secondary-text); margin-bottom: 20px;">
                    <i class="fab fa-whatsapp" style="font-size: 1.25rem; color: #25D366;"></i>
                    <div>
                        <strong style="color: var(--color-primary); font-size: 1rem;">Phone &amp; WhatsApp:</strong><br>
                        <a href="tel:+971582166143" style="color: var(--color-primary);">+971 58 216 6143</a><br>
                        <a href="https://wa.me/971582166143" target="_blank" rel="noopener" style="color: #25D366; font-weight: 600;">+971 58 216 6143 (WhatsApp)</a>
                    </div>
                </div>

                <div class="footer-contact-item" style="color: var(--color-secondary-text); margin-bottom: 20px;">
                    <i class="fas fa-envelope" style="font-size: 1.25rem; color: var(--color-accent);"></i>
                    <div>
                        <strong style="color: var(--color-primary); font-size: 1rem;">Official Email:</strong><br>
                        <a href="mailto:Ummibangash@gmail.com" style="color: var(--color-primary);">Ummibangash@gmail.com</a>
                    </div>
                </div>

                <div style="border-top: 1px solid var(--color-border); padding-top: 20px; margin-top: 24px;">
                    <span class="badge-green">✓ Rapid Support: Average Response &lt; 2h</span>
                </div>
            </div>

            <!-- Inquiry Form -->
            <div class="card" style="padding: 36px 30px;">
                <form id="uae-inquiry-form" method="post">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group">
                            <label for="uae-name">Full Name *</label>
                            <input type="text" id="uae-name" class="form-control" placeholder="e.g. Ahmed Al Mansoori" required />
                        </div>
                        <div class="form-group">
                            <label for="uae-phone">Phone Number *</label>
                            <input type="tel" id="uae-phone" class="form-control" placeholder="+971 58 216 6143" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="uae-email">Email Address *</label>
                        <input type="email" id="uae-email" class="form-control" placeholder="name@company.com" required />
                    </div>

                    <div class="form-group">
                        <label for="uae-service">Service Required *</label>
                        <select id="uae-service" class="form-control" required>
                            <option value="">-- Please Select Service --</option>
                            <option value="ac">Air Conditioning &amp; HVAC Systems</option>
                            <option value="electromechanical">Electromechanical Maintenance</option>
                            <option value="tiling">Floor &amp; Wall Tiling</option>
                            <option value="carpentry">Carpentry &amp; Wood Flooring</option>
                            <option value="partitions">False Ceilings &amp; Light Partitions</option>
                            <option value="plumbing">Sanitary Installation &amp; Repairs</option>
                            <option value="visa">Visa Assistance</option>
                            <option value="document">Document Clearing &amp; PRO</option>
                            <option value="business">Business Setup in UAE</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="uae-message">Project Details / Message</label>
                        <textarea id="uae-message" class="form-control" rows="4" placeholder="Describe your site location, scope of work, or service requirements..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px;">
                        <i class="fas fa-paper-plane"></i> Submit Service Inquiry
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
