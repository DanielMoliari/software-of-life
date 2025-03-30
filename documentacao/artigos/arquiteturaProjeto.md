# 📁 Documentação de Arquitetura - Software of Life

## ✨ Visão Geral
Este projeto segue uma estrutura modular, tanto no backend quanto no frontend, com foco em escalabilidade, organização e manutenção a longo prazo. A arquitetura limpa no backend e a separação por domínio no frontend garantem maior clareza entre responsabilidades.

---

## 🧰 Backend (Laravel Modular)

### Objetivo da Estrutura
Aplicar **Clean Architecture** com separação de responsabilidades:
- `Controllers`: camada de entrada HTTP.
- `Services`: regras de negócio.
- `Repositories`: acesso a dados.
- `DTOs`: transporte seguro e validado de dados.
- `Requests`: validação de entrada.
- `Models`: representação das entidades do banco.
- `Routes`: arquivos de rotas específicas do módulo.
- `Providers`: registros e bindings.

### Estrutura
```bash
backend/
└── app/
    └── Modules/
        └── Users/
            ├── Controllers/
            ├── DTOs/
            ├── Models/
            ├── Repositories/
            ├── Services/
            ├── Requests/
            ├── Routes/
            ├── Database/
            │   ├── Migrations/
            │   ├── Seeders/
            │   └── Factories/
            ├── Providers/
            ├── Resources/
            ├── Policies/
            └── Events/
```

### Vantagens
- Cada módulo é isolado.
- Facilita testes e manutenção.
- Pronto para escalabilidade (ex: Admins, Posts, Saúde).

---

## 🖥️ Frontend (Vue 3 + Vite + SCSS)

### Objetivo da Estrutura
Separar responsabilidades visuais, lógicas e funcionais por **módulo de domínio**:

- `components`: componentes globais reutilizáveis.
- `modules`: agrupamentos funcionais (ex: users).
- `stores`: Pinia global ou local por domínio.
- `styles`: SCSS centralizado para manutenção fácil.
- `composables`: funções reativas reutilizáveis.
- `utils`: utilidades auxiliares (formatadores, validações etc).
- `router`: organização das rotas.

### Estrutura
```bash
frontend/
└── src/
    ├── assets/
    ├── components/
    ├── layouts/
    ├── modules/
    │   └── users/
    │       ├── components/
    │       ├── views/
    │       ├── services/
    │       └── store/
    ├── router/
    ├── stores/
    ├── styles/
    │   ├── _variables.scss
    │   ├── _mixins.scss
    │   ├── _reset.scss
    │   ├── _buttons.scss
    │   └── main.scss
    ├── composables/
    ├── utils/
    ├── App.vue
    └── main.ts
```

### SCSS Global
- Todas as variáveis, estilos e resets ficam em `styles/`
- `main.scss` é importado automaticamente via `vite.config.ts`

```ts
// vite.config.ts
css: {
  preprocessorOptions: {
    scss: {
      additionalData: `@import "@/styles/main.scss";`
    }
  }
}
```

---

## ✅ Benefícios Gerais
- Arquitetura previsível e modular.
- Reutilização de código incentivada.
- Escalabilidade horizontal fácil.
- Possibilidade de reaproveitamento para outros projetos.
