<?php
/**
 * GLAMS – Services Page Asset Enqueue
 * MOHAMMAD HAYAT TECHNICAL SERVICES L.L.C
 *
 * Add this hook to your theme's functions.php or to the GLAMS plugin's glams.php.
 * It loads services.css + services.js ONLY on the Services page template.
 */

/**
 * Enqueue services page assets conditionally.
 */
function glams_services_assets() {
    // Only load on the services page template
    if ( ! is_page_template( 'page-services.php' ) ) {
        return;
    }

    // Services CSS
    wp_enqueue_style(
        'glams-services',
        GLAMS_ASSETS . 'css/services.css',
        [],
        GLAMS_VERSION
    );

    // Font Awesome (if not already loaded globally)
    if ( ! wp_style_is( 'font-awesome', 'enqueued' ) ) {
        wp_enqueue_style(
            'font-awesome',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
            [],
            '6.5.0'
        );
    }

    // Services JS
    wp_enqueue_script(
        'glams-services',
        GLAMS_ASSETS . 'js/services.js',
        [],          // no dependencies — pure vanilla JS
        GLAMS_VERSION,
        true         // load in footer
    );
}
add_action( 'wp_enqueue_scripts', 'glams_services_assets' );


/**
 * Register the Services page template so WordPress recognises it.
 * This allows editors to select "Services" from the Page Attributes dropdown.
 */
function glams_register_services_template( $templates ) {
    $templates['template-parts/services/page-services.php'] = __( 'Services', 'glams' );
    return $templates;
}
add_filter( 'theme_page_templates', 'glams_register_services_template' );


/**
 * Load the GLAMS services template from the plugin when the page template
 * "page-services.php" is selected — so the theme doesn't need to contain it.
 */
function glams_load_services_template( $template ) {
    if ( is_page_template( 'page-services.php' ) ) {
        $plugin_template = GLAMS_DIR . 'template-parts/services/page-services.php';
        if ( file_exists( $plugin_template ) ) {
            return $plugin_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'glams_load_services_template' );
