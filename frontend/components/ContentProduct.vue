<template>
  <section class="section">
    <h1 class="title is-size-4 my-header-title">Пропонуємо тільки найкраще</h1>

    <div class="tabs is-toggle">
      <div v-if="isLoading">Завантаження...</div>
      <div v-else-if="error">
        <ErrorCommon></ErrorCommon>
      </div>
      <ul>
        <li v-for="category in categories" :key="category.id" :class="{ 'is-active': selectedCategory == category.id }">
          <a class="list-item" @click="selectCategory(category.id)">
            <span>{{ category.name }}</span>
          </a>
        </li>
      </ul>
    </div>




    <div class="columns is-multiline">
      <div class="column is-4" v-for="product in products" :key="product.id">
        <div class="card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img :src="product.image" alt="Product Image">
            </figure>
          </div>
          <div class="card-content">
            <div class="content">
              <h4 class="title is-4">{{ product.name }}</h4>

              <p><b>Опис:</b> {{ product.description }}</p>
              <div class="columns is-mobile is-vcentered">
                <div class="column is-9 is-size-4">
                  <b>{{ product.price }} грн</b>
                </div>
                <div class="column is-size-6">
                  <b>{{ product.weight }} гр.</b>
                </div>
              </div>

              <button class="button is-fullwidth is-danger">Додати в кошик</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>


<script>
import axios from 'axios'
import ErrorCommon from '@/common/_error.vue'
import { API_BASE_URL, API_TOKEN } from '@/constants'
export default {
  name: 'ContentProduct',
  components: {
    ErrorCommon,
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
