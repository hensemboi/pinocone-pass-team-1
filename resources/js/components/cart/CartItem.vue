<template>
    <li>
        <div>
            <h2 class="text-center">{{ title }}</h2>
        </div>
        <div v-if="promo === 1"><em>Discounted</em></div>
        <div v-else-if="promo === 2"><em>Buy 1 Free 1</em></div>
        <div>
            <img :src="image" :alt="title" />
        </div>
        <div>
            <div class="item__data">
                <div>
                    Price per Item:
                    <strong>RM {{ price.toFixed(2) }}</strong>
                </div>
                <div>
                    Quantity:
                    <strong>{{ qty }}</strong>
                </div>
                <div>Note: {{ note }}</div>
            </div>
            <div class="item__total">Total: RM {{ itemTotal }}</div>
            <button @click="removeAll">Remove All</button>
            <button @click="removeOne">Remove One</button>
        </div>
    </li>
</template>

<script>
export default {
    props: ["prodId", "title", "image", "price", "qty", "promo", "note"],
    data() {
        return {
          toggleDOM: false,
          newNote: '',
          showInputText: false,
        };
    },
    computed: {
        itemTotal() {
            return (this.price * this.qty).toFixed(2);
        },
    },
    methods: {
        removeAll() {
            this.$store.dispatch("cart/removeFromCart", { Id: this.prodId });
        },
        removeOne() {
            this.$store.dispatch("cart/removeOneFromCart", { Id: this.prodId });
        },
        addNote() {
          this.showInputText = !this.showInputText;
        },
    },
};
</script>

<style scoped>
li {
    margin: 1rem auto;
    padding: 1rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
    text-align: center;
    max-width: 25rem;
}

img {
    width: 5rem;
    height: 5rem;
    border-radius: 50%;
    object-fit: cover;
}

.item__data {
    display: flex;
    justify-content: space-between;
}

.item__total {
    font-weight: bold;
    margin: 1rem 0;
    border-top: 1px solid var(--item-gray);
    border-bottom: 2px solid var(--item-gray);
    padding: 0.25rem 0;
    width: auto;
}

button {
    font: inherit;
    border: 1px solid var(--pinocone-yellow);
    background-color: var(--pinocone-yellow);
    color: black;
    border-radius: 30px;
    cursor: pointer;
    padding: 0.5rem 1.5rem;
}

button:hover,
button:active {
    background-color: var(--pinocone-yellow-hover);
    border-color: var(--pinocone-yellow-hover);
}
</style>
