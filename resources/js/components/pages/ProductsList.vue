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
        <h3 class="text-center">Things that you may like</h3>
        <div>
            <div class="container-fluid my-6">
                <div class="row my-2 d-flex flex-row flex-nowrap overflow-auto">
                    <div class="card-group">
                        <div
                            class="col col-md-6 col-lg-3 col-sm-12"
                            v-for="index in maxDisplay"
                            :key="cacheProducts[index].menuID"
                        >
                            <div class="card w-75">
                                <img
                                    :src="'https://picsum.photos/200/200'"
                                    class="card-img-top"
                                    alt="..."
                                />
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ cacheProducts[index].menuName }}
                                    </h5>
                                    <p class="card-text">
                                        {{ cacheProducts[index].description }}
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted"
                                            >Last updated 3 mins ago</small
                                        >
                                    </p>
                                    <router-link class="btn btn-primary" to="/"
                                        >Check it out</router-link
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section v-else>
        <h2 class="text-center">Loading ...</h2>
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
            isLoading: false,
            myProducts: [],
            maxDisplay: 10,
        };
    },
    computed: {
        cacheProducts() {
            return this.$store.getters["marketplace/getProducts"];
        },
        isProductsPopulated() {
            console.log(this.$store.getters["marketplace/getProducts"]);
            if (this.$store.getters["marketplace/getProducts"].length > 0) {
                return true;
            }
            return false;
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
        getProducts() {
            this.isLoading = true;
            const { default: axios } = require("axios");
            axios.get("http://localhost:8000/api/marketplace").then(() => {
                axios
                    .get("/marketplace", {
                        action: "fetchAll",
                    })
                    .then((response) => {
                        this.myProducts = response.data;
                        this.isLoading = false;
                        this.$store.commit("marketplace/populateProductList", {
                            data: this.myProducts,
                        });
                    })
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                    });
            });
        },
        async getCuisineTpye() {
            axios.get("http://localhost:8000/api/marketplace").then(() => {
                axios
                    .get("/marketplace", {
                        action: "fetchAll",
                    })
                    .then((response) => {
                        this.myProducts = response.data;
                        this.isLoading = false;
                        this.$store.commit("marketplace/populateProductList", {
                            data: this.myProducts,
                        });
                    })
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                    });
            });
        },
    },
    mounted() {
        if (this.$store.getters["marketplace/getProducts"].length === 0) {
            this.getProducts();
            this.getCuisineTpye();
        }
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
    color: #292929;
    text-align: center;
    border-bottom: 2px solid #ccc;
    padding-bottom: 1rem;
}
</style>
