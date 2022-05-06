<template>
    <section v-if="!isCartEmpty">
        <h2>Your Cart</h2>
        <h3>
            Total Amount:
            <base-badge mode="elegant">RM{{ cartTotal.toFixed(2) }}</base-badge>
        </h3>
        <input
            type="text"
            class="form-control rounded"
            placeholder="Enter voucher code ..."
            v-model="voucherCode"
        />
        <button
            type="button"
            class="btn btn-outline-primary voucher-button-mid"
            @click="useVoucher"
        >
            Use
        </button>
        <ul>
            <cart-item
                v-for="item in cartItems"
                :key="item.productId"
                :prodId="item.productId"
                :title="item.title"
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
    data() {
        return {
            voucherCode: '',
            userVouchers: [],
            userID: 47,
        };
    },
    computed: {
        cartTotal() {
            return this.$store.getters["cart/totalSum"].toFixed(2) - this.$store.getters["cart/vouched"].toFixed(2);
        },
        cartItems() {
            return this.$store.getters["cart/items"];
        },
        isCartEmpty() {
            return this.$store.getters["cart/items"].length === 0;
        },
    },
    methods: {
        useVoucher() {
            this.$router.push({
                path: "/cart",
                query: { voucher: this.voucherCode },
            });

            if (this.userVouchers.some(userVoucher => userVoucher.PK_FK_voucherID == this.voucherCode)) {
                if (this.voucherCode == 1) {
                    if (this.$store.getters["cart/totalSum"].toFixed(2) < 40.00) {
                        alert("To apply this voucher, you must at least have a gross price of at least RM40.")
                    }

                    else {
                        this.$store.dispatch("cart/useVoucherReducePrice", {
                            less: 40.00,
                        });
                        alert("Fun 40 voucher applied!");
                    }    
                }

                else if (this.voucherCode == 2) {
                    if (this.$store.getters["cart/totalSum"].toFixed(2) < 200.00) {
                        alert("To apply this voucher, you must at least have a gross price of at least RM200.")
                    }

                    else {
                        this.$store.dispatch("cart/useVoucherReducePrice", {
                            less: (this.$store.getters["cart/totalSum"].toFixed(2))*0.2,
                        });
                        alert("Happy 20 voucher applied!");
                    }
                }
            }

            else {
                alert("No owned voucher of that code was found.");
            }
        },
    },
    mounted() {
        this.$store.getters["cart/items"];
        axios.get("./uservoucher/" + this.userID)
        .then(response => this.userVouchers = response.data);
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
    margin-left: 240px;
}

button:hover,
button:active {
    --button-dark-red-hover: #53001c;

    background-color: var(--button-dark-red-hover);
    border-color: var(--button-dark-red-hover);
}

.voucher-button-mid {
    margin-left: 280px;
}
</style>
