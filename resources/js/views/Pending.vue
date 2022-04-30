<template>
    <div>
        <div class="center">
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>

        <div class="proceed">
            <button v-if="paymentMethod === 1 && newCardBalance >= 0" @click="updateCard">Proceed</button>
            <button v-else-if="paymentMethod === 2 && newWalletBalance >= 0" @click="updateWallet">Proceed</button>
            <button v-else @click="transactionFailed">Proceed</button>
        </div>
    </div> 
</template>
   
<script>
    export default {
        data() {
            return {
                userID: 47,
                userPaymentMethods: [],
                pinopayWallet: [],
                currentIncentives: 0,
                incentivesForm: {
                    "incentives": 0
                },
                balanceForm: {
                    "balance": 0
                }
            }
        },
        computed: {
            price() {
                return this.$store.getters["cart/totalSum"].toFixed(2)
            },
            paymentMethod() {
                return this.$store.getters["checkout/getPaymentMethod"]
            },
            newCardBalance() {
                return this.userPaymentMethods[0].balance - this.price
            },
            newWalletBalance() {
                return this.pinopayWallet[0].balance - this.price
            },
            newIncentives() {
                return this.currentIncentives + Math.pow(this.price, 1.5) / 2177
            }
        },
        created() {
            axios.get("./user/" + this.userID)
            .then(response => this.currentIncentives = response.data[0].incentives)
            axios.get("./userpaymentmethod/" + this.userID)
            .then(response => this.userPaymentMethods = response.data)
            axios.get("./pinopay/" + this.userID)
            .then(response => this.pinopayWallet = response.data)
        },
        methods: {
            updateCard() {
                this.balanceForm.balance = this.newCardBalance
                axios.put('./userpaymentmethod/' + this.userID, this.balanceForm)

                this.incentivesForm.incentives = this.newIncentives;
                axios.put('./user/' + this.userID, this.incentivesForm)

                this.$router.push("/success")
            },
            updateWallet() {
                this.balanceForm.balance = this.newWalletBalance
                axios.put('./pinopay/' + this.userID, this.balanceForm)
                this.incentivesForm.incentives = this.newIncentives;
                axios.put('./user/' + this.userID, this.incentivesForm)

                this.$router.push("/success")
            },
            transactionFailed() {
                this.$router.push("/error")
            }
        }
    }
</script>

<style scoped>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .center {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: white;
    }

    .wave {
        --pinocone-yellow: #fed531;

        width: 5px;
        height: 100px;
        background: linear-gradient(45deg, var(--pinocone-yellow), white);
        margin: 10px;
        animation: wave 1s linear infinite;
        border-radius: 20px;
    }

    .wave:nth-child(2) {
        animation-delay: 0.1s;
    }

    .wave:nth-child(3) {
        animation-delay: 0.2s;
    }

    .wave:nth-child(4) {
        animation-delay: 0.3s;
    }

    .wave:nth-child(5) {
        animation-delay: 0.4s;
    }

    .wave:nth-child(6) {
        animation-delay: 0.5s;
    }

    .wave:nth-child(7) {
        animation-delay: 0.6s;
    }
    
    .wave:nth-child(8) {
        animation-delay: 0.7s;
    }

    .wave:nth-child(9) {
        animation-delay: 0.8s;
    }

    .wave:nth-child(10) {
        animation-delay: 0.9s;
    }

    @keyframes wave {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1);
        }
        100% {
            transform: scale(0);
        }
    }

    .proceed {
        background-color: white;
        text-align: center;
        height: 50px;
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