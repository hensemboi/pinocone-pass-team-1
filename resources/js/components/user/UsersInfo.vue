<template>
    <div
        class="container rounded bg-white mt-5 mb-5"
        id="userInfo"
        v-if="isLoggedIn"
    >
        <div class="row">
            <div class="col-md-3 border-right">
                <div
                    class="d-flex flex-column align-items-center text-center p-3 py-5"
                >
                    <img
                        class="rounded-circle mt-5 border"
                        width="150px"
                        src="https://picsum.photos/200/300"
                    /><span class="font-weight-bold">Username</span
                    ><span class="text-black-50">exampleEmail@gmail.com</span
                    ><span> </span>
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
                                :placeholder="getUserFirstName"
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
                                :placeholder="getUserLastName"
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
                                placeholder="enter address line 2"
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
                                placeholder="enter address line 2"
                                value=""
                                :disabled="setDisabled"
                            />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email ID</label
                            ><input
                                type="text"
                                class="form-control"
                                :placeholder="getUserEmail"
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
                        <span>Past Orders</span>
                    </div>
                    <br />
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
        ...mapGetters({
            getUserName: "user/getUserName",
            getUserEmail: "user/getUserEmail",
            getUserPhoneNumber: "user/getUserPhoneNumber",
            getUserAddress: "user/getUserAddress",
            getUserPostcode: "user/getUserPostcode",
            getUserState: "user/getUserState",
            getUserFirstName: "user/getUserFirstName",
            getUserLastName: "user/getUserLastName",
            getUserCountry: "user/getUserCountry",
        }),
        setDisabled() {
            return !this.changeCredentials;
        },
    },
    data() {
        return {
            isLoggedIn: true,
            changeCredentials: false,
            inputIsInvalid: false,
        };
    },
    methods: {
        changeAccountCredentials() {
            this.changeCredentials = !this.changeCredentials;
        },
        confirmAction () {
            this.inputIsInvalid =false;
        }
    },
};
</script>

<style scoped>
#userInfo {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
}
</style>
