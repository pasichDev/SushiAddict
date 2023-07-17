<template>
  <div>
    <div class="tabs is-toggle  is-fullwidth">
      <div v-if="isLoading">Завантаження...</div>
      <div v-else-if="error"><ErrorCommon></ErrorCommon></div>
      <ul v-else>
        <a class="list-item" v-for="category in categories" :key="category.id">
          <span>{{ category.name }}</span>
        </a>
      </ul>
    </div>
  </div>
</template>

<style>


.list-item {
  margin-right: 10px;
}
</style>


<script>
import axios from 'axios'
import ErrorCommon from '@/common/_error.vue'
export default {
  name: 'MyComponent',
  components: {
    ErrorCommon,
  },
  data() {
    return {
      categories: [],
      isLoading: false,
      error: null
    }
  },
  mounted() {
    this.isLoading = true;
    axios.get('http://localhost:8080/api_public/category/key_api=c0e65a619d6635c3e559a490f4155d3a&action=getAll')
      .then(response => {
        this.categories = response.data.Category
        this.isLoading = false;
      })
      .catch(error => {
        this.error = error.message
        this.isLoading = false;
      })
  }
}
</script>
