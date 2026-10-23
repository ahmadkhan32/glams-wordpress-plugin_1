export default function Footer({ navigate }) {
  return (
    <footer
      style={{
        margin: "0 auto 20px",
        maxWidth: "1200px",
        padding: "16px 24px",
        background: "#0f172a",
        color: "#cbd5e1",
        borderRadius: "8px",
        display: "flex",
        alignItems: "center",
        justifyContent: "space-between",
        flexWrap: "wrap",
        gap: "14px",
        fontSize: "14px",
      }}
    >
      <div style={{ display: "flex", alignItems: "center", gap: "12px" }}>
        <img
          src="/mhk-technical-services-logo.png"
          alt="MHK Technical Services"
          style={{ height: "36px", width: "auto", objectFit: "contain" }}
        />
        <span>&copy; {new Date().getFullYear()} MHK Technical Services. All rights reserved.</span>
      </div>
      <div>
        <button
          style={{
            background: "#2bb302",
            color: "#fff",
            border: "none",
            borderRadius: "6px",
            padding: "8px 16px",
            cursor: "pointer",
            fontWeight: 600,
          }}
          onClick={() => navigate("home")}
        >
          Back to Home
        </button>
      </div>
    </footer>
  );
}
