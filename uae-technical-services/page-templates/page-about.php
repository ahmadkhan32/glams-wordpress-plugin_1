<?php
/**
 * Template Name: About Us
 * Description: Dedicated company overview, mission, values, and team presentation.
 *
 * @package UAE_Technical_Services
 */

get_header();
?>

<div class="page-hero">
    <div class="container">
        <span class="badge-gold">About Our Firm</span>
        <h1>Engineering &amp; Technical Services Leaders</h1>
        <p>Providing turn-key technical contracting, building maintenance, and compliance across Dubai and the UAE since 2012.</p>
    </div>
</div>

<main id="primary" class="site-main page-content-wrap">
    <div class="container">
        <?php
        get_template_part( 'template-parts/sections/about' );
        get_template_part( 'template-parts/sections/why-choose-us' );
        get_template_part( 'template-parts/sections/testimonials' );
        get_template_part( 'template-parts/sections/contact-cta' );
        ?>
    </div>
</main>

<?php
get_footer();
