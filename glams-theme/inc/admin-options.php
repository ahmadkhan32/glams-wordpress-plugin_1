<?php
/**
 * GLAMS Theme Admin Options & Setup Page
 * Appears under WordPress Admin: Appearance → GLAMS Theme and Appearance → All Pages
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Appearance submenu pages:
 * 1. Appearance → GLAMS Theme (Theme Options & Setup)
 * 2. Appearance → All Pages (Direct Page Directory & Template Inspector)
 */
function glams_add_theme_admin_menu() {
    add_theme_page(
        __( 'GLAMS Theme Setup & Options', 'glams-theme' ),
        __( 'GLAMS Theme', 'glams-theme' ),
        'edit_theme_options',
        'glams-theme-options',
        'glams_render_theme_options_page'
    );

    add_theme_page(
        __( 'All Theme Pages & Service Templates', 'glams-theme' ),
        __( 'All Pages', 'glams-theme' ),
        'edit_theme_options',
        'glams-theme-pages',
        'glams_render_theme_pages_page'
    );
}
add_action( 'admin_menu', 'glams_add_theme_admin_menu' );

/**
 * Handle one-click setup actions (menu generation, page creation, settings save)
 */
function glams_handle_admin_actions() {
    if ( ! isset( $_POST['glams_admin_action'] ) || ! current_user_can( 'edit_theme_options' ) ) {
        return;
    }

    check_admin_referer( 'glams_theme_admin_nonce', 'glams_nonce' );

    $action = sanitize_text_field( wp_unslash( $_POST['glams_admin_action'] ) );

    if ( 'save_settings' === $action ) {
        if ( isset( $_POST['glams_phone'] ) ) {
            set_theme_mod( 'glams_phone', sanitize_text_field( wp_unslash( $_POST['glams_phone'] ) ) );
        }
        if ( isset( $_POST['glams_whatsapp'] ) ) {
            set_theme_mod( 'glams_whatsapp', sanitize_text_field( wp_unslash( $_POST['glams_whatsapp'] ) ) );
        }
        if ( isset( $_POST['glams_email'] ) ) {
            set_theme_mod( 'glams_email', sanitize_email( wp_unslash( $_POST['glams_email'] ) ) );
        }
        if ( isset( $_POST['glams_license_no'] ) ) {
            set_theme_mod( 'glams_license_no', sanitize_text_field( wp_unslash( $_POST['glams_license_no'] ) ) );
        }
        if ( isset( $_POST['glams_address'] ) ) {
            set_theme_mod( 'glams_address', sanitize_textarea_field( wp_unslash( $_POST['glams_address'] ) ) );
        }

        wp_safe_redirect( add_query_arg( [ 'page' => 'glams-theme-options', 'status' => 'saved' ], admin_url( 'themes.php' ) ) );
        exit;
    }

    if ( 'create_menu' === $action ) {
        glams_auto_create_default_menu( true );
        wp_safe_redirect( add_query_arg( [ 'page' => 'glams-theme-options', 'status' => 'menu_created' ], admin_url( 'themes.php' ) ) );
        exit;
    }

    if ( 'create_pages' === $action ) {
        glams_create_default_pages();
        wp_safe_redirect( add_query_arg( [ 'page' => 'glams-theme-options', 'status' => 'pages_created' ], admin_url( 'themes.php' ) ) );
        exit;
    }
}
add_action( 'admin_init', 'glams_handle_admin_actions' );

/**
 * Automatically create and assign the default navigation menu
 * Includes Services dropdown with sub-items from 2026 Flyer Rate List
 */
function glams_auto_create_default_menu( $force = false ) {
    $menu_name = 'GLAMS Primary Navigation';
    $menu_exists = wp_get_nav_menu_object( $menu_name );

    if ( ! $menu_exists || $force ) {
        $menu_id = $menu_exists ? $menu_exists->term_id : wp_create_nav_menu( $menu_name );

        if ( ! is_wp_error( $menu_id ) ) {
            // Remove existing items if forced
            if ( $force && $menu_exists ) {
                $existing_items = wp_get_nav_menu_items( $menu_id );
                if ( ! empty( $existing_items ) ) {
                    foreach ( $existing_items as $item ) {
                        wp_delete_post( $item->ID, true );
                    }
                }
            }

            $home_url = home_url( '/' );

            // 1. Home
            wp_update_nav_menu_item( $menu_id, 0, [
                'menu-item-title'    => 'Home',
                'menu-item-url'      => $home_url . '#home',
                'menu-item-status'   => 'publish',
                'menu-item-type'     => 'custom',
                'menu-item-position' => 1,
            ] );

            // 2. Services (Parent Item for Dropdown)
            $services_item_id = wp_update_nav_menu_item( $menu_id, 0, [
                'menu-item-title'    => 'Services',
                'menu-item-url'      => $home_url . '#services',
                'menu-item-status'   => 'publish',
                'menu-item-type'     => 'custom',
                'menu-item-position' => 2,
            ] );

            // Child items under Services Dropdown (From 2026 Flyer Rate List)
            $cleaning_services = [
                [ 'title' => 'Home Cleaning (from 120 AED)',          'url' => $home_url . '#service-home-cleaning' ],
                [ 'title' => 'Villa Cleaning (from 450 AED)',         'url' => $home_url . '#service-villa-cleaning' ],
                [ 'title' => 'Deep Cleaning (from 250 AED)',          'url' => $home_url . '#service-deep-cleaning' ],
                [ 'title' => 'Sofa & Carpet Cleaning (from 40 AED)',  'url' => $home_url . '#service-sofa-carpet-cleaning' ],
                [ 'title' => 'Kitchen Cleaning (from 150 AED)',       'url' => $home_url . '#service-kitchen-cleaning' ],
                [ 'title' => 'Office Cleaning (from 25 AED/hr)',      'url' => $home_url . '#service-office-cleaning' ],
                [ 'title' => 'Maid Services (from 25 AED/hr)',        'url' => $home_url . '#service-maid-services' ],
                [ 'title' => 'View All Services & 2026 Rates →',     'url' => $home_url . '#services' ],
            ];

            if ( $services_item_id && ! is_wp_error( $services_item_id ) ) {
                $sub_pos = 3;
                foreach ( $cleaning_services as $sub_item ) {
                    wp_update_nav_menu_item( $menu_id, 0, [
                        'menu-item-title'     => $sub_item['title'],
                        'menu-item-url'       => $sub_item['url'],
                        'menu-item-status'    => 'publish',
                        'menu-item-type'      => 'custom',
                        'menu-item-parent-id' => $services_item_id,
                        'menu-item-position'  => $sub_pos++,
                    ] );
                }
            }

            // Remaining Top-Level Navigation Items
            $other_items = [
                [ 'title' => 'DET License',  'url' => $home_url . '#license' ],
                [ 'title' => 'Companies',    'url' => $home_url . '#companies' ],
                [ 'title' => 'Immigration',  'url' => $home_url . '#immigration' ],
                [ 'title' => 'About Us',     'url' => $home_url . '#about' ],
                [ 'title' => 'Contact',      'url' => $home_url . '#contact' ],
            ];

            $order = 15;
            foreach ( $other_items as $item ) {
                wp_update_nav_menu_item( $menu_id, 0, [
                    'menu-item-title'    => $item['title'],
                    'menu-item-url'      => $item['url'],
                    'menu-item-status'   => 'publish',
                    'menu-item-type'     => 'custom',
                    'menu-item-position' => $order++,
                ] );
            }

            // Assign to 'primary' theme location
            $locations = get_theme_mod( 'nav_menu_locations' );
            if ( ! is_array( $locations ) ) {
                $locations = [];
            }
            $locations['primary'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    } else {
        // Ensure assigned
        $locations = get_theme_mod( 'nav_menu_locations' );
        if ( empty( $locations['primary'] ) ) {
            if ( ! is_array( $locations ) ) {
                $locations = [];
            }
            $locations['primary'] = $menu_exists->term_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }
}
add_action( 'after_switch_theme', 'glams_auto_create_default_menu' );

/**
 * Returns definition of all standard pages and templates
 */
function glams_get_default_pages_definition() {
    return [
        [
            'title'    => 'Home',
            'slug'     => 'home',
            'template' => 'front-page.php',
            'is_front' => true,
            'desc'     => 'Main landing page featuring Hero, Trust Badges, Services Dropdown showcase, Rate List 2026, and DET Verification.',
        ],
        [
            'title'    => 'Services & Rate List',
            'slug'     => 'services',
            'template' => 'page-templates/page-services.php',
            'desc'     => 'Complete 2026 Flyer Cleaning Rate List + 11 Licensed UAE Technical Activities.',
        ],
        [
            'title'    => 'License Activities',
            'slug'     => 'license',
            'template' => 'page-templates/page-license.php',
            'desc'     => 'Official DET Commercial License Activities Certificate (DET-2024-001234).',
        ],
        [
            'title'    => 'Companies Directory',
            'slug'     => 'companies',
            'template' => 'page-templates/page-companies.php',
            'desc'     => 'Directory of UAE licensed contracting companies and verified profiles.',
        ],
        [
            'title'    => 'Immigration & Visa',
            'slug'     => 'immigration',
            'template' => 'page-templates/page-immigration.php',
            'desc'     => 'UAE residence, employment, investor, and Golden Visa processing portal.',
        ],
        [
            'title'    => 'About Us',
            'slug'     => 'about',
            'template' => 'page-templates/page-about.php',
            'desc'     => 'Corporate overview, company background, values, and client testimonials.',
        ],
        [
            'title'    => 'Contact & Quote',
            'slug'     => 'contact',
            'template' => 'page-templates/page-contact.php',
            'desc'     => 'Service booking inquiries, location details, direct call & WhatsApp routing.',
        ],
        [
            'title'    => 'Verify License',
            'slug'     => 'verify',
            'template' => 'page-templates/page-verify.php',
            'desc'     => 'Live QR verification & certificate search tool for government validation.',
        ],
    ];
}

/**
 * Create default pages with matching templates
 */
function glams_create_default_pages() {
    $pages = glams_get_default_pages_definition();

    foreach ( $pages as $p ) {
        $existing = get_page_by_path( $p['slug'] );
        if ( ! $existing ) {
            $page_id = wp_insert_post( [
                'post_title'   => $p['title'],
                'post_name'    => $p['slug'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ] );

            if ( $page_id && ! is_wp_error( $page_id ) ) {
                if ( ! empty( $p['template'] ) && 'front-page.php' !== $p['template'] ) {
                    update_post_meta( $page_id, '_wp_page_template', $p['template'] );
                }
                if ( ! empty( $p['is_front'] ) ) {
                    update_option( 'show_on_front', 'page' );
                    update_option( 'page_on_front', $page_id );
                }
            }
        }
    }
}

/**
 * Render the dedicated Appearance → All Pages page
 */
function glams_render_theme_pages_page() {
    glams_render_pages_table_view( true );
}

/**
 * Shared helper to render the pages table under Appearance
 */
function glams_render_pages_table_view( $is_standalone = false ) {
    $defined_pages = glams_get_default_pages_definition();
    ?>
    <div class="wrap glams-admin-wrap" style="max-width: 1100px; margin-top: 20px;">
        <div style="background: linear-gradient(135deg, #0a1c2c 0%, #073F9B 60%, #00843D 100%); color: #fff; padding: 28px 32px; border-radius: 12px; box-shadow: 0 8px 30px rgba(7,63,155,0.18); margin-bottom: 24px;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
                <div>
                    <span style="background: rgba(212,166,74,0.25); border: 1px solid rgba(212,166,74,0.5); color: #D4A64A; padding: 4px 12px; border-radius: 16px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;">
                        Appearance → Theme Pages
                    </span>
                    <h1 style="color: #fff; font-size: 26px; font-weight: 800; margin: 10px 0 6px;">
                        All Website Pages &amp; Service Templates
                    </h1>
                    <p style="color: rgba(255,255,255,0.85); font-size: 14px; margin: 0;">
                        Overview of all published pages, assigned templates, and Services dropdown sub-items.
                    </p>
                </div>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <form method="post" action="" style="display: inline-block;">
                        <?php wp_nonce_field( 'glams_theme_admin_nonce', 'glams_nonce' ); ?>
                        <input type="hidden" name="glams_admin_action" value="create_pages" />
                        <button type="submit" class="button button-hero" style="background: #00843D; border-color: #00843D; color: #fff; font-weight: 700;">
                            <span class="dashicons dashicons-plus-alt2" style="vertical-align: middle; margin-top: -2px;"></span>
                            <?php esc_html_e( 'Auto-Create / Refresh All Pages', 'glams-theme' ); ?>
                        </button>
                    </form>
                    <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" class="button button-hero" style="background: #fff; border-color: #fff; color: #073F9B; font-weight: 700;">
                        <span class="dashicons dashicons-menu" style="vertical-align: middle; margin-top: -2px;"></span>
                        <?php esc_html_e( 'Manage Menus', 'glams-theme' ); ?>
                    </a>
                </div>
            </div>
        </div>

        <div style="background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #E2E8F0; margin-bottom: 24px;">
            <h2 style="font-size: 18px; font-weight: 700; color: #12304A; margin-top: 0; padding-bottom: 12px; border-bottom: 2px solid #E2E8F0;">
                <?php esc_html_e( 'Published Standard Pages', 'glams-theme' ); ?>
            </h2>

            <table class="wp-list-table widefat fixed striped table-view-list" style="margin-top: 14px;">
                <thead>
                    <tr>
                        <th style="width: 25%; font-weight: 700;"><?php esc_html_e( 'Page Title', 'glams-theme' ); ?></th>
                        <th style="width: 15%; font-weight: 700;"><?php esc_html_e( 'Slug / URL', 'glams-theme' ); ?></th>
                        <th style="width: 25%; font-weight: 700;"><?php esc_html_e( 'Assigned Template', 'glams-theme' ); ?></th>
                        <th style="width: 15%; font-weight: 700;"><?php esc_html_e( 'Status', 'glams-theme' ); ?></th>
                        <th style="width: 20%; font-weight: 700;"><?php esc_html_e( 'Actions', 'glams-theme' ); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $defined_pages as $p ) : 
                        $page_obj = get_page_by_path( $p['slug'] );
                        $exists = ! empty( $page_obj );
                        $view_url = $exists ? get_permalink( $page_obj->ID ) : home_url( '/' . ( $p['slug'] === 'home' ? '' : $p['slug'] ) );
                        $edit_url = $exists ? admin_url( 'post.php?post=' . $page_obj->ID . '&action=edit' ) : '';
                    ?>
                        <tr>
                            <td>
                                <strong><?php echo esc_html( $p['title'] ); ?></strong>
                                <?php if ( ! empty( $p['is_front'] ) ) : ?>
                                    <span style="background: #DCEFFF; color: #073F9B; font-size: 10px; font-weight: 700; padding: 2px 6px; border-radius: 4px; margin-left: 6px;">Front Page</span>
                                <?php endif; ?>
                                <p style="margin: 4px 0 0; color: #64748B; font-size: 12px;"><?php echo esc_html( $p['desc'] ); ?></p>
                            </td>
                            <td><code>/<?php echo esc_html( $p['slug'] ); ?></code></td>
                            <td><span style="font-family: monospace; font-size: 12px; color: #073F9B;"><?php echo esc_html( $p['template'] ); ?></span></td>
                            <td>
                                <?php if ( $exists ) : ?>
                                    <span style="display: inline-flex; align-items: center; gap: 5px; color: #00843D; font-weight: 600; font-size: 12.5px;">
                                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #00843D;"></span> Published
                                    </span>
                                <?php else : ?>
                                    <span style="display: inline-flex; align-items: center; gap: 5px; color: #C8102E; font-weight: 600; font-size: 12.5px;">
                                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #C8102E;"></span> Not Created
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo esc_url( $view_url ); ?>" class="button button-small" target="_blank" rel="noopener noreferrer">
                                    <span class="dashicons dashicons-external" style="font-size: 14px; vertical-align: middle;"></span> <?php esc_html_e( 'View', 'glams-theme' ); ?>
                                </a>
                                <?php if ( $exists ) : ?>
                                    <a href="<?php echo esc_url( $edit_url ); ?>" class="button button-small" style="margin-left: 4px;">
                                        <span class="dashicons dashicons-edit" style="font-size: 14px; vertical-align: middle;"></span> <?php esc_html_e( 'Edit', 'glams-theme' ); ?>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Services Dropdown Sub-Items Card -->
        <div style="background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #E2E8F0;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                <h3 style="font-size: 16px; font-weight: 700; color: #12304A; margin: 0;">
                    <span class="dashicons dashicons-menu-alt3" style="color: #073F9B;"></span>
                    <?php esc_html_e( 'Services Dropdown Menu Items (2026 Flyer Rate List)', 'glams-theme' ); ?>
                </h3>
                <form method="post" action="" style="display: inline-block;">
                    <?php wp_nonce_field( 'glams_theme_admin_nonce', 'glams_nonce' ); ?>
                    <input type="hidden" name="glams_admin_action" value="create_menu" />
                    <button type="submit" class="button button-secondary" style="font-weight: 600;">
                        <?php esc_html_e( 'Update / Re-create Primary Menu with Services Dropdown', 'glams-theme' ); ?>
                    </button>
                </form>
            </div>
            <p style="font-size: 13.5px; color: #64748B; margin-bottom: 16px;">
                These 7 service categories appear under the <strong>Services</strong> dropdown in the primary navigation, linking to individual rate sections:
            </p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 14px;">
                <?php
                $cleaning = function_exists( 'glams_get_cleaning_services' ) ? glams_get_cleaning_services() : [];
                foreach ( $cleaning as $c ) :
                ?>
                    <div style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 14px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                            <strong style="color: #073F9B; font-size: 13.5px;"><?php echo esc_html( $c['title'] ); ?></strong>
                            <span style="background: #073F9B; color: #fff; font-size: 11px; font-weight: 700; padding: 2px 7px; border-radius: 10px;">
                                <?php echo esc_html( $c['starting'] ); ?>
                            </span>
                        </div>
                        <p style="font-size: 12px; color: #64748B; margin: 0 0 8px;"><?php echo esc_html( $c['short'] ); ?></p>
                        <code style="font-size: 11px; color: #00843D;">#service-<?php echo esc_html( $c['id'] ); ?></code>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Render the Appearance → GLAMS Theme options page
 */
function glams_render_theme_options_page() {
    $phone     = get_theme_mod( 'glams_phone', '+971 582166143' );
    $whatsapp  = get_theme_mod( 'glams_whatsapp', '971582166143' );
    $email     = get_theme_mod( 'glams_email', 'Ummibangash@gmail.com' );
    $license   = get_theme_mod( 'glams_license_no', 'DET-2024-001234' );
    $address   = get_theme_mod( 'glams_address', 'Al tawar near qusais metro station, Dubai, United Arab Emirates' );
    $status    = isset( $_GET['status'] ) ? sanitize_key( $_GET['status'] ) : '';
    ?>
    <div class="wrap glams-admin-wrap" style="max-width: 1100px; margin-top: 20px;">
        <div style="background: linear-gradient(135deg, #0a1c2c 0%, #073F9B 60%, #00843D 100%); color: #fff; padding: 32px 36px; border-radius: 14px; box-shadow: 0 8px 30px rgba(7,63,155,0.18); margin-bottom: 28px;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                <div>
                    <span style="background: rgba(212,166,74,0.25); border: 1px solid rgba(212,166,74,0.45); color: #D4A64A; padding: 4px 14px; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;">
                        UAE Licensed Technical Contractor • Rate List 2026
                    </span>
                    <h1 style="color: #fff; font-size: 28px; font-weight: 800; margin: 12px 0 6px; letter-spacing: -0.5px;">
                        GLAMS – MHK Technical Services Theme
                    </h1>
                    <p style="color: rgba(255,255,255,0.85); font-size: 14.5px; margin: 0; max-width: 680px;">
                        Matches live Vercel portal: <a href="https://react-app-nu-one-90.vercel.app/" target="_blank" rel="noopener noreferrer" style="color: #5cb85c; text-decoration: underline; font-weight: 600;">https://react-app-nu-one-90.vercel.app/</a>
                    </p>
                </div>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=glams-theme-pages' ) ); ?>" class="button button-hero" style="background: #D4A64A; border-color: #D4A64A; color: #12304A; font-weight: 700;">
                        <span class="dashicons dashicons-admin-page" style="vertical-align: middle; margin-top: -2px;"></span>
                        <?php esc_html_e( 'View All Pages', 'glams-theme' ); ?>
                    </a>
                    <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" class="button button-hero" style="background: #00843D; border-color: #00843D; color: #fff; font-weight: 700;">
                        <span class="dashicons dashicons-menu" style="vertical-align: middle; margin-top: -2px;"></span>
                        <?php esc_html_e( 'Manage Menus', 'glams-theme' ); ?>
                    </a>
                    <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-hero" style="background: #fff; border-color: #fff; color: #073F9B; font-weight: 700;">
                        <span class="dashicons dashicons-admin-customizer" style="vertical-align: middle; margin-top: -2px;"></span>
                        <?php esc_html_e( 'Customize Live', 'glams-theme' ); ?>
                    </a>
                </div>
            </div>
        </div>

        <?php if ( 'saved' === $status ) : ?>
            <div class="notice notice-success is-dismissible" style="border-left-color: #00843D;">
                <p><strong><?php esc_html_e( 'Theme settings successfully updated!', 'glams-theme' ); ?></strong></p>
            </div>
        <?php elseif ( 'menu_created' === $status ) : ?>
            <div class="notice notice-success is-dismissible" style="border-left-color: #00843D;">
                <p><strong><?php esc_html_e( 'Default GLAMS Primary Navigation menu successfully created with Services Dropdown!', 'glams-theme' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'View Menus →', 'glams-theme' ); ?></a></p>
            </div>
        <?php elseif ( 'pages_created' === $status ) : ?>
            <div class="notice notice-success is-dismissible" style="border-left-color: #00843D;">
                <p><strong><?php esc_html_e( 'All standard GLAMS pages and templates created successfully!', 'glams-theme' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'themes.php?page=glams-theme-pages' ) ); ?>"><?php esc_html_e( 'View Theme Pages →', 'glams-theme' ); ?></a></p>
            </div>
        <?php endif; ?>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-bottom: 28px;">
            <!-- Left: Settings Form -->
            <div style="background: #fff; padding: 28px; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #E2E8F0;">
                <h2 style="font-size: 18px; font-weight: 700; color: #12304A; margin-top: 0; padding-bottom: 12px; border-bottom: 2px solid #E2E8F0;">
                    <?php esc_html_e( 'Official Business & Contact Information', 'glams-theme' ); ?>
                </h2>

                <form method="post" action="">
                    <?php wp_nonce_field( 'glams_theme_admin_nonce', 'glams_nonce' ); ?>
                    <input type="hidden" name="glams_admin_action" value="save_settings" />

                    <table class="form-table" role="presentation">
                        <tr>
                            <th scope="row"><label for="glams_phone"><?php esc_html_e( 'Phone Number (Flyer)', 'glams-theme' ); ?></label></th>
                            <td>
                                <input type="text" id="glams_phone" name="glams_phone" value="<?php echo esc_attr( $phone ); ?>" class="regular-text" />
                                <p class="description"><?php esc_html_e( 'Official Flyer Phone: +971 582166143', 'glams-theme' ); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="glams_whatsapp"><?php esc_html_e( 'WhatsApp Number', 'glams-theme' ); ?></label></th>
                            <td>
                                <input type="text" id="glams_whatsapp" name="glams_whatsapp" value="<?php echo esc_attr( $whatsapp ); ?>" class="regular-text" />
                                <p class="description"><?php esc_html_e( 'Format with country code: 971582166143', 'glams-theme' ); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="glams_email"><?php esc_html_e( 'Official Email', 'glams-theme' ); ?></label></th>
                            <td>
                                <input type="email" id="glams_email" name="glams_email" value="<?php echo esc_attr( $email ); ?>" class="regular-text" />
                                <p class="description"><?php esc_html_e( 'Live Email: Ummibangash@gmail.com', 'glams-theme' ); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="glams_license_no"><?php esc_html_e( 'DET License Number', 'glams-theme' ); ?></label></th>
                            <td>
                                <input type="text" id="glams_license_no" name="glams_license_no" value="<?php echo esc_attr( $license ); ?>" class="regular-text" />
                                <p class="description"><?php esc_html_e( 'Official Dubai Economic Department License: DET-2024-001234', 'glams-theme' ); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="glams_address"><?php esc_html_e( 'Office Location', 'glams-theme' ); ?></label></th>
                            <td>
                                <textarea id="glams_address" name="glams_address" rows="3" class="large-text"><?php echo esc_textarea( $address ); ?></textarea>
                            </td>
                        </tr>
                    </table>

                    <p class="submit">
                        <button type="submit" class="button button-primary" style="background: #00843D; border-color: #00843D; font-weight: 700; padding: 6px 20px;">
                            <?php esc_html_e( 'Save Settings', 'glams-theme' ); ?>
                        </button>
                    </p>
                </form>
            </div>

            <!-- Right: Quick Tools & Diagnostics -->
            <div>
                <div style="background: #fff; padding: 24px; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #E2E8F0; margin-bottom: 24px;">
                    <h3 style="font-size: 16px; font-weight: 700; color: #12304A; margin-top: 0; margin-bottom: 14px;">
                        <span class="dashicons dashicons-admin-appearance" style="color: #00843D;"></span>
                        <?php esc_html_e( 'Menu & Services Dropdown', 'glams-theme' ); ?>
                    </h3>
                    <p style="font-size: 13px; color: #64748B; line-height: 1.5; margin-bottom: 16px;">
                        <?php esc_html_e( 'Auto-create Primary Navigation with "Services" parent and 7 child cleaning services from the 2026 Rate List.', 'glams-theme' ); ?>
                    </p>
                    <form method="post" action="" style="margin-bottom: 12px;">
                        <?php wp_nonce_field( 'glams_theme_admin_nonce', 'glams_nonce' ); ?>
                        <input type="hidden" name="glams_admin_action" value="create_menu" />
                        <button type="submit" class="button button-secondary" style="width: 100%; text-align: center; font-weight: 600;">
                            <?php esc_html_e( 'Auto-Generate Primary Menu', 'glams-theme' ); ?>
                        </button>
                    </form>
                    <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" class="button button-link" style="text-decoration: underline; font-size: 12.5px;">
                        <?php esc_html_e( 'Open Appearance → Menus →', 'glams-theme' ); ?>
                    </a>
                </div>

                <div style="background: #fff; padding: 24px; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #E2E8F0;">
                    <h3 style="font-size: 16px; font-weight: 700; color: #12304A; margin-top: 0; margin-bottom: 14px;">
                        <span class="dashicons dashicons-admin-page" style="color: #D4A64A;"></span>
                        <?php esc_html_e( 'All Pages Under Appearance', 'glams-theme' ); ?>
                    </h3>
                    <p style="font-size: 13px; color: #64748B; line-height: 1.5; margin-bottom: 16px;">
                        <?php esc_html_e( 'View and manage all 8 site pages with templates, live links, and status right here.', 'glams-theme' ); ?>
                    </p>
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=glams-theme-pages' ) ); ?>" class="button button-secondary" style="width: 100%; text-align: center; font-weight: 600; display: block; box-sizing: border-box; margin-bottom: 10px;">
                        <?php esc_html_e( 'View All Pages Table →', 'glams-theme' ); ?>
                    </a>
                    <form method="post" action="">
                        <?php wp_nonce_field( 'glams_theme_admin_nonce', 'glams_nonce' ); ?>
                        <input type="hidden" name="glams_admin_action" value="create_pages" />
                        <button type="submit" class="button button-secondary" style="width: 100%; text-align: center; font-weight: 600;">
                            <?php esc_html_e( 'Generate All Missing Pages', 'glams-theme' ); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Integrated All Pages View inside Theme Options -->
        <div style="background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #E2E8F0;">
            <h2 style="font-size: 18px; font-weight: 700; color: #12304A; margin-top: 0; padding-bottom: 12px; border-bottom: 2px solid #E2E8F0;">
                <?php esc_html_e( 'All Website Pages Directory', 'glams-theme' ); ?>
            </h2>
            <?php
            $defined_pages = glams_get_default_pages_definition();
            ?>
            <table class="wp-list-table widefat fixed striped" style="margin-top: 14px;">
                <thead>
                    <tr>
                        <th style="font-weight: 700;"><?php esc_html_e( 'Page', 'glams-theme' ); ?></th>
                        <th style="font-weight: 700;"><?php esc_html_e( 'Slug', 'glams-theme' ); ?></th>
                        <th style="font-weight: 700;"><?php esc_html_e( 'Template', 'glams-theme' ); ?></th>
                        <th style="font-weight: 700;"><?php esc_html_e( 'Status', 'glams-theme' ); ?></th>
                        <th style="font-weight: 700;"><?php esc_html_e( 'Action', 'glams-theme' ); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $defined_pages as $p ) : 
                        $page_obj = get_page_by_path( $p['slug'] );
                        $exists = ! empty( $page_obj );
                        $view_url = $exists ? get_permalink( $page_obj->ID ) : home_url( '/' . ( $p['slug'] === 'home' ? '' : $p['slug'] ) );
                    ?>
                        <tr>
                            <td><strong><?php echo esc_html( $p['title'] ); ?></strong></td>
                            <td><code>/<?php echo esc_html( $p['slug'] ); ?></code></td>
                            <td><span style="font-family: monospace; font-size: 12px; color: #073F9B;"><?php echo esc_html( $p['template'] ); ?></span></td>
                            <td>
                                <?php if ( $exists ) : ?>
                                    <span style="color: #00843D; font-weight: 600; font-size: 12px;">✓ Published</span>
                                <?php else : ?>
                                    <span style="color: #C8102E; font-weight: 600; font-size: 12px;">✕ Not Created</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo esc_url( $view_url ); ?>" class="button button-small" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View', 'glams-theme' ); ?></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
