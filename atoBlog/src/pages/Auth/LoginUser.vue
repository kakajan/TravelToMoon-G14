<template>
  <q-page padding>
    <!-- content -->
    <h1>Login Page</h1>
    <div class="flex">
      <div class="row">
        <div class="col"><q-input v-model="email" label="email" /></div>
        <div class="col"><q-input v-model="password" label="password" type="password" /></div>
      </div>
      <div class="row">
        <q-btn @click="login()" label="Login" color="primary" />
      </div>
    </div>
  </q-page>
</template>

<script setup>

import { api } from 'src/boot/axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';
const router = useRouter()
const email = ref('');
const password = ref('');
const login = () => {
  console.log('Logging in user with email:', email.value, 'and password:', password.value);
  // Add your login logic here
  api.post('api/login', {
    email: email.value,
    password: password.value
  })
    .then(response => {
      if (response.data.status) {
        router.push('/')
      }
      console.log('Login successful:', response.data);
      // Handle successful login (e.g., redirect to home page)
    })
    .catch(error => {
      console.error('Login failed:', error);
      // Handle login error (e.g., show error message)
    });
};
</script>
