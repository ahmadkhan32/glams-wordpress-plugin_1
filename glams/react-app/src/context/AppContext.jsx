import { createContext, useMemo, useState } from "react";

export const AppContext = createContext(null);

export function AppProvider({ children }) {
  const [language, setLanguage] = useState("en");

  const value = useMemo(
    () => ({
      language,
      isArabic: language === "ar",
      setLanguage,
      toggleLanguage: () => setLanguage((prev) => (prev === "en" ? "ar" : "en")),
    }),
    [language]
  );

  return <AppContext.Provider value={value}>{children}</AppContext.Provider>;
}
