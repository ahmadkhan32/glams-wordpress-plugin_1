<?php
/**
 * GLAMS Theme Admin Options & Setup Page
 * Appears under WordPress Admin: Appearance → GLAMS Theme
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Appearance submenu page: Appearance → GLAMS Theme
 */
function glams_add_theme_admin_menu() {
    add_theme_page(
        __( 'GLAMS Theme Setup & Options', 'glams-theme' ),
        __( 'GLAMS Theme', 'glams-theme' ),
        'edit_theme_options',
        'glams-theme-options',
        'glams_render_theme_options_page'
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

            $menu_items = [
                [ 'title' => 'Home', 'url' => $home_url . '#home' ],
                [ 'title' => 'Services', 'url' => $home_url . '#services' ],
                [ 'title' => 'DET License', 'url' => $home_url . '#license' ],
                [ 'title' => 'Companies', 'url' => $home_url . '#companies' ],
                [ 'title' => 'Immigration', 'url' => $home_url . '#immigration' ],
                [ 'title' => 'About Us', 'url' => $home_url . '#about' ],
                [ 'title' => 'Contact', 'url' => $home_url . '#contact' ],
            ];

            foreach ( $menu_items as $order => $item ) {
                wp_update_nav_menu_item( $menu_id, 0, [
                    'menu-item-title'    => $item['title'],
                    'menu-item-url'      => $item['url'],
                    'menu-item-status'   => 'publish',
                    'menu-item-type'     => 'custom',
                    'menu-item-position' => $order + 1,
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
 * Create default pages with matching templates
 */
function glams_create_default_pages() {
    $pages = [
        [
            'title'    => 'Home',
            'slug'     => 'home',
            'template' => 'front-page.php',
            'is_front' => true,
        ],
        [
            'title'    => 'Services',
            'slug'     => 'services',
            'template' => 'page-templates/page-services.php',
        ],
        [
            'title'    => 'License Activities',
            'slug'     => 'license',
            'template' => 'page-templates/page-license.php',
        ],
        [
            'title'    => 'Companies Directory',
            'slug'     => 'companies',
            'template' => 'page-templates/page-companies.php',
        ],
        [
            'title'    => 'Immigration & Visa',
            'slug'     => 'immigration',
            'template' => 'page-templates/page-immigration.php',
        ],
        [
            'title'    => 'About Us',
            'slug'     => 'about',
            'template' => 'page-templates/page-about.php',
        ],
        [
            'title'    => 'Contact & Quote',
            'slug'     => 'contact',
            'template' => 'page-templates/page-contact.php',
        ],
        [
            'title'    => 'Verify License',
            'slug'     => 'verify',
            'template' => 'page-templates/page-verify.php',
        ],
    ];

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
 * Render the Appearance → GLAMS Theme options page
 */
function glams_render_theme_options_page() {
    $phone     = get_theme_mod( 'glams_phone', '+971 58 216 6143' );
    $whatsapp  = get_theme_mod( 'glams_whatsapp', '971582166143' );
    $email     = get_theme_mod( 'glams_email', 'Ummibangash@gmail.com' );
    $license   = get_theme_mod( 'glams_license_no', 'DET-2024-001234' );
    $address   = get_theme_mod( 'glams_address', 'Al tawar near qusais metro station, Dubai, United Arab Emirates' );
    $status    = isset( $_GET['status'] ) ? sanitize_key( $_GET['status'] ) : '';
    ?>
    <div class="wrap glams-admin-wrap" style="max-width: 1040px; margin-top: 20px;">
        <div style="background: linear-gradient(135deg, #0a1c2c 0%, #12304A 60%, #0d3824 100%); color: #fff; padding: 32px 36px; border-radius: 14px; box-shadow: 0 8px 30px rgba(18,48,74,0.15); margin-bottom: 28px;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                <div>
                    <span style="background: rgba(212,166,74,0.25); border: 1px solid rgba(212,166,74,0.45); color: #D4A64A; padding: 4px 14px; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;">
                        UAE Licensed Technical Contractor
                    </span>
                    <h1 style="color: #fff; font-size: 28px; font-weight: 800; margin: 12px 0 6px; letter-spacing: -0.5px;">
                        GLAMS – MHK Technical Services Theme
                    </h1>
                    <p style="color: rgba(255,255,255,0.8); font-size: 14.5px; margin: 0; max-width: 680px;">
                        Matches the live Vercel portal: <a href="https://react-app-nu-one-90.vercel.app/" target="_blank" rel="noopener noreferrer" style="color: #5cb85c; text-decoration: underline; font-weight: 600;">https://react-app-nu-one-90.vercel.app/</a>
                    </p>
                </div>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" class="button button-hero" style="background: #00843D; border-color: #00843D; color: #fff; font-weight: 700;">
                        <span class="dashicons dashicons-menu" style="vertical-align: middle; margin-top: -2px;"></span>
                        <?php esc_html_e( 'Manage Menus', 'glams-theme' ); ?>
                    </a>
                    <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-hero" style="background: #fff; border-color: #fff; color: #12304A; font-weight: 700;">
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
                <p><strong><?php esc_html_e( 'Default GLAMS Primary Navigation menu successfully created and assigned!', 'glams-theme' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'View Menus →', 'glams-theme' ); ?></a></p>
            </div>
        <?php elseif ( 'pages_created' === $status ) : ?>
            <div class="notice notice-success is-dismissible" style="border-left-color: #00843D;">
                <p><strong><?php esc_html_e( 'All 8 standard GLAMS pages and templates created successfully!', 'glams-theme' ); ?></strong> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=page' ) ); ?>"><?php esc_html_e( 'View Pages →', 'glams-theme' ); ?></a></p>
            </div>
        <?php endif; ?>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
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
                            <th scope="row"><label for="glams_phone"><?php esc_html_e( 'Phone Number', 'glams-theme' ); ?></label></th>
                            <td>
                                <input type="text" id="glams_phone" name="glams_phone" value="<?php echo esc_attr( $phone ); ?>" class="regular-text" />
                                <p class="description"><?php esc_html_e( 'Live Vercel Phone: +971 58 216 6143', 'glams-theme' ); ?></p>
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
                                <p class="description"><?php esc_html_e( 'Live Vercel Email: Ummibangash@gmail.com', 'glams-theme' ); ?></p>
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
                        <?php esc_html_e( 'Menu & Navigation Setup', 'glams-theme' ); ?>
                    </h3>
                    <p style="font-size: 13px; color: #64748B; line-height: 1.5; margin-bottom: 16px;">
                        <?php esc_html_e( 'Generate the primary navigation menu automatically with all 7 links matching the Vercel project.', 'glams-theme' ); ?>
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
                        <?php esc_html_e( 'Auto-Create Standard Pages', 'glams-theme' ); ?>
                    </h3>
                    <p style="font-size: 13px; color: #64748B; line-height: 1.5; margin-bottom: 16px;">
                        <?php esc_html_e( 'Create Home, Services, DET License, Companies, Immigration, About, Contact, and Verify pages with pre-assigned templates.', 'glams-theme' ); ?>
                    </p>
                    <form method="post" action="">
                        <?php wp_nonce_field( 'glams_theme_admin_nonce', 'glams_nonce' ); ?>
                        <input type="hidden" name="glams_admin_action" value="create_pages" />
                        <button type="submit" class="button button-secondary" style="width: 100%; text-align: center; font-weight: 600;">
                            <?php esc_html_e( 'Generate All 8 Pages', 'glams-theme' ); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}
