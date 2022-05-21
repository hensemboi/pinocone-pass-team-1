<template>
    <div>
        <router-view></router-view>
        <section>
            <base-card>
                <header>
                    <h2 class="text-center">Order Summary</h2>
                </header>
                <h4>Transaction ID : {{ selectedUser.PK_transactionID }}</h4>
                <h4>User ID : {{ selectedUser.FK_userID }}</h4>
                <h4>Ordered Menu : {{ setOrderedMenu }}</h4>
                <h4>Delievery Type: {{ setDeliveryType }}</h4>
            </base-card>
        </section>
        <section>
            <base-card>
                <header>
                    <h2 class="text-center">Payment Details</h2>
                </header>
                <h4>Voucher ID : {{ isVoucherUsed }}</h4>
                <h4>Payment Type : {{ getPaymentMethodType }}</h4>
                <h4>Date Time : {{ selectedUser.created_at }}</h4>
                <h4>Total Price: RM {{ selectedUser.totalPrice }}</h4>
            </base-card>
        </section>
        <section>
            <base-card>
                <header>
                    <h2 class="text-center">Extra note</h2>
                </header>
                <p>
                    {{ selectedUser.extraNote }}
                </p>
                <base-button v-if="showButton" @click="goToDelievery"
                    >Approve Order</base-button
                >
                <base-button v-if="showButton" @click="redirect"
                    >Cancel Order</base-button
                >
            </base-card>
        </section>
    </div>
</template>

<script>
import { useRoute, useRouter } from "vue-router";
import { ref, computed } from "vue";
import { useStore } from "vuex";
export default {
    setup() {
        const route = useRoute();
        const router = useRouter();
        const selectedUser = ref(null);
        const store = useStore();

        function goToDelievery() {
            showButton.value = false;
            router.replace(route.path + "/deliverydetails");
        }

        const showButton = computed(() => {
            if (route.query.status && route.query.status === "Pending") {
                return true;
            }
            return false;
        });

        const isVoucherUsed = computed(() => {
            if (!selectedUser.value.FK_voucherID) {
                return "No voucher used";
            }
            return selectedUser.value.FK_voucherID;
        });

        const getPaymentMethodType = computed(() => {
            if (selectedUser.value.FK_paymentCode === 3) {
                return "Pinopay";
            }
            if (selectedUser.value.FK_paymentCode === 0) {
                return "Debit Card";
            }
            if (selectedUser.value.FK_paymentCode === 7) {
                return "Cash on Delivery";
            }
        });

        const setDeliveryType = computed(() => {
            const randomIndex = Math.floor(Math.random() * 2);
            const types = ["Express", "Standard"];
            return types[randomIndex];
        });

        const setOrderedMenu = computed(() => {
            const randomIndex = Math.floor(Math.random() * 2);
            const foods = [
                "Bacon Burger",
                "Cheese Pizza",
                "Little Bacon Burger",
                "Bacon Cheese Dog",
                "Little Hamburger",
                "Cheese Veggie Sandwich",
                "Grilled Cheese",
            ];
            return foods[randomIndex];
        });

        function redirect() {
            router.replace("/orderdashboard");
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
            isVoucherUsed,
            getPaymentMethodType,
            setDeliveryType,
            setOrderedMenu
        };
    },
    created() {
        this.getSpecifiedUser();
    },
};
</script>

<style scoped>
header {
    background-color: #fed531;
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
