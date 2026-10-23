<?php
/**
 * Standard Page Template
 *
 * @package UAE_Technical_Services
 */

get_header();
?>

<?php
while ( have_posts() ) :
    the_post();
    ?>
    <div class="page-hero">
        <div class="container">
            <span class="badge-gold">MHK Technical Services</span>
            <h1><?php the_title(); ?></h1>
        </div>
    </div>

    <main id="primary" class="site-main page-content-wrap">
        <div class="container" style="max-width: 900px;">
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'content-box' ); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div style="border-radius: var(--radius-md); overflow: hidden; margin-bottom: 28px;">
                        <?php the_post_thumbnail( 'large', [ 'style' => 'width:100%; height:auto;' ] ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content" style="font-size: 1.0625rem; line-height: 1.8;">
                    <?php
                    the_content();

                    wp_link_pages( [
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'uae-technical-services' ),
                        'after'  => '</div>',
                    ] );
                    ?>
                </div>

                <?php if ( comments_open() || get_comments_number() ) : ?>
                    <div style="margin-top: 40px; padding-top: 30px; border-top: 1px solid var(--color-border);">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </article>
        </div>
    </main>
    <?php
endwhile;

get_footer();
