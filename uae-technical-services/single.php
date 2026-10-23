<?php
/**
 * Single Blog Post Template
 *
 * @package UAE_Technical_Services
 */

get_header();

while ( have_posts() ) :
    the_post();
    ?>
    <div class="page-hero">
        <div class="container">
            <span class="badge-gold">
                <?php
                $cats = get_the_category();
                echo ! empty( $cats ) ? esc_html( $cats[0]->name ) : 'Technical Services';
                ?>
            </span>
            <h1><?php the_title(); ?></h1>
            <p>Published on <?php echo esc_html( get_the_date() ); ?> by <?php the_author(); ?></p>
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
                    <?php the_content(); ?>
                </div>

                <div style="margin-top: 36px; padding-top: 20px; border-top: 1px solid var(--color-border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
                    <div><?php the_tags( '<strong>Tags:</strong> ', ', ', '' ); ?></div>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-outline" style="color: var(--color-accent) !important; border-color: var(--color-border); padding: 6px 14px; font-size: 0.875rem;">
                        &larr; Back to Home
                    </a>
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
