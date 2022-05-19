<template>
    <li>
        <h4>Transaction ID: {{ userName }}</h4>
        <h5>Created Date: {{ date }}</h5>
        <h5>Order Status: {{ orderStatus }}</h5>
        <base-button @click="userIDLink">View order details</base-button>
    </li>
</template>

<script>
import { toRefs } from "@vue/reactivity";
import { useRouter } from "vue-router";

export default {
    props: ["id", "userName", "date", "price"],
    setup(props) {
        const { userName, id } = toRefs(props);
        const orderStatus = setOrderStatus();
        const router = useRouter();

        function userIDLink() {
            router.push({
                path: "/userorderdetails/" + id.value,
                query: { status: orderStatus },
            });
        }

        function setOrderStatus() {
            const randomIndex = Math.floor(Math.random() * 2);
            const statuses = ["Pending", "Completed"];
            return statuses[randomIndex];
        }

        return {
            userName,
            userIDLink,
            orderStatus,
        };
    },
};
</script>

<style scoped>
li {
    margin: 0.5rem 0;
    padding: 1rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.26);
    border: 1px solid #ccc;
}

li h3 {
    margin: 0;
}
</style>
