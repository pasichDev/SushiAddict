<template >
  <div class="container">
    <Header></Header>
    <div class="body">
      <ContentProduct>
      </ContentProduct>
    </div>

    <Footer></Footer>

  </div>
  <div class="fab-container">
    <button class="fab has-background-danger" @click="openModal">
      <img src="@/assets/images/cart.svg" style="padding: 18%;">
    </button>
  </div>


  <CartDialog ref="modal"></CartDialog>
</template>

<script>
import Header from './common/_header.vue'
import Footer from './common/_footer.vue'
import ContentProduct from '@/components/ContentProduct.vue'
import CartDialog from './components/CartDialog.vue';
export default {
  name: 'App',
  components: {
    Header,
    Footer,
    ContentProduct,
    CartDialog,
  },
  methods: {
    openModal() {
      this.$refs.modal.openModal();
    },
  },
}
</script>


