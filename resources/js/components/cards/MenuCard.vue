<template>
    <div class="card rounded border">
        <div>
            <img class="card-img" src="/images/food1.png" alt="Card image cap">
        </div>
        <div class="card-body">
            <h5 class="card-title">Menu Name</h5>
            <div class="card-menu-desc">
                <div class="price">
                    RM 123
                </div>
                <div class="noOrders">
                    1234
                </div>
            </div>
            <div class="card-categories">
                <a href="#" class="card-link">Category</a>
                <a href="#" class="card-link">Category 2</a>
            </div>
        </div>
    </div>    
</template>

<style scoped>
    .card{  
        width:31%;
        flex-flow: row;
        height: 100px;
        margin: 1%;
        padding: 10px;
        border-radius: 2%;
    }
    .card-title{
        margin-bottom:0;
    }
    .card-img{
        height: 100%;
    }
    .card-body{
        position: relative;
        margin-left: 5px;
        padding: 5px;
        min-height: 1px;
        height:100%;
    }
    .card-menu-desc{
        display: flex;
        display:row;
        justify-content: space-between;
    }
</style>

