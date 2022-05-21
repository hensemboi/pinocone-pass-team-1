<template>
    <div class="card rounded border">
        <div class="card-img-container">
            <img class="card-img" src="/images/food1.png" alt="Card image cap">
        </div>
        <div class="card-body">
            <h3 class="card-title">{{ menu.menuName }}</h3>
            <div class="card-categories">
                <div href="#" class="card-link tag tag-teal"><span>{{menu.category.name}}</span></div>
                <div href="#" class="card-link tag tag-purple"><span>{{menu.cuisinetype.name}}</span></div>
            </div>
            <div class="card-menu-desc">
                <div class="price">
                   RM {{ menu.price }}
                </div>
                <div class="noOrders">
                    Orders: {{ menu.totalOrders }}
                </div>
            </div>
        </div>
    </div>    
</template>

<script>

export default ({
    props: ["menu"],
    setup(props){
    }
})
</script>


<style scoped>
.tag {
    display: inline-block;
    background: #cccccc;
    border-radius: 50px;
    font-size: 12px;
    margin: 0;
    color: #fff;
    padding: 2px 10px;
    text-transform: uppercase;
    cursor: pointer;
}
.tag-teal {
  background-color: #47bcd4;
}
.tag-purple {
  background-color: #5e76bf;
}
    .card{  
        flex-flow: row;
        margin: 1%;
        padding: 10px;
        border-radius: 1.1rem !important;
        width:31%;
        max-width: 700px;
        height: 120PX;
        background-color: #fff ;
        margin: 5px auto;
        padding: 10px;
        box-sizing: border-box;
        overflow: hidden;
        border-radius: 20px;
    }
    .card-title{
        margin: 5px 0;
        width: 100%;
        font-size: 1.2rem;
        color: #222;
        white-space: nowrap; 
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .card-img-container{
        width: 30%;
        height: 100%;
    }

    .card-body{
        position: relative;
        margin-left: 5px;
        padding: 5px;
        width: 70%;
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
        font-weight: 600;
        margin: 0;
    }
    .card-menu-desc .noOrders{
        letter-spacing: 1px;
        color: #222;
        font-family: Avenir, Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
    }
    .card-link span{
        font-size: 0.7rem;
        text-transform:  uppercase;
        color: #fff;
        letter-spacing: 1px;
    }

    .card-link{
        color: #777;
        text-decoration: none;
    }

</style>

