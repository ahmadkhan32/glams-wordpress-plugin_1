<?php
/**
 * Template for displaying all single posts
 *
 * @package MHK_Technical_Services_Theme
 */

get_header();
?>

<main id="primary" class="mhk-site-main">
    <div class="mhk-container" style="max-width: 900px;">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'mhk-article' ); ?>>
                <header class="mhk-entry-header">
                    <span class="mhk-badge" style="background: var(--mhk-primary-light); color: var(--mhk-primary-dark); border-color: rgba(43, 179, 2, 0.2);">
                        <?php
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo esc_html( $categories[0]->name );
                        } else {
                            echo 'Technical Insights';
                        }
                        ?>
                    </span>
                    <h1 class="mhk-page-title" style="margin-top: 14px;"><?php the_title(); ?></h1>
                    
                    <div class="mhk-entry-meta">
                        <span>📅 <?php echo esc_html( get_the_date() ); ?></span>
                        <span>👤 Written by <?php the_author(); ?></span>
                        <?php if ( comments_open() ) : ?>
                            <span>💬 <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
                        <?php endif; ?>
                    </div>
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

                <footer class="mhk-entry-footer" style="margin-top: 40px; padding-top: 24px; border-top: 1px solid var(--mhk-border);">
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: gap; gap: 16px;">
                        <div style="font-size: 0.875rem; color: var(--mhk-text-muted);">
                            <?php the_tags( '<strong>Tags:</strong> ', ', ', '' ); ?>
                        </div>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mhk-btn mhk-btn-outline" style="padding: 6px 14px; font-size: 0.875rem;">
                            &larr; Back to Articles
                        </a>
                    </div>
                </footer>

                <?php
                the_post_navigation( [
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'mhk-technical-services' ) . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'mhk-technical-services' ) . '</span> <span class="nav-title">%title</span>',
                ] );
                ?>

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
