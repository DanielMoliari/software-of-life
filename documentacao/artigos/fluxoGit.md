# 📦 Fluxo de Trabalho com Git

Este documento define o **padrão de organização, nomenclatura de branches e mensagens de commit** utilizado no projeto.

---

## 🧠 Branches

### Branches principais

| Branch  | Uso                             |
|---------|----------------------------------|
| `main`  | Código estável, pronto para produção |
| `desenvolvimento`   | Código em desenvolvimento contínuo |

### Branches auxiliares

| Prefixo       | Tipo           | Exemplo                          |
|---------------|----------------|----------------------------------|
| `feature/`    | Nova funcionalidade | `feature/registro-usuario`     |
| `bugfix/`     | Correção de bug    | `bugfix/corrige-login`         |
| `hotfix/`     | Correção urgente   | `hotfix/corrige-erro-producao` |
| `release/`    | Preparar versão    | `release/v1.0.0`               |

---

## ✍️ Commits Semânticos

Utilizamos **Commits Semânticos** com o seguinte formato:

```bash
tipo(módulo): descrição curta no imperativo
```

### Tipos aceitos

| Tipo       | Descrição                                       |
|------------|--------------------------------------------------|
| `feat`     | Nova funcionalidade                              |
| `fix`      | Correção de bug                                 |
| `docs`     | Atualização de documentação                     |
| `style`    | Mudança de formatação ou estilo                  |
| `refactor` | Refatoração de código (sem mudança funcional)   |
| `test`     | Adição/modificação de testes                    |
| `chore`    | Tarefas diversas (build, dependências, configs) |
| `perf`     | Melhorias de performance                        |

### Exemplos

```bash
git commit -m "feat(auth): adiciona autenticação com JWT"
git commit -m "fix(frontend): corrige validação de formulário"
git commit -m "docs: atualiza README com instruções de uso"
```

---

## 💻 Fluxo de Desenvolvimento

```bash
git checkout dev
git checkout -b feature/nome-da-feature

# Trabalha no código

git add .
git commit -m "feat(nome): implementa algo novo"
git push origin feature/nome-da-feature

# Cria Pull Request para dev
```

---

## 🔁 Outros comandos úteis

| Comando                                | O que faz                                      |
|----------------------------------------|-------------------------------------------------|
| `git log --oneline --graph --all`      | Visualiza histórico de commits em formato árvore|
| `git commit --amend`                   | Edita último commit                             |
| `git revert <hash>`                    | Reverte um commit específico                    |
| `git stash` / `git stash pop`          | Guarda/restaura mudanças não commitadas         |

---

## ✅ Dicas finais

- Escreva commits claros e objetivos
- Use branches para isolar mudanças
- Faça merge para `dev` após revisão
- `main` só deve conter código funcional e validado para produção

---

Se quiser automatizar validações (ex: padrão de commits com husky + commitlint)

