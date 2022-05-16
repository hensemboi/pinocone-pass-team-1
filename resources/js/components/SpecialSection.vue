<template>
    <div class="cards">
        <div class="card">
            <div class="card-header">
                <img class="ImgThumbnail" v-bind:src ="mImage" alt="Image" @click.stop="displayModal = true" />
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
    </div>
    
     <div id="modal" v-if="displayModal">
      <button class="btn imgclose" @click="displayModal=false"><i class="material-icons">&#xe5cd;</i></button>
      <div class="row img-box">
            <div class="col-1">
                <button class="btn nav-arrow nav-left" @click="prev">&#10094;</button>
            </div>
            <div class="col-9">
                <img class="modalImage" v-bind:src="mImage" />
            </div>      
            <div class="col-1">
                <button  class="btn nav-arrow nav-right" @click="next">&#10095;</button>
            </div>
      </div>
    </div>


</template>

<script>

export default {
    props:["RecommendedMenu"],

    data() {
    return { 
        displayModal: false,
        index: 0, 
        mImages: [{
                'imageUrl': '/images/logo.png', // image to be shown if no images were found
            }],
       
        };
    },
    created() {
        if (this.RecommendedMenu.images.length > 0) {
            this.mImages = this.RecommendedMenu.images;
        } 
    },
    computed: {
        mImage() {
            return this.mImages[this.index].imageUrl;
        },
    },
    methods: {
        next() {
        this.index = (this.index + 1) % mImages.length;
        this.mImage = mImages[this.index];
        this.displayModal = true;
        },
        prev() {
        this.index = (this.index - 1) % mImages.length;
        this.mImage = mImages[this.index];
        this.displayModal = true;
        },
  },
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
    display:inline-block;
    position: relative;
    margin: 20px;
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
.ImgThumbnail {
border-radius: 5px;
cursor: pointer;
transition: 0.3s;
height: 250px;
width: 250px;
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
    margin-bottom: 5px;
}
#modal {
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    max-height: 1080px;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.9);
}
.modalImage{
    margin: auto;
    display: block;
    width: 50%;
    height: 60%;
    max-width: 700px;
}
.img-box {
   display: flex;
   align-items:center;
   justify-content: center;
}
.imgclose{
    position: absolute;
    top: 15px;
    right: 35px;
    color: grey;
    transition: 0.2s;
}
.imgclose:hover,
.imgclose:focus {
color: lightgray;
cursor: pointer;
}
.nav-arrow {
  font-size: 3em;
  position: fixed;
  color: grey;
   top: 400px;  
}
.nav-left {   
  left: 10px; 
}
.nav-right { 
    right: 10px;   
}
.nav-arrow:hover,
.nav-arrow:focus {
    color: lightgray;
    cursor: pointer;
}


</style>