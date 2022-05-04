<template>
    <div class="box">
        <h2>Exchangeable Vouchers:</h2>
        <div v-for="voucher in vouchers" :key="voucher.PK_voucherID">
            <strong>{{ voucher.name }}</strong>
            <div v-if="voucher.name === 'Fun 40'">
                <p>Description: Reduce price by RM40</p>
            </div>
            <div v-else-if="voucher.name === 'Happy 20'">
                <p>Description: Reduce price by 20%</p>
            </div>

            <div v-if="voucher.availability > 0">
                <p>Cost: <em>{{ voucher.membership }}</em> incentive points</p>
                <button @click="exchangeVoucher(voucher)">Exchange</button>
            </div>
            <div v-else>
                <p>This voucher is unavailable. Check back later!</p>
            </div>
            <br/>
        </div>
    </div>
</template>
   
<script>
    export default {
        data() {
            return {
                userID: 47,
                currentIncentives: 0,
                newIncentives: 0,
                vouchers: [],
                incentivesForm: {
                    "incentives": 0
                },
                availabilityForm: {
                    "availability": 0
                },
                userVoucherForm: {
                    "PK_FK_userID": 0,
                    "PK_FK_voucherID": 0
                }
            }
        },
        created() {
            axios.get("./user/" + this.userID)
            .then(response => this.currentIncentives = response.data[0].incentives)
            axios.get("./voucher")
            .then(response => this.vouchers = response.data)
        },
        methods: {
            exchangeVoucher(voucher) {
                this.newIncentives = this.currentIncentives - voucher.membership

                if (this.newIncentives >= 0)
                {
                    this.incentivesForm.incentives = this.newIncentives;
                    axios.put("./user/" + this.userID, this.incentivesForm)

                    this.availabilityForm.availability = voucher.availability - 1;
                    axios.put("./voucher/" + this.userID, this.availabilityForm)

                    this.userVoucherForm.PK_FK_userID = this.userID
                    this.userVoucherForm.PK_FK_voucherID = voucher.PK_voucherID
                    axios.post("./uservoucher", this.userVoucherForm)

                    alert("Success! Voucher received. Check your user page.")
                }

                else
                {
                    alert("Not enough incentive points.")
                }
            }
        }
    }
</script>

<style scoped>
    .box {
        --pinocone-yellow: #fed531;

        background-color: white;
        padding: 4px;
        margin: 0% 30% 10% 30%;
        border-width: 2px;
        border-radius: 8px;
        border-style: solid;
        border-color: var(--pinocone-yellow);
    }

    h2 {
        text-align: center;
        font-family: "Raleway", sans-serif;
    }

    strong {
        font-size: x-large;
        font-family: Arial, sans-serif;
    }

    p {
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
