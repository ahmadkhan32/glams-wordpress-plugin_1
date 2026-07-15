import { Link } from "react-router-dom";
import SearchBar from "../../components/SearchBar/SearchBar";
import { companies } from "../../services/mockData";
import { useState } from "react";

export default function CompaniesPage() {
  const [query, setQuery] = useState("");

  const filtered = companies.filter(
    (company) =>
      company.name.toLowerCase().includes(query.toLowerCase()) ||
      company.licenseNumber.toLowerCase().includes(query.toLowerCase())
  );

  return (
    <section className="space-y-4">
      <div className="rounded-xl border border-slate-200 bg-white p-4">
        <SearchBar value={query} onChange={setQuery} placeholder="Search by company or license" />
      </div>
      <div className="grid gap-4 md:grid-cols-2">
        {filtered.map((company) => (
          <article key={company.id} className="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <h3 className="text-lg font-bold text-slate-900">{company.name}</h3>
            <p className="mt-1 text-sm text-slate-600">{company.licenseNumber}</p>
            <div className="mt-4">
              <Link
                to={`/companies/${company.id}`}
                className="rounded-md bg-emerald-700 px-3 py-2 text-sm font-semibold text-white hover:bg-emerald-800"
              >
                View Company Details
              </Link>
            </div>
          </article>
        ))}
      </div>
    </section>
  );
}
