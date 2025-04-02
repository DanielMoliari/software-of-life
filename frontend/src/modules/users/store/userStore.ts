import { ref } from 'vue'
import { listarUsuarios } from '../services/userService'
import type { Usuario } from '../types/Usuario'

export const usuarios = ref<Usuario[]>([])

export const fetchUsuarios = async () => {
    usuarios.value = await listarUsuarios()
}
