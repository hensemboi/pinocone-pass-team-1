<template>
    <router-link to="/test">Go to test?</router-link>
    <router-view></router-view>
</template>

<script>
import RecommendedMenu from "./components/RecommendedMenu.vue";
export default {
    components: {
        "recommended-menu": RecommendedMenu,
    },
    data() {
        return {
            randomData: null,
        };
    },
};
</script>
