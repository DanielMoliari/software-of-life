import { ref } from 'vue'
import type { Usuario } from '../types/Usuario'
import * as userService from '../services/userService'

export const usuarios = ref<Usuario[]>([])
export const usuarioSelecionado = ref<Usuario | null>(null)

export async function fetchUsuarios() {
  try {
    usuarios.value = await userService.listarUsuarios()
  } catch (error) {
    console.error('Erro ao buscar usuários:', error)
  }
}

export async function fetchUsuario(id: number) {
  try {
    usuarioSelecionado.value = await userService.buscarUsuario(id)
  } catch (error) {
    console.error(`Erro ao buscar usuário com id ${id}:`, error)
  }
}

export async function criar(usuario: Omit<Usuario, 'id'>) {
  try {
    const novoUsuario = await userService.criarUsuario(usuario)
    usuarios.value.push(novoUsuario)
  } catch (error) {
    console.error('Erro ao criar usuário:', error)
  }
}

export async function atualizar(id: number, usuario: Omit<Usuario, 'id'>) {
  try {
    const usuarioAtualizado = await userService.atualizarUsuario(id, usuario)
    const index = usuarios.value.findIndex(u => u.id === id)
    if (index !== -1) usuarios.value[index] = usuarioAtualizado
  } catch (error) {
    console.error(`Erro ao atualizar usuário com id ${id}:`, error)
  }
}

export async function remover(id: number) {
  try {
    await userService.deletarUsuario(id)
    usuarios.value = usuarios.value.filter(usuario => usuario.id !== id)
  } catch (error) {
    console.error(`Erro ao remover usuário com id ${id}:`, error)
  }
}
