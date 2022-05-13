<template>
    <base-container>
        <h2>Active Orders</h2>
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
                :user-name="order.FK_userID"
                :id="order.PK_transactionID"
                @list-projects="$emit('list-projects', $event)"
            ></user-requests-item>
        </ul>
    </base-container>
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
    emits: ["list-projects"],
    setup(props) {
        console.log(props);
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
    border: 1px solid #00006b;
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
    background-color: #00006b;
    color: white;
}
</style>
