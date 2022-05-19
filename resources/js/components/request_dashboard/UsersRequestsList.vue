<template>
    <base-card>
        <h2>All Orders</h2>
        <base-search
            @search="updateSearch"
            :search-term="enteredSearchTerm"
        ></base-search>
        <div>
            <button
                @click="sort('asc')"
                :class="{ selected: sorting === 'asc' }"
            >
                Sort Ascending
            </button>
            <button
                @click="sort('desc')"
                :class="{ selected: sorting === 'desc' }"
            >
                Sort Descending
            </button>
        </div>
        <ul>
            <user-requests-item
                v-for="order in displayedItems"
                :key="order.PK_transactionID"
                :user-name="order.PK_transactionID"
                :id="order.PK_transactionID"
                :date="order.created_at"
                :price="order.total_Price"
            ></user-requests-item>
        </ul>
    </base-card>
</template>

<script>
import UserRequestsItem from "./UserRequestsItem.vue";
import useSort from "../hooks/sort.js";
import useSearch from "../hooks/search.js";
import { toRefs } from "vue";

export default {
    components: {
        UserRequestsItem,
    },
    props: ["orders"],
    setup(props) {
        const { orders } = toRefs(props);
        
        const { enteredSearchTerm, availableItems, updateSearch } = useSearch(
            orders,
            "FK_userID"
        );
        const { displayedItems, sort, sorting } = useSort(
            availableItems,
            "FK_userID"
        );

        return {
            enteredSearchTerm,
            updateSearch,
            displayedItems,
            sorting,
            sort,
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

button {
    font: inherit;
    border: 1px solid #d7b52a;
    background-color: transparent;
    color: #00006b;
    padding: 0.5rem 1.5rem;
    cursor: pointer;
    margin: 0.5rem 0.5rem 0.5rem 0;
}
button:hover,
button:active {
    background-color: #efefff;
}

button.selected {
    background-color: #fed531;
    color: white;
}
</style>
