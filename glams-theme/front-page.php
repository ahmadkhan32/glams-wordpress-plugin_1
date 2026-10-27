<?php
/**
 * The Front Page Template
 * Matches the complete GLAMS React Vercel application experience
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php get_template_part( 'template-parts/sections/hero' ); ?>

<?php get_template_part( 'template-parts/sections/services' ); ?>

<?php get_template_part( 'template-parts/sections/license-lookup' ); ?>

<?php get_template_part( 'template-parts/sections/immigration' ); ?>

<?php get_template_part( 'template-parts/sections/why-us' ); ?>

<?php get_template_part( 'template-parts/sections/process' ); ?>

<?php get_template_part( 'template-parts/sections/testimonials' ); ?>

<?php get_template_part( 'template-parts/sections/faq' ); ?>

<?php get_template_part( 'template-parts/sections/contact' ); ?>

<?php get_template_part( 'template-parts/sections/cta' ); ?>

<?php
get_footer();
