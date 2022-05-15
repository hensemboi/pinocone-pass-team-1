<template>
    <section v-if="isOrdersPopulated">
        <users-requests-list
            :orders="getCacheOrders"
        ></users-requests-list>
    </section>
    <section v-else>
        <section>
            <base-spinner></base-spinner>
        </section>
    </section>
</template>

<script>
import { computed } from "vue";
import { useStore } from "vuex";

import UsersRequestsList from "./UsersRequestsList.vue";

export default {
    components: {
        UsersRequestsList,
    },
    setup() {
        const store = useStore();

        const getCacheOrders = computed(() => {
            return store.getters["order/getOrders"];
        });

        const isOrdersPopulated = computed(() => {
            return store.getters["order/getIsOrdersPopulated"];
        });

        async function getOrders() {
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

        async function refreshOrders() {
            try {
                await store.dispatch("order/fetchOrders");
            } catch (error) {
                console.log(error.errorMessage || "Failed to fetch prodcucts");
            }
        }

        return {
            getOrders,
            refreshOrders,
            getCacheOrders,
            isOrdersPopulated,
        };
    },
    created() {
        this.getOrders();
    },
};
</script>
