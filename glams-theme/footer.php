<?php
/**
 * The Footer template for GLAMS Theme
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

$whatsapp = get_theme_mod( 'glams_whatsapp', '+971 50 123 4567' );
$clean_wa = preg_replace( '/[^0-9]/', '', $whatsapp );
?>
  </main><!-- #primary-content -->

  <?php get_template_part( 'template-parts/footer/site-footer' ); ?>

</div><!-- #page -->

<!-- Floating WhatsApp Action Button -->
<a href="https://wa.me/<?php echo esc_attr( $clean_wa ); ?>?text=Hello%20MHK%20Technical%20Services,%20I%20would%20like%20to%20inquire%20about%20your%20services."
   class="glams-whatsapp-fab"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="<?php esc_attr_e( 'Chat with us on WhatsApp', 'glams-theme' ); ?>">
  <i class="fa-brands fa-whatsapp"></i>
  <span class="glams-fab-tooltip"><?php esc_html_e( 'Quick WhatsApp Quote', 'glams-theme' ); ?></span>
</a>

<!-- Back to Top Button -->
<button type="button" class="glams-back-to-top" aria-label="<?php esc_attr_e( 'Back to top of page', 'glams-theme' ); ?>">
  <i class="fa-solid fa-arrow-up"></i>
</button>

<?php wp_footer(); ?>
</body>
</html>
