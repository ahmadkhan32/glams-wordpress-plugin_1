<?php
/**
 * Template for displaying archive pages
 *
 * @package MHK_Technical_Services_Theme
 */

get_header();
?>

<main id="primary" class="mhk-site-main">
    <div class="mhk-container">
        <header class="mhk-page-header">
            <?php
            the_archive_title( '<h1 class="mhk-page-title">', '</h1>' );
            the_archive_description( '<div class="mhk-page-description">', '</div>' );
            ?>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="mhk-posts-grid">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'mhk-card' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="mhk-card-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium_large' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="mhk-card-body">
                            <div class="mhk-card-meta">
                                <span>📅 <?php echo esc_html( get_the_date() ); ?></span>
                                <span>👤 <?php the_author(); ?></span>
                            </div>

                            <h3 class="mhk-card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <div class="mhk-card-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <div class="mhk-card-footer">
                                <a href="<?php the_permalink(); ?>" class="mhk-btn mhk-btn-outline" style="padding: 6px 14px; font-size: 0.875rem;">
                                    Read Article &rarr;
                                </a>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <!-- Pagination -->
            <div style="margin-bottom: 50px;">
                <?php
                the_posts_pagination( [
                    'mid_size'  => 2,
                    'prev_text' => __( '&larr; Previous', 'mhk-technical-services' ),
                    'next_text' => __( 'Next &rarr;', 'mhk-technical-services' ),
                ] );
                ?>
            </div>

        <?php else : ?>
            <div class="mhk-card" style="padding: 40px; text-align: center;">
                <h3><?php esc_html_e( 'No Entries Found', 'mhk-technical-services' ); ?></h3>
                <p style="color: var(--mhk-text-muted); margin-top: 10px;">
                    <?php esc_html_e( 'No posts were found in this archive.', 'mhk-technical-services' ); ?>
                </p>
                <div style="margin-top: 20px;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mhk-btn mhk-btn-primary">
                        Return to Homepage
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
