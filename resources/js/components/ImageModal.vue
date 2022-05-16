<template>
  <div class="container">
    <img class="ImgThumbnail" :src="image" @click.stop="displayModal = true"/>
    <div id="modal" v-if="displayModal">
      <button class="btn imgclose" @click="displayModal=false"><i class="material-icons">&#xe5cd;</i></button>
      <div class="row img-box">
            <div class="col-1">
                <button class="btn nav-arrow nav-left" @click="prev">&#10094;</button>
            </div>
            <div class="col-9">
                <img class="modalImage" :src="image" />
            </div>      
            <div class="col-1">
                <button  class="btn nav-arrow nav-right" @click="next">&#10095;</button>
            </div>
      </div>
    </div>
  </div>
</template>
<script>
const images = [
  "https://images.dog.ceo/breeds/pomeranian/n02112018_5091.jpg",
  "https://images.dog.ceo/breeds/mountain-swiss/n02107574_753.jpg",
  "https://images.dog.ceo/breeds/leonberg/n02111129_3028.jpg",
];
export default {
  data() {
    return { 
        index: 0, 
        image: images[0], 
        displayModal: false 
        };
  },
  methods: {
    next() {
      this.index = (this.index + 1) % images.length;
      this.image = images[this.index];
       this.displayModal = true;
    },
    prev() {
      this.index = (this.index - 1) % images.length;
      this.image = images[this.index];
      this.displayModal = true;
    },
  },
};
</script>
<style scoped>
* {
box-sizing: border-box;
}
.ImgThumbnail {
border-radius: 5px;
cursor: pointer;
transition: 0.3s;
height: 250px;
width: 250px;
}
.ImgThumbnail:nth-of-type(1) {
margin-left: 20%;
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
    font-size: 3em;
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
