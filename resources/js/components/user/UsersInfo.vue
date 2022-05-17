<template>
    <div
        class="container rounded bg-white mt-5 mb-5"
        id="userInfo"
        v-if="isLoggedIn !== 0"
    >
        <div class="row">
            <div class="col-md-3 border-right">
                <div
                    class="d-flex flex-column align-items-center text-center p-3 py-5"
                >
                    <img
                        class="rounded-circle mt-5 border"
                        src="https://picsum.photos/200/300"
                    /><span class="font-weight-bold">{{ user.username }}</span
                    ><span class="text-black-50">{{ user.email }}</span
                    >
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div
                        class="d-flex justify-content-between align-items-center mb-3"
                    >
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label
                            ><input
                                type="text"
                                class="form-control"
                                :placeholder="user.firstName"
                                value=""
                                :disabled="setDisabled"
                            />
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Surname</label
                            ><input
                                type="text"
                                class="form-control"
                                value=""
                                :placeholder="user.lastName"
                                :disabled="setDisabled"
                            />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Mobile Number</label
                            ><input
                                type="text"
                                class="form-control"
                                :placeholder="getUserPhoneNumber"
                                value=""
                                :disabled="setDisabled"
                            />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address Line 1</label
                            ><input
                                type="text"
                                class="form-control"
                                :placeholder="getUserAddress"
                                value=""
                                :disabled="setDisabled"
                            />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address Line 2</label
                            ><input
                                type="text"
                                class="form-control"
                                placeholder="Enter address line 2"
                                value=""
                                :disabled="setDisabled"
                            />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Postcode</label
                            ><input
                                type="text"
                                class="form-control"
                                :placeholder="getUserPostcode"
                                value=""
                                :disabled="setDisabled"
                            />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">State</label
                            ><input
                                type="text"
                                class="form-control"
                                :placeholder="getUserState"
                                value=""
                                :disabled="setDisabled"
                            />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Area</label
                            ><input
                                type="text"
                                class="form-control"
                                placeholder="Enter address line 2"
                                value=""
                                :disabled="setDisabled"
                            />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email ID</label
                            ><input
                                type="text"
                                class="form-control"
                                :placeholder="user.email"
                                value=""
                                :disabled="setDisabled"
                            />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Country</label
                            ><input
                                type="text"
                                class="form-control"
                                :placeholder="getUserCountry"
                                value=""
                                :disabled="setDisabled"
                            />
                        </div>
                        <div class="col-md-6">
                            <label class="labels">State/Region</label
                            ><input
                                type="text"
                                class="form-control"
                                value=""
                                :placeholder="getUserState"
                                :disabled="setDisabled"
                            />
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button
                            class="btn btn-primary profile-button"
                            type="button"
                            @click="changeAccountCredentials"
                            v-if="!changeCredentials"
                        >
                            Edit Profile
                        </button>
                        <button
                            class="btn btn-primary profile-button"
                            type="button"
                            @click="changeAccountCredentials"
                            v-else
                        >
                            Save Profile
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div
                        class="d-flex justify-content-between align-items-center experience"
                    >
                        <span>Vouchers Owned</span>
                    </div>
                    <br />
                    <table class="table">
                        <tr v-if="userVouchers.length === 0">
                            <p>You do not have any vouchers.</p>
                        </tr>
                        <tr v-else>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Use Before</th>
                        </tr>  
                        <tr v-for="userVoucher in userVouchers" :key="userVoucher.PK_FK_voucherID">
                            <td>{{ userVoucher.PK_FK_voucherID }}</td>
                            <td>{{ userVoucher.name }}</td>
                            <td>{{ userVoucher.expiryDate }}</td>
                        </tr>
                    </table>
                    <div>
                        <p>Your incentive points: {{ incentivePoints }} points</p>
                        <button
                            v-if="membership.active === 1" 
                            :disabled="!(membership.next_reward_time === null || dateNow >= rewardTime)"
                            class="btn btn-primary"
                            @click="claimIncentive"
                        >
                            Claim free point
                        </button>
                    </div>
                    <br/>
                    <router-link to="/pinopay">Click here to go to your Pinopay Wallet...</router-link>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <h2 class="text-center">Please login to view this page ...</h2>
        <h2 class="text-center">
            <router-link to="/login">Login</router-link>
        </h2>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    computed: {
        isLoggedIn() {
            return this.user.PK_userID;
        },
        ...mapGetters({
            // getUserName: "user/getUserName",
            // getUserFirstName: "user/getUserFirstName",
            // getUserLastName: "user/getUserLastName",
            // getUserEmail: "user/getUserEmail",
            getUserPhoneNumber: "user/getUserPhoneNumber",
            getUserAddress: "user/getUserAddress",
            getUserPostcode: "user/getUserPostcode",
            getUserState: "user/getUserState",
            getUserCountry: "user/getUserCountry",
        }),
        setDisabled() {
            return !this.changeCredentials;
        },
        dateNow() {
            return Date.now();
        },
        rewardTime() {
            return Date.parse(this.membership.next_reward_time);
        }
    },
    async created() {
        const rootURL = window.location.origin;
        const user = (await axios.get(rootURL + "/user")).data;
        this.user = user;
        this.incentivePoints = user.incentives;
        this.userVouchers = (await axios.get("./uservoucher/" + user.PK_userID)).data;
        this.membership = (await axios.get(rootURL + "/user/" + user.PK_userID)).data[0];
    },
    data() {
        return {
            changeCredentials: false,
            inputIsInvalid: false,
            userVouchers: [],
            membership: [],
            incentivePoints: 0,
            user: {},
        };
    },
    methods: {
        changeAccountCredentials() {
            this.changeCredentials = !this.changeCredentials;
        },
        confirmAction() {
            this.inputIsInvalid = false;
        },
        async claimIncentive() {
            const rootURL = window.location.origin;
            this.incentivePoints++;
            axios.put("./user/" + this.user.PK_userID, { incentives: this.incentivePoints });

            const object = new Date(Date.now() + 82800000); // 82800000 is 23 hours in milliseconds
            const year = object.getFullYear();
            const month = object.getMonth() + 1;
            const day = object.getDate();
            const hours = object.getHours();
            const minutes = object.getMinutes();
            const seconds = object.getSeconds();
            const next = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
            axios.put("./membership/" + this.user.PK_userID, { time: next });

            this.membership = (await axios.get(rootURL + "/user/" + this.user.PK_userID)).data[0];
            alert("Daily incentive point claimed!");
        },
    },
};
</script>

<style scoped>
#userInfo {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
}
</style>
