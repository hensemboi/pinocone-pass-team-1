<template>
    <button @click=fetch()></button>
    <div class="container d-flex">
        <component :is="MenuCard"></component>
    </div>
</template>

<script>
import MenuCard from '../../components/cards/MenuCard.vue'

export default ({
    components:{
        MenuCard
    },
    setup() {
        function fetch(){
             const { default: axios } = require('axios');
            axios.get("http://localhost:8000/api/csrf-cookie%22").then(() => {
                axios
                .get("/productslisting", {
                    action:'fetchAll',
                })
                .then((response) => {
                    let menu = response.data;
                    console.log(typeof menu);
                    console.log(menu);
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
            });
        }
        

        return{
            fetch,
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