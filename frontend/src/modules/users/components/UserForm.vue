<template>
    <form @submit.prevent="submit">
      <input v-model="nome" placeholder="Nome" />
      <input v-model="sobrenome" placeholder="Sobrenome" />
      <button type="submit">Criar</button>
    </form>
  </template>
  
  <script setup lang="ts">
  import { ref } from 'vue'
  import { criarUsuario } from '../services/userService'
  
  const nome = ref('')
  const sobrenome = ref('')
  
  async function submit(){
    await criarUsuario({ nome: nome.value, sobrenome: sobrenome.value })
    nome.value = ''
    sobrenome.value = ''
  }
  </script>