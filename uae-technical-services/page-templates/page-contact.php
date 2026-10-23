<?php
/**
 * Template Name: Contact Us
 * Description: Interactive contact page with inquiry form and office details.
 *
 * @package UAE_Technical_Services
 */

get_header();
?>

<div class="page-hero">
    <div class="container">
        <span class="badge-gold">Get in Touch</span>
        <h1>Contact Our UAE Engineering Team</h1>
        <p>Available 24/7 across all Emirates for emergency support, quotes, and project discussions.</p>
    </div>
</div>

<main id="primary" class="site-main page-content-wrap">
    <?php
    get_template_part( 'template-parts/sections/contact-form' );
    get_template_part( 'template-parts/sections/faq' );
    ?>
</main>

<?php
get_footer();
