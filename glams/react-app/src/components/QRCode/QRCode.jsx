import { QRCodeCanvas } from "qrcode.react";

export default function QRCode({ value }) {
  return <QRCodeCanvas value={value} size={72} includeMargin />;
}
