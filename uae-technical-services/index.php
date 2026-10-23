<?php
/**
 * Main Fallback Template File
 *
 * @package UAE_Technical_Services
 */

get_header();
?>

<div class="page-hero">
    <div class="container">
        <span class="badge-gold">Engineering &amp; Insights</span>
        <h1><?php esc_html_e( 'Latest News & Technical Articles', 'uae-technical-services' ); ?></h1>
        <p><?php esc_html_e( 'Expert maintenance advice and regulatory updates across the UAE.', 'uae-technical-services' ); ?></p>
    </div>
</div>

<main id="primary" class="site-main page-content-wrap">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <div class="services-grid" style="margin-bottom: 50px;">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'card service-card' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div style="aspect-ratio: 16/9; overflow: hidden; border-radius: var(--radius-md); margin-bottom: 16px;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'uae-card', [ 'style' => 'width:100%; height:100%; object-fit:cover;' ] ); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div style="font-size: 0.8125rem; color: var(--color-text-muted); margin-bottom: 8px;">
                            <span>📅 <?php echo esc_html( get_the_date() ); ?></span> • <span>👤 <?php the_author(); ?></span>
                        </div>

                        <h3 class="service-title">
                            <a href="<?php the_permalink(); ?>" style="color: var(--color-primary);"><?php the_title(); ?></a>
                        </h3>

                        <div class="service-desc">
                            <?php the_excerpt(); ?>
                        </div>

                        <div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="color: var(--color-accent) !important; border-color: var(--color-border); padding: 6px 14px; font-size: 0.875rem;">
                                Read Article &rarr;
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <?php
            the_posts_pagination( [
                'mid_size'  => 2,
                'prev_text' => __( '&larr; Previous', 'uae-technical-services' ),
                'next_text' => __( 'Next &rarr;', 'uae-technical-services' ),
            ] );
            ?>

        <?php else : ?>
            <div class="content-box" style="text-align: center;">
                <h2><?php esc_html_e( 'No Articles Found', 'uae-technical-services' ); ?></h2>
                <p><?php esc_html_e( 'Check back soon for new articles.', 'uae-technical-services' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
