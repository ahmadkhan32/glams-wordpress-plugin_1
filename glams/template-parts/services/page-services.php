<?php
/**
 * Template Name: Services
 * Template Post Type: page
 *
 * GLAMS – MOHAMMAD HAYAT TECHNICAL SERVICES L.L.C
 */

get_header(); ?>

<main id="primary" class="site-main services-page">
    <?php get_template_part( 'template-parts/services/services-hero' ); ?>
    <?php get_template_part( 'template-parts/services/services-grid' ); ?>
    <?php get_template_part( 'template-parts/services/service-details' ); ?>
    <?php get_template_part( 'template-parts/services/why-choose-us' ); ?>
    <?php get_template_part( 'template-parts/services/service-process' ); ?>
    <?php get_template_part( 'template-parts/services/services-cta' ); ?>
</main>

<?php get_footer(); ?>
