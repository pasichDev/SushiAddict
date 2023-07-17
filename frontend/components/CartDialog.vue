<template>
    <div class="modal" :class="{ 'is-active': isOpen }">
      <div class="modal-background"></div>
      <div class="modal-content">
        <p class="image is-4by3">
      <img src="https://bulma.io/images/placeholders/1280x960.png" alt="">
    </p>
      </div>
      <button class="modal-close is-large" aria-label="Закрити" @click="closeModal"></button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        isOpen: false,
      };
    },
    methods: {
      openModal() {
        this.isOpen = true;
      },
      closeModal() {
        this.isOpen = false;
      },
    },
  };
  </script>
  