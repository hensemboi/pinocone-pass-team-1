<template>
    <div class="box">
        <h2 class="text-center">Exchangeable Vouchers:</h2>
        <div v-for="voucher in vouchers" :key="voucher.PK_voucherID">
            <div class="voucher spin">
                <div class="row">
                    <div class="col-sm-7">
                        <strong>{{ voucher.name }}</strong>
                        <div v-if="voucher.name === 'Fun 40'">
                            <p>Description: Reduce price by RM40 <br/>(Minimum spending of RM50)</p>
                        </div>
                        <div v-else-if="voucher.name === 'Happy 20'">
                            <p>Description: Reduce price by 20% <br/>(Minimum spending of RM200)</p>
                        </div>
                    </div>

                    <div class="col-sm-5" :disabled="!voucher.availability">
                        <button @click="exchangeVoucher(voucher)">Exchange</button>
                    </div>
                </div>
                
                <div class="spin" v-if="voucher.availability > 0">
                    <span>Cost: <em>{{ voucher.membership }}</em> incentive points</span>
                </div>
                <div v-else>
                    <span>This voucher is unavailable. Check back later!</span>
                </div>
            </div>
            <br/>
        </div>
        <div class="text-center">Your incentive points: {{ currentIncentives }} points</div>
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
        margin: 0% 30% 10% 30%;
    }

    h2 {
        font-family: "Raleway", sans-serif;
    }

    .text-center {
        text-align: center;
    }

    .voucher {
        background-color: var(--voucher-pink);
        padding: 4px;
    }

    .spin {
        border-radius: 25px;
    }

    strong {
        font-size: x-large;
        font-family: Arial, sans-serif;
    }

    span, p {
        font-size: large;
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
        margin-top: 12px;
    }

    button:hover,
    button:active {
        background-color: var(--button-dark-red-hover);
        border-color: var(--button-dark-red-hover);
    }
</style>
