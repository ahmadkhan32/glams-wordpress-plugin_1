<?php
/**
 * Template Name: GLAMS Live React App (Vercel Experience)
 * Description: Renders the 100% exact Single Page Application experience matching https://react-app-nu-one-90.vercel.app/
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div id="glams-root">
  <!-- Server-Side Rendered (SSR) Fallback -->
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
</div>

<?php
get_footer();
