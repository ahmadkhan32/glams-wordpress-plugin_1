export function formatDate(dateInput, locale = "en-GB") {
  const date = new Date(dateInput);
  if (Number.isNaN(date.getTime())) return "-";
  return new Intl.DateTimeFormat(locale).format(date);
}
