# UAE Technical Services — WordPress Theme

A complete, reusable, high-performance WordPress theme engineered for **MHK Technical Services UAE** following modern WordPress standards and design guidelines.

---

## 🎨 Global Design System

| Element | Value | Description |
| :--- | :--- | :--- |
| **Primary Color** | `#12304A` | Deep Blue for header, footer, headings & dark elements |
| **Accent Color** | `#00843D` | UAE Green for primary buttons, active links, accents |
| **Secondary Text** | `#334155` | Slate for readable paragraph body copy |
| **Background** | `#F8FAFC` | Clean, crisp off-white surface |
| **Premium Accent** | `#D4A64A` | Gold for trust badges, star ratings & borders |
| **Heading Font** | `Poppins`, `Inter` | Bold, modern typography |
| **Body Font** | `Inter` | Optimized for readability on Retina & mobile screens |

---

## 📁 1. Complete WordPress Theme File Structure

```
uae-technical-services/
├── style.css                      # Theme metadata & core CSS tokens
├── functions.php                  # Modular loader requiring inc/ files
├── index.php                      # Fallback template
├── front-page.php                 # Homepage integrating all sections
├── page.php                       # Standard static pages
├── single.php                     # Blog post template with author & meta
├── archive.php                    # Archive template for categories/tags
├── 404.php                        # Branded error 404 page
├── header.php                     # Header template calling site-header.php
├── footer.php                     # Footer template calling site-footer.php
├── template-parts/
│   ├── header/
│   │   └── site-header.php        # Header: Deep Blue (#12304A), logo on left, center nav, green CTA
│   ├── footer/
│   │   └── site-footer.php        # Footer: Deep Blue (#12304A), reused logo, 4 columns, copyright
│   └── sections/
│       ├── hero.php               # Hero banner with badge & action buttons
│       ├── services.php           # Core capabilities grid
│       ├── about.php              # Company overview & achievements
│       ├── why-choose-us.php      # 4 core benefits grid
│       ├── process.php            # 4-step workflow (Consultation to Handover)
│       ├── testimonials.php       # Client reviews & gold stars
│       ├── faq.php                # Interactive accordion FAQs
│       ├── contact-cta.php        # Conversion call-to-action banner
│       └── contact-form.php       # 2-column contact grid with inquiry form
├── page-templates/
│   ├── page-about.php             # Template Name: About Us
│   ├── page-services.php          # Template Name: Services Catalog
│   ├── page-contact.php           # Template Name: Contact Us
│   ├── page-visa-assistance.php   # Template Name: Visa Assistance
│   ├── page-document-clearing.php # Template Name: Document Clearing
│   ├── page-business-setup.php    # Template Name: Business Setup
│   ├── page-privacy-policy.php    # Template Name: Privacy Policy
│   └── page-terms.php             # Template Name: Terms & Conditions
├── assets/
│   ├── images/
│   │   ├── logo.svg               # Primary company logo
│   │   ├── logo-white.svg         # White logo for dark background
│   │   ├── favicon.png            # Browser icon
│   │   └── mhk-technical-services-logo.png # HD emblem logo (1394x1128 px)
│   ├── css/
│   │   ├── main.css               # Global styles, buttons, badges, cards
│   │   ├── header.css             # Navigation & header layout
│   │   ├── footer.css             # Footer layout & branding
│   │   ├── home.css               # Homepage sections
│   │   ├── pages.css              # Inner pages
│   │   └── responsive.css         # Mobile & tablet layouts
│   └── js/
│       ├── navigation.js          # Smooth scroll
│       ├── mobile-menu.js         # Mobile hamburger drawer
│       ├── faq.js                 # Accordion toggle
│       └── contact-form.js        # Form submission handling
└── inc/
    ├── theme-setup.php            # Menus, theme support, custom logo
    ├── enqueue-assets.php         # Modular CSS/JS enqueuing
    ├── customizer.php             # Contact info customizer settings
    ├── template-functions.php     # Centralized logo function (uae_the_theme_logo)
    └── security.php               # SVG uploads & sanitation
```

---

## 2. Logo Placement & Implementation Rule

- **Header**: Logo on the left against Deep Blue (`#12304A`), navigation in center, green button on right.
- **Footer**: Reuses the same logo output in the footer.
- **Implementation Rule**: Uses `the_custom_logo()` with fallbacks to `logo-white.svg` and HD PNG `mhk-technical-services-logo.png`. Both header and footer call `uae_the_theme_logo()`.

---

## 3. How to Install the Theme

1. Download [`uae-technical-services.zip`](uae-technical-services.zip).
2. Go to **Appearance → Themes → Add New Theme → Upload Theme** in WordPress.
3. Select `uae-technical-services.zip` and click **Install Now**.
4. Click **Activate**.
5. Set menus under **Appearance → Menus** for **Primary Navigation** and **Footer Navigation**.
