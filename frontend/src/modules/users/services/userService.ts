import type { Usuario } from '../types/Usuario'
import { api, extractData } from '@/utils/api'

export async function listarUsuarios(): Promise<Usuario[]> {
  const response = await api.get('/usuarios')
  return extractData(response)
}

export async function criarUsuario(usuario: Omit<Usuario, 'id'>): Promise<Usuario> {
  const response = await api.post('/usuarios', usuario)
  return extractData(response)
}

export async function buscarUsuario(id: number): Promise<Usuario> {
  const response = await api.get(`/usuarios/${id}`)
  return extractData(response)
}

export async function atualizarUsuario(id: number, usuario: Omit<Usuario, 'id'>): Promise<Usuario> {
  const response = await api.put(`/usuarios/${id}`, usuario)
  return extractData(response)
}

export async function deletarUsuario(id: number): Promise<void> {
  await api.delete(`/usuarios/${id}`)
}