<?php
/**
 * The main template file
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="glams-page-hero">
  <div class="glams-container">
    <h1 class="glams-page-title">
      <?php
      if ( is_home() && ! is_front_page() ) {
          single_post_title();
      } else {
          bloginfo( 'name' );
      }
      ?>
    </h1>
    <p class="glams-page-desc"><?php bloginfo( 'description' ); ?></p>
  </div>
</div>

<div class="glams-container glams-content-area glams-section">
  <div class="glams-layout-with-sidebar">
    <div class="glams-main-column">
      <?php if ( have_posts() ) : ?>
        <div class="glams-posts-grid">
          <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'glams-post-card' ); ?>>
              <?php if ( has_post_thumbnail() ) : ?>
                <div class="glams-post-thumb">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'glams-card' ); ?>
                  </a>
                </div>
              <?php endif; ?>

              <div class="glams-post-body">
                <div class="glams-post-meta">
                  <span class="glams-post-date"><i class="fa-regular fa-calendar"></i> <?php echo get_the_date(); ?></span>
                  <span class="glams-post-author"><i class="fa-regular fa-user"></i> <?php the_author(); ?></span>
                </div>

                <h2 class="glams-post-title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>

                <div class="glams-post-excerpt">
                  <?php the_excerpt(); ?>
                </div>

                <a href="<?php the_permalink(); ?>" class="glams-btn glams-btn-outline glams-btn-sm">
                  <span><?php esc_html_e( 'Read Article', 'glams-theme' ); ?></span>
                  <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            </article>
          <?php endwhile; ?>
        </div>

        <div class="glams-pagination">
          <?php the_posts_pagination( [
              'prev_text' => '<i class="fa-solid fa-chevron-left"></i> Previous',
              'next_text' => 'Next <i class="fa-solid fa-chevron-right"></i>',
          ] ); ?>
        </div>
      <?php else : ?>
        <p><?php esc_html_e( 'No posts found.', 'glams-theme' ); ?></p>
      <?php endif; ?>
    </div>

    <?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
      <aside class="glams-sidebar-column">
        <?php dynamic_sidebar( 'sidebar-main' ); ?>
      </aside>
    <?php endif; ?>
  </div>
</div>

<?php
get_footer();
