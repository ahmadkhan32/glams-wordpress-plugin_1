import { Link } from "react-router-dom";

export default function Footer() {
  return (
    <footer className="mt-12 border-t border-slate-200 bg-slate-900 py-8 text-slate-300">
      <div className="mx-auto grid w-full max-w-7xl gap-6 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div>
          <h2 className="text-lg font-semibold text-white">GLAMS</h2>
          <p className="mt-2 text-sm text-slate-400">
            Government License Certificate and Activities Management System.
          </p>
        </div>
        <div className="flex gap-4 lg:justify-end">
          <Link to="/about" className="text-sm hover:text-white">
            About
          </Link>
          <Link to="/verification" className="text-sm hover:text-white">
            Verify
          </Link>
          <Link to="/contact" className="text-sm hover:text-white">
            Contact
          </Link>
        </div>
      </div>
    </footer>
  );
}
