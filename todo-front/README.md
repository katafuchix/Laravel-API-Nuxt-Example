## 動作手順
```
npm install
npm run dev
```

## プロジェクトを作成した手順
## 1. Nuxtプロジェクト作成
Laravelプロジェクトと同じ階層に作成

```
npx nuxi init todo-front
cd todo-front
npm install
```
途中でパッケージマネージャーを聞かれたら npm を選んでOKです。

## 2. app.vue を編集

```
cat > app.vue << 'EOF'
<script setup>
const { data: todos } = await useFetch('http://localhost:8000/api/todos')
</script>

<template>
  <div>
    <h1>Todo一覧</h1>
    <ul>
      <li v-for="todo in todos" :key="todo.id">{{ todo.title }}</li>
    </ul>
  </div>
</template>
EOF
```

## 3. Nuxt起動

```
npm run dev
```

起動すると http://localhost:3000 でアクセスできるようになります(ターミナルに表示されるURLを確認してください)。

## 4. ブラウザで確認

http://localhost:3000 を開いて、Laravel側に入れたデータが一覧表示されればOKです。


*** 


# Nuxt Minimal Starter

Look at the [Nuxt documentation](https://nuxt.com/docs/getting-started/introduction) to learn more.

## Setup

Make sure to install dependencies:

```bash
# npm
npm install

# pnpm
pnpm install

# yarn
yarn install

# bun
bun install
```

## Development Server

Start the development server on `http://localhost:3000`:

```bash
# npm
npm run dev

# pnpm
pnpm dev

# yarn
yarn dev

# bun
bun run dev
```

## Production

Build the application for production:

```bash
# npm
npm run build

# pnpm
pnpm build

# yarn
yarn build

# bun
bun run build
```

Locally preview production build:

```bash
# npm
npm run preview

# pnpm
pnpm preview

# yarn
yarn preview

# bun
bun run preview
```

Check out the [deployment documentation](https://nuxt.com/docs/getting-started/deployment) for more information.
