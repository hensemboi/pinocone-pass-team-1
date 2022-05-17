<template>
    <div class="box">
        <h2 class="text-center">Exchangeable Vouchers:</h2>
        <div v-for="voucher in vouchers" :key="voucher.PK_voucherID">
            <div class="wrapper">
                <div class="card">
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
                    
                    <div v-if="voucher.availability > 0">
                        <span>Cost: <em>{{ voucher.membership }}</em> incentive points</span>
                    </div>
                    <div v-else>
                        <span>This voucher is unavailable. Check back later!</span>
                    </div>
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
                userID: 0,
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
            const rootURL = window.location.origin
            axios.get(rootURL + "/user")
            .then(response => {
                this.userID = response.data.PK_userID
                this.currentIncentives = response.data.incentives
            })
            axios.get("./voucher")
            .then(response => this.vouchers = response.data)
        },
        methods: {
            exchangeVoucher(voucher) {
                this.newIncentives = this.currentIncentives - voucher.membership

                if (this.newIncentives >= 0)
                {
                    this.incentivesForm.incentives = this.newIncentives
                    axios.put("./user/" + this.userID, this.incentivesForm)
                    this.currentIncentives = this.newIncentives

                    this.availabilityForm.availability = voucher.availability - 1;
                    axios.put("./voucher/" + this.userID, this.availabilityForm)

                    this.userVoucherForm.PK_FK_userID = this.userID
                    this.userVoucherForm.PK_FK_voucherID = voucher.PK_voucherID
                    axios.post("./uservoucher", this.userVoucherForm)

                    alert("Success! Voucher received. Check your user page.")
                }

                else
                {
                    alert("Not enough incentive points. Purchase more items from our marketplace to gain incentive points.")
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

    strong {
        font-family: Arial, sans-serif;
    }

    span, p {
        font-size: 20px;
    }

    button {       
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

    .card {
        background-color: var(--voucher-pink);
        color: var(--pinocone-yellow);
        grid-area: 1 / 1;
        height: 200px;
        width: 800px;
        transform: translateX(10px) rotateY(25deg) rotateX(10deg);
        display: flex;
        justify-content: flex-start;
        align-items: center;
        font-size: 50px;
        font-weight: 800;
        backface-visibility: hidden;
        box-shadow: 0 10px 30px -3px var(--quick-gray);
        line-height: 1;
        padding: 0 5px;
        transform: translate(-1px, 1px) scale(0.75);
        transform-origin: right center;
        display: inline-block;
    }

    .wrapper {
        display: grid;
        perspective: 60em;
        position: relative;
        transform-style: preserve-3d;
    }

    .wrapper:before {
        --bw: 3px;
        height: 100%;
        width: 100%;
        grid-area: 1 / 1;
        content: '';
        pointer-events: none;
        backface-visibility: hidden;
        margin-top: calc(-1 * var(--bw));
        margin-left: calc(-1 * var(--bw));
        transform: translateX(-60px) rotateY(-30deg) rotateX(15deg) scale(1.03);
        background: transparent;
        box-sizing: content-box;
    }

    .wrapper > div,
    .wrapper:before {
        will-change: transform;
        transition: .2s transform cubic-bezier(.25,.46,.45,1);
    }

    .wrapper:hover > div,
    .wrapper:hover:before {
        transform: none;
    }
</style>
