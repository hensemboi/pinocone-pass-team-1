<template>
    <div class="col-lg-4">
          <img class="recommended-menu" :src="recommendedImageURL()" alt="food.png" />
          <button class="btn-menu">ORDER</button>
    </div>
</template>

<script>
    export default {
        props: {
            menu: String,
        },
        methods: {
            recommendedImageURL() {
                return "/images/food" + this.menu + ".png"; 
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
