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