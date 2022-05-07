<template>
    <router-view name="navbar"></router-view>
    <router-view name="topbar" v-slot="{Component}">
        <transition name="slideBody">
            <component :class="{slide: sideSlided}" :is="Component">
                <template>
                </template>
            </component>
        </transition>
    </router-view>
    <router-view name="sidebar"></router-view>
    <router-view v-slot="{Component}">
        <transition name="slideBody">
            <component :class="{slide: sideSlided}" :is="Component" >
                <template >
                </template>
            </component>
        </transition>
    </router-view>
    <router-view name="footer"></router-view>
</template>

<script>
    import {useStore} from 'vuex'
    import {computed, ref, watch} from 'vue'
    // import gsap from 'gsap;'

    export default({
        setup(){
            const store = useStore();
            const sideSlided = computed(() =>store.getters['animations/getAdminSideSlide']);
            const states = ref(false);
            watch(sideSlided, (currValue, oldValue) => {
                console.log(currValue);
            })

            function change()
            {
                states.value = states.value ? false : true;
            }

            return{
                change,
                sideSlided,
                states
            }
        }
    })
</script>

<style scoped>
    .slide{
        width:inherit;
        animation: slideright 0.5s ease-in-out;
        margin-left:280px;
    }

    @keyframes slideright{
        from { margin-left: 0px; }
        to   { margin-left: 280px; }
    }
</style>