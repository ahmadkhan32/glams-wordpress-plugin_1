<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package MHK_Technical_Services_Theme
 */

get_header();
?>

<main id="primary" class="mhk-site-main">
    <div class="mhk-container">
        <div class="mhk-error-404">
            <div class="mhk-404-number">404</div>
            <h1 class="mhk-404-title"><?php esc_html_e( 'Page Not Found', 'mhk-technical-services' ); ?></h1>
            <p class="mhk-404-text">
                <?php esc_html_e( 'The page or technical service document you are looking for might have been moved, renamed, or is temporarily unavailable.', 'mhk-technical-services' ); ?>
            </p>

            <div style="margin-bottom: 30px;">
                <?php get_search_form(); ?>
            </div>

            <div>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mhk-btn mhk-btn-primary">
                    &larr; <?php esc_html_e( 'Return to Homepage', 'mhk-technical-services' ); ?>
                </a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
