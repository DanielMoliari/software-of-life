<template>
  <div>
    <h1>Usuários</h1>

    <UserCreateForm v-if="!usuarioSelecionado" />
    <UserEditForm
      v-else
      :usuario="usuarioSelecionado"
      @onCancel="cancelarEdicao"
      @onUpdate="fetchUsuarios"
    />

    <ul>
      <li v-for="usuario in usuarios" :key="usuario.id">
        {{ usuario.nome }} {{ usuario.sobrenome }}
        <button @click="selecionarUsuario(usuario)">Editar</button>
        <button @click="removerUsuario(usuario.id)">Deletar</button>
      </li>
    </ul>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import { usuarios, fetchUsuarios, usuarioSelecionado, remover } from '../store/userStore'
import UserCreateForm from '../components/UserCreateForm.vue'
import UserEditForm from '../components/UserEditForm.vue'
import { Usuario } from '../types/Usuario'

onMounted(fetchUsuarios)

const selecionarUsuario = (usuario: Usuario) => {
  usuarioSelecionado.value = usuario
}

const cancelarEdicao = () => {
  usuarioSelecionado.value = null
}

const removerUsuario = async (id: number) => {
  await remover(id)
}
</script>
