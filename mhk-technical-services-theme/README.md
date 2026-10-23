# MHK Technical Services WordPress Theme

A modern, responsive, high-performance starter and business WordPress theme crafted specifically for **MHK Technical Services UAE**.

---

## 1. WordPress Theme Folder Structure

```
mhk-technical-services-theme/
├── style.css               # Theme information, CSS variables, typography & responsive styling
├── functions.php           # Theme setup, centralized logo function, menus & script enqueues
├── header.php              # Website header: logo on left, topbar & responsive navigation
├── footer.php              # Website footer: logo, business description, footer menu & copyright
├── index.php               # Main template: hero section, core services grid & articles loop
├── page.php                # Standard template for website pages
├── single.php              # Single blog post template with author & meta
├── archive.php             # Archive template for categories, tags and dates
├── 404.php                 # 404 Not Found error page with search bar
├── assets/
│   ├── images/
│   │   └── mhk-technical-services-logo.png  # High-definition theme emblem logo
│   └── js/
│       └── theme.js        # Mobile hamburger navigation toggle & responsive behavior
└── README.md               # Theme documentation & installation guide
```

---

## 2. Where the Logo Appears

### Website Header
- **Position**: Logo on the left side of the navigation header.
- **Responsive Behavior**: Automatically scales for desktop, tablet, and mobile displays without distortion.
- **Implementation**: Located in `header.php`.

### Website Footer
- **Position**: Prominently displayed at the top of the footer column alongside the company overview.
- **Content**: Includes the business description, ISO standards badge, footer navigation, and copyright.
- **Implementation**: Located in `footer.php`.

### Centralized Logo System
The HD logo is stored locally inside the theme (`assets/images/mhk-technical-services-logo.png`) rather than relying on an external image URL. 
Both templates call a shared PHP function:
```php
<?php mhk_the_theme_logo( 'header' ); ?>
<?php mhk_the_theme_logo( 'footer' ); ?>
```
To update the logo centrally, either replace the image file in `assets/images/mhk-technical-services-logo.png` or set a new logo via the standard WordPress Customizer (**Appearance → Customize → Site Identity → Logo**).

---

## 3. How to Install the Theme

1. **Download the ZIP**:
   - Download the file `mhk-technical-services-theme.zip`.
2. **Log in to WordPress**:
   - Access your WordPress admin dashboard (`yourdomain.com/wp-admin`).
3. **Navigate to Themes**:
   - Open **Appearance → Themes → Add New Theme → Upload Theme**.
4. **Select File**:
   - Choose `mhk-technical-services-theme.zip`.
5. **Install & Activate**:
   - Click **Install Now**, then click **Activate**.
6. **Configure Menus**:
   - Go to **Appearance → Menus**.
   - Assign your primary navigation to **Primary Menu**.
   - Assign your footer links to **Footer Menu**.

> **Important**: This is a starter theme. Activating it will adjust your site's header, footer, and page layouts. We recommend testing on a staging environment first if your live site actively uses page builders like Elementor, Astra, or WooCommerce.
