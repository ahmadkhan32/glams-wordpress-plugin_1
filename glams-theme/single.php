<?php
/**
 * The single post template
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="glams-page-hero">
    <div class="glams-container">
      <div class="glams-post-meta glams-post-meta-hero">
        <span><i class="fa-regular fa-calendar"></i> <?php echo get_the_date(); ?></span>
        <span><i class="fa-regular fa-user"></i> <?php the_author(); ?></span>
        <?php if ( has_category() ) : ?>
          <span><i class="fa-regular fa-folder"></i> <?php the_category( ', ' ); ?></span>
        <?php endif; ?>
      </div>
      <h1 class="glams-page-title"><?php the_title(); ?></h1>
    </div>
  </div>

  <div class="glams-container glams-content-area glams-section">
    <div class="glams-layout-with-sidebar">
      <article id="post-<?php the_ID(); ?>" <?php post_class( 'glams-main-column glams-single-post' ); ?>>
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="glams-single-featured-image">
            <?php the_post_thumbnail( 'glams-hero' ); ?>
          </div>
        <?php endif; ?>

        <div class="glams-entry-content">
          <?php the_content(); ?>
          <?php
          wp_link_pages( [
              'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'glams-theme' ),
              'after'  => '</div>',
          ] );
          ?>
        </div>

        <?php if ( has_tag() ) : ?>
          <div class="glams-post-tags">
            <i class="fa-solid fa-tags"></i>
            <?php the_tags( '', ', ', '' ); ?>
          </div>
        <?php endif; ?>

        <div class="glams-post-nav">
          <div class="nav-prev"><?php previous_post_link( '%link', '<i class="fa-solid fa-arrow-left"></i> %title' ); ?></div>
          <div class="nav-next"><?php next_post_link( '%link', '%title <i class="fa-solid fa-arrow-right"></i>' ); ?></div>
        </div>

        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>
      </article>

      <?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
        <aside class="glams-sidebar-column">
          <?php dynamic_sidebar( 'sidebar-main' ); ?>
        </aside>
      <?php endif; ?>
    </div>
  </div>
<?php endwhile; ?>

<?php
get_footer();
