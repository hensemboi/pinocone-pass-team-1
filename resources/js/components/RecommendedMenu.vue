<template>
    <div class="col-lg-4">
          <img class="recommended-menu" :src="recommendedImageURL()" alt="recommended-menu.jpg" />
          <button>Button</button>
    </div>
</template>

<script>
    export default {
        props: {
            menu: String,
        },
        methods: {
            recommendedImageURL() {
                return "/images/recommended-menu-" + this.menu + ".jpg"; 
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
