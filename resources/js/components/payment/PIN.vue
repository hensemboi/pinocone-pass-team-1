<template>
    <section>
        <div v-if="pinopayWallet.length === 1">
            <h3>Enter Pinocone PIN:</h3>
            <input type="password" v-model="PIN"/>
                                        
            <button @click="enterPIN">Next</button>
        </div>

        <div v-else>
            <p>Please open up a virtual wallet first.</p>
        </div>
    </section>
</template>
   
<script>
    export default {
        data() {
            return {
                secret: "8yR5t",
                PIN: "",
                pinopayWallet: []
            }
        },
        async created() {
            const rootURL = window.location.origin
            const userID = (await axios.get(rootURL + "/user")).data.PK_userID
            this.pinopayWallet = (await axios.get("./pinopay/" + userID)).data
        },
        methods: {
            enterPIN() {
                const CryptoJS = require("crypto-js")
                this.pinopayWallet[0].PIN = CryptoJS.AES.decrypt(this.pinopayWallet[0].PIN, this.secret).toString(CryptoJS.enc.Utf8)
                
                if (this.pinopayWallet[0].PIN == this.PIN) {
                    this.$router.push("/pending")
                }

                else {
                    this.$router.push("/error")
                }
            }
        }
    }
</script>

<style scoped>
    section {
        margin: 2rem auto;
        max-width: 40rem;
    }

    h3 {
        text-align: center;
    }

    input, p {
        margin-left: 200px;
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