# MHK Technical Services — WordPress Theme, Plugin & Web Portal

![MHK Technical Services Logo](mhk-technical-services-theme/assets/images/mhk-technical-services-logo.png)

A comprehensive, production-ready enterprise suite for **MHK Technical Services UAE**, combining:
1. **WordPress Business Theme (`mhk-technical-services-theme/`)**: Responsive custom theme with centralized HD branding, mobile drawer navigation, service grids, article loops, custom logo support, and 404 handler.
2. **Downloadable WordPress Theme Archive (`mhk-technical-services-theme.zip`)**: Instant one-click theme upload package for WordPress dashboard installation.
3. **Enterprise WordPress Plugin (`glams/`)**: Backend activities manager, REST API, certificate validation, and Elementor integration.
4. **React Web Application (`glams/react-app/`)**: Responsive web portal deployed live on Vercel.

---

## 🚀 Live Deployments & Repository

- **Production Vercel URL**: [https://react-app-nu-one-90.vercel.app](https://react-app-nu-one-90.vercel.app)
- **Alternative Vercel URL**: [https://react-r3393ny48-ahmads-projects-3635a9cd.vercel.app](https://react-r3393ny48-ahmads-projects-3635a9cd.vercel.app)
- **GitHub Repository**: [https://github.com/ahmadkhan32/glams-wordpress-plugin_1.git](https://github.com/ahmadkhan32/glams-wordpress-plugin_1.git)

---

## 1. WordPress Theme Folder Structure

The complete theme is located in `mhk-technical-services-theme/` and packaged as `mhk-technical-services-theme.zip`:

```
mhk-technical-services-theme/
├── style.css               # Theme information, CSS variables, typography & responsive styles
├── functions.php           # Theme setup, centralized logo function, menus & script enqueues
├── header.php              # Website header: logo on left, topbar & responsive mobile navigation
├── footer.php              # Website footer: logo, business description, footer menu & copyright
├── index.php               # Main template: hero section, core capabilities grid & posts loop
├── page.php                # Standard template for static website pages
├── single.php              # Single blog post template with author & meta
├── archive.php             # Archive template for categories, tags, and dates
├── 404.php                 # 404 error template with search bar and home redirection
├── assets/
│   ├── images/
│   │   └── mhk-technical-services-logo.png  # High-Definition theme emblem logo (1394x1128 HD PNG)
│   ├── css/                                # Additional modular stylesheets
│   └── js/
│       └── theme.js        # Mobile hamburger navigation toggle & responsive behavior
└── README.md               # Theme documentation & installation guide
```

---

## 2. Where the Logo Appears

### Website Header
- **Position**: Prominently on the left of the header navigation bar.
- **Responsive Behavior**: Scaled smoothly with `contain` fit and height constraints so it remains razor-sharp across 4K, desktop, tablets, and smartphones.
- **Template**: Implemented in [`mhk-technical-services-theme/header.php`](mhk-technical-services-theme/header.php).

### Website Footer
- **Position**: Integrated at the top of the company branding column in the multi-column footer.
- **Context**: Displayed above the company description, ISO standards badge, quick navigation links, and copyright notices.
- **Template**: Implemented in [`mhk-technical-services-theme/footer.php`](mhk-technical-services-theme/footer.php).

### Centralized PHP Function
The logo is stored locally within the theme (`assets/images/mhk-technical-services-logo.png`) rather than relying on external URLs:
```php
<?php mhk_the_theme_logo( 'header' ); ?>
<?php mhk_the_theme_logo( 'footer' ); ?>
```
Changing the logo in one place automatically updates both the header and footer. It also automatically supports the WordPress Customizer (**Appearance → Customize → Site Identity → Logo**).

---

## 3. How to Install the Theme

1. **Download the ZIP**:
   - Download [`mhk-technical-services-theme.zip`](mhk-technical-services-theme.zip) from this repository.
2. **Log in to WordPress**:
   - Open your WordPress admin dashboard (`yourdomain.com/wp-admin`).
3. **Upload Theme**:
   - Navigate to **Appearance → Themes → Add New Theme → Upload Theme**.
4. **Choose File**:
   - Select `mhk-technical-services-theme.zip`.
5. **Install & Activate**:
   - Click **Install Now**, then click **Activate**.
6. **Assign Menus**:
   - Go to **Appearance → Menus**.
   - Create or select your menu, then assign locations:
     - Check **Primary Menu** for the top navigation.
     - Check **Footer Menu** for the bottom footer links.

> **Important**: This is a starter business theme. Activating it sets the site's layout, header, and footer. It is recommended to test on a staging environment first if your live setup uses Astra, Elementor, or WooCommerce.

---

## 4. Building & Deploying the React App

```bash
cd glams/react-app
npm install
npm run build
npx vercel deploy --prod
```
