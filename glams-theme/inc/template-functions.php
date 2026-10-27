<?php
/**
 * Shared Template Helper Functions & Data Models
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Centralized Logo Renderer (Supports WordPress Custom Logo or bundled high-res SVG/PNG)
 */
function glams_get_theme_logo( $location = 'header', $variant = 'auto' ) {
    $site_name = get_bloginfo( 'name' );
    if ( empty( $site_name ) ) {
        $site_name = 'MHK Technical Services';
    }

    $logo_url = '';

    if ( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo_data      = wp_get_attachment_image_src( $custom_logo_id, 'full' );
        if ( ! empty( $logo_data[0] ) ) {
            $logo_url = $logo_data[0];
        }
    }

    if ( empty( $logo_url ) ) {
        if ( $variant === 'white' && file_exists( GLAMS_THEME_DIR . '/assets/images/logo-white.svg' ) ) {
            $logo_url = GLAMS_THEME_URI . '/assets/images/logo-white.svg';
        } elseif ( file_exists( GLAMS_THEME_DIR . '/assets/images/mhk-technical-services-logo.png' ) ) {
            $logo_url = GLAMS_THEME_URI . '/assets/images/mhk-technical-services-logo.png';
        } else {
            $logo_url = GLAMS_THEME_URI . '/assets/images/logo.svg';
        }
    }

    $class_attr = 'glams-logo-img glams-logo-' . esc_attr( $location );
    if ( $variant === 'white' ) {
        $class_attr .= ' glams-logo-white';
    }

    $html  = '<a href="' . esc_url( home_url( '/' ) ) . '" class="glams-logo-link" rel="home" aria-label="' . esc_attr( $site_name ) . '">';
    $html .= '<img src="' . esc_url( $logo_url ) . '" alt="' . esc_attr( $site_name ) . '" class="' . esc_attr( $class_attr ) . '" width="220" height="58" loading="eager" decoding="async" />';
    $html .= '<span class="screen-reader-text">' . esc_html( $site_name ) . '</span>';
    $html .= '</a>';

    return apply_filters( 'glams_theme_logo_html', $html, $location, $variant, $logo_url );
}

function glams_the_theme_logo( $location = 'header', $variant = 'auto' ) {
    echo glams_get_theme_logo( $location, $variant );
}

/**
 * 11 Official Technical Services (Exact match to Vercel portal)
 */
function glams_get_official_services() {
    return [
        [
            'id'               => 'air-conditioning',
            'icon'             => 'fa-wind',
            'title'            => 'Air-Conditioning, Ventilation & Air Filtration Systems',
            'title_ar'         => 'تركيب انظمة التكييف والتهوية وتنقية الهواء وصيانتها',
            'short_desc'       => 'Professional installation and maintenance services for air-conditioning, ventilation and air-filtration systems.',
            'features'         => ['AC system installation', 'Ventilation systems', 'Air filtration systems', 'Maintenance support', 'System inspection'],
        ],
        [
            'id'               => 'electromechanical',
            'icon'             => 'fa-cogs',
            'title'            => 'Electromechanical Equipment Installation & Maintenance',
            'title_ar'         => 'اعمال تركيب المعدات الكهروميكانيكية وصيانتها',
            'short_desc'       => 'Installation and maintenance services for electromechanical equipment and related building systems.',
            'features'         => ['Equipment installation', 'Maintenance', 'Inspection', 'Repair support', 'System servicing'],
        ],
        [
            'id'               => 'tiling',
            'icon'             => 'fa-th-large',
            'title'            => 'Floor & Wall Tiling Works',
            'title_ar'         => 'أعمال تبليط الأرضيات والجدران',
            'short_desc'       => 'Professional floor and wall tiling services for residential, commercial, and high-traffic UAE spaces.',
            'features'         => ['Floor tiling', 'Wall tiling', 'Tile replacement', 'Surface preparation', 'Finishing work'],
        ],
        [
            'id'               => 'carpentry',
            'icon'             => 'fa-hammer',
            'title'            => 'Carpentry & Wood Flooring Works',
            'title_ar'         => 'أعمال النجارة و تركيب الأرضيات الخشبية',
            'short_desc'       => 'Carpentry and wood-flooring services for interior residential and commercial environments.',
            'features'         => ['Carpentry work', 'Wood flooring installation', 'Flooring replacement', 'Wood finishing', 'Repair work'],
        ],
        [
            'id'               => 'engraving',
            'icon'             => 'fa-drafting-compass',
            'title'            => 'Engraving & Ornamentation Works',
            'title_ar'         => 'اعمال النقش والزخرفة',
            'short_desc'       => 'Detailed architectural engraving and ornamentation services for decorative and commercial applications.',
            'features'         => ['Decorative work', 'Engraving', 'Ornamentation', 'Finishing details'],
        ],
        [
            'id'               => 'wallpaper',
            'icon'             => 'fa-paint-roller',
            'title'            => 'Wallpaper Fixing Works',
            'title_ar'         => 'أعمال تركيب ورق الجدران',
            'short_desc'       => 'Professional wallpaper installation and finishing services for luxury residential and commercial interiors.',
            'features'         => ['Wallpaper installation', 'Surface preparation', 'Wallpaper replacement', 'Finishing', 'Repair work'],
        ],
        [
            'id'               => 'false-ceiling',
            'icon'             => 'fa-layer-group',
            'title'            => 'False Ceiling & Light Partitions Installation',
            'title_ar'         => 'تركيب الأسقف المعلقة و القواطع الخفيفة',
            'short_desc'       => 'Installation of false ceilings and light partition systems for functional and professional interior spaces.',
            'features'         => ['False ceiling installation', 'Light partitions', 'Interior space division', 'Finishing work', 'Repair and maintenance'],
        ],
        [
            'id'               => 'electrical',
            'icon'             => 'fa-bolt',
            'title'            => 'Electrical Fittings & Fixtures Repairing & Maintenance',
            'title_ar'         => 'إصلاح وصيانة التمديدات والتركيبات الكهربائية',
            'short_desc'       => 'Electrical fittings and fixture repair and maintenance services for residential and commercial requirements.',
            'features'         => ['Electrical fixture maintenance', 'Electrical fitting repair', 'Inspection', 'Maintenance support', 'Replacement support'],
        ],
        [
            'id'               => 'sanitary',
            'icon'             => 'fa-faucet',
            'title'            => 'Sanitary Installation & Pipes Repairing',
            'title_ar'         => 'اصلاح التمديدات والتركيبات الصحية وتمديدات المياه',
            'short_desc'       => 'Sanitary installation and water-pipe repair services for residential and commercial properties.',
            'features'         => ['Sanitary installation', 'Pipe repair', 'Water pipe maintenance', 'Leak-related repair work', 'Plumbing fixture support'],
        ],
        [
            'id'               => 'plaster',
            'icon'             => 'fa-paint-brush',
            'title'            => 'Plaster Works',
            'title_ar'         => 'اعمال البلاستر',
            'short_desc'       => 'Professional plastering and gypsum services for suitable interior and building surfaces.',
            'features'         => ['Plaster application', 'Surface preparation', 'Repair work', 'Finishing', 'Surface restoration'],
        ],
        [
            'id'               => 'cleaning',
            'icon'             => 'fa-broom',
            'title'            => 'Building Cleaning Services',
            'title_ar'         => 'خدمات تنظيف المباني والمساكن',
            'short_desc'       => 'Building and residential cleaning services designed to maintain clean, hygienic, and presentable environments.',
            'features'         => ['Building cleaning', 'Residential cleaning', 'General cleaning support', 'Maintenance cleaning', 'Interior cleaning'],
        ],
    ];
}

/**
 * UAE Companies Directory Model
 */
function glams_get_companies() {
    return [
        [
            'id'      => 1,
            'name'    => 'Al Noor Technical Services LLC',
            'nameAr'  => 'شركة النور للخدمات التقنية',
            'license' => 'DET-2024-001234',
            'owner'   => 'Mohammed Al Rashid',
            'status'  => 'active',
            'city'    => 'Dubai',
            'phone'   => '+971 4 123 4567',
            'expiry'  => '2025-01-14',
        ],
        [
            'id'      => 2,
            'name'    => 'Emirates Building Solutions LLC',
            'nameAr'  => 'شركة الإمارات لحلول البناء',
            'license' => 'DET-2024-005678',
            'owner'   => 'Ahmed Khalil',
            'status'  => 'active',
            'city'    => 'Abu Dhabi',
            'phone'   => '+971 2 234 5678',
            'expiry'  => '2025-03-20',
        ],
        [
            'id'      => 3,
            'name'    => 'Dubai Infra Tech LLC',
            'nameAr'  => 'دبي إنفرا تك ذ.م.م',
            'license' => 'DET-2024-009012',
            'owner'   => 'Salam Al Mansoori',
            'status'  => 'active',
            'city'    => 'Dubai',
            'phone'   => '+971 4 345 6789',
            'expiry'  => '2025-06-30',
        ],
        [
            'id'      => 4,
            'name'    => 'Gulf HVAC Systems LLC',
            'nameAr'  => 'شركة الخليج لأنظمة التكييف',
            'license' => 'DET-2023-003456',
            'owner'   => 'Tariq Mahmoud',
            'status'  => 'inactive',
            'city'    => 'Sharjah',
            'phone'   => '+971 6 456 7890',
            'expiry'  => '2024-12-31',
        ],
        [
            'id'      => 5,
            'name'    => 'Al Baraka Maintenance Co.',
            'nameAr'  => 'شركة البركة للصيانة',
            'license' => 'DET-2024-007890',
            'owner'   => 'Hassan Al Farsi',
            'status'  => 'active',
            'city'    => 'Dubai',
            'phone'   => '+971 4 567 8901',
            'expiry'  => '2025-08-15',
        ],
        [
            'id'      => 6,
            'name'    => 'NextGen Electromech LLC',
            'nameAr'  => 'نيكست جن للكهروميكانيك',
            'license' => 'DET-2024-011234',
            'owner'   => 'James Wilson',
            'status'  => 'active',
            'city'    => 'Ajman',
            'phone'   => '+971 6 678 9012',
            'expiry'  => '2025-11-20',
        ],
    ];
}

/**
 * Company Activities Database
 */
function glams_get_activities_by_company( $company_id = 1 ) {
    $db = [
        1 => [
            [ 'name' => 'Sanitary Installation & Pipes Repairing', 'nameAr' => 'اصلاح التمديدات والتركيبات الصحية وتمديدات المياه', 'status' => 'active' ],
            [ 'name' => 'Carpentry & wood Flooring Works', 'nameAr' => 'أعمال النجارة و تركيب الأرضيات الخشبية', 'status' => 'active' ],
            [ 'name' => 'Engraving & Ornamentation Works', 'nameAr' => 'اعمال النقش  والزخرفة', 'status' => 'active' ],
            [ 'name' => 'Air-Conditioning, Ventilations & Air Filtration Systems Installation & Maintenance', 'nameAr' => 'تركيب  انظمة التكييف والتهوية وتنقية الهواء وصيانتها', 'status' => 'active' ],
            [ 'name' => 'Plaster Works', 'nameAr' => 'اعمال البلاستر', 'status' => 'active' ],
            [ 'name' => 'Building Cleaning Services', 'nameAr' => 'خدمات تنظيف المباني والمساكن', 'status' => 'active' ],
            [ 'name' => 'Floor & Wall Tiling Works', 'nameAr' => 'أعمال تبليط الأرضيات والجدران', 'status' => 'active' ],
            [ 'name' => 'False Ceiling & Light Partitions Installation', 'nameAr' => 'تركيب الأسقف المعلقة و القواطع الخفيفة', 'status' => 'active' ],
            [ 'name' => 'Wallpaper Fixing Works', 'nameAr' => 'أعمال تركيب ورق الجدران', 'status' => 'active' ],
            [ 'name' => 'Electromechanical Equipment Installation and Maintenance', 'nameAr' => 'اعمال تركيب المعدات الكهروميكانيكية وصيانتها', 'status' => 'active' ],
            [ 'name' => 'Electrical Fittings & Fixtures Repairing & Maintenance', 'nameAr' => 'إصلاح وصيانة التمديدات والتركيبات الكهربائية', 'status' => 'active' ],
        ],
        2 => [
            [ 'name' => 'General Building Contracting', 'nameAr' => 'مقاولات البناء العامة', 'status' => 'active' ],
            [ 'name' => 'Civil Engineering Works', 'nameAr' => 'أعمال الهندسة المدنية', 'status' => 'active' ],
            [ 'name' => 'Concrete Works', 'nameAr' => 'أعمال الخرسانة', 'status' => 'active' ],
            [ 'name' => 'Steel Structure Installation', 'nameAr' => 'تركيب الهياكل الفولاذية', 'status' => 'active' ],
            [ 'name' => 'Waterproofing & Insulation', 'nameAr' => 'العزل المائي والحراري', 'status' => 'active' ],
            [ 'name' => 'Landscaping & Irrigation', 'nameAr' => 'تنسيق الحدائق والري', 'status' => 'inactive' ],
        ],
        3 => [
            [ 'name' => 'IT Infrastructure Setup', 'nameAr' => 'إعداد البنية التحتية لتكنولوجيا المعلومات', 'status' => 'active' ],
            [ 'name' => 'CCTV & Security Systems', 'nameAr' => 'أنظمة المراقبة والأمن', 'status' => 'active' ],
            [ 'name' => 'Structured Cabling', 'nameAr' => 'الكابلات الهيكلية', 'status' => 'active' ],
            [ 'name' => 'Network Installation & Maintenance', 'nameAr' => 'تركيب وصيانة الشبكات', 'status' => 'active' ],
            [ 'name' => 'Fire Alarm & Suppression Systems', 'nameAr' => 'أنظمة الإنذار من الحرائق وإخمادها', 'status' => 'active' ],
        ],
    ];

    return isset( $db[ $company_id ] ) ? $db[ $company_id ] : $db[1];
}

/**
 * UAE Visa Types
 */
function glams_get_visa_types() {
    return [
        [
            'type'        => 'Employment',
            'title'       => 'Work Visa',
            'description' => 'For professionals employed by UAE companies. Includes labor card, Emirates ID, and health insurance processing.',
            'duration'    => '2–3 Years',
            'icon'        => 'fa-id-card',
        ],
        [
            'type'        => 'Family',
            'title'       => 'Residence Visa',
            'description' => 'Sponsor spouse, children, and parents under UAE family residence visa with full documentation support.',
            'duration'    => '2 Years',
            'icon'        => 'fa-users',
        ],
        [
            'type'        => 'Premium',
            'title'       => 'Golden Visa',
            'description' => 'Long-term 5 or 10 year UAE residence for investors, entrepreneurs, exceptional talents, and researchers.',
            'duration'    => '5–10 Years',
            'icon'        => 'fa-award',
        ],
        [
            'type'        => 'Business',
            'title'       => 'Investor Visa',
            'description' => 'UAE investor residence visa for business owners and shareholders in mainland or free zone companies.',
            'duration'    => '3 Years',
            'icon'        => 'fa-briefcase',
        ],
        [
            'type'        => 'Short-term',
            'title'       => 'Tourist Visa',
            'description' => 'Single entry or multiple-entry tourist visas for short stays, extended visits, and visa on arrival assistance.',
            'duration'    => '30–90 Days',
            'icon'        => 'fa-plane-departure',
        ],
        [
            'type'        => 'Students',
            'title'       => 'Student Visa',
            'description' => 'Student residence permits for UAE universities and schools with full enrollment documentation support.',
            'duration'    => '1 Year',
            'icon'        => 'fa-graduation-cap',
        ],
    ];
}

/**
 * 4-Step Process Roadmap
 */
function glams_get_process_steps() {
    return [
        [
            'step' => '01',
            'title' => 'Submit Documents & Requirements',
            'desc'  => 'Share your project blueprints, property specifications, or visa documentation online or via WhatsApp.',
        ],
        [
            'step' => '02',
            'title' => 'Technical Assessment & Quote',
            'desc'  => 'Our certified engineers conduct an on-site audit and prepare a comprehensive transparent proposal.',
        ],
        [
            'step' => '03',
            'title' => 'Execution with DED Compliance',
            'desc'  => 'Our skilled workforce executes the job adhering strictly to UAE building codes and safety standards.',
        ],
        [
            'step' => '04',
            'title' => 'Inspection & Certification',
            'desc'  => 'Final quality inspection, sign-off certificate issuance, and ongoing warranty maintenance support.',
        ],
    ];
}

/**
 * Client Testimonials
 */
function glams_get_testimonials() {
    return [
        [
            'initial' => 'M',
            'name'    => 'Mohammed Al Rashid',
            'role'    => 'Al Rashid Technical Services, Dubai',
            'comment' => 'MHK Technical Services handled our complete facility and technical contracting with exceptional quality. Their engineering team is outstanding.',
            'rating'  => 5,
        ],
        [
            'initial' => 'A',
            'name'    => 'Ahmed Khalil',
            'role'    => 'Gulf Construction LLC, Abu Dhabi',
            'comment' => 'The immigration and visa service was seamless. They arranged our entire team’s work visas on time. Excellent Arabic-English bilingual support.',
            'rating'  => 5,
        ],
        [
            'initial' => 'S',
            'name'    => 'Sarah Jameson',
            'role'    => 'InfraCore Systems, Sharjah',
            'comment' => 'Their government license activities system is exactly what we needed. The QR verification feature makes certificate validation incredibly easy.',
            'rating'  => 5,
        ],
    ];
}

/**
 * FAQ Items
 */
function glams_get_faqs() {
    return [
        [
            'q' => 'Is MHK Technical Services fully licensed in the UAE?',
            'a' => 'Yes, MHK Technical Services operates under official license (DET-2024-001234) issued by the Dubai Department of Economy and Tourism. All electrical, HVAC, and civil activities comply fully with UAE regulations.',
        ],
        [
            'q' => 'What areas in the UAE do you serve?',
            'a' => 'We provide comprehensive services across all seven emirates: Dubai, Abu Dhabi, Sharjah, Ajman, Umm Al Quwain, Ras Al Khaimah, and Fujairah.',
        ],
        [
            'q' => 'How can I verify a license activity certificate?',
            'a' => 'You can verify any certificate immediately on our online portal by entering the license number or scanning the official QR code located at the top of the certificate.',
        ],
        [
            'q' => 'Do you provide emergency repair and 24/7 maintenance services?',
            'a' => 'Yes! We maintain rapid-response teams on standby 24/7 for emergency electrical outages, AC failures, and plumbing leaks across commercial and residential premises.',
        ],
        [
            'q' => 'Can you help with company formation and UAE visa processing?',
            'a' => 'Absolutely. Through our GLAMS portal, we assist businesses with full DED trade license registration, investor visas, Golden visas, and employee residence permits.',
        ],
    ];
}

/**
 * Fallback Navigation Menus
 */
function glams_fallback_primary_menu() {
    $home = esc_url( home_url( '/' ) );
    echo '<ul id="primary-menu" class="glams-nav-list">';
    echo '<li class="nav-item"><a href="' . $home . '">Home</a></li>';
    echo '<li class="nav-item"><a href="' . $home . '#services">Services</a></li>';
    echo '<li class="nav-item"><a href="' . $home . '#license">License Activities</a></li>';
    echo '<li class="nav-item"><a href="' . $home . '#immigration">Immigration</a></li>';
    echo '<li class="nav-item"><a href="' . $home . '#about">About Us</a></li>';
    echo '<li class="nav-item"><a href="' . $home . '#faq">FAQ</a></li>';
    echo '<li class="nav-item"><a href="' . $home . '#contact">Contact</a></li>';
    echo '</ul>';
}

function glams_fallback_footer_menu() {
    $home = esc_url( home_url( '/' ) );
    echo '<ul class="glams-footer-links">';
    echo '<li><a href="' . $home . '">Home</a></li>';
    echo '<li><a href="' . $home . '#services">All Services</a></li>';
    echo '<li><a href="' . $home . '#license">License Verification</a></li>';
    echo '<li><a href="' . $home . '#immigration">UAE Visa Support</a></li>';
    echo '<li><a href="' . $home . '#about">About MHK</a></li>';
    echo '<li><a href="' . $home . '#contact">Get a Quote</a></li>';
    echo '</ul>';
}
