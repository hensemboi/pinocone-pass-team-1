<template>
    <h3 class="text-center">{{ title }}</h3>
    <div>
        <div class="container-fluid my-6">
            <div class="row my-2 d-flex flex-row flex-nowrap overflow-auto">
                <div class="card-group">
                    <div
                        class="col col-md-6 col-lg-3 col-sm-12"
                        v-for="index in maxDisplay"
                        :key="products[index-1].menuID"
                    >
                        <div class="card w-75">
                            <img
                                :src="'https://picsum.photos/200/200'"
                                class="card-img-top"
                                alt="..."
                            />
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ products[index-1].menuName }}
                                </h5>
                                <p class="card-text">
                                    {{ products[index-1].description }}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted"
                                        >Last updated 3 mins ago</small
                                    >
                                </p>
                                <router-link class="btn btn-primary" to="/"
                                    >Check it out</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
export default {
    props: ["products", "title"],
    setup(props) {
        const maxDisplay = ref(4);
        const products = props.products;
        const title = props.title;
        return {
            products,
            maxDisplay,
            title,
        };
    },
};
</script>

<style scoped>

</style>