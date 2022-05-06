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
    <section v-if="isProductsPopulated">
        <ul>
            <product-item
                v-for="index in maxDisplay"
                :key="cacheProducts[index].PK_menuID"
                :id="cacheProducts[index].PK_menuID"
                :title="cacheProducts[index].menuName"
                :image="'https://picsum.photos/200/300'"
                :description="cacheProducts[index].description"
                :price="cacheProducts[index].price"
                :category="cacheProducts[index].FK_categoryCode"
                :cuisineType="cacheProducts[index].FK_cuisineCode"
            ></product-item>
        </ul>
        <product-cards
            class="card"
            title="Things you may like"
            :products="cacheProducts"
        ></product-cards>
    </section>
    <section v-else>
        <h2 class="text-center">Loading ...</h2>
    </section>
</template>

<script>
import { ref, computed } from "vue";
import { useStore } from "vuex";
import { useRouter } from "vue-router";

import ProductItem from "../marketplace/ProductItem.vue";
import ProductCards from "../marketplace/ProductCards.vue";

export default {
    components: {
        ProductItem,
        ProductCards,
    },
    setup() {
        const productName = ref("");
        const productNameValidity = ref("");
        const maxDisplay = ref(5);

        const store = useStore();
        const router = useRouter();

        const cacheProducts = computed(function () {
            return store.getters["marketplace/getProducts"];
        });

        const isProductsPopulated = computed(function () {
            return store.getters["marketplace/getIsProductsPopulated"];
        });

        function validateInput() {
            if (productName.value === "") {
                productNameValidity.value = "invalid";
                return;
            }
            productNameValidity.value = "valid";
        }

        function searchProduct() {
            router.push({
                path: "/marketplace",
                query: { sort: productName.value },
            });
        }

        async function getProducts() {
            console.log("I am doing fetching in the component!");
            if (!store.getters["marketplace/getIsProductsPopulated"]) {
                try {
                    await store.dispatch("marketplace/fetchProducts");
                } catch (error) {
                    console.log(
                        error.errorMessage || "Failed to fetch prodcucts"
                    );
                }
            } else {
                console.log("The fetching is not executing!");
            }
        }
        return {
            productName,
            productNameValidity,
            cacheProducts,
            isProductsPopulated,
            maxDisplay,
            validateInput,
            searchProduct,
            getProducts,
        };
    },
    created() {
        this.getProducts();
    },
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
.card {
    margin: 1.5rem auto;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
    padding: 1rem;
}
h2 {
    --gray-black: #292929;
    --quick-gray: #ccc;

    color: var(--gray-black);
    text-align: center;
    border-bottom: 2px solid var(--quick-gray);
    padding-bottom: 1rem;
}
</style>
