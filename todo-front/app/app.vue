<script setup>
const { data: todos, refresh } = await useFetch('http://localhost:8000/api/todos')

const newTitle = ref('')

async function addTodo() {
  if (!newTitle.value.trim()) return

  await $fetch('http://localhost:8000/api/todos', {
    method: 'POST',
    body: { title: newTitle.value }
  })
  newTitle.value = ''
  refresh()
}

async function toggleDone(todo) {
  await $fetch(`http://localhost:8000/api/todos/${todo.id}`, {
    method: 'PUT',
    body: { done: todo.done }
  })
  refresh()
}

async function removeTodo(todo) {
  await $fetch(`http://localhost:8000/api/todos/${todo.id}`, {
    method: 'DELETE'
  })
  refresh()
}
</script>

<template>
  <div class="container">
    <h1>Todo一覧</h1>

    <form class="add-form" @submit.prevent="addTodo">
      <input v-model="newTitle" type="text" placeholder="新しいTodoを入力">
      <button type="submit">追加</button>
    </form>

    <ul class="todo-list">
      <li v-for="todo in todos" :key="todo.id" class="todo-item" :class="{ done: todo.done }">
        <label class="todo-label">
          <input type="checkbox" v-model="todo.done" @change="toggleDone(todo)">
          <span>{{ todo.title }}</span>
        </label>
        <button class="delete-btn" @click="removeTodo(todo)">削除</button>
      </li>
    </ul>
  </div>
</template>

<style scoped>
.container {
  max-width: 480px;
  margin: 60px auto;
  padding: 32px;
  font-family: -apple-system, BlinkMacSystemFont, "Hiragino Sans", sans-serif;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

h1 {
  font-size: 24px;
  margin-bottom: 24px;
  color: #222;
}

.add-form {
  display: flex;
  gap: 8px;
  margin-bottom: 24px;
}

.add-form input {
  flex: 1;
  padding: 10px 12px;
  border: 1px solid #ddd;
  border-radius: 6px;
  font-size: 14px;
}

.add-form input:focus {
  outline: none;
  border-color: #4a90e2;
}

.add-form button {
  padding: 10px 16px;
  background: #4a90e2;
  color: #fff;
  border: none;
  border-radius: 6px;
  font-size: 14px;
  cursor: pointer;
  transition: background 0.2s;
}

.add-form button:hover {
  background: #3a7bc8;
}

.todo-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.todo-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 8px;
  border-bottom: 1px solid #eee;
}

.todo-label {
  display: flex;
  align-items: center;
  gap: 10px;
  cursor: pointer;
  flex: 1;
}

.todo-label input[type="checkbox"] {
  width: 18px;
  height: 18px;
  cursor: pointer;
}

.todo-item.done span {
  text-decoration: line-through;
  color: #aaa;
}

.delete-btn {
  padding: 6px 12px;
  background: transparent;
  color: #e25c5c;
  border: 1px solid #e25c5c;
  border-radius: 6px;
  font-size: 12px;
  cursor: pointer;
  transition: all 0.2s;
}

.delete-btn:hover {
  background: #e25c5c;
  color: #fff;
}
</style>