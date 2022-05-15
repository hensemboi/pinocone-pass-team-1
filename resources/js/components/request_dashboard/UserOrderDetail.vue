<template>
    <div>
        <router-view></router-view>
        <section>
            <base-card>
                <header>
                    <h2>Order Summary</h2>
                </header>
                <h4>Transaction ID : {{ selectedUser.PK_transactionID }}</h4>
                <h4>User ID : {{ selectedUser.FK_userID }}</h4>
                <h4>Ordered Menu : Burgah</h4>
            </base-card>
        </section>
        <section>
            <base-card>
                <header>
                    <h2>Payment Details</h2>
                </header>
                <h4>
                    Voucher ID :
                    {{
                        selectedUser.FK_voucherID
                            ? "No voucher selected"
                            : selectedUser.FK_voucherID
                    }}
                </h4>
                <h4>Payment Type : {{ selectedUser.FK_paymentCode }}</h4>
                <h4>Date Time : {{ selectedUser.created_at }}</h4>
                <h4>Total Price: {{ selectedUser.totalPrice }}</h4>
            </base-card>
        </section>
        <section>
            <base-card>
                <header>
                    <h2>Extra note</h2>
                </header>
                <p>
                    {{ selectedUser.extraNote }}
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
