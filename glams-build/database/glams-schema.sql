-- GLAMS Database Schema
-- Run after plugin activation or import manually

CREATE TABLE IF NOT EXISTS wp_glams_companies (
    id           BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    license_no   VARCHAR(100),
    owner        VARCHAR(255),
    issue_date   DATE,
    expiry_date  DATE,
    country      VARCHAR(100) DEFAULT 'UAE',
    city         VARCHAR(100) DEFAULT 'Dubai',
    address      TEXT,
    phone        VARCHAR(50),
    email        VARCHAR(255),
    website      VARCHAR(255),
    status       VARCHAR(20) DEFAULT 'active',
    logo         BIGINT UNSIGNED DEFAULT 0,
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at   DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS wp_glams_activities (
    id           BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_id   BIGINT UNSIGNED NOT NULL DEFAULT 1,
    activity_en  VARCHAR(500) NOT NULL,
    activity_ar  VARCHAR(500),
    status       VARCHAR(20) DEFAULT 'active',
    sort_order   INT DEFAULT 0,
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS wp_glams_services (
    id           BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title_en     VARCHAR(255) NOT NULL,
    title_ar     VARCHAR(255),
    description  TEXT,
    icon         VARCHAR(100) DEFAULT 'fa-tools',
    sort_order   INT DEFAULT 0,
    status       VARCHAR(20) DEFAULT 'active',
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS wp_glams_immigration (
    id           BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title_en     VARCHAR(255) NOT NULL,
    title_ar     VARCHAR(255),
    badge        VARCHAR(100),
    description  TEXT,
    features     TEXT COMMENT 'JSON array of feature strings',
    sort_order   INT DEFAULT 0,
    status       VARCHAR(20) DEFAULT 'active',
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS wp_glams_logos (
    id           BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    logo_name    VARCHAR(255),
    image_id     BIGINT UNSIGNED DEFAULT 0,
    position     VARCHAR(50),
    width        INT DEFAULT 80,
    height       INT DEFAULT 80,
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS wp_glams_settings (
    id           BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    setting_key  VARCHAR(255) UNIQUE NOT NULL,
    setting_val  LONGTEXT,
    autoload     VARCHAR(5) DEFAULT 'yes',
    updated_at   DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Default company data
INSERT INTO wp_glams_companies (company_name,license_no,owner,issue_date,expiry_date,city,country,status)
VALUES ('MHT Technical Services LLC','DET-2024-XXXXXX','Mohammed Hassan T.','2024-01-01','2024-12-31','Dubai','UAE','active')
ON DUPLICATE KEY UPDATE id=id;

-- All 12 license activities from the screenshot
INSERT INTO wp_glams_activities (company_id,activity_en,activity_ar,status,sort_order) VALUES
(1,'Sanitary Installation & Pipes Repairing','اصلاح التمديدات والتركيبات الصحية وتمديدات المياه','active',1),
(1,'Carpentry & Wood Flooring Works','أعمال النجارة و تركيب الأرضيات الخشبية','active',2),
(1,'Engraving & Ornamentation Works','اعمال النقش والزخرفة','active',3),
(1,'Air-Conditioning, Ventilations & Air Filtration Systems Installation & Maintenance','تركيب انظمة التكييف والتهوية وتنقية الهواء وصيانتها','active',4),
(1,'Plaster Works','اعمال البلاستر','active',5),
(1,'Building Cleaning Services','خدمات تنظيف المباني والمساكن','active',6),
(1,'Floor & Wall Tiling Works','أعمال تبليط الأرضيات والجدران','active',7),
(1,'False Ceiling & Light Partitions Installation','تركيب الأسقف المعلقة و القواطع الخفيفة','active',8),
(1,'Wallpaper Fixing Works','أعمال تركيب ورق الجدران','active',9),
(1,'Electromechanical Equipment Installation and Maintenance','اعمال تركيب المعدات الكهروميكانيكية وصيانتها','active',10),
(1,'Electrical Fittings & Fixtures Repairing & Maintenance','إصلاح وصيانة التمديدات والتركيبات الكهربائية','active',11),
(1,'Immigration & PRO Services','خدمات الهجرة والمتطلبات الحكومية','active',12);
