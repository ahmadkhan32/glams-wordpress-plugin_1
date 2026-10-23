export default function GovernmentHeader() {
  return (
    <header
      className="mhk-portal-header"
      style={{
        margin: "12px auto 0",
        maxWidth: "1200px",
        padding: "10px 20px",
        background: "#ffffff",
        borderRadius: "8px",
        display: "flex",
        alignItems: "center",
        justifyContent: "space-between",
        border: "1px solid #e2e8f0",
        boxShadow: "0 2px 4px rgba(0,0,0,0.04)",
      }}
    >
      <div style={{ display: "flex", alignItems: "center", gap: "12px" }}>
        <img
          src="/mhk-technical-services-logo.png"
          alt="MHK Technical Services"
          style={{ height: "42px", width: "auto", objectFit: "contain" }}
        />
        <div>
          <strong style={{ fontSize: "16px", color: "#0f172a" }}>
            MHK Technical Services Portal
          </strong>
          <div style={{ fontSize: "12px", color: "#64748b" }}>
            Certified UAE Technical &amp; Maintenance Services
          </div>
        </div>
      </div>
      <div style={{ fontSize: "12px", color: "#2bb302", fontWeight: 600 }}>
        ✓ Verified Portal
      </div>
    </header>
  );
}
