import { useEffect, useMemo, useState } from "react";

const COMPANIES = [
  { id: 1, name: "Al Noor Technical Services LLC", nameAr: "شركة النور للخدمات التقنية", license: "DET-2024-001234", owner: "Mohammed Al Rashid", status: "active", city: "Dubai", phone: "+971 4 123 4567", expiry: "2025-01-14" },
  { id: 2, name: "Emirates Building Solutions LLC", nameAr: "شركة الإمارات لحلول البناء", license: "DET-2024-005678", owner: "Ahmed Khalil", status: "active", city: "Abu Dhabi", phone: "+971 2 234 5678", expiry: "2025-03-20" },
  { id: 3, name: "Dubai Infra Tech LLC", nameAr: "دبي إنفرا تك ذ.م.م", license: "DET-2024-009012", owner: "Salam Al Mansoori", status: "active", city: "Dubai", phone: "+971 4 345 6789", expiry: "2025-06-30" },
  { id: 4, name: "Gulf HVAC Systems LLC", nameAr: "شركة الخليج لأنظمة التكييف", license: "DET-2023-003456", owner: "Tariq Mahmoud", status: "inactive", city: "Sharjah", phone: "+971 6 456 7890", expiry: "2024-12-31" },
  { id: 5, name: "Al Baraka Maintenance Co.", nameAr: "شركة البركة للصيانة", license: "DET-2024-007890", owner: "Hassan Al Farsi", status: "active", city: "Dubai", phone: "+971 4 567 8901", expiry: "2025-08-15" },
  { id: 6, name: "NextGen Electromech LLC", nameAr: "نيكست جن للكهروميكانيك", license: "DET-2024-011234", owner: "James Wilson", status: "active", city: "Ajman", phone: "+971 6 678 9012", expiry: "2025-11-20" },
];

const ACTIVITIES_DB = {
  1: [
    { name: "Sanitary Installation & Pipes Repairing", nameAr: "اصلاح التمديدات والتركيبات الصحية وتمديدات المياه", status: "active" },
    { name: "Carpentry & wood Flooring Works", nameAr: "أعمال النجارة و تركيب الأرضيات الخشبية", status: "active" },
    { name: "Engraving & Ornamentation Works", nameAr: "اعمال النقش  والزخرفة", status: "active" },
    { name: "Air-Conditioning, Ventilations & Air Filtration Systems Installation & Maintenance", nameAr: "تركيب  انظمة التكييف والتهوية وتنقية الهواء وصيانتها", status: "active" },
    { name: "Plaster Works", nameAr: "اعمال البلاستر", status: "active" },
    { name: "Building Cleaning Services", nameAr: "خدمات تنظيف المباني والمساكن", status: "active" },
    { name: "Floor & Wall Tiling Works", nameAr: "أعمال تبليط الأرضيات والجدران", status: "active" },
    { name: "False Ceiling & Light Partitions Installation", nameAr: "تركيب الأسقف المعلقة و القواطع الخفيفة", status: "active" },
    { name: "Wallpaper Fixing Works", nameAr: "أعمال تركيب ورق الجدران", status: "active" },
    { name: "Electromechanical Equipment Installation and Maintenance", nameAr: "اعمال تركيب المعدات الكهروميكانيكية وصيانتها", status: "active" },
    { name: "Electrical Fittings & Fixtures Repairing & Maintenance", nameAr: "إصلاح وصيانة التمديدات والتركيبات الكهربائية", status: "active" },
  ],
  2: [
    { name: "General Building Contracting", nameAr: "مقاولات البناء العامة", status: "active" },
    { name: "Civil Engineering Works", nameAr: "أعمال الهندسة المدنية", status: "active" },
    { name: "Concrete Works", nameAr: "أعمال الخرسانة", status: "active" },
    { name: "Steel Structure Installation", nameAr: "تركيب الهياكل الفولاذية", status: "active" },
    { name: "Waterproofing & Insulation", nameAr: "العزل المائي والحراري", status: "active" },
    { name: "Landscaping & Irrigation", nameAr: "تنسيق الحدائق والري", status: "inactive" },
  ],
  3: [
    { name: "IT Infrastructure Setup", nameAr: "إعداد البنية التحتية لتكنولوجيا المعلومات", status: "active" },
    { name: "CCTV & Security Systems", nameAr: "أنظمة المراقبة والأمن", status: "active" },
    { name: "Structured Cabling", nameAr: "الكابلات الهيكلية", status: "active" },
    { name: "Network Installation & Maintenance", nameAr: "تركيب وصيانة الشبكات", status: "active" },
    { name: "Fire Alarm & Suppression Systems", nameAr: "أنظمة الإنذار من الحرائق وإخمادها", status: "active" },
  ],
};

const previewServices = [
  ["fa-file-certificate", "License Management", "Complete management of government trade licenses including new applications, renewals, amendments, and cancellations.", "services"],
  ["fa-tools", "Technical Services", "Professional technical services including electrical, plumbing, HVAC, carpentry, civil works, and facility maintenance.", "services"],
  ["fa-passport", "Immigration & Visa", "Expert immigration assistance for employment visas, family sponsorship, golden visas, and business residence permits.", "immigration"],
  ["fa-shield-alt", "Certificate Verification", "Instant online verification of government certificates and licenses using QR codes and license numbers.", "services"],
  ["fa-building", "Business Setup", "Complete business setup services including company formation, bank account opening, and office solutions in UAE Free Zones.", "services"],
  ["fa-file-pdf", "Document Services", "Professional document attestation, translation, notarization, and PRO services for all government departments.", "services"],
];

const technicalServices = [
  ["fa-bolt", "Electrical Works", "Licensed electrical installation, repair, and maintenance services compliant with UAE DEWA standards."],
  ["fa-faucet", "Plumbing & Sanitary", "Comprehensive plumbing services including pipe repair, sanitary installation, and water system maintenance."],
  ["fa-wind", "HVAC Systems", "Air-conditioning installation, ventilation systems, and air filtration maintenance with UAE cooling certified technicians."],
  ["fa-hammer", "Carpentry & Flooring", "Custom woodwork, flooring installation, cabinets, and furniture services for residential and commercial projects."],
  ["fa-paint-roller", "Painting & Plastering", "Interior and exterior painting, plastering, wallpaper installation, and surface finishing services."],
  ["fa-broom", "Building Cleaning", "Professional building cleaning, deep cleaning, post-construction cleaning, and facility management services."],
  ["fa-door-open", "False Ceiling & Partitions", "Suspended ceiling systems, light partitions, glass partitions, and office fit-out solutions."],
  ["fa-drafting-compass", "Engraving & Decoration", "Custom engraving, ornamental works, decorative panels, and artistic finishes for premium projects."],
  ["fa-cogs", "Electromechanical Services", "Complete electromechanical equipment installation, commissioning, and preventive maintenance programs."],
];

const visaTypes = [
  ["Employment", "Work Visa", "For professionals employed by UAE companies. Includes labor card, Emirates ID, and health card processing.", "2–3 Years", "From AED 3,500"],
  ["Family", "Residence Visa", "Sponsor spouse, children, and parents under UAE family residence visa with full documentation support.", "2 Years", "From AED 2,800"],
  ["Premium", "Golden Visa", "Long-term 5 or 10 year UAE residence for investors, entrepreneurs, exceptional talents, and researchers.", "5–10 Years", "From AED 8,000"],
  ["Business", "Investor Visa", "UAE investor residence visa for business owners and shareholders in mainland or free zone companies.", "3 Years", "From AED 4,200"],
  ["Short-term", "Tourist Visa", "Single entry or multiple-entry tourist visas for short stays, extended visits, and visa on arrival assistance.", "30–90 Days", "From AED 450"],
  ["Students", "Student Visa", "Student residence permits for UAE universities and schools with full enrollment documentation support.", "1 Year", "From AED 1,800"],
];

const processSteps = [
  [1, "Submit Documents", "Provide required documents — passport, photos, sponsorship letter, and relevant certificates."],
  [2, "Application Review", "Our team reviews documents and submits the application to the appropriate UAE authority."],
  [3, "Medical & Emirates ID", "We schedule your medical fitness test and Emirates ID biometric appointment at approved centers."],
  [4, "Visa Stamping", "Receive your stamped residence visa and Emirates ID, usually within 7–10 business days."],
];

const testimonials = [
  ["M", "Mohammed Al Rashid", "Al Rashid Technical Services, Dubai", '"GLAMS handled our complete license renewal in under 3 days. Their team is professional and their online verification system is outstanding."'],
  ["A", "Ahmed Khalil", "Gulf Construction LLC, Abu Dhabi", '"The immigration visa service was seamless. They arranged our entire team\'s work visas in time. Excellent Arabic-English bilingual support."'],
  ["S", "Sarah Jameson", "InfraCore Systems, Sharjah", '"Their government license activities system is exactly what we needed. The QR verification feature makes certificate validation incredibly easy."'],
];

const aboutFeatures = [
  "Full Trade License Management (New, Renewal, Amendment)",
  "Digital License Activities Certificate with Arabic & English",
  "QR Code Certificate Verification System",
  "Immigration & Visa Services for All Emirates",
  "24/7 Online Portal with Real-time Status Updates",
  "PDF Export with Official Government Layout",
  "Elementor WordPress Integration for Easy Editing",
  "REST API for Third-party System Integration",
  "Bilingual Support (Arabic & English)",
  "Dedicated Account Manager for Every Client",
];

const valuesCards = [
  ["fa-medal", "Excellence", "We set the highest standard in government compliance technology, constantly improving our systems to exceed expectations."],
  ["fa-handshake", "Integrity", "Transparent processes and honest communication with our clients and government partners form the foundation of everything we do."],
  ["fa-rocket", "Innovation", "Continuously adopting cutting-edge technology to make government services faster, simpler, and more accessible for all UAE businesses."],
];

const validPages = new Set(["home", "services", "license", "companies", "immigration", "about", "contact", "verify"]);

function statusBadge(status, arabic = false) {
  const text = arabic
    ? status === "active"
      ? "فعال"
      : "غير فعال"
    : status === "active"
      ? "Active"
      : "Inactive";

  return (
    <span className={`status-badge status-${status}`}>
      <span className="status-dot" />
      {text}
    </span>
  );
}

export default function App() {
  const initialPage = validPages.has(window.location.hash.replace("#", ""))
    ? window.location.hash.replace("#", "")
    : "home";

  const [currentPage, setCurrentPage] = useState(initialPage);
  const [mobileOpen, setMobileOpen] = useState(false);
  const [selectedCompanyId, setSelectedCompanyId] = useState(1);
  const [searchInput, setSearchInput] = useState("");
  const [searchResult, setSearchResult] = useState(null);
  const [searchLoading, setSearchLoading] = useState(false);
  const [companyFilter, setCompanyFilter] = useState("");
  const [language, setLanguage] = useState("en");
  const [toast, setToast] = useState({ show: false, message: "Success" });

  useEffect(() => {
    const onHashChange = () => {
      const next = window.location.hash.replace("#", "") || "home";
      setCurrentPage(validPages.has(next) ? next : "home");
    };

    window.addEventListener("hashchange", onHashChange);
    return () => window.removeEventListener("hashchange", onHashChange);
  }, []);

  useEffect(() => {
    if (!toast.show) return undefined;
    const timer = window.setTimeout(() => {
      setToast((prev) => ({ ...prev, show: false }));
    }, 3000);
    return () => window.clearTimeout(timer);
  }, [toast.show]);

  const activities = ACTIVITIES_DB[selectedCompanyId] || ACTIVITIES_DB[1];

  const filteredCompanies = useMemo(() => {
    const q = companyFilter.trim().toLowerCase();
    if (!q) return COMPANIES;
    return COMPANIES.filter(
      (company) =>
        company.name.toLowerCase().includes(q) ||
        company.license.toLowerCase().includes(q) ||
        company.city.toLowerCase().includes(q)
    );
  }, [companyFilter]);

  const navigate = (page) => {
    setCurrentPage(page);
    setMobileOpen(false);
    window.location.hash = page;
    window.scrollTo({ top: 0, behavior: "smooth" });
    if (page === "verify") {
      setSearchResult(null);
    }
  };

  const showToast = (message) => {
    setToast({ show: true, message });
  };

  const doSearch = (overrideValue) => {
    const query = (overrideValue ?? searchInput).trim().toLowerCase();
    setSearchInput(overrideValue ?? searchInput);

    if (!query) {
      setSearchResult({ type: "empty" });
      return;
    }

    setSearchLoading(true);
    window.setTimeout(() => {
      const found = COMPANIES.find(
        (company) =>
          company.license.toLowerCase().includes(query) ||
          company.name.toLowerCase().includes(query) ||
          company.owner.toLowerCase().includes(query)
      );

      if (!found) {
        setSearchLoading(false);
        setSearchResult({ type: "missing", query });
        return;
      }

      setSearchLoading(false);
      setSearchResult({ type: "found", company: found, activities: ACTIVITIES_DB[found.id] || [] });
    }, 600);
  };

  const topBarButton = (code, label) => (
    <button
      type="button"
      className={`lang-btn ${language === code ? "active" : ""}`}
      onClick={() => {
        setLanguage(code);
        showToast(code === "ar" ? "تم تغيير اللغة إلى العربية" : "Language changed to English");
      }}
    >
      {label}
    </button>
  );

  return (
    <>
      <div className="top-bar">
        <div className="container">
          <span><i className="fas fa-phone" style={{ marginRight: 6 }} /> +971 4 123 4567 &nbsp;|&nbsp; <i className="fas fa-envelope" style={{ marginRight: 6 }} /> info@glams.ae</span>
          <div style={{ display: "flex", alignItems: "center", gap: 16 }}>
            <div className="top-bar-links">
              <a onClick={() => navigate("license")}><i className="fas fa-file-alt" /> License Lookup</a>
              <a onClick={() => navigate("verify")}><i className="fas fa-shield-check" /> Verify Certificate</a>
              <a onClick={() => navigate("contact")}><i className="fas fa-headset" /> Support</a>
            </div>
            <div className="top-bar-lang">
              {topBarButton("en", "EN")}
              {topBarButton("ar", "ع")}
            </div>
          </div>
        </div>
      </div>

      <nav className="navbar">
        <div className="container navbar-inner">
          <div className="nav-logo" onClick={() => navigate("home")}> 
            <div className="nav-logo-icon">
              <svg viewBox="0 0 24 24"><path d="M12 2L3 7v10l9 5 9-5V7L12 2zm0 2.3L19 8v8l-7 3.9L5 16V8l7-3.7z" /></svg>
            </div>
            <div className="nav-logo-text">
              <div className="brand">GLAMS</div>
              <div className="tagline">Government License Management</div>
            </div>
          </div>
          <div className="nav-links">
            {[
              ["home", "Home"],
              ["services", "Services"],
              ["license", "License Activities"],
              ["companies", "Companies"],
              ["immigration", "Immigration"],
              ["about", "About"],
              ["contact", "Contact"],
            ].map(([page, label]) => (
              <a key={page} onClick={() => navigate(page)} className={currentPage === page ? "active" : ""}>{label}</a>
            ))}
          </div>
          <div className="nav-actions">
            <button className="btn btn-outline btn-sm" onClick={() => navigate("verify")}><i className="fas fa-search" /> Verify License</button>
            <button className="btn btn-primary btn-sm" onClick={() => navigate("contact")}>Get Started</button>
            <button className="hamburger" onClick={() => setMobileOpen((prev) => !prev)}>
              <span />
              <span />
              <span />
            </button>
          </div>
        </div>
      </nav>

      <div className={`mobile-menu ${mobileOpen ? "open" : ""}`} id="mobileMenu" onClick={(event) => {
        if (event.target.id === "mobileMenu") setMobileOpen(false);
      }}>
        <div className="mobile-nav-panel">
          <div className="mobile-nav-close"><button onClick={() => setMobileOpen(false)}><i className="fas fa-times" /></button></div>
          <div className="mobile-nav-links">
            {["home", "services", "license", "companies", "immigration", "about", "contact"].map((page) => (
              <a key={page} onClick={() => navigate(page)}>{page === "license" ? "License Activities" : page.charAt(0).toUpperCase() + page.slice(1)}</a>
            ))}
          </div>
          <div style={{ marginTop: 24, display: "flex", flexDirection: "column", gap: 10 }}>
            <button className="btn btn-outline w-full" onClick={() => navigate("verify")}>Verify License</button>
            <button className="btn btn-primary w-full" onClick={() => navigate("contact")}>Get Started</button>
          </div>
        </div>
      </div>

      <div className={`page ${currentPage === "home" ? "active" : ""}`} id="page-home">
        <section className="hero">
          <div className="container" style={{ display: "flex", gap: 48, alignItems: "center" }}>
            <div className="hero-content">
              <div className="hero-eyebrow"><i className="fas fa-star" /> UAE Government Certified System</div>
              <h1>Technical Services <span>Excellence</span> in UAE</h1>
              <p className="hero-sub">Complete government license management, certificate verification, and immigration services for businesses operating in the United Arab Emirates — Dubai, Abu Dhabi & beyond.</p>
              <div className="hero-actions">
                <button className="btn btn-primary btn-lg" onClick={() => navigate("license")}><i className="fas fa-file-certificate" /> View License Activities</button>
                <button className="btn btn-outline btn-lg" style={{ color: "#fff", borderColor: "rgba(255,255,255,0.4)" }} onClick={() => navigate("verify")}><i className="fas fa-search" /> Verify Certificate</button>
              </div>
            </div>
            <div className="hero-visual">
              <div className="hero-card">
                <div className="hero-card-header">
                  <div className="hero-card-logo">
                    <div className="hc-logo-box"><i className="fas fa-building-columns" /></div>
                    <div><div className="hc-brand">GLAMS Portal</div><div className="hc-sub">Government System</div></div>
                  </div>
                  <div className="hc-badge"><i className="fas fa-circle" style={{ fontSize: 8, marginRight: 5 }} />Live</div>
                </div>
                <div className="hero-card-stat">
                  <div className="hc-stat"><div className="hc-stat-num">2,400+</div><div className="hc-stat-label">Active Licenses</div></div>
                  <div className="hc-stat"><div className="hc-stat-num">98.7%</div><div className="hc-stat-label">Approval Rate</div></div>
                  <div className="hc-stat"><div className="hc-stat-num">48h</div><div className="hc-stat-label">Avg Processing</div></div>
                  <div className="hc-stat"><div className="hc-stat-num">15+</div><div className="hc-stat-label">Service Types</div></div>
                </div>
                <div className="hc-activity-list">
                  {["Electrical & Plumbing Works", "Air-Conditioning Systems", "Building Cleaning Services"].map((item) => (
                    <div key={item} className="hc-activity"><i className="fas fa-check-circle" /><span>{item}</span><div className="hc-dot" /></div>
                  ))}
                </div>
              </div>
            </div>
          </div>
        </section>

        <div className="stats-bar">
          <div className="container">
            <div className="stat-item"><div className="stat-num">2,400+</div><div className="stat-label">Licensed Companies</div></div>
            <div className="stat-item"><div className="stat-num">15,000+</div><div className="stat-label">Activities Managed</div></div>
            <div className="stat-item"><div className="stat-num">48hrs</div><div className="stat-label">Avg. Processing Time</div></div>
            <div className="stat-item"><div className="stat-num">98.7%</div><div className="stat-label">Client Satisfaction</div></div>
          </div>
        </div>

        <section className="section services">
          <div className="container">
            <div className="section-head">
              <div className="section-tag">Our Services</div>
              <h2 className="section-title">Comprehensive Technical Services</h2>
              <p className="section-desc">From license management to immigration services, we provide end-to-end solutions for businesses in the UAE.</p>
              <div className="divider" />
            </div>
            <div className="grid grid-3">
              {previewServices.map(([icon, title, desc, page]) => (
                <div key={title} className="service-card" onClick={() => navigate(page)}>
                  <div className="service-icon"><i className={`fas ${icon}`} /></div>
                  <h3>{title}</h3>
                  <p>{desc}</p>
                  <div className="service-link">Learn More <i className="fas fa-arrow-right" /></div>
                </div>
              ))}
            </div>
          </div>
        </section>

        <section className="section why-us">
          <div className="container">
            <div className="why-grid">
              <div>
                <div className="section-tag">Why GLAMS</div>
                <h2 className="section-title" style={{ textAlign: "left", marginBottom: 32 }}>Why Businesses Trust Our Platform</h2>
                <div className="why-list">
                  {[
                    ["fa-bolt", "Lightning Fast Processing", "Get your license applications processed in as little as 48 hours with our streamlined digital workflow system."],
                    ["fa-user-shield", "Dedicated PRO Experts", "Our team of 50+ government relations officers handles all paperwork and liaison directly with UAE authorities."],
                    ["fa-globe-asia", "All Emirates Coverage", "We operate across all 7 Emirates — Dubai, Abu Dhabi, Sharjah, Ajman, RAK, UAQ, and Fujairah."],
                    ["fa-headset", "24/7 Arabic & English Support", "Bilingual customer support available round the clock via phone, email, and WhatsApp in Arabic and English."],
                  ].map(([icon, title, desc]) => (
                    <div key={title} className="why-item">
                      <div className="why-icon"><i className={`fas ${icon}`} /></div>
                      <div className="why-content"><h4>{title}</h4><p>{desc}</p></div>
                    </div>
                  ))}
                </div>
              </div>
              <div className="why-visual">
                <h3>Trusted by 2,400+ Businesses Across the UAE</h3>
                <p style={{ color: "rgba(255,255,255,0.75)", fontSize: 15, lineHeight: 1.7 }}>From small enterprises to multinational corporations, GLAMS has been the trusted partner for government compliance in the UAE for over 12 years.</p>
                <div className="why-numbers">
                  {[["12+", "Years in UAE"], ["50+", "PRO Experts"], ["7", "Emirates"], ["98%", "Approval Rate"]].map(([num, label]) => (
                    <div key={label} className="why-num-item"><div className="why-num-big">{num}</div><div className="why-num-lbl">{label}</div></div>
                  ))}
                </div>
              </div>
            </div>
          </div>
        </section>

        <section className="section testimonials">
          <div className="container">
            <div className="section-head">
              <div className="section-tag">Client Reviews</div>
              <h2 className="section-title">What Our Clients Say</h2>
              <div className="divider" />
            </div>
            <div className="testimonials-grid">
              {testimonials.map(([avatar, name, company, text]) => (
                <div key={name} className="testi-card">
                  <div className="testi-stars">★★★★★</div>
                  <p className="testi-text">{text}</p>
                  <div className="testi-author">
                    <div className="testi-avatar">{avatar}</div>
                    <div><div className="testi-name">{name}</div><div className="testi-company">{company}</div></div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </section>

        <section className="cta-section">
          <div className="container">
            <h2>Ready to Start Your Business in UAE?</h2>
            <p>Get expert guidance on government licenses, technical services, and immigration in the UAE. Our team is ready to help.</p>
            <div className="cta-actions">
              <button className="btn btn-white btn-lg" onClick={() => navigate("contact")}>Get Free Consultation</button>
              <button className="btn btn-gold btn-lg" onClick={() => navigate("license")}><i className="fas fa-file-certificate" /> View License System</button>
            </div>
          </div>
        </section>
      </div>

      <div className={`page ${currentPage === "license" ? "active" : ""}`} id="page-license">
        <div className="doc-page">
          <div className="container">
            <div style={{ marginBottom: 24, textAlign: "center" }}>
              <div className="section-tag">Official Government Document</div>
              <h1 style={{ fontSize: 28, fontWeight: 800, color: "var(--dark)", marginBottom: 8 }}>License Activities Certificate</h1>
              <p style={{ color: "var(--muted)", fontSize: 15 }}>Department of Economy & Tourism — Dubai, UAE</p>
            </div>

            <div style={{ background: "#fff", borderRadius: 12, padding: "20px 24px", marginBottom: 20, boxShadow: "var(--shadow)", border: "1px solid var(--border)", display: "flex", gap: 16, alignItems: "center", flexWrap: "wrap" }}>
              <label style={{ fontSize: 13, fontWeight: 600, color: "var(--muted)", whiteSpace: "nowrap" }}>Select Company:</label>
              <select value={selectedCompanyId} onChange={(event) => setSelectedCompanyId(Number(event.target.value))} style={{ flex: 1, minWidth: 200, padding: "9px 14px", border: "1.5px solid var(--border)", borderRadius: 8, fontSize: 14, fontFamily: "var(--font)", outline: "none", color: "var(--text)", background: "#fff" }}>
                <option value={1}>Al Noor Technical Services LLC — DET-2024-001234</option>
                <option value={2}>Emirates Building Solutions LLC — DET-2024-005678</option>
                <option value={3}>Dubai Infra Tech LLC — DET-2024-009012</option>
              </select>
              <button className="btn btn-outline btn-sm" onClick={() => window.print()}><i className="fas fa-print" /> Print</button>
              <button className="btn btn-primary btn-sm" onClick={() => showToast("PDF download started")}><i className="fas fa-file-pdf" /> Export PDF</button>
            </div>

            <div className="gov-document" id="govDocument">
              <div className="gov-header">
                <div className="gov-logo-left">
                  <div className="gov-emblem" />
                  <div>
                    <div className="gov-name-en" style={{ fontSize: 13 }}>GOVERNMENT OF DUBAI</div>
                    <div className="gov-name-ar">حكومـة دبـي</div>
                  </div>
                </div>
                <div className="gov-center-logo">
                  <div className="mht-logo">
                    <div>
                      <div className="mht-logo-text">MH<span style={{ color: "var(--gold)" }}>T</span></div>
                      <div className="mht-sub">Ministry of Human Talents</div>
                    </div>
                  </div>
                </div>
                <div className="gov-logo-right">
                  <div className="det-logo-box">
                    <div className="det-main">DU<span>B</span>Ə<span>I</span></div>
                    <div className="det-sub">Economy and Tourism</div>
                    <div className="det-ar">للاقتصاد والسياحة</div>
                  </div>
                </div>
              </div>

              <div className="gov-stripe" />

              <div className="act-title-row">
                <div className="act-title-box">
                  <div className="act-title-en">License Activities /</div>
                  <div className="act-title-ar">أنشطة الرخصة</div>
                </div>
              </div>

              <div className="activities-table-wrap">
                <table className="activities-tbl" id="activitiesTable">
                  <thead>
                    <tr>
                      <th style={{ width: "40%" }}>Activity</th>
                      <th style={{ width: "12%" }}>Status</th>
                      <th style={{ width: "12%", textAlign: "right", fontFamily: "var(--font-ar)", direction: "rtl" }}>الحالة</th>
                      <th style={{ width: "36%", textAlign: "right", fontFamily: "var(--font-ar)", direction: "rtl" }}>النشاط</th>
                    </tr>
                  </thead>
                  <tbody id="activitiesBody">
                    {activities.map((activity) => (
                      <tr key={`${activity.name}-${activity.nameAr}`}>
                        <td><span className="activity-name-en">{activity.name}</span></td>
                        <td>{statusBadge(activity.status)}</td>
                        <td style={{ textAlign: "right" }}>{statusBadge(activity.status, true)}</td>
                        <td><span className="activity-name-ar">{activity.nameAr}</span></td>
                      </tr>
                    ))}
                  </tbody>
                </table>
              </div>

              <div className="gov-footer">
                <div><i className="fas fa-qrcode" style={{ marginRight: 8 }} />Verify at: portal.glams.ae/verify</div>
                <div>Document No: GLAMS-2024-001234 &nbsp;|&nbsp; Generated: 15/07/2026</div>
                <div className="gov-footer-ar" style={{ fontFamily: "var(--font-ar)", direction: "rtl" }}>وثيقة رسمية معتمدة</div>
              </div>
            </div>

            <div className="doc-actions">
              <button className="btn btn-outline" onClick={() => navigate("verify")}><i className="fas fa-search" /> Verify Another License</button>
              <button className="btn btn-primary" onClick={() => showToast("PDF download started")}><i className="fas fa-file-pdf" /> Download PDF</button>
              <button className="btn btn-outline" onClick={() => window.print()}><i className="fas fa-print" /> Print Document</button>
              <button className="btn btn-outline" onClick={() => showToast("QR Code generated")}><i className="fas fa-qrcode" /> QR Code</button>
            </div>
          </div>
        </div>
      </div>

      <div className={`page ${currentPage === "verify" ? "active" : ""}`} id="page-verify">
        <div className="search-hero">
          <div className="container">
            <h1><i className="fas fa-shield-check" style={{ marginRight: 12, color: "var(--gold)" }} />Verify License & Certificates</h1>
            <p>Enter a license number or company name to instantly verify its status and view all registered activities.</p>
            <div className="search-box-wrap">
              <div className="search-form">
                <input type="text" className="search-input" value={searchInput} placeholder="Enter license number (e.g. DET-2024-001234) or company name..." onChange={(event) => setSearchInput(event.target.value)} onKeyDown={(event) => { if (event.key === "Enter") doSearch(); }} />
                <button className="search-btn" onClick={() => doSearch()}><i className="fas fa-search" /> Search</button>
              </div>
              <div style={{ marginTop: 12, textAlign: "center", color: "rgba(255,255,255,0.65)", fontSize: 13 }}>
                Try: <span style={{ cursor: "pointer", color: "rgba(255,255,255,0.9)", textDecoration: "underline" }} onClick={() => doSearch("DET-2024-001234")}>DET-2024-001234</span> &nbsp;|&nbsp;
                <span style={{ cursor: "pointer", color: "rgba(255,255,255,0.9)", textDecoration: "underline" }} onClick={() => doSearch("Al Noor")}>Al Noor</span>
              </div>
            </div>
          </div>
        </div>
        <div className="search-results">
          <div className="container">
            <div id="searchResultWrap">
              {searchLoading ? (
                <div className="spinner-wrap"><div className="spinner" /></div>
              ) : searchResult?.type === "empty" ? (
                <div className="empty-state"><i className="fas fa-search" /><p>Please enter a search term.</p></div>
              ) : searchResult?.type === "missing" ? (
                <div className="empty-state"><i className="fas fa-exclamation-circle" style={{ color: "var(--red)" }} /><p style={{ fontSize: 17, fontWeight: 600, color: "var(--dark)", marginBottom: 8 }}>No Results Found</p><p>No license matching <strong>"{searchResult.query}"</strong> was found. Please check the license number and try again.</p></div>
              ) : searchResult?.type === "found" ? (
                <div className="result-card">
                  <div className="result-card-header">
                    <div>
                      <div className="result-license"><i className="fas fa-id-card" style={{ marginRight: 6 }} />{searchResult.company.license}</div>
                      <div className="result-company">{searchResult.company.name}</div>
                      <div style={{ fontFamily: "var(--font-ar)", direction: "rtl", fontSize: 14, opacity: 0.85, marginTop: 4 }}>{searchResult.company.nameAr}</div>
                    </div>
                    <div style={{ textAlign: "right" }}>
                      <span className="result-badge"><i className="fas fa-check-circle" style={{ marginRight: 5 }} />{searchResult.company.status === "active" ? "Active License" : "Inactive"}</span>
                      <div style={{ marginTop: 8, fontSize: 12, opacity: 0.8 }}>Verified: {new Date().toLocaleDateString()}</div>
                    </div>
                  </div>
                  <div className="result-body">
                    <div className="result-field"><label>License Owner</label><span>{searchResult.company.owner}</span></div>
                    <div className="result-field"><label>City</label><span>{searchResult.company.city}, UAE</span></div>
                    <div className="result-field"><label>Phone</label><span>{searchResult.company.phone}</span></div>
                    <div className="result-field"><label>License Expiry</label><span>{searchResult.company.expiry}</span></div>
                  </div>
                  <div style={{ padding: "0 28px 28px" }}>
                    <div style={{ fontSize: 13, fontWeight: 700, color: "var(--muted)", textTransform: "uppercase", letterSpacing: 1, marginBottom: 14 }}>License Activities ({searchResult.activities.length})</div>
                    <table className="activities-tbl">
                      <thead><tr><th>Activity</th><th>Status</th><th style={{ textAlign: "right", fontFamily: "var(--font-ar)", direction: "rtl" }}>النشاط</th></tr></thead>
                      <tbody>
                        {searchResult.activities.map((activity) => (
                          <tr key={`${activity.name}-${activity.nameAr}`}>
                            <td><span style={{ fontWeight: 500 }}>{activity.name}</span></td>
                            <td>{statusBadge(activity.status)}</td>
                            <td style={{ textAlign: "right", fontFamily: "var(--font-ar)", direction: "rtl" }}>{activity.nameAr}</td>
                          </tr>
                        ))}
                      </tbody>
                    </table>
                  </div>
                  <div style={{ padding: "16px 28px", background: "var(--bg)", display: "flex", gap: 12, flexWrap: "wrap" }}>
                    <button className="btn btn-primary btn-sm" onClick={() => showToast("PDF export started")}><i className="fas fa-file-pdf" /> Download PDF</button>
                    <button className="btn btn-outline btn-sm" onClick={() => window.print()}><i className="fas fa-print" /> Print</button>
                    <button className="btn btn-outline btn-sm" onClick={() => showToast("QR Code generated")}><i className="fas fa-qrcode" /> Generate QR</button>
                  </div>
                </div>
              ) : (
                <div className="empty-state">
                  <i className="fas fa-search" />
                  <p style={{ fontSize: 17, fontWeight: 600, marginBottom: 8 }}>Search for a License</p>
                  <p>Enter a license number or company name above to verify its status.</p>
                </div>
              )}
            </div>
          </div>
        </div>
      </div>

      <div className={`page ${currentPage === "companies" ? "active" : ""}`} id="page-companies">
        <div style={{ background: "linear-gradient(135deg,var(--primary),var(--primary-dark))", padding: "60px 0", textAlign: "center" }}>
          <div className="container">
            <div className="section-tag" style={{ color: "var(--gold)", background: "rgba(184,150,46,0.2)" }}>Company Directory</div>
            <h1 style={{ fontSize: 38, fontWeight: 800, color: "#fff", margin: "12px 0 14px", letterSpacing: -1 }}>Licensed Companies</h1>
            <p style={{ color: "rgba(255,255,255,0.75)", fontSize: 16, maxWidth: 500, margin: "0 auto" }}>Browse all registered and licensed companies operating in the UAE through our government portal.</p>
          </div>
        </div>
        <div className="companies-section">
          <div className="container">
            <div style={{ display: "flex", gap: 12, marginBottom: 28, flexWrap: "wrap" }}>
              <input type="text" value={companyFilter} placeholder="Search companies..." style={{ flex: 1, minWidth: 200, padding: "10px 16px", border: "1.5px solid var(--border)", borderRadius: 8, fontSize: 14, outline: "none", fontFamily: "var(--font)" }} onChange={(event) => setCompanyFilter(event.target.value)} />
              <select style={{ padding: "10px 16px", border: "1.5px solid var(--border)", borderRadius: 8, fontSize: 14, outline: "none", fontFamily: "var(--font)" }}>
                <option>All Status</option>
                <option>Active</option>
                <option>Inactive</option>
                <option>Expired</option>
              </select>
              <button className="btn btn-primary"><i className="fas fa-filter" /> Filter</button>
            </div>
            <div className="grid grid-3" id="companiesGrid">
              {filteredCompanies.map((company) => (
                <div key={company.id} className="company-card" onClick={() => {
                  showToast(`Opening ${company.name}...`);
                  setSelectedCompanyId(Math.min(company.id, 3));
                  navigate("license");
                }}>
                  <div className="company-card-header">
                    <div style={{ display: "flex", gap: 14, alignItems: "flex-start" }}>
                      <div className="company-avatar">{company.name[0]}</div>
                      <div>
                        <div className="company-name">{company.name}</div>
                        <div className="company-name-ar">{company.nameAr}</div>
                      </div>
                    </div>
                    <span className={`status-badge status-${company.status}`} style={{ whiteSpace: "nowrap" }}>{company.status === "active" ? "Active" : "Inactive"}</span>
                  </div>
                  <div className="company-meta">
                    <div className="company-meta-item"><i className="fas fa-id-card" /><span>{company.license}</span></div>
                    <div className="company-meta-item"><i className="fas fa-user" /><span>{company.owner}</span></div>
                    <div className="company-meta-item"><i className="fas fa-map-marker-alt" /><span>{company.city}, UAE</span></div>
                    <div className="company-meta-item"><i className="fas fa-phone" /><span>{company.phone}</span></div>
                    <div className="company-meta-item"><i className="fas fa-calendar-times" /><span>Expires: {company.expiry}</span></div>
                  </div>
                  <div className="company-footer">
                    <span style={{ fontSize: 13, color: "var(--muted)" }}>View Activities</span>
                    <button className="btn btn-primary btn-sm">View Details</button>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>

      <div className={`page ${currentPage === "services" ? "active" : ""}`} id="page-services">
        <div style={{ background: "linear-gradient(135deg,#0f1923,#1a2f3a)", padding: "80px 0", textAlign: "center" }}>
          <div className="container">
            <div className="section-tag" style={{ background: "rgba(184,150,46,0.2)", color: "var(--gold)" }}>What We Offer</div>
            <h1 style={{ fontSize: 44, fontWeight: 800, color: "#fff", margin: "12px 0 14px", letterSpacing: -1 }}>Our Technical Services</h1>
            <p style={{ color: "rgba(255,255,255,0.72)", fontSize: 17, maxWidth: 580, margin: "0 auto", lineHeight: 1.7 }}>Comprehensive government-approved technical services for businesses and individuals in the UAE.</p>
          </div>
        </div>
        <section className="section services">
          <div className="container">
            <div className="grid grid-3">
              {technicalServices.map(([icon, title, desc]) => (
                <div key={title} className="service-card"><div className="service-icon"><i className={`fas ${icon}`} /></div><h3>{title}</h3><p>{desc}</p><div className="service-link">View Details <i className="fas fa-arrow-right" /></div></div>
              ))}
            </div>
          </div>
        </section>
        <section className="cta-section">
          <div className="container">
            <h2>Need a Custom Service Quote?</h2>
            <p>Contact our team for a tailored quotation on any technical service requirement in the UAE.</p>
            <div className="cta-actions">
              <button className="btn btn-white btn-lg" onClick={() => navigate("contact")}>Request Quote</button>
              <button className="btn btn-gold btn-lg" onClick={() => showToast("WhatsApp opening...")}><i className="fab fa-whatsapp" /> WhatsApp Us</button>
            </div>
          </div>
        </section>
      </div>

      <div className={`page ${currentPage === "immigration" ? "active" : ""}`} id="page-immigration">
        <div className="immigration-hero">
          <div className="container">
            <div className="section-tag" style={{ background: "rgba(184,150,46,0.2)", color: "var(--gold)" }}>UAE Immigration</div>
            <h1 style={{ marginTop: 12 }}>UAE Visa & Immigration Services</h1>
            <p>Expert assistance for all UAE visa types — employment, family, golden visa, investor, and tourist visas.</p>
            <div style={{ display: "flex", gap: 14, justifyContent: "center", flexWrap: "wrap" }}>
              <button className="btn btn-primary btn-lg" onClick={() => navigate("contact")}>Start Application</button>
              <button className="btn btn-outline btn-lg" style={{ color: "#fff", borderColor: "rgba(255,255,255,0.4)" }} onClick={() => navigate("verify")}>Check Status</button>
            </div>
          </div>
        </div>
        <section className="section" style={{ background: "var(--bg)" }}>
          <div className="container">
            <div className="section-head"><div className="section-tag">Visa Types</div><h2 className="section-title">UAE Visa Categories</h2><div className="divider" /></div>
            <div className="visa-grid">
              {visaTypes.map(([type, name, desc, duration, price]) => (
                <div key={name} className="visa-card"><div className="visa-card-top"><div className="visa-type" style={type === "Premium" ? { color: "var(--gold)" } : undefined}>{type}</div><div className="visa-name">{name}</div><div className="visa-desc">{desc}</div></div><div className="visa-card-footer"><div className="visa-duration"><i className="fas fa-clock" style={{ marginRight: 5 }} />{duration}</div><div className="visa-price">{price}</div></div></div>
              ))}
            </div>
          </div>
        </section>
        <section className="process-steps">
          <div className="container">
            <div className="section-head"><div className="section-tag">Process</div><h2 className="section-title">How It Works</h2><div className="divider" /></div>
            <div className="step-grid">
              {processSteps.map(([num, title, desc]) => (
                <div key={title} className="step-item"><div className="step-num">{num}</div><div className="step-title">{title}</div><div className="step-desc">{desc}</div></div>
              ))}
            </div>
          </div>
        </section>
      </div>

      <div className={`page ${currentPage === "about" ? "active" : ""}`} id="page-about">
        <div className="about-hero">
          <div className="container">
            <div className="section-tag" style={{ background: "rgba(184,150,46,0.2)", color: "var(--gold)" }}>About GLAMS</div>
            <h1 style={{ marginTop: 12 }}>Powering UAE Business Compliance</h1>
            <p>Founded in Dubai in 2012, GLAMS has been the trusted technology partner for government license management across all seven Emirates of the UAE.</p>
          </div>
        </div>
        <section className="section">
          <div className="container">
            <div className="about-grid">
              <div className="about-text">
                <h2>The Most Advanced License Management System in the UAE</h2>
                <p>GLAMS was built with a single mission: to simplify the complex world of UAE government compliance. From trade license applications to certificate verification, our platform handles thousands of transactions daily for companies across all industries.</p>
                <p>Our system is fully integrated with official UAE government portals including Dubai DET, MOHRE, ICA, and all 7 Emirates' economic departments, ensuring real-time data accuracy and regulatory compliance.</p>
                <p>We serve over 2,400 active companies ranging from small enterprises to multinational corporations, processing more than 15,000 activities monthly through our government-certified platform.</p>
                <div style={{ display: "flex", gap: 16, marginTop: 24, flexWrap: "wrap" }}>
                  <button className="btn btn-primary" onClick={() => navigate("contact")}>Work With Us</button>
                  <button className="btn btn-outline" onClick={() => navigate("services")}>View Services</button>
                </div>
              </div>
              <div className="about-visual">
                <h3 style={{ fontSize: 20, fontWeight: 700, color: "var(--dark)", marginBottom: 20 }}>What We Provide</h3>
                <ul className="about-list">
                  {aboutFeatures.map((feature) => (
                    <li key={feature}><i className="fas fa-check-circle" /> {feature}</li>
                  ))}
                </ul>
              </div>
            </div>
          </div>
        </section>
        <section className="section" style={{ background: "var(--bg)" }}>
          <div className="container">
            <div className="section-head"><div className="section-tag">Our Values</div><h2 className="section-title">Built on Trust & Excellence</h2><div className="divider" /></div>
            <div className="grid grid-3">
              {valuesCards.map(([icon, title, desc]) => (
                <div key={title} className="service-card"><div className="service-icon"><i className={`fas ${icon}`} /></div><h3>{title}</h3><p>{desc}</p></div>
              ))}
            </div>
          </div>
        </section>
      </div>

      <div className={`page ${currentPage === "contact" ? "active" : ""}`} id="page-contact">
        <div className="contact-hero">
          <div className="container">
            <div className="section-tag" style={{ background: "rgba(255,255,255,0.2)", color: "#fff" }}>Get In Touch</div>
            <h1 style={{ marginTop: 12 }}>Contact Our Expert Team</h1>
            <p>Available 24/7 in Arabic and English. We respond within 2 hours on business days.</p>
          </div>
        </div>
        <section className="section">
          <div className="container">
            <div className="contact-grid">
              <div className="contact-info">
                <h2>We're Here to Help</h2>
                <div className="contact-info-item"><div className="contact-info-icon"><i className="fas fa-map-marker-alt" /></div><div className="contact-info-text"><h4>Office Address</h4><p>Al Quoz Industrial Area 3<br />Dubai, United Arab Emirates<br />P.O. Box 123456</p></div></div>
                <div className="contact-info-item"><div className="contact-info-icon"><i className="fas fa-phone" /></div><div className="contact-info-text"><h4>Phone & WhatsApp</h4><p>+971 4 123 4567<br />+971 50 987 6543 (WhatsApp)</p></div></div>
                <div className="contact-info-item"><div className="contact-info-icon"><i className="fas fa-envelope" /></div><div className="contact-info-text"><h4>Email</h4><p>info@glams.ae<br />support@glams.ae</p></div></div>
                <div className="contact-info-item"><div className="contact-info-icon"><i className="fas fa-clock" /></div><div className="contact-info-text"><h4>Working Hours</h4><p>Mon–Fri: 8:00 AM – 6:00 PM<br />Sat: 9:00 AM – 2:00 PM<br />Emergency support: 24/7</p></div></div>
                <div style={{ marginTop: 24 }}>
                  <h4 style={{ fontSize: 14, fontWeight: 700, marginBottom: 14 }}>Follow Us</h4>
                  <div className="social-links">
                    <div className="social-link" onClick={() => showToast("LinkedIn page opening")}><i className="fab fa-linkedin-in" /></div>
                    <div className="social-link" onClick={() => showToast("Instagram page opening")}><i className="fab fa-instagram" /></div>
                    <div className="social-link" onClick={() => showToast("Twitter page opening")}><i className="fab fa-twitter" /></div>
                    <div className="social-link" onClick={() => showToast("WhatsApp opening")}><i className="fab fa-whatsapp" /></div>
                  </div>
                </div>
              </div>
              <div className="contact-form-wrap">
                <div className="form-title"><i className="fas fa-paper-plane" style={{ color: "var(--primary)", marginRight: 8 }} />Send Us a Message</div>
                <div className="form-row">
                  <div className="form-group"><label>First Name *</label><input type="text" placeholder="Mohammed" /></div>
                  <div className="form-group"><label>Last Name *</label><input type="text" placeholder="Al Rashid" /></div>
                </div>
                <div className="form-row">
                  <div className="form-group"><label>Email *</label><input type="email" placeholder="email@example.com" /></div>
                  <div className="form-group"><label>Phone</label><input type="tel" placeholder="+971 50 000 0000" /></div>
                </div>
                <div className="form-group"><label>Service Required</label>
                  <select><option>Select a service...</option><option>Trade License Management</option><option>Immigration & Visa Services</option><option>Technical Services</option><option>Certificate Verification</option><option>Business Setup</option><option>Document Services</option><option>Other</option></select>
                </div>
                <div className="form-group"><label>Message *</label><textarea placeholder="Describe your requirements in detail..." /></div>
                <button className="btn btn-primary w-full" style={{ justifyContent: "center", padding: 13 }} onClick={() => showToast("Message sent! We will reply within 2 hours.")}><i className="fas fa-paper-plane" /> Send Message</button>
              </div>
            </div>
          </div>
        </section>
      </div>

      <footer className="site-footer">
        <div className="container">
          <div className="footer-grid">
            <div className="footer-brand">
              <div className="brand-name"><i className="fas fa-building-columns" style={{ color: "var(--primary)", marginRight: 8 }} />GLAMS System</div>
              <p>The UAE's most advanced Government License & Activities Management System. Trusted by 2,400+ businesses across all seven Emirates since 2012.</p>
              <div className="social-links">
                <div className="social-link"><i className="fab fa-linkedin-in" /></div>
                <div className="social-link"><i className="fab fa-instagram" /></div>
                <div className="social-link"><i className="fab fa-twitter" /></div>
                <div className="social-link"><i className="fab fa-whatsapp" /></div>
              </div>
            </div>
            <div className="footer-col">
              <h4>Services</h4>
              <ul>
                <li><a onClick={() => navigate("services")}>License Management</a></li>
                <li><a onClick={() => navigate("services")}>Technical Services</a></li>
                <li><a onClick={() => navigate("immigration")}>Immigration & Visa</a></li>
                <li><a onClick={() => navigate("services")}>Business Setup</a></li>
                <li><a onClick={() => navigate("services")}>Document Services</a></li>
              </ul>
            </div>
            <div className="footer-col">
              <h4>Quick Links</h4>
              <ul>
                <li><a onClick={() => navigate("home")}>Home</a></li>
                <li><a onClick={() => navigate("about")}>About Us</a></li>
                <li><a onClick={() => navigate("license")}>License Activities</a></li>
                <li><a onClick={() => navigate("companies")}>Companies</a></li>
                <li><a onClick={() => navigate("verify")}>Verify Certificate</a></li>
              </ul>
            </div>
            <div className="footer-col">
              <h4>Contact</h4>
              <ul>
                <li><a>Al Quoz, Dubai, UAE</a></li>
                <li><a>+971 4 123 4567</a></li>
                <li><a>info@glams.ae</a></li>
                <li><a>Mon–Sat: 8AM–6PM</a></li>
                <li><a onClick={() => navigate("contact")}>Get Support</a></li>
              </ul>
            </div>
          </div>
          <div className="footer-bottom">
            <div>© 2026 GLAMS – Government License & Activities Management System. All rights reserved.</div>
            <div className="footer-bottom-links">
              <a>Privacy Policy</a>
              <a>Terms of Service</a>
              <a>Cookie Policy</a>
            </div>
          </div>
        </div>
      </footer>

      <div className={`toast ${toast.show ? "show" : ""}`} id="toast">
        <i className="fas fa-check-circle" />
        <span id="toastMsg">{toast.message}</span>
      </div>
    </>
  );
}
