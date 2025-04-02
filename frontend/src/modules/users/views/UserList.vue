<template>
  <div>
    <UserForm />
    <ul>
      <li v-for="usuario in usuarios" :key="usuario.id">
        {{ usuario.nome }} {{ usuario.sobrenome }}
      </li>
    </ul>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import UserForm from '../components/UserForm.vue'
import { usuarios, fetchUsuarios } from '../store/userStore'

onMounted(fetchUsuarios)
</script>
