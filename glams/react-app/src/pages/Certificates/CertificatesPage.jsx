import PDFButton from "../../components/PDFButton/PDFButton";

export default function CertificatesPage() {
  return (
    <section className="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
      <h1 className="text-2xl font-black text-slate-900">Certificates</h1>
      <p className="mt-2 text-slate-600">Export bilingual government-style certificates as PDF.</p>
      <div className="mt-4">
        <PDFButton />
      </div>
    </section>
  );
}
