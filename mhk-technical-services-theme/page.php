<?php
/**
 * Template for displaying all pages
 *
 * @package MHK_Technical_Services_Theme
 */

get_header();
?>

<main id="primary" class="mhk-site-main">
    <div class="mhk-container">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="page-<?php the_ID(); ?>" <?php post_class( 'mhk-article' ); ?>>
                <header class="mhk-entry-header">
                    <h1 class="mhk-page-title"><?php the_title(); ?></h1>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="mhk-entry-featured-image">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <div class="mhk-entry-content">
                    <?php
                    the_content();

                    wp_link_pages( [
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mhk-technical-services' ),
                        'after'  => '</div>',
                    ] );
                    ?>
                </div>

                <?php if ( comments_open() || get_comments_number() ) : ?>
                    <div class="mhk-comments-area" style="margin-top: 40px; padding-top: 30px; border-top: 1px solid var(--mhk-border);">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
