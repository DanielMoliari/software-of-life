# 📁 Documentação de Arquitetura - Software of Life

## ✨ Visão Geral
Este projeto segue uma estrutura modular, tanto no backend quanto no frontend, com foco em escalabilidade, organização e manutenção a longo prazo. A arquitetura limpa no backend e a separação por domínio no frontend garantem maior clareza entre responsabilidades.

---

## 🧰 Backend (Laravel Modular)

### Objetivo da Estrutura
Aplicar **Clean Architecture** com separação de responsabilidades:

- `Controllers`: camada de entrada HTTP que recebe as requisições e aciona os services.
- `Services`: responsável por conter a lógica de negócio da aplicação.
- `Repositories`: camada de acesso e abstração dos dados (banco de dados ou outras fontes).
- `DTOs`: (Data Transfer Objects) transporte seguro, tipado e validado de dados entre camadas.
- `Requests`: validação das requisições HTTP antes de chegar nos services.
- `Models`: representação das entidades e suas relações com o banco de dados.
- `Routes`: definição das rotas específicas daquele módulo.
- `Providers`: provedores de serviço para registrar bindings, eventos, etc.
- `Resources`: formatação de saída dos dados (ex: retorno JSON estruturado).
- `Policies`: autorização de ações com base em regras (ex: se o usuário pode editar algo).
- `Events`: eventos que podem ser escutados (ex: ao criar um usuário, enviar email).
- `Database`: armazenamento das migrações, seeders e fábricas relacionados ao módulo.

### Estrutura
```bash
backend/
└── app/
    └── Modules/
        └── Users/
            ├── Controllers/         # UserController.php, AuthController.php
            ├── DTOs/                # CriarUsuarioDTO.php, AtualizarUsuarioDTO.php
            ├── Models/              # User.php, PasswordResetToken.php
            ├── Repositories/        # UserRepository.php, interfaces/
            ├── Services/            # UserService.php
            ├── Requests/            # CriarUsuarioRequest.php, LoginRequest.php
            ├── Routes/              # api.php (com rotas específicas do módulo)
            ├── Database/
            │   ├── Migrations/      # 2024_03_30_000000_create_users_table.php
            │   ├── Seeders/         # UserSeeder.php
            │   └── Factories/       # UserFactory.php
            ├── Providers/           # UsersServiceProvider.php
            ├── Resources/           # UserResource.php (para formatar resposta JSON)
            ├── Policies/            # UserPolicy.php
            └── Events/              # UsuarioCriado.php
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
- `router`: organização das rotas da aplicação.
- `layouts`: estruturas visuais comuns como Header, Footer, Sidebar.
- `assets`: imagens, fontes e outros arquivos estáticos.

### Estrutura
```bash
frontend/
└── src/
    ├── assets/                     # Imagens, ícones, fontes
    ├── components/                # Componentes globais (ex: BotaoBase, ModalBase)
    ├── layouts/                   # Layouts reutilizáveis (ex: DefaultLayout.vue)
    ├── modules/
    │   └── users/
    │       ├── components/        # Componentes específicos do módulo (ex: UserCard.vue)
    │       ├── views/             # Telas/rotas relacionadas (ex: UserList.vue, UserForm.vue)
    │       ├── services/          # Lógica de acesso à API (ex: userService.ts)
    │       └── store/             # Estado do módulo (Pinia store: userStore.ts)
    ├── router/                    # Definições de rotas globais
    ├── stores/                    # Pinia stores globais, se necessário
    ├── styles/
    │   ├── _variables.scss        # Cores, fontes, tamanhos
    │   ├── _mixins.scss           # Mixins SCSS reutilizáveis
    │   ├── _reset.scss            # Reset ou normalize
    │   ├── _buttons.scss          # Estilo global de botões
    │   └── main.scss              # Importa todos os parciais SCSS
    ├── composables/               # Funções reativas (ex: useToggle.ts)
    ├── utils/                     # Helpers e funções puras (ex: formatDate.ts)
    ├── App.vue                    # Componente raiz
    └── main.ts                    # Inicialização da aplicação


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
