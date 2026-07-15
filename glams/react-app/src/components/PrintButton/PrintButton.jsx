export default function PrintButton() {
  return (
    <button
      type="button"
      className="rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100"
      onClick={() => window.print()}
    >
      Print
    </button>
  );
}
