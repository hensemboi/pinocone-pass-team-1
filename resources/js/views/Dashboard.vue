<template >
<div id="body">
    <div v-if="isAllFetched">
        <div>
            <div>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <button href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50 btn-primary"></i> Generate Report</button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- <Suspense>
                            <template #default>
                            AIS
                            </template>
                            <template #fallback>
                                HAHA
                            </template>
                        </Suspense> -->
                        <!-- Earnings (Monthly) Card Example -->
                        <div v-for="obj in cardObj" :key="obj" class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" :style="{'border-left': '0.25rem solid ' + obj.color}">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-m font-weight-bold text-uppercase mb-1" :style="{color:obj.color}">
                                                {{obj.title}}</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ obj.value }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-2x text-gray-300" :class="obj.icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-xl-8 col-lg-7" style="{width: 100% !important; height: 50%;}"> 
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Revenue vs Year</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body ">
                                <div class="chart-area">
                                    <Line :data="yearlyRevenue"></Line>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                        <!-- Area Chart -->
                        <!-- Pie Chart -->
                        <!-- <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                Card Header - Dropdown -->
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- Card Body -->
                                <!-- <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Content Row -->
                    
                </div>
                    <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Pinocone 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

    </div>
    <div v-else>
        <EarningCardSkeleton v-for="n in 3" :key="n"></EarningCardSkeleton>
    </div>
    </div>

</template>
<script>
    import EarningCard from "../components/cards/EarningCards.vue"
    import Line from "../components/charts/LineChart.vue"
    import EarningCardSkeleton from '../components/cards/EarningCardSkeleton.vue'
    import useCheckData from '../components/hooks/checkdata.js'
    import { useStore } from "vuex";
    import {computed, watch, ref} from 'vue'

    export default {
        components:{
            EarningCard,
            Line,
            EarningCardSkeleton,
        },
        name: "Dashboard",
<<<<<<< HEAD
        setup(){
            const rootURL = window.location.origin;
            const store = useStore()
            const checkModule = useCheckData("menu/getIsMenusPopulated", 'menu/fetchAllCategories')
            const isDataFetched = computed(() => {
                return store.getters["menu/getIsCategoriesPopulated"];
            });

            watch(isDataFetched, (c)=>{
                console.log(c + "haha")
            })
            const orderCount =ref(null)
            const yearlyRevenue=ref(null)
            const userCount=ref(null)
            const totalRevenue=ref(null)
            const isAllFetched = computed(()=>{
                return (orderCount.value != null && yearlyRevenue.value != null && userCount.value != null && totalRevenue.value != null)? true : false
            })
            watch(yearlyRevenue,(C)=>{
                console.log(C)
            })

            const cardObj = computed(()=>{ 
                let obj = [
                    {
                        'title': 'User Counts',
                        'color': '#17a2b8',
                        'icon': 'fa-users',
                        'value': userCount
                    },
                    {
                        'title': 'Order Counts',
                        'color': '#007bff',
                        'icon': 'fa-file-invoice-dollar',
                        'value': orderCount
                    },
                    {
                        'title': 'Revenue Counts',
                        'color': '#28a745',
                        'icon': 'fa-dollar-sign',
                        'value': totalRevenue
                    }
                ]
                return obj
            })

            watch(cardObj,(c)=>{
                console.log(c.value)
            })
            watch(totalRevenue,(c)=>{
                console.log(c)
            })
            watch(userCount,(c)=>{
                console.log(c)
            })
=======
        async setup(){
            const rootURL = window.location.origin
            const admin = computed(async ()=>{
                await axios.get(rootURL + "/admin").data
            })
            const {checkModule, fetchingData} = await useCheckData("menu/getIsMenusPopulated", 'menu/fetchAllCategories')
>>>>>>> pinocone-incentives-v3

            const EarningCardsData=[
                {
                    name: "HAHA",
                    value: "$akj"
                }
            ]
            // const fetchTop5 = async() => {
            //     return new Promise(()=>{
            //         await axios.get("http://localhost:8000/sanctum/csrf-cookie").then(() => {
            //             axios.get('/dashboard/{5}', {
            //                 action: action,
            //             })
            //             .then((response) => {
            //                 return response
            //             }
            //             )
            //             .catch((err) => {
            //                 this.errors = err.response.data.errors;
            //             });
            //         });
            //     })
            // }
             
            return {
                // loadMenu,
                EarningCard,
                // top5,
                EarningCardsData,
                EarningCardSkeleton,
                Line,
                // checkData,
                checkModule,
                isDataFetched,
                yearlyRevenue,
                userCount,
                orderCount,
                totalRevenue,
                isAllFetched,
                cardObj

            }
<<<<<<< HEAD
        },
        async created(){
            await axios.get('/yearlyRevenue').then((response)=>{
                this.yearlyRevenue = response.data
            })
            await axios.get('/orderCount').then((response)=>{
                this.orderCount = response.data
            })
            await axios.get('/userCount').then((response)=>{
                this.userCount = response.data
            })
            await axios.get('/totalRevenue').then((response)=>{
                this.totalRevenue = response.data
            })
=======
>>>>>>> pinocone-incentives-v3
        }
    }
</script>

<style scoped>
    .chart-area{
        height: 100%;
    }
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

    #body{
        margin-left:230px;
    }
</style>