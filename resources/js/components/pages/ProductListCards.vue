<template>
    <h3>{{ title }}</h3>
    <div>
        <div class="container-fluid my-5">
            <div class="row my-3 d-flex flex-row flex-nowrap overflow-auto">
                <div class="card-group">
                    <div
                        class="col"
                        v-for="product in myProducts"
                        :key="product.id"
                    >
                        <div class="card w-75">
                            <img
                                :src="product.image"
                                class="card-img-top"
                                alt="..."
                            />
                            <div class="card-body">
                                <h5 class="card-title">{{ product.title }}</h5>
                                <p class="card-text">
                                    {{ product.description }}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted"
                                        >Last updated 3 mins ago</small
                                    >
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["title", "type"],
    data() {
        return {
            myProducts: [],
        };
    },
    created() {
        this.myProducts = this.$store.getters["marketplace/getProducts"];
    },
    beforeUpdate() {
        this.myProducts = this.$store.getters["marketplace/getProducts"];
    },
};
</script>

<style scoped>
.card {
    margin: 1.5rem auto;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
    padding: 1rem;
}
h2 {
    color: #292929;
    text-align: center;
    border-bottom: 2px solid #ccc;
    padding-bottom: 1rem;
}
</style>
