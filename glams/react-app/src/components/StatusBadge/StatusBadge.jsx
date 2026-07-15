const styles = {
  active: "bg-emerald-100 text-emerald-800",
  inactive: "bg-rose-100 text-rose-800",
  pending: "bg-amber-100 text-amber-800",
};

export default function StatusBadge({ status }) {
  const normalized = (status || "pending").toLowerCase();
  const text = normalized.charAt(0).toUpperCase() + normalized.slice(1);

  return (
    <span className={`inline-flex rounded-full px-3 py-1 text-xs font-semibold ${styles[normalized] || styles.pending}`}>
      {text}
    </span>
  );
}
