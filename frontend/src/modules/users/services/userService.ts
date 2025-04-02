import axios from 'axios'

const API = 'http://localhost:8000/usuarios'

export const listarUsuarios = async () => {
  const res = await axios.get(API)
  return res.data
}

export const criarUsuario = async (usuario: { nome: string, sobrenome: string }) => {
  await axios.post(API, usuario)
}