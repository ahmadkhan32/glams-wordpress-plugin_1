<?php
/**
 * The template for displaying the Homepage
 *
 * @package UAE_Technical_Services
 */

get_header();
?>

<main id="primary" class="site-main front-page-main">
    <?php
    get_template_part( 'template-parts/sections/hero' );
    get_template_part( 'template-parts/sections/services' );
    get_template_part( 'template-parts/sections/about' );
    get_template_part( 'template-parts/sections/why-choose-us' );
    get_template_part( 'template-parts/sections/process' );
    get_template_part( 'template-parts/sections/testimonials' );
    get_template_part( 'template-parts/sections/faq' );
    get_template_part( 'template-parts/sections/contact-cta' );
    get_template_part( 'template-parts/sections/contact-form' );
    ?>
</main>

<?php
get_footer();
