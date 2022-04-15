<template>
    <router-link to="/test">Go to test?</router-link>
    <router-view></router-view>
    <router-view name="footer"></router-view>
</template>

<script>
export default {
    data() {
        return {
            myData: null
        }
    },
}
</script>

<style>

</style>