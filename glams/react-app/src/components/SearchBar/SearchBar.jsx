export default function SearchBar({ value, onChange, placeholder = "Search licenses..." }) {
  return (
    <input
      value={value}
      onChange={(event) => onChange(event.target.value)}
      placeholder={placeholder}
      className="w-full rounded-lg border border-slate-300 px-4 py-2 text-sm outline-none ring-emerald-600 transition focus:ring-2"
    />
  );
}
