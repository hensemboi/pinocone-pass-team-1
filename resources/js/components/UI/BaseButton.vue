<template>
    <button v-if="!link" :class="mode">
        <slot></slot>
    </button>
    <router-link v-else :to="to" :class="mode">
        <slot></slot>
    </router-link>
</template>

<script>
export default {
    props: {
        link: {
            type: Boolean,
            required: false,
            default: false,
        },
        to: {
            type: String,
            required: false,
            default: "/",
        },
        mode: {
            type: String,
            required: false,
            default: null,
        },
    },
};
</script>

<style scoped>
button,
a {
    text-decoration: none;
    padding: 0.75rem 1.5rem;
    font: inherit;
    background-color: #fed531;
    border: 1px solid #fed531;
    color: white;
    cursor: pointer;
    border-radius: 30px;
    margin-right: 0.5rem;
    margin-top: 0.25rem;
    margin-bottom: 0.25rem;
    display: inline-block;
}

a:hover,
a:active,
button:hover,
button:active {
    background-color: #d7b52a;
    border-color: #d7b52a;
}

.flat {
    background-color: transparent;
    color: #3a0061;
    border: none;
}

.outline {
    background-color: transparent;
    border-color: #270041;
    color: #270041;
}

.flat:hover,
.flat:active,
.outline:hover,
.outline:active {
    background-color: #edd2ff;
}
</style>
