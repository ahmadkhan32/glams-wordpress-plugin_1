<?php
/**
 * MHK Technical Services — 2026 Rate List & Pricing Configuration
 * Source: Official UAE Cleaning Services Rate Flyer 2026
 *
 * @package GLAMS_Theme
 */

defined( 'ABSPATH' ) || exit;

function glams_get_pricing_config() {
    return [
        'currency'   => 'AED',
        'location'   => 'Dubai, UAE',
        'phone'      => '+971 582166143',
        'whatsapp'   => '971582166143',
        'tagline'    => 'We Make Your Space Sparkling Clean',
        'subtag'     => 'Professional • Affordable • Trusted',
        'year'       => '2026',
        'highlights' => [
            [
                'icon'  => 'fa-solid fa-users',
                'title' => 'Trained Staff',
                'desc'  => 'Vetted, certified and background-checked professional cleaners.',
            ],
            [
                'icon'  => 'fa-solid fa-shield-halved',
                'title' => 'Quality Service',
                'desc'  => '100% satisfaction guarantee on all commercial & residential jobs.',
            ],
            [
                'icon'  => 'fa-solid fa-spray-can-sparkles',
                'title' => 'Safe Products',
                'desc'  => 'Eco-friendly, non-toxic and hospital-grade cleaning solutions.',
            ],
            [
                'icon'  => 'fa-solid fa-clock',
                'title' => 'On Time Service',
                'desc'  => 'Prompt arrival, punctual scheduling and reliable UAE coverage.',
            ],
        ],
        'categories' => [
            'home-cleaning' => [
                'id'       => 'home-cleaning',
                'title'    => 'Home Cleaning',
                'title_ar' => 'تنظيف المنازل والشقق',
                'icon'     => 'fa-solid fa-house',
                'short'    => 'Complete routine cleaning for apartments and residential units across Dubai.',
                'starting' => '120 AED',
                'items'    => [
                    [ 'name' => 'Studio Apartment', 'price' => 120, 'unit' => '' ],
                    [ 'name' => '1 Bedroom Apartment', 'price' => 180, 'unit' => '' ],
                    [ 'name' => '2 Bedroom Apartment', 'price' => 250, 'unit' => '' ],
                    [ 'name' => '3 Bedroom Apartment', 'price' => 350, 'unit' => '' ],
                ],
            ],
            'villa-cleaning' => [
                'id'       => 'villa-cleaning',
                'title'    => 'Villa Cleaning',
                'title_ar' => 'تنظيف الفلل والقصور',
                'icon'     => 'fa-solid fa-hotel',
                'short'    => 'Specialized comprehensive cleaning for small, medium, and luxury large villas.',
                'starting' => '450 AED',
                'items'    => [
                    [ 'name' => 'Small Villa', 'price' => 450, 'unit' => '' ],
                    [ 'name' => 'Medium Villa', 'price' => 650, 'unit' => '' ],
                    [ 'name' => 'Large Villa', 'price' => 900, 'suffix' => '+', 'unit' => '' ],
                ],
            ],
            'deep-cleaning' => [
                'id'       => 'deep-cleaning',
                'title'    => 'Deep Cleaning',
                'title_ar' => 'التنظيف العميق والشامل',
                'icon'     => 'fa-solid fa-spray-can-sparkles',
                'short'    => 'Intensive sanitization, grout scrubbing, disinfection and detailed cleaning.',
                'starting' => '250 AED',
                'items'    => [
                    [ 'name' => 'Studio Deep Cleaning', 'price' => 250, 'unit' => '' ],
                    [ 'name' => '1 BHK Deep Cleaning', 'price' => 400, 'unit' => '' ],
                    [ 'name' => '2 BHK Deep Cleaning', 'price' => 600, 'unit' => '' ],
                    [ 'name' => 'Villa Deep Cleaning', 'price' => 1200, 'prefix' => 'Starting', 'unit' => '' ],
                ],
            ],
            'sofa-carpet-cleaning' => [
                'id'       => 'sofa-carpet-cleaning',
                'title'    => 'Sofa & Carpet Cleaning',
                'title_ar' => 'تنظيف الكنب والسجاد والفرش',
                'icon'     => 'fa-solid fa-couch',
                'short'    => 'Steam cleaning, fabric stain removal, mattress sanitizing and deodorizing.',
                'starting' => '40 AED',
                'items'    => [
                    [ 'name' => 'Sofa Cleaning', 'price' => 40, 'unit' => 'per seat' ],
                    [ 'name' => 'Carpet Cleaning', 'price' => 15, 'unit' => 'per sqm' ],
                    [ 'name' => 'Mattress Cleaning', 'price' => 80, 'unit' => '' ],
                ],
            ],
            'kitchen-cleaning' => [
                'id'       => 'kitchen-cleaning',
                'title'    => 'Kitchen Cleaning',
                'title_ar' => 'تنظيف المطابخ وإزالة الدهون',
                'icon'     => 'fa-solid fa-utensils',
                'short'    => 'Degreasing, appliance exterior scrubbing, hood and exhaust deep cleaning.',
                'starting' => '150 AED',
                'items'    => [
                    [ 'name' => 'Normal Kitchen Cleaning', 'price' => 150, 'unit' => '' ],
                    [ 'name' => 'Kitchen Deep Cleaning', 'price' => 350, 'unit' => '' ],
                    [ 'name' => 'Hood Cleaning', 'price' => 500, 'prefix' => 'Starting', 'unit' => '' ],
                ],
            ],
            'office-cleaning' => [
                'id'       => 'office-cleaning',
                'title'    => 'Office Cleaning',
                'title_ar' => 'تنظيف المكاتب والشركات',
                'icon'     => 'fa-solid fa-building',
                'short'    => 'Reliable corporate janitorial service, hourly visits, and monthly contracts.',
                'starting' => '25 AED/hr',
                'items'    => [
                    [ 'name' => 'Hourly Cleaning', 'price' => 25, 'unit' => 'per hour' ],
                    [ 'name' => 'Monthly Contract', 'price' => 999, 'prefix' => 'Starting', 'unit' => '' ],
                ],
            ],
            'maid-services' => [
                'id'       => 'maid-services',
                'title'    => 'Maid Services',
                'title_ar' => 'خدمات العاملات بالساعة',
                'icon'     => 'fa-solid fa-user-check',
                'short'    => 'Flexible hourly cleaning maids equipped with materials or service only.',
                'starting' => '25 AED/hr',
                'items'    => [
                    [ 'name' => '1 Cleaner', 'price' => 25, 'unit' => 'per hour' ],
                    [ 'name' => '2 Cleaners', 'price' => 45, 'unit' => 'per hour' ],
                ],
            ],
        ],
    ];
}
