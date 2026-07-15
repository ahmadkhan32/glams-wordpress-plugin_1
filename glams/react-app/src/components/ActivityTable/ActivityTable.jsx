import ActivityRow from "./ActivityRow";

export default function ActivityTable({ activities }) {
  return (
    <div className="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
      <table className="min-w-full">
        <thead className="bg-emerald-700 text-white">
          <tr>
            <th className="px-4 py-3 text-left text-sm">Activity</th>
            <th className="px-4 py-3 text-left text-sm">Status</th>
            <th className="px-4 py-3 text-right text-sm" dir="rtl">الحالة</th>
            <th className="px-4 py-3 text-right text-sm" dir="rtl">النشاط</th>
          </tr>
        </thead>
        <tbody>
          {activities.map((activity) => (
            <ActivityRow key={`${activity.name}-${activity.nameAr}`} activity={activity} />
          ))}
        </tbody>
      </table>
    </div>
  );
}
