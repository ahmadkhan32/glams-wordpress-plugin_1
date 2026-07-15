import StatusBadge from "../StatusBadge/StatusBadge";

export default function ActivityRow({ activity }) {
  return (
    <tr className="border-b border-slate-100 hover:bg-emerald-50/40">
      <td className="px-4 py-3 text-sm font-medium text-slate-800">{activity.name}</td>
      <td className="px-4 py-3 text-sm">
        <StatusBadge status={activity.status} />
      </td>
      <td className="px-4 py-3 text-right text-sm font-semibold text-slate-700" dir="rtl">
        {activity.statusAr || "فعال"}
      </td>
      <td className="px-4 py-3 text-right text-sm text-slate-800" dir="rtl">
        {activity.nameAr}
      </td>
    </tr>
  );
}
