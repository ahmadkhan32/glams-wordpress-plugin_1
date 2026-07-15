import { createBrowserRouter } from "react-router-dom";
import MainLayout from "./layouts/MainLayout";
import HomePage from "./pages/Home/HomePage";
import AboutPage from "./pages/About/AboutPage";
import CompaniesPage from "./pages/Companies/CompaniesPage";
import CompanyDetailsPage from "./pages/CompanyDetails/CompanyDetailsPage";
import ActivitiesPage from "./pages/Activities/ActivitiesPage";
import CertificatesPage from "./pages/Certificates/CertificatesPage";
import VerificationPage from "./pages/Verification/VerificationPage";
import ReportsPage from "./pages/Reports/ReportsPage";
import ContactPage from "./pages/Contact/ContactPage";
import LoginPage from "./pages/Login/LoginPage";
import ServicesPage from "./pages/Services/ServicesPage";
import ImmigrationPage from "./pages/Immigration/ImmigrationPage";

export const appRouter = createBrowserRouter([
  {
    path: "/",
    element: <MainLayout />,
    children: [
      { index: true, element: <HomePage /> },
      { path: "about", element: <AboutPage /> },
      { path: "services", element: <ServicesPage /> },
      { path: "companies", element: <CompaniesPage /> },
      { path: "companies/:companyId", element: <CompanyDetailsPage /> },
      { path: "activities", element: <ActivitiesPage /> },
      { path: "certificates", element: <CertificatesPage /> },
      { path: "verification", element: <VerificationPage /> },
      { path: "reports", element: <ReportsPage /> },
      { path: "immigration", element: <ImmigrationPage /> },
      { path: "contact", element: <ContactPage /> },
      { path: "login", element: <LoginPage /> },
    ],
  },
]);
