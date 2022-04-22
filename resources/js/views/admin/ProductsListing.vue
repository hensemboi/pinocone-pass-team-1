<template>
    <button @click=fetch()></button>
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
        const menu = [];
        function fetch(){
             const { default: axios } = require('axios');
            axios.get("http://localhost:8000/api/csrf-cookie%22").then(() => {
                axios
                .get("/productslisting", {
                    action:'fetchAll',
                })
                .then((response) => {
                    console.log(response);
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