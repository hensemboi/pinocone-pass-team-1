<template>
                        <Suspense>
                        <template #default>
                        AIS
                        </template>
                        <template #fallback>
                            HAHA
                        </template>
                    </Suspense>
</template>

<script>
import { defineAsyncComponent } from '@vue/runtime-core'
    import EarningCard from "../components/cards/EarningCards.vue"
    import Bar from "../components/charts/LineChart.vue"
    import EarningCardSkeleton from '../components/cards/EarningCardSkeleton.vue'
    import useCheckData from '../components/hooks/checkdata.js'

    export default {
        components:{
            EarningCard,
            Bar,
            EarningCardSkeleton
        },
        name: "Dashboard",
        async setup(){
            const {checkModule, fetchingData} = await useCheckData("menu/getIsMenusPopulated", 'menu/fetchAllCategories')

            const EarningCardSkeleton = defineAsyncComponent(()=>
                import ("../components/cards/EarningCardSkeleton.vue")
            )
            const EarningCardsData=[
                {
                    name: "HAHA",
                    value: "$akj"
                }
            ]
            
            // const loadMenu = async() => {
            //     console.log("hha")
            //     const { default: axios } = require("axios");
            //     await axios.get("http://localhost:8000/sanctum/csrf-cookie").then(() => {
            //         axios
            //             .get("products", {
            //                 action: action,
            //             })
            //             .then((response) => {
            //                 console.log(response)
            //             })
            //             .catch((err) => {
            //                 console.log(err.response.data.errors);
            //             });
            //     });
            // }

            return {
                // loadMenu,
                EarningCard,
                EarningCardsData,
                EarningCardSkeleton,
                Bar,
                checkModule
            }
        }
    }
</script>

<style scoped>
    .top-menu-card div:first-child,
    .top-menu-label div:first-child
    {
        width: 10% !important;
    }
    .top-menu-card div:nth-child(2),
    .top-menu-label div:nth-child(2)
    {
        width: 60% !important;
    }
    .top-menu-card div:nth-child(3),
    .top-menu-label div:nth-child(3)
    {
        width: 30% !important;
    }
    .top-menu-card div{
        color: var(--admin-text-body-clr) !important;
    }
</style>