<?php
defined( 'ABSPATH' ) || exit;

class GLAMS_CPT {
    public static function init() {
        add_action( 'init', [ __CLASS__, 'register' ] );
    }

    public static function register() {
        /* GLAMS Page CPT (for React router pages) */
        register_post_type( 'glams_page', [
            'labels'      => [ 'name' => 'GLAMS Pages', 'singular_name' => 'GLAMS Page' ],
            'public'      => true,
            'has_archive' => false,
            'show_in_rest'=> true,
            'supports'    => [ 'title', 'editor', 'thumbnail' ],
            'menu_icon'   => 'dashicons-admin-page',
        ] );

        /* GLAMS Service CPT */
        register_post_type( 'glams_service', [
            'labels'       => [ 'name' => 'Services', 'singular_name' => 'Service' ],
            'public'       => true,
            'show_in_rest' => true,
            'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
            'menu_icon'    => 'dashicons-hammer',
            'show_in_menu' => 'glams-dashboard',
        ] );

        /* GLAMS Testimonial CPT */
        register_post_type( 'glams_testimonial', [
            'labels'       => [ 'name' => 'Testimonials', 'singular_name' => 'Testimonial' ],
            'public'       => false,
            'show_in_rest' => true,
            'supports'     => [ 'title', 'editor' ],
            'show_in_menu' => 'glams-dashboard',
        ] );
    }
}
