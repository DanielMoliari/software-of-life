<template>
  <form v-if="usuarioSelecionado" @submit.prevent="submitForm">
    <input v-model="nome" placeholder="Nome" />
    <span v-if="errors.nome">{{ errors.nome }}</span>

    <input v-model="sobrenome" placeholder="Sobrenome" />
    <span v-if="errors.sobrenome">{{ errors.sobrenome }}</span>

    <button type="submit" :disabled="carregando">
      {{ carregando ? 'Atualizando...' : 'Atualizar' }}
    </button>
    <button type="button" @click="cancelarEdicao">Cancelar</button>
  </form>
</template>

<script setup lang="ts">
import { ref, watch } from 'vue'
import { useForm } from 'vee-validate'
import * as yup from 'yup'
import { atualizar, usuarioSelecionado } from '@/modules/users/store/userStore'
import type { Usuario } from '@/modules/users/types/Usuario'

const carregando = ref(false)

const schema = yup.object({
  nome: yup.string().required('Nome é obrigatório'),
  sobrenome: yup.string().required('Sobrenome é obrigatório'),
})

const { handleSubmit, errors, resetForm, defineField, setValues } = useForm<Omit<Usuario, 'id'>>({
  validationSchema: schema,
})

const [nome] = defineField('nome')
const [sobrenome] = defineField('sobrenome')

watch(
  usuarioSelecionado,
  usuario => {
    if (usuario) setValues({ nome: usuario.nome, sobrenome: usuario.sobrenome })
  },
  { immediate: true }
)

const submitForm = handleSubmit(async values => {
  if (!usuarioSelecionado.value) return

  carregando.value = true
  try {
    await atualizar(usuarioSelecionado.value.id, values)
    cancelarEdicao()
  } catch (error) {
    console.error('Erro ao atualizar:', error)
  } finally {
    carregando.value = false
  }
})

function cancelarEdicao() {
  usuarioSelecionado.value = null
  resetForm()
}
</script>
