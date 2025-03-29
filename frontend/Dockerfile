# Etapa base: usa Node com versão compatível
FROM node:18

# Define diretório de trabalho no container
WORKDIR /app

# Copia os arquivos de dependências primeiro (melhora cache)
COPY package.json pnpm-lock.yaml ./

# Instala o pnpm e as dependências do projeto
RUN npm install -g pnpm && pnpm install

# Copia o restante do código para o container
COPY . .

# Expõe a porta usada pelo Vite
EXPOSE 5173

# Comando que roda o Vite em modo dev acessível via navegador
CMD ["pnpm", "run", "dev", "--", "--host"]
