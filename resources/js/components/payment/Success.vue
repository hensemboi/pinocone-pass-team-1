<template>
    <section>
        <h2>Success!</h2>
    </section>
</template>
   
<script>
    export default {
        mounted() {
            if (this.$route.query.balance != null) {
                this.$store.dispatch("cart/resetCart", {})

                alert("Purchase successful. Your remaining balance is RM " + this.$route.query.balance + ".")
            }
        }
    }
</script>

<style scoped>
    section {
        margin: 2rem auto;
        max-width: 40rem;
    }

    h2 {
        color: var(--gray-black);
        text-align: center;
        border-bottom: 2px solid var(--quick-gray);
        padding-bottom: 1rem;
    }
</style>
