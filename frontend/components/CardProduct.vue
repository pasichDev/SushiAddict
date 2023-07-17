<template>
    
   <div class="card" >
          <div class="card-image">
            <figure class="image is-4by3">
              <img :src="product.image" alt="Product Image">
            </figure>
          </div>
          <div class="card-content">
            <div class="content">
              <h4 class="title is-5">{{ product.name }}</h4>

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
</template>

<script>
export default{

    props: ['product']
}
</script>