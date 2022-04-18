<template>
    <div class="menu-item" @click="isOpen = !isOpen" >
        <router-link to="#">
            {{ title }}
        </router-link>
        <transition name="fade" apear>
            <div class="sub-menu" v-if="isOpen">
                <div class="menu-item">
                    <router-link to="#">Warm</router-link>
                </div>
                <div class="menu-item">
                    <router-link to="#">Cold</router-link>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default{
        name: 'menu-dropdown',
        props: ['title'],
        data(){
            return{
                isOpen:false,
            }
        }
    }
</script>