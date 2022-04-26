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
                paymentMethod: 1,
                userPaymentMethods: [],
                pinopayWallet: [],
                formOne: {
                    "userID": 47,
                    "paymentCode": 1,
                    "cardNo": "",
                    "balance": ""
                },
                formTwo: {
                    "userID": 47,
                    "balance": "",
                    "PIN": ""
                }
            }
        },
        computed: {
            price() {
                return this.$store.getters["cart/totalSum"].toFixed(2);
            },
            newCardBalance() {
                return this.userPaymentMethods[0].balance - this.price
            },
            newWalletBalance() {
                return this.pinopayWallets[0].balance - this.price
            }
        },
        created() {
            axios.get("./userpaymentmethod/" + this.userID)
            .then(response => this.userPaymentMethods = response.data)
            axios.get("./pinopay/" + this.userID)
            .then(response => this.pinopayWallet = response.data)
        },
        methods: {
            updateCard() {
                this.formOne.balance = this.newCardBalance
                this.formOne.cardNo = this.userPaymentMethods[0].cardNo

                axios.put('./userpaymentmethod/' + this.formOne.userID, this.formOne)

                this.$router.push("/success")
            },
            updateWallet() {
                this.formTwo.balance = this.newWalletBalance
                this.formTwo.PIN = this.pinopayWallet[0].PIN

                axios.put('./pinopay/' + this.formTwo.userID, this.formTwo)

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
        background: #fff;
    }

    .wave {
        width: 5px;
        height: 100px;
        background: linear-gradient(45deg, #fed531, #fff);
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
        background-color: #fff;
        text-align: center;
        height: 50px;
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