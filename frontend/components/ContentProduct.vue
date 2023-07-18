<template>
  <section class="section">
    <h1 class="title is-size-4 my-header-title">Пропонуємо тільки найкраще</h1>

    <div class="tabs is-toggle">
      <div v-if="isLoading">Завантаження...</div>
      <div v-else-if="error">
        <ErrorCommon></ErrorCommon>
      </div>
      <ul class="my-tabs-list">
        <li v-for="category in categories" :key="category.id" :class="{ 'is-active': selectedCategory == category.id }">
          <a class="list-item" @click="selectCategory(category.id)">
            <span>{{ category.name }}</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="columns is-multiline">
      <div class="column is-4" v-for="item in products" :key="item">
        <CardProduct :product="item"></CardProduct>

      </div>
    </div>
  </section>
</template>
<style>
.my-tabs-list li {
  margin-right: 15px; 
}

</style>

<script>
import { API_BASE_URL, API_TOKEN } from '@/constants'
import axios from 'axios'
import ErrorCommon from '@/common/_error.vue'
import CardProduct from '@/components/CardProduct.vue';
export default {
  name: 'ContentProduct',

  components: {
    ErrorCommon,
    CardProduct
  },
  data() {
    return {
      categories: [],
      products: [],
      isLoading: false,
      error: null,
      selectedCategory: null,
    };
  },
  mounted() {
    this.isLoading = true;
    axios.get(`${API_BASE_URL}category/key_api=${API_TOKEN}&action=getAll`)
      .then(response => {
        this.categories = response.data.Category
        this.isLoading = false;
        this.selectCategory(1)
      })
      .catch(error => {
        this.error = error.message
        this.isLoading = false;
      })

  },
  methods: {
    selectCategory(categoryId) {
      this.selectedCategory = categoryId;
      axios.get(`${API_BASE_URL}products/key_api=${API_TOKEN}&action=getProductFromCategory&q=${categoryId}`)
        .then(response => {
          this.products = response.data.Products
          this.isLoading = false;
        })
        .catch(error => {
          this.error = error.message
          this.isLoading = false;
        })
    },


  },
};
</script>
