<template>
    <base-container v-if="orders">
        <h2>{{ orders.PK_userID }}: Orders</h2>
        <base-search
            v-if="hasProjects"
            @search="updateSearch"
            :search-term="enteredSearchTerm"
        ></base-search>
        <ul v-if="hasProjects">
            <request-item
                v-for="prj in availableProjects"
                :key="prj.id"
                :title="prj.title"
            ></request-item>
        </ul>
        <h3 v-else>No orders found.</h3>
    </base-container>
    <base-container v-else>
        <h3>No user selected.</h3>
    </base-container>
</template>

<script>
import RequestItem from "./RequestItem.vue";
import useSearch from "../hooks/search.js";
import { computed, toRefs, watch } from "vue";

export default {
    components: {
        RequestItem,
    },
    props: ["orders"],
    setup(props) {
        const { orders } = toRefs(props);
        const projects = computed(function () {
            return orders.value ? orders.value.projects : [];
        });

        const { enteredSearchTerm, availableItems, updateSearch } = useSearch(
            orders,
            "title"
        );

        const hasProjects = computed(function () {
            return orders.value.projects && availableItems.value.length > 0;
        });

        watch(orders, function () {
            updateSearch("");
        });

        return {
            enteredSearchTerm,
            availableProjects: availableItems,
            hasProjects,
            updateSearch,
        };
    },
};
</script>

<style scoped>
ul {
    list-style: none;
    margin: 0;
    padding: 0;
}
</style>
