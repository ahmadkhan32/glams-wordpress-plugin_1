<?php
/**
 * GLAMS Services Page Template
 * Template Name: Services
 * Template Post Type: page
 *
 * Drop this file in your active WordPress theme folder.
 * It loads the GLAMS plugin template parts for the /services page.
 * MOHAMMAD HAYAT TECHNICAL SERVICES L.L.C
 */

get_header(); ?>

<main id="primary" class="site-main services-page" role="main">

    <?php get_template_part( 'template-parts/services/services-hero' ); ?>

    <?php get_template_part( 'template-parts/services/services-grid' ); ?>

    <?php get_template_part( 'template-parts/services/why-choose-us' ); ?>

    <?php get_template_part( 'template-parts/services/service-process' ); ?>

    <?php get_template_part( 'template-parts/services/services-cta' ); ?>

</main>

<?php get_footer(); ?>
