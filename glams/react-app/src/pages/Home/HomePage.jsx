import { Link } from "react-router-dom";

export default function HomePage() {
  return (
    <section className="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
      <p className="text-sm font-semibold uppercase tracking-wide text-emerald-700">GLAMS</p>
      <h1 className="mt-2 text-3xl font-black text-slate-900 sm:text-4xl">
        Government License Certificate and Activities Management System
      </h1>
      <p className="mt-4 max-w-3xl text-slate-600">
        JavaScript-first React + WordPress + Elementor architecture with bilingual
        document-style certificate views, verification, reporting, and admin-managed content.
      </p>

      <div className="mt-6 flex flex-wrap gap-3">
        <Link to="/activities" className="rounded-md bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-800">
          Open License Activities
        </Link>
        <Link to="/verification" className="rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100">
          Verify Certificate
        </Link>
      </div>
    </section>
  );
}
