<template>
    <div>
        <li
            class="product bg-white"
            v-if="$route.query.sort === category || $route.query.sort === title"
        >
            <div class="product__data">
                <div class="product__image">
                    <img :src="image" :alt="title" />
                </div>
                <div class="product__text">
                    <h3>{{ title }}</h3>
                    <base-badge mode="highlight" :no-margin-left="true">
                        <div v-if="promotionType === 1">
                            <s>RM{{ price }}</s><p>{{ discountedPrice }}</p>
                        </div>
                        <div v-else-if="promotionType === 2">
                            RM{{ price }} Buy 1 Free 1
                        </div>
                        <h4 v-else>RM{{ price }}</h4>
                    </base-badge>
                    <p>{{ description }}</p>
                    <p>Category: {{ category }}</p>
                    <p>Cuisine Type: {{ cuisineType }}</p>
                </div>
            </div>
            <div class="product__actions">
                <button @click="addToCart">Add to Cart</button>
            </div>
        </li>
        <li class="product bg-white" v-else-if="!$route.query.sort">
            <div class="product__data">
                <div class="product__image">
                    <img :src="image" :alt="title" />
                </div>
                <div class="product__text">
                    <h3>{{ title }}</h3>
                    <base-badge mode="highlight" :no-margin-left="true">
                        <div v-if="promotionType === 1">
                            <s>RM{{ price }}</s><p>{{ discountedPrice }}</p>
                        </div>
                        <div v-else-if="promotionType === 2">
                            RM{{ price }} Buy 1 Free 1
                        </div>
                        <h4 v-else>RM{{ price }}</h4>
                    </base-badge>
                    <p>{{ description }}</p>
                    <p>Category: {{ category }}</p>
                    <p>Cuisine Type: {{ cuisineType }}</p>
                </div>
            </div>
            <div class="product__actions">
                <button @click="addToCart">Add to Cart</button>
            </div>
        </li>
    </div>
</template>

<script>
export default {
    props: ["id", "image", "title", "description", "price", "discountedPrice", "promotionType", "category", "cuisineType"],
    methods: {
        addToCart() {
            this.$store.dispatch("cart/addToCart", {
                id: this.id,
            });
        },
    },
};
</script>

<style scoped>
li {
    margin: 1.5rem auto;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
    padding: 1rem;
}

.product__data {
    display: flex;
}

.product__image {
    margin-right: 1rem;
}

.product__image img {
    height: 10rem;
    width: 10rem;
    object-fit: cover;
}

.product__text h3 {
    margin: 0 0 0.5rem 0;
}

.product__text h4 {
    margin: 0;
}

.product__actions {
    text-align: center;
}

button {
    font: inherit;
    cursor: pointer;
    background-color: #45006d;
    color: white;
    border: 1px solid #45006d;
    padding: 0.5rem 1.5rem;
    border-radius: 30px;
}

button:hover,
button:active {
    background-color: #760ab4;
    border-color: #760ab4;
}
</style>
