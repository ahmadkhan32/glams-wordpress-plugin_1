<?php
/**
 * The standard page template
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="glams-page-hero">
    <div class="glams-container">
      <h1 class="glams-page-title"><?php the_title(); ?></h1>
      <?php if ( has_excerpt() ) : ?>
        <p class="glams-page-desc"><?php echo get_the_excerpt(); ?></p>
      <?php endif; ?>
    </div>
  </div>

  <div class="glams-container glams-content-area glams-section">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'glams-article-wrap' ); ?>>
      <div class="glams-entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages( [
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'glams-theme' ),
            'after'  => '</div>',
        ] );
        ?>
      </div>
    </article>
  </div>
<?php endwhile; ?>

<?php
get_footer();
