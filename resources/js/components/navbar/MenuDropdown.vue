<template>
    <div class="menu-item" @click="isOpen = !isOpen">
        <router-link to="#">
            {{ title }}
        </router-link>
        <transition name="fade" apear>
            <div class="sub-menu" v-if="isOpen">
                <div class="menu-item">
                    <router-link :to="marketplaceFoodType('warm')">Warm</router-link>
                </div>
                <div class="menu-item">
                    <router-link :to="marketplaceFoodType('cold')">Cold</router-link>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: "menu-dropdown",
    props: ["title"],
    data() {
        return {
            isOpen: false,
        };
    },
    methods: {
        marketplaceFoodType(foodType) {
            // 'teams'/ + id'
            // Like a variable for routes, parmas needed for dynamic value
            return {
                name: 'marketplace',
                query: { sort: foodType },
            };
        },
    },
};
</script>
