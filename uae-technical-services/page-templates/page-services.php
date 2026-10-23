<?php
/**
 * Template Name: Services Catalog
 * Description: Complete overview of all technical and corporate services.
 *
 * @package UAE_Technical_Services
 */

get_header();
?>

<div class="page-hero">
    <div class="container">
        <span class="badge-gold">Commercial &amp; Residential</span>
        <h1>Comprehensive Technical &amp; PRO Services</h1>
        <p>Licensed MEP engineering, HVAC installation, building maintenance, and government documentation.</p>
    </div>
</div>

<main id="primary" class="site-main page-content-wrap">
    <?php
    get_template_part( 'template-parts/sections/services' );
    get_template_part( 'template-parts/sections/process' );
    get_template_part( 'template-parts/sections/why-choose-us' );
    get_template_part( 'template-parts/sections/contact-cta' );
    ?>
</main>

<?php
get_footer();
