<template>
    <section v-if="!isCartEmpty">
        <h2>Your Cart</h2>
        <h3>
            Total Amount:
            <base-badge mode="elegant">RM{{ cartTotal }}</base-badge>
        </h3>
        <div v-if="!inputVoucher">
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
        </div>
        <div v-else>
            <span>Currently using voucher: {{ voucherCode }}</span>
            <button
                type="button"
                class="btn btn-outline-primary voucher-button-mid"
                @click="removeVoucher"
            >
                Remove
            </button>
        </div>
        <ul>
            <cart-item
                v-for="item in cartItems"
                :key="item.productId"
                :prodId="item.productId"
                :title="item.title"
                :image="item.image"
                :price="item.price"
                :qty="item.qty"
                :promo="item.promotionType"
                :note="item.note"
            ></cart-item>
        </ul>
        <button @click="checkout" class="button-center">Proceed to check out</button>
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
            userID: 0,
            inputVoucher: false,
            voucherCode: '',
            userVouchers: [],
            dateNow: Date.now(),
            expiryDate: '',
        };
    },
    computed: {
        cartTotal() {
            return (this.$store.getters["cart/totalSum"] - this.$store.getters["cart/vouched"]).toFixed(2);
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
            if (this.userVouchers.some(userVoucher => userVoucher.PK_FK_voucherID == this.voucherCode)) {
                if (this.voucherCode == 1) {
                    this.expiryDate = Date.parse(
                        this.userVouchers.find(function(userVoucher) {
                            return userVoucher.PK_FK_voucherID == 1
                        }).expiryDate
                    );

                    if (this.expiryDate > this.dateNow) {
                        if (this.$store.getters["cart/totalSum"].toFixed(2) < 50.00) {
                            alert("To apply this voucher, you must at least have a gross price of at least RM50.")
                        }

                        else {
                            this.$store.dispatch("cart/useVoucherReducePrice", {
                                code: this.voucherCode,
                                less: 40.00,
                            });
                            alert("Fun 40 voucher applied!");

                            this.voucherCode = "Fun 40";
                            this.inputVoucher = true;
                        }
                    }

                    else {
                        alert("This voucher has expired.");
                    }
                }

                else if (this.voucherCode == 2) {
                    this.expiryDate = Date.parse(
                        this.userVouchers.find(function(userVoucher) {
                            return userVoucher.PK_FK_voucherID == 2
                        }).expiryDate
                    );

                    if (this.expiryDate > this.dateNow) {
                        if (this.$store.getters["cart/totalSum"].toFixed(2) < 200.00) {
                            alert("To apply this voucher, you must at least have a gross price of at least RM200.")
                        }

                        else {
                            this.$store.dispatch("cart/useVoucherReducePrice", {
                                code: this.voucherCode,
                                less: (this.$store.getters["cart/totalSum"].toFixed(2))*0.2,
                            });
                            alert("Happy 20 voucher applied!");

                            this.voucherCode = "Happy 20";
                            this.inputVoucher = true;
                        }
                    }

                    else {
                        alert("This voucher has expired.");
                    }
                }
            }

            else {
                alert("No owned voucher of that code was found.");
            }
        },
        removeVoucher() {
            this.$store.dispatch("cart/useVoucherReducePrice", {
                code: 0,
                less: 0.00,
            });
            
            this.voucherCode = "";
            this.inputVoucher = false;
        },
        checkout() {
            if (this.userID == 0) {
                alert("Please log in first.");
            }

            else {
                this.$router.push("/checkout");
            }
        }
    },
    async created() {
        const rootURL = window.location.origin;
        const userID = (await axios.get(rootURL + "/user")).data.PK_userID;
        this.userID = userID;
        this.userVouchers = (await axios.get("./uservoucher/" + userID)).data;
    }
};
</script>

<style scoped>
section {
    margin: 2rem auto;
    max-width: 40rem;
}

h2 {
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

span {
    font-size: large;
}

button {
    font: inherit;
    border: 1px solid var(--pinocone-yellow);
    background-color: var(--pinocone-yellow);
    color: black;
    border-radius: 30px;
    cursor: pointer;
    padding: 0.5rem 1.5rem;
    margin-left: 230px;
}

button:hover,
button:active {
    background-color: var(--pinocone-yellow-hover);
    border-color: var(--pinocone-yellow-hover);
}

.voucher-button-mid {
    margin-left: 280px;
}
</style>
