<template>
    <main>
        <user-list :users="usersOrders" @list-projects="selectUser"></user-list>
        <projects-list :user="selectedUser"></projects-list>
    </main>
</template>

<script>
import { ref, toRefs } from "vue";
import { useStore } from "vuex";

import UserList from "./components/users/UserList.vue";
import ProjectsList from "./components/projects/ProjectsList.vue";

export default {
    components: {
        UserList,
        ProjectsList,
    },
    setup() {
        const selectedUser = ref(null);
        const usersOrders = null;

        const store = useStore();

        function selectUser(uid) {
            selectedUser.value = activeUsers.find((usr) => usr.id === uid);
        }

        async function getOrders() {
            console.log("I am doing fetching in the component!");
            if (!store.getters["orders/getIsOrdersPopulated"]) {
                try {
                    await store.dispatch("orders/fetchOrders");
                } catch (error) {
                    console.log(
                        error.errorMessage || "Failed to fetch prodcucts"
                    );
                }
            } else {
                console.log("The fetching is not executing!");
            }
            usersOrders = store.getters["orders/getOrders"];
            toRefs(usersOrders);
        }

        return { selectedUser, activeUsers, selectUser, getOrders };
    },
    created () {
        this.getOrders();
    }
};
</script>

<style>
* {
    box-sizing: border-box;
}
html {
    font-family: sans-serif;
}
body {
    margin: 0;
}

main {
    display: flex;
    justify-content: space-around;
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
