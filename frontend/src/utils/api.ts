import axios from 'axios'

export const api = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL
})

export function extractData<T>(response: { data: T }): T {
  return response.data
}