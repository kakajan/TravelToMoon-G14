<template>
  <q-page padding>
    <div class="row q-col-gutter-md">
      <div v-for="(product, index) in products" :key="'product-' + index" class="col">
        <q-card class="my-card" flat bordered>
          <q-img src="https://cdn.quasar.dev/img/mountains.jpg">
          <div class="absolute-bottom full-width">
            {{ product.name }}
          </div>
          </q-img>
          <q-card-actions align="right">
            <q-btn flat round color="red" icon="favorite" />
            <q-btn flat round color="teal" icon="bookmark" />
            <q-btn flat rounded color="primary" size="lg" :label="product.price" />
          </q-card-actions>
        </q-card>
      </div>

    </div>
  </q-page>
</template>

<script setup>
import { api } from 'src/boot/axios';
import { ref } from 'vue';

const products = ref([])

api.get('api/products')
  .then(response => {
    products.value = response.data;
    console.log(products.value);

  })
  .catch(error => {
    console.error('Error fetching products:', error);
  });
</script>
