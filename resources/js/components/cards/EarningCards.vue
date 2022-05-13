<template>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            {{ name }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {ref} from 'vue'

    export default {
        async setup() {
            const userData = ref (await loadUserData())

            

            const loadOrdersData = async() => {
                
            }

            return {
                userData
            }
        },
    }
</script>

<style scoped>
    .border-left-primary{
        border-left: 0.25rem solid #4e73df !important;
    }
</style>