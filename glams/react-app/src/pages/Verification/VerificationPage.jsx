import { useState } from "react";
import SearchBar from "../../components/SearchBar/SearchBar";
import { companies } from "../../services/mockData";

export default function VerificationPage() {
  const [query, setQuery] = useState("");

  const match = companies.find(
    (company) =>
      company.licenseNumber.toLowerCase().includes(query.toLowerCase()) ||
      company.name.toLowerCase().includes(query.toLowerCase())
  );

  return (
    <section className="space-y-4">
      <div className="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <h1 className="text-2xl font-black text-slate-900">License Verification</h1>
        <p className="mt-2 text-sm text-slate-600">Search by company name or license number.</p>
        <div className="mt-4">
          <SearchBar value={query} onChange={setQuery} placeholder="DET-2024-001234" />
        </div>
      </div>

      <div className="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        {match ? (
          <div>
            <p className="text-sm text-slate-500">Verified Company</p>
            <p className="mt-1 text-lg font-bold text-slate-900">{match.name}</p>
            <p className="text-sm text-slate-600">{match.licenseNumber}</p>
          </div>
        ) : (
          <p className="text-slate-500">No matching result yet.</p>
        )}
      </div>
    </section>
  );
}
