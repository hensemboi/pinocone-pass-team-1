<template>
  <section>
    <base-card>
      <h2 class="text-center">Register delivery information</h2>
      <delivery-form @save-data="saveData"></delivery-form>
    </base-card>
  </section>
</template>

<script>
import { useStore } from 'vuex';
import DeliveryForm from "./DeliveryForm.vue"

export default {
  components: {
    DeliveryForm,
  },
  setup (props) {
      const store = useStore();
      function saveData (data) {
          console.log(data);
      }
      return {
          saveData,
      }
  }
//   methods: {
//     saveData(data) {
//       this.$store.dispatch("coaches/registerCoach", data);
//       this.$router.replace("/coaches");
//     },
//   },
};
</script>
