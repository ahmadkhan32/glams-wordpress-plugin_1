import { apiClient } from "../api/apiClient";

export async function fetchCompanies() {
  const { data } = await apiClient.get("/companies");
  return data;
}

export async function fetchActivitiesByCompany(companyId) {
  const { data } = await apiClient.get(`/activities?company_id=${companyId}`);
  return data;
}
