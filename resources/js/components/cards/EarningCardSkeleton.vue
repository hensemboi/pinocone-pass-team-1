<template>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
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
export default {
    setup() {
        
    },
}
</script>

<style scoped>
    .border-left-primary{
        border-left: 0.25rem solid #eee !important;
    }
    .card-body .row .col div:first-child{
        width: 100%;
        height: 16px;
        display: block;
        animation: pulse-bg 1s infinite;
    }

    .card-body .row .col div:last-child{
        width: 250px;
        height: 24px;
        animation: pulse-bg 1s infinite;
    }
    
    @keyframes pulse-bg{
        0%{
            background-color: #eee;
        }
        50%{
            background-color: #eaeaea;
        }
        100%{
            background-color: #eee;
        }
    }
</style>