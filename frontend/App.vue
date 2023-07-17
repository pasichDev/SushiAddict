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

 
  <ModalComponent ref="modal"></ModalComponent>
</template>

<script>
import Header from './common/_header.vue'
import Footer from './common/_footer.vue'
import ContentProduct from './components/ContentProduct.vue'
import ModalComponent from './common/_cart.vue';
export default {
  name: 'App',
  components: {
    Header,
    Footer,
    ContentProduct,
    ModalComponent,
  },
  methods: {
    openModal() {
      this.$refs.modal.openModal();
    },
  },
}
</script>


