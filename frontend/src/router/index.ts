import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'

import UserPage from '@/modules/users/views/UserPage.vue'

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    name: 'Usuarios',
    component: UserPage,
  },
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
})

export default router