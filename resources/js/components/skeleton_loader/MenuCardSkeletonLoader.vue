<template>
    <!-- Earnings (Monthly) Card Example -->
    <div class="card rounded border">
        <div class="card-img-container">
        </div>
        <div class="card-body">
            <h3 class="card-title"></h3>
            <div class="card-menu-desc">
                <div class="price">
                </div>
                <div class="noOrders">
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
.card{  
        display: flex;
        flex-direction: row;
        margin: 1%;
        padding: 10px;
        border-radius: 1.1rem !important;
        width:31%;
        max-width: 700px;
        height: 120PX;
        background-color:  #fff;
        margin: 5px auto;
        padding: 10px;
        box-sizing: border-box;
        overflow: hidden;
        border-radius: 20px;
    }
    .card-title{
        margin: 5px 0;
        width: 100%;
        height: 24px;
        animation: pulse-bg 1s infinite;
    }
    .card-img-container{
        width: 30%;
        height: 100%;
        animation: pulse-bg 1s infinite;
    }
    .card-body{
        position: relative;
        width: 70%;
        margin-left: 5px;
        padding: 5px;
        min-height: 1px;
        height:100%;
    }
    .card-menu-desc{
        font-size: 1rem;
        margin: 5px 0;
        display: flex;
        justify-content: space-between;
    }
    .card-menu-desc .price{
        width: 100px;
        height: 15px;
        animation: pulse-bg 1s infinite;
    }
    .card-menu-desc .noOrders{
        width: 100px;
        height: 15px;
        animation: pulse-bg 1s infinite;
    }
    .card-categories{
        width: 100px;
        height: 15px;
        animation: pulse-bg 1s infinite;
    }

    .card-link{
        color: #777;
        text-decoration: none;
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