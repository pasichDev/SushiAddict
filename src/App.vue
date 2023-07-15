<template >
  <div class="container">
    <Header></Header>

    <ContentProduct></ContentProduct>
    <Footer></Footer>

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

<style>
:root {
  --bg-color: #000000;
}

.body {
  padding: 20px;
  background: #EBEBEB;
}

.control {
  padding: 15px;
  background: #EBEBEB;
}
</style>
