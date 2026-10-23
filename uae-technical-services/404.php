<?php
/**
 * 404 Error Template
 *
 * @package UAE_Technical_Services
 */

get_header();
?>

<main id="primary" class="site-main page-content-wrap">
    <div class="container">
        <div class="card error-404-container">
            <div class="error-code">404</div>
            <h1 style="font-size: 2rem; color: var(--color-primary); margin-bottom: 14px;">
                <?php esc_html_e( 'Page Not Found', 'uae-technical-services' ); ?>
            </h1>
            <p style="color: var(--color-secondary-text); font-size: 1.0625rem; margin-bottom: 30px;">
                <?php esc_html_e( 'The page or technical service document you are searching for does not exist or has been relocated.', 'uae-technical-services' ); ?>
            </p>

            <div style="margin-bottom: 28px;">
                <?php get_search_form(); ?>
            </div>

            <div>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                    <i class="fas fa-home"></i> <?php esc_html_e( 'Return to Homepage', 'uae-technical-services' ); ?>
                </a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
