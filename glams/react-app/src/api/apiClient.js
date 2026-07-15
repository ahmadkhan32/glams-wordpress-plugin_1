import axios from "axios";

const baseURL = window.GLAMSData?.apiBase || "/wp-json/glams/v1";

export const apiClient = axios.create({
  baseURL,
  timeout: 15000,
  headers: {
    "Content-Type": "application/json",
  },
});
