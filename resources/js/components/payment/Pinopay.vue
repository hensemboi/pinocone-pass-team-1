<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header lead">Pinopay</div>
                    <div class="card-body">
                        <div>
                            <h2>Topup</h2>
                            <div v-if="pinopayWallet.length === 0">
                                <p>No existing virtual wallet found. You may open up a Pinopay virtual wallet:</p>
                                <label>
                                    PIN:
                                    <input type="password" v-model="form.PIN"/>
                                </label>

                                <button @click="openPinopayWallet">Open</button>
                            </div>

                            <div v-else>
                                <h3>Balance: RM{{ pinopayWallet[0].balance.toFixed(2) }}</h3>
                                <br/>
                                <label>
                                    Topup amount:

                                    <input type="number" step="0.01" min="0" v-model="topup"/>
                                </label>

                                <button @click="topUp">Topup</button>
                            </div>
                        </div>
                        <br/><br/>
                        <div>
                            <h2>Transaction History</h2>
                            <table class="table">
                                <tr v-if="transactionHistory.length !== 0">
                                    <th>Transaction ID</th>
                                    <th>Total Price</th>
                                    <th>Date and Time</th>
                                </tr>

                                <tr v-else>
                                    <p>None available.</p>
                                </tr>

                                <tr v-for="transaction in transactionHistory" :key="transaction.PK_transactionID">
                                    <td>{{ transaction.PK_transactionID }}</td>
                                    <td>${{ transaction.totalPrice.toFixed(2) }}</td>
                                    <td>{{ transaction.dateTime }}</td>
                                </tr>
                            </table>
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
                secret: "8yR5t",
                userID: 0,
                pinopayWallet: [],
                transactionHistory: [],
                topup: 0,
                form: {
                    "userID": 0,
                    "balance": 0,
                    "PIN": ""
                }
            }
        },
        async created() {
            const rootURL = window.location.origin
            const userID = (await axios.get(rootURL + "/user")).data.PK_userID
            this.userID = userID
            this.pinopayWallet = (await axios.get("./pinopay/" + userID)).data
            this.transactionHistory = (await axios.get("./order/" + userID)).data
        },
        methods: {
            openPinopayWallet() {
                const CryptoJS = require("crypto-js");
                this.form.PIN = CryptoJS.AES.encrypt(this.form.PIN, this.secret).toString()
                this.form.userID = this.userID
                axios.post("./pinopay", this.form)

                this.$router.push("/success")
            },
            topUp() {
                this.form.balance = this.pinopayWallet[0].balance + this.topup
                axios.put("./pinopay/" + this.userID, this.form)

                this.$router.push("/success")
            }
        },
    }
</script>

<style scoped>
    h2, h3, p, label {
        text-align: center;
    }

    label {
        font-size: medium;
        margin-left: 23%;
    }

    button {
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
        background-color: var(--button-dark-red-hover);
        border-color: var(--button-dark-red-hover);
    }
</style>