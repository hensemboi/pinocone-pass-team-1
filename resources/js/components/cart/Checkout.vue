<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header lead">Checkout</div>
                    <div class="card-body">
                        <div>
                            <div>
                                <h2>Payment Summary</h2>
                                Item total: RM{{ grossPrice }}<br/>
                                Reduced by: RM{{ vouchedPrice }}<br/>
                                <em>Price to pay: RM{{ netPrice }}</em>
                            </div>
                            <br/>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" :disabled="membership.length === 0" :checked="membership.length === 1" value="1"/>
                                    <p>Use Express Delivery - Only for our <span>Members</span></p>
                                </label>
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
                                        <em>Balance: RM{{ pinopayWallet[0].balance.toFixed(2) }}</em>
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
                userID: 0,
                currentPaymentMethod: 0,
                paymentMethods: [],
                userPaymentMethods: [],
                pinopayWallet: [],
                membership: [],
                form: {
                    "userID": 0,
                    "paymentCode": 1,
                    "cardNo": 0,
                    "balance": 0.00
                }
            }
        },
        computed: {
            grossPrice() {
                return this.$store.getters["cart/totalSum"].toFixed(2)
            },
            vouchedPrice() {
                return this.$store.getters["cart/vouched"].toFixed(2)
            },
            netPrice() {
                return (this.$store.getters["cart/totalSum"] - this.$store.getters["cart/vouched"]).toFixed(2)
            }
        },
        async created() {
            const userID = (await axios.get("./user")).data.PK_userID
            this.userID = userID
            this.membership = (await axios.get("./user/" + userID)).data

            this.paymentMethods = (await axios.get("./paymentmethod")).data
            this.currentPaymentMethod = this.paymentMethods[0].PK_paymentCode

            this.userPaymentMethods = (await axios.get("./userpaymentmethod/" + userID)).data
            this.pinopayWallet = (await axios.get("./pinopay/" + userID)).data
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

    a, em, span {
        font-size: large;
    }
    
    span {
        font-style: oblique;
        font-family: "Playfair Display";
    }

    button {   
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
        background-color: var(--button-dark-red-hover);
        border-color: var(--button-dark-red-hover);
    }
</style>