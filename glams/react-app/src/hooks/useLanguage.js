import { useContext } from "react";
import { AppContext } from "../context/AppContext";

export function useLanguage() {
  const context = useContext(AppContext);
  if (!context) {
    throw new Error("useLanguage must be used within AppProvider");
  }
  return context;
}
