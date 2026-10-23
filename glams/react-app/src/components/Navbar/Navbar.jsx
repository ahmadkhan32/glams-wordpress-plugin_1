export default function Navbar({ currentPage, navigate }) {
  const pages = [
    "home",
    "services",
    "activities",
    "companies",
    "immigration",
    "verify",
    "about",
    "contact",
    "reports",
  ];

  return (
    <nav
      style={{
        maxWidth: "1200px",
        margin: "12px auto",
        padding: "10px 16px",
        background: "#ffffff",
        borderRadius: "8px",
        display: "flex",
        alignItems: "center",
        justifyContent: "space-between",
        flexWrap: "wrap",
        gap: "10px",
        border: "1px solid #e2e8f0",
      }}
    >
      <div
        style={{ display: "flex", alignItems: "center", gap: "10px", cursor: "pointer" }}
        onClick={() => navigate("home")}
      >
        <img
          src="/mhk-technical-services-logo.png"
          alt="MHK Technical Services"
          style={{ height: "40px", width: "auto", objectFit: "contain" }}
        />
        <span style={{ fontWeight: 700, fontSize: "16px", color: "#0f172a" }}>
          MHK Technical Services
        </span>
      </div>

      <div style={{ display: "flex", flexWrap: "wrap", gap: "6px" }}>
        {pages.map((page) => (
          <button
            key={page}
            onClick={() => navigate(page)}
            style={{
              background: currentPage === page ? "#2bb302" : "#f1f5f9",
              color: currentPage === page ? "#ffffff" : "#0f172a",
              border: "none",
              borderRadius: 6,
              padding: "7px 12px",
              cursor: "pointer",
              fontSize: "13px",
              fontWeight: 600,
              textTransform: "capitalize",
              transition: "all 0.2s ease",
            }}
          >
            {page}
          </button>
        ))}
      </div>
    </nav>
  );
}
