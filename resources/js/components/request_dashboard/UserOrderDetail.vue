<template>
    <div>
        <router-view></router-view>
        <section>
            <base-card>
                <header>
                    <h2>Order Summary</h2>
                </header>
                <h4>Transaction ID : 1001</h4>
                <h4>User ID : 1001</h4>
                <h4>Ordered Menu : Burgah</h4>
            </base-card>
        </section>
        <section>
            <base-card>
                <header>
                    <h2>Payment Details</h2>
                </header>
                <h4>Voucher ID : 1001</h4>
                <h4>Payment Type : 1001</h4>
                <h4>Date Time : 20/3/2001</h4>
            </base-card>
        </section>
        <section>
            <base-card>
                <header>
                    <h2>Extra note</h2>
                </header>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
                <base-button v-if="showButton" @click="goToDelievery"
                    >Approve Order</base-button
                >
                <base-button v-if="showButton" @click="redirect"
                    >Reject Order</base-button
                >
            </base-card>
        </section>
    </div>
</template>

<script>
import { useRoute, useRouter } from "vue-router";
import { ref } from "vue";
import { useStore } from "vuex";
export default {
    setup() {
        const route = useRoute();
        const router = useRouter();
        const showButton = ref(true);
        const selectedUser = ref(null);
        const store = useStore();

        function goToDelievery() {
            showButton.value = false;
            router.replace(route.path + "/deliverydetails");
        }

        function redirect() {
            router.replace("/requestdashboard");
        }

        function getSpecifiedUser() {
            selectedUser.value = store.getters["order/getUserByID"](
                route.params.id
            );
            console.log(selectedUser.value);
        }

        return {
            goToDelievery,
            redirect,
            getSpecifiedUser,
            showButton,
            selectedUser,
        };
    },
    created() {
        this.getSpecifiedUser();
    },
};
</script>

<style scoped>
header {
    background-color: #3a0061;
    color: white;
    width: 100%;
    padding: 1rem;
}
header h2 {
    margin: 0;
}
section {
    padding: 1rem;
}

p {
    padding: 1rem;
}
</style>
