# 🧪 Comandos úteis no Projeto

---

## 🐋 Docker

### Subir os containers (build incluso)
```bash
docker-compose up --build -d
```

### Parar os containers
```bash
docker-compose down
```

### Acessar o container do backend
```bash
docker exec -it software-of-life-backend-1 bash
```

### Acessar o container do frontend
```bash
docker exec -it software-of-life-frontend-1 sh
```

---

## 📦 Backend (Laravel Modularizado)

> Todos os comandos abaixo devem ser executados **dentro do container do backend**, no diretório correto do módulo (ex: `app/Modules/Users`).

### Instalar dependências
```bash
composer install
```

### Rodar todas as migrations (de todos os módulos)
```bash
php artisan migrate
```

### Criar uma migration dentro de um módulo
```bash
php artisan make:migration create_nome_tabela_table --path=app/Modules/NomeModulo/Database/Migrations
```

### Criar um seeder dentro de um módulo
```bash
php artisan make:seeder NomeSeeder --path=app/Modules/NomeModulo/Database/Seeders
```

### Rodar todos os seeders
```bash
php artisan db:seed
```

### Rodar seeder específico
```bash
php artisan db:seed --class=App\Modules\NomeModulo\Database\Seeders\NomeSeeder
```

### Rodar factory (em seeder)
```php
User::factory()->count(10)->create();
```

### Criar factory dentro do módulo
```bash
php artisan make:factory NomeFactory --model=App\Modules\NomeModulo\Models\NomeModel --path=app/Modules/NomeModulo/Database/Factories
```

### Limpar caches
```bash
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan view:clear
```

### Gerar chave do app (se necessário)
```bash
php artisan key:generate
```

### Dump autoload
```bash
composer dump-autoload
```

### Rodar testes do backend (PHPUnit)
```bash
php artisan test
```

> Para rodar testes de um módulo específico, use `--filter` com o nome do teste ou da classe.

---

## ⚙️ Frontend (Vue + PNPM + Vite)

### Instalar dependências (dentro do container frontend)
```bash
pnpm install
```

### Rodar o projeto
```bash
pnpm run dev -- --host
```

### Rodar testes com Vitest
```bash
pnpm run test
```

### Adicionar dependência
```bash
pnpm add nome-pacote
```

### Adicionar dependência de dev
```bash
pnpm add -D nome-pacote
```

---

## 🛠️ Git (com base no fluxo definido)

### Criar nova branch
```bash
git checkout -b feature/nome-do-recurso
```

### Commits (Convencional)
```bash
git commit -m "feat(usuarios): adiciona criação de usuário"
```

### Subir alterações
```bash
git push origin feature/nome-do-recurso
```

---

## 🗃️ Banco de Dados (MariaDB via Docker)

### Acessar CLI do banco
```bash
docker exec -it software-of-life-db-1 mysql -u laravel -p
# senha: secret
```

### Comandos SQL básicos
```sql
SHOW DATABASES;
USE laravel;
SHOW TABLES;
SELECT * FROM users;
```

---

## 🧪 Testes (Resumo)

### Backend (PHPUnit)
```bash
php artisan test
# ou: ./vendor/bin/phpunit
```

- Testes ficam geralmente em `tests/Feature` ou `tests/Unit`, ou podem ser organizados em `app/Modules/NomeModulo/Tests`.

### Frontend (Vitest)
```bash
pnpm run test
# ou para modo watch:
pnpm run test:watch
```

- Testes Vue ficam geralmente em `src/__tests__` ou ao lado dos componentes como `Componente.spec.ts`.
