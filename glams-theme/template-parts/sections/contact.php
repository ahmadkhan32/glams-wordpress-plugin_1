<?php
/**
 * Contact & Quote Request Form Section
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$phone     = get_theme_mod( 'glams_phone', '+971 58 216 6143' );
$whatsapp  = get_theme_mod( 'glams_whatsapp', '971582166143' );
$email     = get_theme_mod( 'glams_email', 'Ummibangash@gmail.com' );
$address   = get_theme_mod( 'glams_address', 'Al tawar near qusais metro station, Dubai, United Arab Emirates' );
$hours     = get_theme_mod( 'glams_hours', 'Mon – Sat: 8:00 AM – 8:00 PM | Sun: Emergency Support' );
$clean_tel = preg_replace( '/[^0-9+]/', '', $phone );
$clean_wa  = preg_replace( '/[^0-9]/', '', $whatsapp );
$services  = glams_get_official_services();
?>

<section class="glams-section glams-contact-section" id="contact">
  <div class="glams-container">
    <div class="glams-section-head text-center">
      <div class="glams-section-tag">
        <i class="fa-solid fa-headset"></i>
        <span><?php esc_html_e( 'Get in Touch', 'glams-theme' ); ?></span>
      </div>
      <h2 class="glams-section-title">
        <?php esc_html_e( 'Request a Free Technical Quote & Site Visit', 'glams-theme' ); ?>
      </h2>
      <p class="glams-section-sub">
        <?php esc_html_e( 'Fill out our inquiry form or contact our Dubai operations desk directly for swift technical dispatch.', 'glams-theme' ); ?>
      </p>
    </div>

    <div class="glams-contact-grid">
      <!-- Contact Details -->
      <div class="glams-contact-info-col">
        <div class="glams-contact-card">
          <h3><?php esc_html_e( 'Direct Operations Desk', 'glams-theme' ); ?></h3>
          <p class="glams-contact-lead">
            <?php esc_html_e( 'Our engineering project managers are ready to assist with your residential, commercial, or industrial project.', 'glams-theme' ); ?>
          </p>

          <ul class="glams-contact-details-list">
            <li>
              <div class="glams-c-icon"><i class="fa-solid fa-location-dot"></i></div>
              <div>
                <strong><?php esc_html_e( 'Headquarters Location', 'glams-theme' ); ?></strong>
                <p><?php echo esc_html( $address ); ?></p>
              </div>
            </li>
            <li>
              <div class="glams-c-icon"><i class="fa-solid fa-phone"></i></div>
              <div>
                <strong><?php esc_html_e( 'Phone Inquiries', 'glams-theme' ); ?></strong>
                <p><a href="tel:<?php echo esc_attr( $clean_tel ); ?>"><?php echo esc_html( $phone ); ?></a></p>
              </div>
            </li>
            <li>
              <div class="glams-c-icon"><i class="fa-solid fa-envelope"></i></div>
              <div>
                <strong><?php esc_html_e( 'Official Email', 'glams-theme' ); ?></strong>
                <p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
              </div>
            </li>
            <li>
              <div class="glams-c-icon"><i class="fa-solid fa-clock"></i></div>
              <div>
                <strong><?php esc_html_e( 'Operational Hours', 'glams-theme' ); ?></strong>
                <p><?php echo esc_html( $hours ); ?></p>
              </div>
            </li>
          </ul>

          <div class="glams-wa-direct-banner">
            <div class="glams-wa-banner-icon"><i class="fa-brands fa-whatsapp"></i></div>
            <div class="glams-wa-banner-text">
              <strong><?php esc_html_e( 'Instant WhatsApp Support', 'glams-theme' ); ?></strong>
              <p><?php esc_html_e( 'Average response time under 5 minutes.', 'glams-theme' ); ?></p>
            </div>
            <a href="https://wa.me/<?php echo esc_attr( $clean_wa ); ?>" target="_blank" rel="noopener noreferrer" class="glams-btn glams-btn-accent glams-btn-sm">
              <span><?php esc_html_e( 'Chat Now', 'glams-theme' ); ?></span>
            </a>
          </div>
        </div>
      </div>

      <!-- Quote Request Form -->
      <div class="glams-contact-form-col">
        <div class="glams-form-wrap">
          <h3 class="glams-form-title"><?php esc_html_e( 'Request a Proposal', 'glams-theme' ); ?></h3>
          <p class="glams-form-sub"><?php esc_html_e( 'Submit your inquiry details below for an accurate scope estimation.', 'glams-theme' ); ?></p>

          <form id="glamsQuoteForm" class="glams-quote-form" method="post">
            <div class="glams-form-response" style="display: none;" role="alert"></div>

            <div class="glams-form-row">
              <div class="glams-form-group">
                <label for="glams_name"><?php esc_html_e( 'Full Name *', 'glams-theme' ); ?></label>
                <input type="text" id="glams_name" name="name" required placeholder="<?php esc_attr_e( 'e.g. Mohammed Al Rashid', 'glams-theme' ); ?>">
              </div>
              <div class="glams-form-group">
                <label for="glams_phone"><?php esc_html_e( 'Phone Number (UAE) *', 'glams-theme' ); ?></label>
                <input type="tel" id="glams_phone" name="phone" required placeholder="<?php esc_attr_e( '+971 50 123 4567', 'glams-theme' ); ?>">
              </div>
            </div>

            <div class="glams-form-row">
              <div class="glams-form-group">
                <label for="glams_email"><?php esc_html_e( 'Email Address', 'glams-theme' ); ?></label>
                <input type="email" id="glams_email" name="email" placeholder="<?php esc_attr_e( 'name@example.com', 'glams-theme' ); ?>">
              </div>
              <div class="glams-form-group">
                <label for="glams_company"><?php esc_html_e( 'Company Name (Optional)', 'glams-theme' ); ?></label>
                <input type="text" id="glams_company" name="company" placeholder="<?php esc_attr_e( 'Your company or property', 'glams-theme' ); ?>">
              </div>
            </div>

            <div class="glams-form-group">
              <label for="glams_service"><?php esc_html_e( 'Service Required *', 'glams-theme' ); ?></label>
              <select id="glams_service" name="service" required>
                <option value=""><?php esc_html_e( '— Select a Technical Service —', 'glams-theme' ); ?></option>
                <?php foreach ( $services as $svc ) : ?>
                  <option value="<?php echo esc_attr( $svc['title'] ); ?>">
                    <?php echo esc_html( $svc['title'] ); ?>
                  </option>
                <?php endforeach; ?>
                <option value="Immigration / Visa Service"><?php esc_html_e( 'Immigration / Visa Service', 'glams-theme' ); ?></option>
                <option value="Annual Maintenance Contract (AMC)"><?php esc_html_e( 'Annual Maintenance Contract (AMC)', 'glams-theme' ); ?></option>
                <option value="Other Service"><?php esc_html_e( 'Other Service / Custom Inquiry', 'glams-theme' ); ?></option>
              </select>
            </div>

            <div class="glams-form-group">
              <label for="glams_message"><?php esc_html_e( 'Project Scope & Requirements', 'glams-theme' ); ?></label>
              <textarea id="glams_message" name="message" rows="4" placeholder="<?php esc_attr_e( 'Describe property location, urgency, scope of work...', 'glams-theme' ); ?>"></textarea>
            </div>

            <button type="submit" class="glams-btn glams-btn-primary glams-btn-lg glams-btn-full">
              <span><?php esc_html_e( 'Send Quote Request', 'glams-theme' ); ?></span>
              <i class="fa-solid fa-paper-plane"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
