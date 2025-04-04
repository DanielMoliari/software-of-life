<template>
  <form @submit.prevent="submitForm">
    <input v-model="nome" placeholder="Nome" />
    <span v-if="errors.nome">{{ errors.nome }}</span>

    <input v-model="sobrenome" placeholder="Sobrenome" />
    <span v-if="errors.sobrenome">{{ errors.sobrenome }}</span>

    <button type="submit" :disabled="carregando">
      {{ carregando ? 'Criando...' : 'Criar' }}
    </button>
  </form>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useForm } from 'vee-validate'
import * as yup from 'yup'
import { criar, fetchUsuarios } from '@/modules/users/store/userStore'
import type { Usuario } from '@/modules/users/types/Usuario'

const carregando = ref(false)

const schema = yup.object({
  nome: yup.string().required('Nome é obrigatório'),
  sobrenome: yup.string().required('Sobrenome é obrigatório'),
})

const { handleSubmit, errors, resetForm, defineField } = useForm<Omit<Usuario, 'id'>>({
  validationSchema: schema,
  initialValues: { nome: '', sobrenome: '' },
})

const [nome] = defineField('nome')
const [sobrenome] = defineField('sobrenome')

const submitForm = handleSubmit(async values => {
  carregando.value = true
  try {
    await criar(values)
    await fetchUsuarios()
    resetForm()
  } catch (error) {
    console.error('Erro na criação:', error)
  } finally {
    carregando.value = false
  }
})
</script>
