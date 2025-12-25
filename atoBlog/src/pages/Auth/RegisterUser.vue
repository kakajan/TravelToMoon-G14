<template>
  <q-page padding>
    <!-- content -->
    <div class="flex">
      <div class="row">
        <div class="col"><q-input v-model="email" label="email" /></div>
        <div class="col"><q-input v-model="password" label="password" type="password" /></div>
      </div>
      <div class="row">
        <q-btn @click="register()" label="Go to Login Page" color="primary" />
      </div>
    </div>
  </q-page>
</template>

<script setup>
import { api } from 'src/boot/axios';
import { ref } from 'vue';
const email = ref('');
const password = ref('');
const register = () => {
  console.log('Registering user with email:', email.value, 'and password:', password.value);
  // Add your registration logic here
  api.post('api/register', {
    email: email.value,
    password: password.value
  })
    .then(response => {
      console.log('Registration successful:', response.data);
      // Handle successful registration (e.g., redirect to login page)
    })
    .catch(error => {
      console.error('Registration failed:', error);
      // Handle registration error (e.g., show error message)
    });
};
</script>
