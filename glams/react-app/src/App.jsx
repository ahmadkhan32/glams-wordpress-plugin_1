import { useState } from "react";
import HomePage from "./pages/Home/HomePage";
import ServicesPage from "./pages/Services/ServicesPage";
import ActivitiesPage from "./pages/Activities/ActivitiesPage";
import CompaniesPage from "./pages/Companies/CompaniesPage";
import ImmigrationPage from "./pages/Immigration/ImmigrationPage";
import VerifyPage from "./pages/Verification/VerifyPage";
import AboutPage from "./pages/About/AboutPage";
import ContactPage from "./pages/Contact/ContactPage";
import ReportsPage from "./pages/Reports/ReportsPage";
import Navbar from "./components/Navbar/Navbar";
import Footer from "./components/Footer/Footer";
import GovernmentHeader from "./components/Header/GovernmentHeader";

const pages = {
  home:       <HomePage />,
  services:   <ServicesPage />,
  activities: <ActivitiesPage />,
  companies:  <CompaniesPage />,
  immigration:<ImmigrationPage />,
  verify:     <VerifyPage />,
  about:      <AboutPage />,
  contact:    <ContactPage />,
  reports:    <ReportsPage />,
};

export default function App() {
  const [currentPage, setCurrentPage] = useState(
    window.GLAMSData?.initialPage || "home"
  );

  const navigate = (page) => {
    setCurrentPage(page);
    window.scrollTo({ top: 0, behavior: "smooth" });
  };

  return (
    <div className="glams-app">
      <GovernmentHeader />
      <Navbar currentPage={currentPage} navigate={navigate} />
      <main>{pages[currentPage] || <HomePage />}</main>
      <Footer navigate={navigate} />
    </div>
  );
}
