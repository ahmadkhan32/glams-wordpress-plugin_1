<?php
/**
 * Register widget area.
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

function glams_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Main Sidebar', 'glams-theme' ),
        'id'            => 'sidebar-main',
        'description'   => __( 'Appears on standard pages and blog posts.', 'glams-theme' ),
        'before_widget' => '<div id="%1$s" class="glams-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="glams-widget-title">',
        'after_title'   => '</h3>',
    ] );

    register_sidebar( [
        'name'          => __( 'Footer Column 1', 'glams-theme' ),
        'id'            => 'footer-col-1',
        'description'   => __( 'First column in site footer.', 'glams-theme' ),
        'before_widget' => '<div id="%1$s" class="glams-footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ] );

    register_sidebar( [
        'name'          => __( 'Footer Column 2', 'glams-theme' ),
        'id'            => 'footer-col-2',
        'description'   => __( 'Second column in site footer.', 'glams-theme' ),
        'before_widget' => '<div id="%1$s" class="glams-footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ] );

    register_sidebar( [
        'name'          => __( 'Footer Column 3', 'glams-theme' ),
        'id'            => 'footer-col-3',
        'description'   => __( 'Third column in site footer.', 'glams-theme' ),
        'before_widget' => '<div id="%1$s" class="glams-footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ] );
}
add_action( 'widgets_init', 'glams_widgets_init' );
