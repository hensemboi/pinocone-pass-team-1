<template>
    <div class="container d-flex">
        <component :is="MenuCard" ></component>
    </div>
</template>

<script>
import  MenuCard  from '../../components/cards/MenuCard.vue'

export default ({
    components:{
        MenuCard
    },
    setup() {
        return{
            MenuCard
        }  
    },
})
</script>

<style scoped>
    .container {
        flex-flow: row;
        flex-wrap: wrap;
    }
</style>