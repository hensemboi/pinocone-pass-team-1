<template>
    <div class="input-group">
        <input
            type="search"
            class="form-control rounded"
            placeholder="Search for food ..."
            aria-label="Search"
            aria-describedby="search-addon"
            v-model.trim="productName"
            @blur="validateInput"
        />
        <button
            type="button"
            class="btn btn-outline-primary"
            @click="searchProduct"
        >
            Search
        </button>
    </div>
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
                :category="prod.category"
            ></product-item>
        </ul>
    </section>
</template>

<script>
import ProductItem from "../marketplace/ProductItem.vue";
// import { mapGetters } from 'vuex';

export default {
    components: {
        ProductItem,
    },
    data() {
        return {
            productName: "",
            productNameValidity: "pending",
        };
    },
    computed: {
        products() {
            return this.$store.getters["marketplace/getProducts"];
        },
    },
    methods: {
        validateInput() {
            if (this.productName === "") {
                this.productNameValidity = "invalid";
                return;
            }
            this.productNameValidity = "valid";
        },
        searchProduct() {
            this.$router.push({
                path: "/marketplace",
                query: { sort: this.productName },
            });
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
.form-control.invalid input {
    border-color: red;
}
</style>
