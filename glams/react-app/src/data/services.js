/**
 * MHK Technical Services – Official Services & Rate List 2026 Data
 * Source: MHK TECHNICAL SERVICES L.L.C — UAE Commercial License & Official 2026 Rate Flyer
 */

export const cleaningServices2026 = [
  {
    id: "home-cleaning",
    title: "Home Cleaning",
    titleAr: "تنظيف المنازل والشقق",
    icon: "fa-house",
    shortDescription: "Complete routine and deep home cleaning for apartments across Dubai.",
    startingPrice: "120 AED",
    items: [
      { name: "Studio Apartment", price: 120, unit: "" },
      { name: "1 Bedroom Apartment", price: 180, unit: "" },
      { name: "2 Bedroom Apartment", price: 250, unit: "" },
      { name: "3 Bedroom Apartment", price: 350, unit: "" },
    ],
  },
  {
    id: "villa-cleaning",
    title: "Villa Cleaning",
    titleAr: "تنظيف الفلل والقصور",
    icon: "fa-hotel",
    shortDescription: "Professional cleaning teams for small, medium, and large luxury villas.",
    startingPrice: "450 AED",
    items: [
      { name: "Small Villa", price: 450, unit: "" },
      { name: "Medium Villa", price: 650, unit: "" },
      { name: "Large Villa", price: 900, suffix: "+", unit: "" },
    ],
  },
  {
    id: "deep-cleaning",
    title: "Deep Cleaning",
    titleAr: "التنظيف العميق والشامل",
    icon: "fa-spray-can-sparkles",
    shortDescription: "Detailed sanitization, grout cleaning, kitchen & bathroom disinfection.",
    startingPrice: "250 AED",
    items: [
      { name: "Studio Deep Cleaning", price: 250, unit: "" },
      { name: "1 BHK Deep Cleaning", price: 400, unit: "" },
      { name: "2 BHK Deep Cleaning", price: 600, unit: "" },
      { name: "Villa Deep Cleaning", price: 1200, prefix: "Starting", unit: "" },
    ],
  },
  {
    id: "sofa-carpet-cleaning",
    title: "Sofa & Carpet Cleaning",
    titleAr: "تنظيف الكنب والسجاد والفرش",
    icon: "fa-couch",
    shortDescription: "Shampooing, steam cleaning, stain extraction and mattress deodorizing.",
    startingPrice: "40 AED",
    items: [
      { name: "Sofa Cleaning", price: 40, unit: "per seat" },
      { name: "Carpet Cleaning", price: 15, unit: "per sqm" },
      { name: "Mattress Cleaning", price: 80, unit: "" },
    ],
  },
  {
    id: "kitchen-cleaning",
    title: "Kitchen Cleaning",
    titleAr: "تنظيف المطابخ وإزالة الدهون",
    icon: "fa-utensils",
    shortDescription: "Commercial and residential kitchen degreasing, hood and cabinet cleaning.",
    startingPrice: "150 AED",
    items: [
      { name: "Normal Kitchen Cleaning", price: 150, unit: "" },
      { name: "Kitchen Deep Cleaning", price: 350, unit: "" },
      { name: "Hood Cleaning", price: 500, prefix: "Starting", unit: "" },
    ],
  },
  {
    id: "office-cleaning",
    title: "Office Cleaning",
    titleAr: "تنظيف المكاتب والشركات",
    icon: "fa-building",
    shortDescription: "Flexible hourly office cleaning visits and customized monthly contracts.",
    startingPrice: "25 AED/hr",
    items: [
      { name: "Hourly Cleaning", price: 25, unit: "per hour" },
      { name: "Monthly Contract", price: 999, prefix: "Starting", unit: "" },
    ],
  },
  {
    id: "maid-services",
    title: "Maid Services",
    titleAr: "خدمات العاملات بالساعة",
    icon: "fa-user-check",
    shortDescription: "Trained, vetted and professional maid assistance on hourly booking.",
    startingPrice: "25 AED/hr",
    items: [
      { name: "1 Cleaner", price: 25, unit: "per hour" },
      { name: "2 Cleaners", price: 45, unit: "per hour" },
    ],
  },
];

const services = [
  {
    id: "air-conditioning",
    icon: "fa-wind",
    title: "Air-Conditioning, Ventilation & Air Filtration Systems",
    shortDescription: "Professional installation and maintenance services for air-conditioning, ventilation and air-filtration systems.",
    description: "We provide professional installation and maintenance services for air-conditioning, ventilation and air-filtration systems for residential and commercial properties across the UAE.",
    features: [
      "AC system installation",
      "Ventilation systems",
      "Air filtration systems",
      "Maintenance support",
      "System inspection",
    ],
  },
  {
    id: "electromechanical",
    icon: "fa-cogs",
    title: "Electromechanical Equipment Installation & Maintenance",
    shortDescription: "Installation and maintenance services for electromechanical equipment and related systems.",
    features: ["Equipment installation", "Maintenance", "Inspection", "Repair support", "System servicing"],
  },
  {
    id: "tiling",
    icon: "fa-th-large",
    title: "Floor & Wall Tiling Works",
    shortDescription: "Professional floor and wall tiling services for residential and commercial spaces.",
    features: ["Floor tiling", "Wall tiling", "Tile replacement", "Surface preparation", "Finishing work"],
  },
  {
    id: "carpentry",
    icon: "fa-hammer",
    title: "Carpentry & Wood Flooring Works",
    shortDescription: "Carpentry and wood-flooring services for interior residential and commercial environments.",
    features: ["Carpentry work", "Wood flooring installation", "Flooring replacement", "Wood finishing", "Repair work"],
  },
  {
    id: "engraving",
    icon: "fa-drafting-compass",
    title: "Engraving & Ornamentation Works",
    shortDescription: "Detailed engraving and ornamentation services for suitable interior and decorative applications.",
    features: ["Decorative work", "Engraving", "Ornamentation", "Finishing details"],
  },
  {
    id: "wallpaper",
    icon: "fa-paint-roller",
    title: "Wallpaper Fixing Works",
    shortDescription: "Professional wallpaper installation and finishing services for residential and commercial interiors.",
    features: ["Wallpaper installation", "Surface preparation", "Wallpaper replacement", "Finishing", "Repair work"],
  },
  {
    id: "false-ceiling",
    icon: "fa-layer-group",
    title: "False Ceiling & Light Partitions Installation",
    shortDescription: "Installation of false ceilings and light partition systems for functional and professional interior spaces.",
    features: ["False ceiling installation", "Light partitions", "Interior space division", "Finishing work", "Repair and maintenance"],
  },
  {
    id: "electrical",
    icon: "fa-bolt",
    title: "Electrical Fittings & Fixtures Repairing & Maintenance",
    shortDescription: "Electrical fittings and fixture repair and maintenance services for residential and commercial requirements.",
    features: ["Electrical fixture maintenance", "Electrical fitting repair", "Inspection", "Maintenance support", "Replacement support"],
  },
  {
    id: "sanitary",
    icon: "fa-faucet",
    title: "Sanitary Installation & Pipes Repairing",
    shortDescription: "Sanitary installation and water-pipe repair services for residential and commercial properties.",
    features: ["Sanitary installation", "Pipe repair", "Water pipe maintenance", "Leak-related repair work", "Plumbing fixture support"],
  },
  {
    id: "plaster",
    icon: "fa-paint-brush",
    title: "Plaster Works",
    shortDescription: "Professional plastering services for suitable interior and building surfaces.",
    features: ["Plaster application", "Surface preparation", "Repair work", "Finishing", "Surface restoration"],
  },
  {
    id: "cleaning",
    icon: "fa-broom",
    title: "Building Cleaning Services",
    shortDescription: "Building and residential cleaning services designed to maintain clean and presentable environments.",
    features: ["Building cleaning", "Residential cleaning", "General cleaning support", "Maintenance cleaning", "Interior cleaning"],
  },
];

export default services;
