export default function Footer({ navigate }) {
  return (
    <footer className="glams-placeholder" style={{ margin: "0 auto 16px" }}>
      <span>GLAMS Footer</span>
      <button
        style={{ marginLeft: 12 }}
        onClick={() => navigate("home")}
      >
        Back to Home
      </button>
    </footer>
  );
}
