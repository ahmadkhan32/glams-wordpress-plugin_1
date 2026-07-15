import ActivityTable from "../../components/ActivityTable/ActivityTable";
import DubaiLogo from "../../components/Logo/DubaiLogo";
import MHLogo from "../../components/Logo/MHLogo";
import PDFButton from "../../components/PDFButton/PDFButton";
import PrintButton from "../../components/PrintButton/PrintButton";
import QRCode from "../../components/QRCode/QRCode";
import { activities } from "../../services/mockData";

export default function ActivitiesPage() {
  return (
    <section className="space-y-4">
      <div className="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div className="flex flex-wrap items-center justify-between gap-4 border-b-2 border-rose-700 pb-4">
          <div>
            <p className="text-xs font-bold text-slate-900">GOVERNMENT OF DUBAI</p>
            <p className="text-sm text-slate-700" dir="rtl">حكومة دبي</p>
          </div>
          <MHLogo />
          <DubaiLogo />
        </div>

        <div className="mt-5 flex flex-wrap items-center justify-between gap-4">
          <div>
            <h2 className="text-xl font-bold text-slate-900">License Activities Certificate</h2>
            <p className="text-sm text-slate-500">Editable through WordPress admin and Elementor widgets</p>
          </div>
          <div className="flex items-center gap-2">
            <PDFButton />
            <PrintButton />
            <QRCode value="https://portal.glams.ae/verify/DET-2024-001234" />
          </div>
        </div>

        <div className="mt-5">
          <ActivityTable activities={activities} />
        </div>
      </div>
    </section>
  );
}
