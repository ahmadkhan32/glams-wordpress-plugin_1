import { useMemo } from "react";
import { useParams } from "react-router-dom";
import { companies } from "../../services/mockData";

export default function CompanyDetailsPage() {
  const { companyId } = useParams();

  const company = useMemo(
    () => companies.find((item) => String(item.id) === String(companyId)),
    [companyId]
  );

  if (!company) {
    return <section className="rounded-xl border border-rose-200 bg-rose-50 p-6 text-rose-900">Company not found.</section>;
  }

  return (
    <section className="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
      <h1 className="text-2xl font-black text-slate-900">{company.name}</h1>
      <p className="mt-2 text-slate-600">License: {company.licenseNumber}</p>
      <p className="mt-2 text-slate-600">Status: {company.status}</p>
    </section>
  );
}
