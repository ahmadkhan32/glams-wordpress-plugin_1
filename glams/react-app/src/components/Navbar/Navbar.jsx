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
    <nav className="glams-placeholder" style={{ margin: "16px auto" }}>
      {pages.map((page) => (
        <button
          key={page}
          onClick={() => navigate(page)}
          style={{
            marginRight: 8,
            marginBottom: 8,
            background: currentPage === page ? "#0b1f3a" : "#e8edf7",
            color: currentPage === page ? "#fff" : "#0b1f3a",
            border: "none",
            borderRadius: 6,
            padding: "8px 12px",
            cursor: "pointer",
            textTransform: "capitalize",
          }}
        >
          {page}
        </button>
      ))}
    </nav>
  );
}
