<template>
    <div v-if="isLoggedIn">
        <section v-if="isOrdersPopulated">
            <users-requests-list :orders="getCacheOrders"></users-requests-list>
        </section>
        <section v-else>
            <section>
                <base-spinner></base-spinner>
            </section>
        </section>
    </div>
    <div v-else>
        <h2 class="text-center">Please login to view this page ...</h2>
        <h2 class="text-center">
            <router-link to="/login">Login</router-link>
        </h2>
    </div>
</template>

<script>
import { computed, ref } from "vue";
import { useStore } from "vuex";

import UsersRequestsList from "./UsersRequestsList.vue";

export default {
    components: {
        UsersRequestsList,
    },
    setup() {
        const store = useStore();
        const user = ref();

        const getCacheOrders = computed(() => {
            return store.getters["order/getOrders"];
        });

        const isOrdersPopulated = computed(() => {
            return store.getters["order/getIsOrdersPopulated"];
        });

        async function getOrders() {
            console.log("Fetching the orders now");
            if (!store.getters["order/getIsOrdersPopulated"]) {
                try {
                    await store.dispatch("order/fetchOrders");
                } catch (error) {
                    console.log(
                        error.errorMessage || "Failed to fetch prodcucts"
                    );
                }
            } else {
                console.log("The fetching is not executing!");
            }
        }

        const isLoggedIn = computed(() => {
            // if (user.value == null) {
            //     return false;
            // }
            return true;
        });

        async function getUser() {
            const rootURL = window.location.origin;
            user.value = (await axios.get(rootURL + "/user")).data;
        }

        return {
            getOrders,
            getUser,
            getCacheOrders,
            isOrdersPopulated,
            isLoggedIn,
        };
    },
    created() {
        this.getOrders();
        this.getUser();
    },
};
</script>
