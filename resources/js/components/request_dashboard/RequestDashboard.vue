<template>
    <section v-if="isOrdersPopulated">
        <users-requests-list
            :orders="getCacheOrders"
            @list-projects="selectOrders"
        ></users-requests-list>
        <request-list :orders="selectOrders"></request-list>
    </section>
    <section v-else>
        <section>
            <base-spinner></base-spinner>
        </section>
    </section>
</template>

<script>
import { computed, ref } from "vue";
import { useStore } from "vuex";

import UsersRequestsList from "./UsersRequestsList.vue";
import RequestList from "./RequestsList.vue";

export default {
    components: {
        UsersRequestsList,
        RequestList,
    },
    setup() {
        const selectedUser = ref(null);
        const activeOrders = ref(null);
        const store = useStore();

        function selectOrders(PK_transactionID) {
            selectedUser.value = activeOrders.value.find(
                (usr) => usr.PK_transactionID === PK_transactionID
            );
        }

        const getCacheOrders = computed(() => {
            return store.getters["order/getOrders"];
        });

        const isOrdersPopulated = computed(() => {
            if (store.getters["order/getIsOrdersPopulated"]) {
                activeOrders.value = store.getters["order/getOrders"];
            }
            return store.getters["order/getIsOrdersPopulated"];
        });

        async function getOrders() {
            console.log("I am doing fetching in the component!");
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

        return {
            selectedUser,
            selectOrders,
            getOrders,
            getCacheOrders,
            isOrdersPopulated,
        };
    },
    created() {
        this.getOrders();
    },
};
</script>
