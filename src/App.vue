<template >
  <div class="container">
    <Header></Header>
    <div class="body"><ContentProduct></ContentProduct></div>
    <Footer></Footer>

  </div>
  <div class="fab-container">
    <button class="fab">
      <img src="cart-outline.svg" style="padding: 18%;">
    </button>
  </div>
</template>

<script>
import Header from './common/_header.vue'
import Footer from './common/_footer.vue'
import ContentProduct from './components/ContentProduct.vue'
export default {
  name: 'App',
  components: {
    Header,
    Footer,
    ContentProduct
  }
}
</script>


