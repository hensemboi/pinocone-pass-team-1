<template>
    <div>
        <div v-for="voucher in vouchers" :key="voucher.PK_voucherID">
            <strong>{{ voucher.name }}</strong>
            <div v-if="voucher.name === 'Fun 40'">
                Description: Reduce price by RM40
            </div>
            <div v-else-if="voucher.name === 'Happy 20'">
                Description: Reduce price by 20%
            </div>

            <div v-if="voucher.availability > 0">
                Exchange for <em>{{ voucher.membership }}</em> incentive points
                <button @click="exchangeVoucher(voucher)">Exchange</button>
            </div>
            <div v-else>
                Voucher unavailable. Check back later!
            </div>
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

                    alert("Success!")
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
    
</style>
