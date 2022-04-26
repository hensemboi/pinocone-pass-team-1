<template>
    <section v-if="!isCartEmpty">
        <h2>Your Cart</h2>
        <h3>
            Total Amount:
            <base-badge mode="elegant">${{ cartTotal }}</base-badge>
        </h3>
        <ul>
            <cart-item
                v-for="item in cartItems"
                :key="item.menuID"
                :prod-id="item.menuID"
                :title="item.menuName"
                :image="'https://picsum.photos/200/300'"
                :price="item.price"
                :qty="item.qty"
                :note="item.note"
            ></cart-item>
        </ul>
        <router-link to="/checkout" tag="button">
            <button class="button-center">Proceed to check out</button>
        </router-link>
    </section>
    <section v-else>
        <h2>Your cart is empty. Please add an item from the marketplace.</h2>
    </section>
</template>

<script>
import CartItem from "../cart/CartItem.vue";

export default {
    components: {
        CartItem,
    },
    computed: {
        cartTotal() {
            return this.$store.getters["cart/totalSum"].toFixed(2);
        },
        cartItems() {
            return this.$store.getters["cart/items"];
        },
        isCartEmpty() {
            return this.$store.getters["cart/items"].length === 0;
        },
    },
    mounted () {
        this.$store.getters["cart/items"];
    }
};
</script>

<style scoped>
section {
    margin: 2rem auto;
    max-width: 40rem;
}

h2 {
    --gray-black: #292929;
    --quick-gray: #ccc;

    color: var(--gray-black);
    text-align: center;
    border-bottom: 2px solid var(--quick-gray);
    padding-bottom: 1rem;
}

h3 {
    text-align: center;
}

ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

button {
    --button-dark-red: #8f0030;

    font: inherit;
    border: 1px solid var(--button-dark-red);
    background-color: var(--button-dark-red);
    color: white;
    border-radius: 30px;
    cursor: pointer;
    padding: 0.5rem 1.5rem;
}

button:hover,
button:active {
    --button-dark-red-hover: #53001c;

    background-color: var(--button-dark-red-hover);
    border-color: var(--button-dark-red-hover);
}
</style>
