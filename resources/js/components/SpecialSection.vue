<template>

    <section class="cards">
        <div class="card">
        <div class="card-header">
            <img src="../../../public/images/food2.png" alt="Image" />
        </div>
            <div class="card-body ">
                   <div class="text-order"><small class="text-muted">TotalOrders: {{RecommendedMenu.totalOrders}}</small></div>

                    <div class="tag tag-teal">{{RecommendedMenu.category.name}}</div>
                    <div class="tag tag-purple">{{RecommendedMenu.cuisinetype.name}}</div>
                 
                <h4 class="card-title">{{RecommendedMenu.menuName}}</h4>
                <p class="card-text">RM  {{RecommendedMenu.price}}</p>
            
                    <button class="btn-card">Order</button>
            </div>
    </div>
    </section>



</template>

<script>


export default {
   props:["RecommendedMenu"]
    
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

* {
  box-sizing: border-box;
}

.btn-card {
	color: #2d2e2c;
	background-color:  #fed531;
	text-decoration: none;
	border: none;
	border-radius: 30px;
	font-size: 20px;
	padding: 7px 30px;
	line-height: 40px;
	cursor: pointer;
}
.btn-card:hover{
	color: #fdfdfd;
	background-color:  #866c35;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
	transition-duration: 0.1s;
}

 .cards{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.card {
  margin: 10px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  width: 300px;
 
}
.card-header img {
  width: 100%;
  height: 200px;
  object-fit: cover;
 
}
.card-body {
  
  padding: 20px;
 
}
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

.card-body p {
  font-size: 13px;
}

.text-order{
    position: relative;
    text-align: right;

}


</style>