<template>
    <div to="/products" class="nav-link" :class="{collapsed:collapse}" href="#" v-on:click="collapse=!collapse" data-toggle="collapse" data-target="#collapseUtilities"
        :aria-expanded="!collapse" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Products</span>
    </div>
    <div :class="{show:!collapse}" id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{title}}</h6>
            <router-link class="collapse-item" v-for="menu in droppedList" v-on:click="changeMainMenu" :key="menu" :to="menu.link">{{menu.name}}</router-link>
        </div>
    </div>
</template>

<script>
import {ref} from 'vue';

export default {
    props:{
        droppedList:{
            required: true,
            default: false
        },
        title:{
            required: true,
            default: false
        }
    },
    setup(props) {
        const collapse = ref(true)
        return{
            collapse
        }
    },
}
</script>
