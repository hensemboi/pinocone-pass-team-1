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
    color: #292929;
    text-align: center;
    border-bottom: 2px solid #ccc;
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
    font: inherit;
    border: 1px solid #8f0030;
    background-color: #8f0030;
    color: white;
    border-radius: 30px;
    cursor: pointer;
    padding: 0.5rem 1.5rem;
}

button:hover,
button:active {
    background-color: #53001c;
    border-color: #53001c;
}
</style>
