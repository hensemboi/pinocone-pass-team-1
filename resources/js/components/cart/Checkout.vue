<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header lead">Checkout</div>
                    <div class="card-body">
                        <div>
                            <div>
                                <h2>Menus to order:</h2>

                                <div v-for="item in cartItems" :key="item.productID">
                                    <p>{{ item.title }}</p>
                                    <p>-Price of {{ item.qty }}: RM{{ item.price * item.qty }}</p>
                                </div>
                                <br/>
                                <em>Total price: RM{{ cartTotal }}</em>
                            </div>
                            <br/>
                            <div>
                                <h2>Pay with:</h2>

                                <select @change="selectPaymentMethod($event)">
                                    <option v-for="paymentMethod in paymentMethods" :value="paymentMethod.PK_paymentCode">{{ paymentMethod.name }}</option>
                                </select>
                            </div>
                            <br/>

                            <div v-if="currentPaymentMethod === 1">
                                <div v-for="userPaymentMethod in userPaymentMethods">
                                    <em>Using card: {{ userPaymentMethod.cardNo }}</em>
                                    <br/>
                                    <router-link to="/PIN" tag="button">
                                        <button @click="lockInPaymentMethod">Next</button>
                                    </router-link>
                                </div>
                            
                                <div v-if="userPaymentMethods.length === 0">
                                    <p>No debit cards available.</p>
                                    <br/>
                                    <h3>Add New Debit Card</h3>
                                    <form>
                                        <label>
                                            Card Number:
                                            <input type="number" min="0" v-model="form.cardNo"/>
                                        </label>
                                        <br/>
                                        <label>
                                            Balance:
                                            <input type="number" step="0.01" min="0" v-model="form.balance"/>
                                        </label>
                                    </form>

                                    <button @click="addUserDebitCard">Add</button>
                                </div>
                            </div>

                            <div v-else-if="currentPaymentMethod === 2">
                                <div>
                                    <div v-if="pinopayWallet.length === 1">
                                        <em>Balance: RM{{ pinopayWallet[0].balance }}</em>
                                        <br/>
                                        <router-link to="/PIN" tag="button">
                                            <button @click="lockInPaymentMethod">Next</button>
                                        </router-link>                          
                                    </div>

                                    <router-link v-else to="/pinopay">
                                        <a>Please open up a virtual wallet first.</a>
                                    </router-link>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
   
<script>  
    export default {
        data() {
            return {
                userID: 47,
                currentPaymentMethod: 0,
                paymentMethods: [],
                userPaymentMethods: [],
                pinopayWallet: [],
                form: {
                    "userID": 0,
                    "paymentCode": 1,
                    "cardNo": "",
                    "balance": ""
                }
            }
        },
        computed: {
            cartTotal() {
                return this.$store.getters["cart/totalSum"].toFixed(2)
            },
            cartItems() {
                return this.$store.getters["cart/items"]
            }
        },
        created() {
            axios.get("./paymentmethod")
            .then(response => { this.paymentMethods = response.data
            this.currentPaymentMethod = this.paymentMethods[0].PK_paymentCode })
            axios.get("./userpaymentmethod/" + this.userID)
            .then(response => this.userPaymentMethods = response.data)
            axios.get("./pinopay/" + this.userID)
            .then(response => this.pinopayWallet = response.data)
        },
        methods: {
            selectPaymentMethod(event) {
                this.currentPaymentMethod = parseInt(event.target.value)
            },
            lockInPaymentMethod() {
                this.$store.commit("checkout/storePaymentMethod", {
                    data: this.currentPaymentMethod
                })
            },
            addUserDebitCard() {
                this.form.userID = this.userID
                axios.post("./userpaymentmethod", this.form)

                this.$router.push("/success")
            }
        }
    }
</script>

<style scoped>
    select {
        text-align: center;
    }

    a, em {
        font-size: large;
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
        margin-left: 12px;
    }

    button:hover,
    button:active {
        --button-dark-red-hover: #53001c;

        background-color: var(--button-dark-red-hover);
        border-color: var(--button-dark-red-hover);
    }
</style>