<template>
  <section>
    <ul>
      <product-item
        v-for="prod in products"
        :key="prod.id"
        :id="prod.id"
        :title="prod.title"
        :image="prod.image"
        :description="prod.description"
        :price="prod.price"
      ></product-item>
    </ul>
  </section>
</template>

<script>
import ProductItem from '../marketplace/ProductItem.vue';
// import { mapGetters } from 'vuex';

export default {
  components: {
    ProductItem,
  },
  computed: {
    products() {
      return this.$store.getters['marketplace/getProducts'];
    },
  },
  // ...mapGetters['getProducts'],
};
</script>

<style scoped>
ul {
  list-style: none;
  margin: 2rem auto;
  padding: 0;
  max-width: 40rem;
}
</style>
