<template>
    <li>
        <h3>{{ userName }}</h3>
        <base-button link :to=userIDLink
            >View order details</base-button
        >
    </li>
</template>

<script>
import { toRefs } from "@vue/reactivity";
import { computed } from "@vue/runtime-core";
export default {
    props: ["id", "userName"],
    setup(props) {
        const { userName, id } = toRefs(props);
        const userIDLink = computed(() => {
            return "/userorderdetails/" + id.value;
        });
        return {
          userName,
          userIDLink
        }
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
